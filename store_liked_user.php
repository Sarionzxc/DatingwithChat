
<?php

session_start();
include("db_conn.php");

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $likedUserId = $_POST['userId'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['userId'])) {
        $likedUserData = [
            'name' => $_POST['name'],
            'userId' => $_POST['userId'],
        ];
    
        $_SESSION['likedUsers'] = $likedUserData;
    
    $query = "SELECT * FROM liked_users WHERE (user_id = :userId AND liked_user_id = :likedUserId) OR (user_id = :likedUserId AND liked_user_id = :userId) AND status = 'matched'";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':likedUserId', $likedUserId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo 'already_matched';
    } else {
        
        $insertQuery = "INSERT INTO liked_users (user_id, liked_user_id) VALUES (:userId, :likedUserId)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':likedUserId', $likedUserId, PDO::PARAM_INT);
        $stmt->execute();

        
        $checkMatchQuery = "SELECT * FROM liked_users WHERE user_id = :likedUserId AND liked_user_id = :userId AND status = 'liked'";
        $stmt = $conn->prepare($checkMatchQuery);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':likedUserId', $likedUserId, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Update the status to 'matched'
            $updateQuery = "UPDATE liked_users SET status = 'matched' WHERE user_id = :userId AND liked_user_id = :likedUserId";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':likedUserId', $likedUserId, PDO::PARAM_INT);
            $stmt->execute();
            echo 'matched';
        } else {
            echo 'liked';
        }
    }
} else {
    echo 'session_not_set';
}}
?>