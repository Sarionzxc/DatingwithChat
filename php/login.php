<?php 
session_start();

if(isset($_POST['uname']) && isset($_POST['pass'])){
    include "../db_conn.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "uname=".$uname;

    if(empty($uname)){
        $em = "Username is required";
        header("Location: ../login.php?error=$em&$data");
        exit;
    } else if(empty($pass)){
        $em = "Password is required";
        header("Location: ../login.php?error=$em&$data");
        exit;
    } else {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if($stmt->rowCount() == 1){
            $user = $stmt->fetch();

            $username =  $user['username'];
            $password =  $user['password'];
            $fname =  $user['fname'];
            $id =  $user['id'];
            $pp =  $user['pp'];

            if($username === $uname){
                if (password_verify($pass, $password)) {
                
                    $onlineStatus = 'online';
                    $updateStatusSql = "UPDATE users SET status = ?, last_activity = CURRENT_TIMESTAMP WHERE id = ?";
                    $updateStatusStmt = $conn->prepare($updateStatusSql);
                    $updateStatusStmt->execute([$onlineStatus, $id]);
                
                    $_SESSION['id'] = $id;
                    $_SESSION['fname'] = $fname;
                    $_SESSION['pp'] = $pp;
                
                    header("Location: ../dashboard.php");
                    exit;
                }
                 else {
                    $em = "Incorrect Username or password";
                    header("Location: ../login.php?error=$em&$data");
                    exit;
                }
            } else {
                $em = "Incorrect Username or password";
                header("Location: ../login.php?error=$em&$data");
                exit;
            }
        } else {
            $em = "Incorrect Username or password";
            header("Location: ../login.php?error=$em&$data");
            exit;
        }
    }
} else {
    header("Location: ../login.php?error=error");
    exit;
}
?>
