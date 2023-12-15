<?php 

function getUserById($id, $db){
    $sql = "SELECT * FROM users WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->execute([$id]);
    
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch();
        return $user;
    }else {
        return 0;
    }
}

function getMatchedUsers($userId, $conn)
{
    try {
        $query = "SELECT * FROM liked_users 
                  WHERE (user_id = :userId OR liked_user_id = :userId) 
                  AND status = 'matched'";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $matches = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $matches;
    } catch (PDOException $e) {
       
        echo "Error: " . $e->getMessage();
        return [];
    }
}


 ?>