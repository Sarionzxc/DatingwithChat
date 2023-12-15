<?php

if (
    isset($_POST['fname']) &&
    isset($_POST['uname']) &&
    isset($_POST['pass']) &&
    isset($_POST['gender']) &&
    isset($_POST['age']) &&
    isset($_POST['address'])
) {

    include "../db_conn.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    $data = "fname=" . $fname . "&uname=" . $uname;

    if (empty($fname) || empty($uname) || empty($age) || empty($address) || empty($pass)) {
        $em = "All fields are required";
        header("Location: ../signup.php?error=$em&$data");
        exit;
    } else {
        
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        
        $status = "active"; 

        if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
            $img_name = $_FILES['pp']['name'];
            $tmp_name = $_FILES['pp']['tmp_name'];
            $error = $_FILES['pp']['error'];

            if ($error === 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);

                $allowed_exs = array('jpg', 'jpeg', 'png');
                if (in_array($img_ex_to_lc, $allowed_exs)) {
                    $new_img_name = uniqid($uname, true) . '.' . $img_ex_to_lc;
                    $img_upload_path = '../upload/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Insert into Database
                    $sql = "INSERT INTO users(fname, age, address, username, password,  pp, gender, status) 
                        VALUES(?,?,?,?,?,?,?,?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$fname, $age, $address, $uname, $pass,  $new_img_name, $gender, $status]);

                    header("Location: ../signup.php?success=Your account has been created successfully");
                    exit;
                } else {
                    $em = "You can't upload files of this type";
                    header("Location: ../signup.php?error=$em&$data");
                    exit;
                }
            } else {
                $em = "Unknown error occurred!";
                header("Location: ../signup.php?error=$em&$data");
                exit;
            }
        } else {
            $sql = "INSERT INTO users(fname,age, address, username, password, gender, status) 
                    VALUES(?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$fname,$age, $address, $uname, $pass, $gender, $status]);

            header("Location: ../signup.php?success=Your account has been created successfully");
            exit;
        }
    }
} else {
    header("Location: ../signup.php?error=error");
    exit;
}
?>
