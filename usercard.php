<?php 
include("db_conn.php");
include("php/User.php");

$user = getUserById($_SESSION['id'], $conn);
?>

<div class="position-absolute top-0 end-0 mt-2">
    <div class="shadow w-250 p-1 text-center">
        <img src="upload/<?= $user['pp'] ?>" class="img-fluid rounded-circle"
             style="width: 200px; height: 200px;">

        <div id="online-status-container" class="online-status-container">
            <div id="online-status" class="online"></div>
        </div>
        <h6 class="display-6"><?= $user['fname'] ?></h6>
        <p>Age: <?= $user['age'] ?></p>
        <p>Address: <?= $user['address'] ?></p>
        <a id="logoutButton" href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</div>