<?php
include("db_conn.php");

function checkIfUserInMatchList($userId, $friendId, $conn) {
    $stmt = $conn->prepare("SELECT * FROM friend_match_list WHERE user_id = :userId AND friend_id = :friendId");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':friendId', $friendId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
}

function addFriendToMatchList($userId, $friendId, $conn) {
    $stmt = $conn->prepare("INSERT INTO friend_match_list (user_id, friend_id) VALUES (:userId, :friendId)");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':friendId', $friendId, PDO::PARAM_INT);
    $stmt->execute();
}

function getMatchList($userId, $conn) {
    $stmt = $conn->prepare("
        SELECT users.id, users.fname, users.pp, users.age, users.address
        FROM friend_match_list
        JOIN users ON friend_match_list.friend_id = users.id
        WHERE friend_match_list.user_id = :userId
        LIMIT 5
    ");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getFriendList($userId, $conn) {
    $stmt = $conn->prepare("
        SELECT users.id, users.fname, users.pp, users.age, users.address
        FROM friend_match_list
        JOIN users ON friend_match_list.friend_id = users.id
        WHERE friend_match_list.user_id = :userId
    ");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>