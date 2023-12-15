<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up | Bond</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style type="text/css">
      .image-container {
        transition: transform 0.5s;
      }

      .image-container:hover {
        transform: scale(1.1); 
      }
    </style>

</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="image-container">
            <img src="images/CHAT.jpg" alt="Your Image" width="100%" height="650px">
        </div>
        <div class="form-container">
            <form class="shadow w-450 p-3" action="php/signup.php" method="post" enctype="multipart/form-data">
                <h4 class="display-4 fs-1">Create Account</h4><br>
                <?php if(isset($_GET['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
                <?php } ?>

                <?php if(isset($_GET['success'])){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
                <?php } ?>

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="fname" placeholder="Enter your fullname" value="<?php echo (isset($_GET['fname']))?$_GET['fname']:"" ?>">
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" placeholder="Enter your age">
                    </div>
                    <div class="col">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter your address">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="uname" placeholder="Enter a username" value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Enter a password">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" name="pp">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                        <label class="form-check-label" for="male">
                          Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">
                          Female
                        </label>
                    </div>
                </div>
                <div class="container mt-3">
                    <div class="text-center">
                        Already have an account? <a href="login.php">Login</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>
