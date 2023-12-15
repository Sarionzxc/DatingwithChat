<?php
session_start();

include_once "db_conn.php";
include('php/User.php');
include("sidebar.php");
include("match.php");

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
    
    if (!empty($_GET['likedUserId'])) {
        $likedUserId = $_GET['likedUserId'];

        $isAlreadyInMatchList = checkIfUserInMatchList($_SESSION['id'], $likedUserId, $conn);

        if (!$isAlreadyInMatchList) {
            addFriendToMatchList($_SESSION['id'], $likedUserId, $conn);

            $isLikedUserLiked = checkIfUserInMatchList($likedUserId, $_SESSION['id'], $conn);

            if ($isLikedUserLiked) {
                addFriendToMatchList($likedUserId, $_SESSION['id'], $conn);
            }
        }

        $likedUser = getUserById($likedUserId, $conn);

        if ($likedUser) {
            $_SESSION['likedUser'] = [
                'id' => $likedUser['id'],
                'name' => $likedUser['fname'],
                'pp' => isset($likedUser['pp']) ? $likedUser['pp'] : '',
                'age' => $likedUser['age'],
                'address' => $likedUser['address'],
            ];
        }
    }

    $user = getUserById($_SESSION['id'], $conn);
    $allUsers = getAllUsers($conn);

    $stmt = $conn->prepare("SELECT id, fname FROM users WHERE id <> :userId");
    $stmt->bindParam(':userId', $_SESSION['id'], PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>List | Bond</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
        <script src="js/list.js"></script>
       <script src="js/logout.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/status.css">
        <link rel="stylesheet" type="text/css" href="css/sidebar.css">
 <style>
     h1 {
            text-align: center;
            margin-top: 2px;
        }

        .centered-container {
            width: 750px;
            margin: 0 auto;
            text-align: center;
        }

        .user-card {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 0%;
        }

        .chat-button {
            margin-left: 500px;
            font-size: 18px;
            display: inline-block;
            text-decoration: none;
            padding: 5px 10px;
            background-color: #3498db;
            color: #fff;
            border: 1px solid #2980b9;
            border-radius: 4px;
            cursor: pointer;
        }
 </style>
</head>
  <body>

        <?php if ($user) { ?>
        <div class="position-absolute top-0 end-0 mt-2">
            <div class="shadow w-250 p-1 text-center">
                <img src="upload/<?= $user['pp'] ?>" class="img-fluid rounded-circle"
                    style="width: 200px; height: 200px;">
                <div id="online-status-container" class="online-status-container">
                    <div id="online-status" class="online"></div>
                </div>
                <h6 class="display-6"><?= $user['fname'] ?></h6>
                <p>Age:<?= $user['age'] ?></p>
                <p>Address:<?= $user['address'] ?></p>
                <a id="logoutButton" href="logout.php" class="btn btn-warning">Logout</a>
            </div>
        </div>

        <h1>Match List</h1>
        <div class="centered-container">
            <div class="float-right mb-1">
                <input type="text" id="searchInput" class="form-control" placeholder="Search Name">
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($_SESSION['likedUser'])) : ?>
               <tr>
                 <td><?php echo $_SESSION['likedUser']['name']; ?></td>
                 <td><?php echo $_SESSION['likedUser']['age'] ?></td>
                 <td><?php echo $_SESSION['likedUser']['address'] ?></td>
               <td>
            <span id="liked-user-status" class="online-status"></span>
        </td>
        
        <td>
        <a href="chatting.php?chatUserId=<?php echo $_SESSION['likedUser']['id']; ?>" class="btn btn-primary">Chat</a>
            <button class="btn btn-danger remove-btn">&#10006;</button>
        </td>
             </tr>
         <?php endif; ?>

                </tbody>
            </table>
        </div>
    
        <?php
        } else {
            //header("Location: login.php");
            exit;
        } ?>

    </body>
</html>
<?php
} else {
    //header("Location: login.php");
    exit;
}
?>
