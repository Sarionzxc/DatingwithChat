<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login|Bond</title>
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
    	<div class="form-container">
	    	<form class="shadow w-450 p-3" action="php/login.php" method="post">

	    		<h4 class="display-4 fs-1 ">LOGIN</h4><br>
	    		
	    		<?php if(isset($_GET['error'])){ ?>
	    		<div class="alert alert-danger" role="alert">
				  <?php echo $_GET['error']; ?>
				</div>
			    <?php } ?>

			  <div class="mb-3">
			    <label class="form-label">Username</label>
			    <input type="text" class="form-control" name="uname" placeholder="Enter Your Username" value="<?php echo (isset($_GET['uname'])) ? $_GET['uname'] : "" ?>">
			  </div>

			  <div class="mb-3">
			    <label class="form-label">Password</label>
			    <input type="password" class="form-control" name="pass" placeholder="Enter Your Password">
			  </div>

			  <div class="container mt-3">
	            <div class="text-center">
	                Don't have an account? <a href="signup.php">Register</a>
	            </div>
	          </div>
			  <button type="submit" class="btn btn-primary">Login</button>
			  
			</form>
		</div>

		<div class="image-container">
			<img src="images/DATE.jpg" alt="Your Image" width="100%" height="650px">
		</div>
    </div>
</body>
</html>
