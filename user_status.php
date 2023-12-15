<?php
include_once "db_conn.php";


$userId = isset($_SESSION['id']) ? $_SESSION['id'] : '';

if (!empty($userId)) {
    try {
        
        $getLastActivityQuery = "SELECT last_activity FROM users WHERE id = :userId";
        $stmt = $conn->prepare($getLastActivityQuery);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $lastActivityTimestamp = strtotime($row['last_activity']);
            $currentTime = time();
            
           
            $onlineThreshold = 5 * 60; // 5 minutes in seconds

            if ($currentTime - $lastActivityTimestamp <= $onlineThreshold) {
                echo 'online';
            } else {
                echo 'offline';
            }
        } else {
            echo 'offline';
        }
    } catch (PDOException $e) {
        echo 'offline';
    }
} else {
    echo 'offline';
}
?>
