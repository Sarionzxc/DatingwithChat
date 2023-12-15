<?php
session_start();

include_once "db_conn.php"; 

if (isset($_SESSION['id']) && isset($_POST['message']) && isset($_POST['receiverId'])) {
    $senderId = $_SESSION['id'];
    $receiverId = $_POST['receiverId'];
    $message = $_POST['message'];



    $query = "INSERT INTO messages (senderId, receiverId, message) VALUES (:senderId, :receiverId, :message)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':senderId', $senderId, PDO::PARAM_INT);
    $stmt->bindParam(':receiverId', $receiverId, PDO::PARAM_INT);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);
    $stmt->execute();

 
    echo "Message sent successfully";
} else {
    echo "Error: Invalid input or user not logged in";
}
?>
