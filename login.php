<!-- Header part-->
<?php
    require 'header.php';
?>
<!-- Header part-->
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<!--Login form start-->
	<div class="container login-container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 login-form">
        <h3 style="font-size: 30px">Login </h3>
        <form action="login.php" method="POST">
            <div class="form-group">
                <input type="email" name="uemail" class="form-control" placeholder="Your Email *" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Your Password *" required/>
            </div>
            <div class="form-group">
                <button class="btnSubmit" type="submit" name="submit">Submit</button>
            </div>
            <div class="form-group">
                <a href="register.php">Don't have a account? Register here.</a>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
    </div>
        <?php  
			if(isset($_POST['submit']))
	 		{
				require 'conn.php';
				//get the form data in variabls
				$email = mysqli_real_escape_string($con,$_POST['uemail']);
				$password = $_POST['password'];
				$password=md5($password);
				//get email and password of particular email
				$query = "SELECT email_id,password,id,first_name,last_name FROM users WHERE email_id = '$email' ";
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				$row = mysqli_fetch_array($result);
				//store email and password to variables
				$db_email = $row[0];
				$db_password = $row[1];
				$u_id = $row[2];
				$u_name = $row[3]." ".$row[4];
				
				//check for email exists in database
				if(strcmp($email, $db_email)==0)
				{
					//if email is found, then check for password
					if(strcmp($password,$db_password)==0)
					{
						//if password found to be correct, redirect to products page and start the session
						//session_start();
						$_SESSION['user-id'] = $u_id; 
						$_SESSION['user-email'] = $db_email;
						$_SESSION['user-name'] = $u_name;

						//echo "$u_name ".$_SESSION['user-id'];
						$_SESSION['logged_in'] = true;
						header("Location: products.php");
					}
					else
					{
						//if password is wrong, then this message
						echo '<script language="javascript">';
						echo 'alert("Wrong Password")';
						echo '</script>';
					}
				}
				else
				{
					//if email not found, then this message
					echo '<script language="javascript">';
					echo 'alert("Email not found")';
					echo '</script>';
				}
			}
		?>
	</div>
	<!--Login form end-->

	<!-- Footer -->
            <footer class="container-fluid" style="background-color: #101010;padding: 10px">
               Copyright © <?php echo date("Y"); ?> Dashing Store. All Rights Reserved | Contact Us: +91 7385739336
            </footer>
    <!-- Footer End -->

</body>
</html>