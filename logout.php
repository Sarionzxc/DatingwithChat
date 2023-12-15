<?php
session_start();
include ("db_conn.php");

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    // Set user status to 'offline' on logout
    $offlineStatus = 'offline';
    $updateStatusSql = "UPDATE users SET status = ? WHERE id = ?";
    $updateStatusStmt = $conn->prepare($updateStatusSql);
    $updateStatusStmt->execute([$offlineStatus, $userId]);

    
    $_SESSION = array();

    
    session_unset();
    session_destroy();
}

// Redirect to the index page
header("Location: index.php");
exit;
?>
