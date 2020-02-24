<!--header part start-->
<?php 
require 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css\style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
	<!--admin login start-->
	<div class="container login-container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 login-form">
        <h3 style="font-size: 30px">Admin Login </h3>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" name="uname" class="form-control" placeholder="Admin name *" required />
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Your Password *" required/>
            </div>
            <div class="form-group">
                <button class="btnSubmit" type="submit" name="submit">Submit</button>
            </div>
            
        </form>
    </div>
    <div class="col-md-3"></div>
    </div>
        <?php  
        	//here the userame and password is default username-admin, password-admin
			if(isset($_POST['submit']))
	 		{
	 			//default admin credentials
				$user_name = "admin";
				$password = "admin";
				//data from form	
				$uname = $_POST['uname'];
				$upassword = $_POST['password'];
				//check for credentials
				if(strcmp($user_name, $uname)==0 && strcmp($password, $upassword)==0)
				{ 
					$_SESSION['user-name'] = $user_name;
					$_SESSION['logged_in'] = true;
					header("Location: admin-dashboard.php");
				}
				else
				{
					echo '<script language="javascript">';
					echo 'alert("Wrong Credentials")';
					echo '</script>';
				}
			}
		?>
	</div>
	<!--Admin login end-->

	 <!-- Footer -->
            <footer class="container-fluid" style="background-color: #101010;padding: 10px">
               Copyright © <?php echo date("Y"); ?> Dashing Store. All Rights Reserved | Contact Us: +91 7385739336
            </footer>
    <!-- Footer End -->

</body>
</html>