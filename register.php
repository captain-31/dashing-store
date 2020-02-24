<!-- Header part-->
<?php
	require 'header.php';
?>
<!-- Header part-->
<!DOCTYPE html>
<html>
<head>
	<title>Register New</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<!-- Form start-->
	<div class="container login-container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 login-form">
        <h3 style="font-size: 30px">Create Your Account </h3>
        <form action="register.php" method="POST">

        	<!--First Name-->
            <div class="form-group">
                <input type="text" name="first-name" class="form-control" placeholder="Your Name *" value='<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : ''; ?>' required /></input>
            </div>

            <!--Last Name-->
             <div class="form-group">
                <input type="text" name="last-name" class="form-control" placeholder="Your Surname *" value='<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : ''; ?>' required /></input>
            </div>

            <!--Address-->
            <div class="form-group">
            	<textarea  rows="2" type="text" placeholder="Your Address..." name="address" class="form-control"required><?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?></textarea>
            </div>

             <!--City-->
            <div class="form-group">
                <input type="text" name="city" class="form-control" placeholder="Your City *" value='<?php echo isset($_POST['city']) ? $_POST['city'] : ''; ?>'  required/>
            </div>

            <div class="form-group">
            	Gender:&nbsp;&nbsp;&nbsp;
            	<input type="radio" name="gender" value="male" required>Male</input>&nbsp;&nbsp;
            	<input type="radio" name="gender" value="female" required>Female</input>&nbsp;&nbsp;
            </div>

            <!--Phone Number-->
            <div class="form-group">
            	<input type="text" placeholder="Phone Number *" name="uphone" class="form-control" pattern="[7-9]{1}[0-9]{9}" value='<?php echo isset($_POST['uphone']) ? $_POST['uphone'] : ''; ?>'  required></input>
            </div>

            <!--Email Address-->
            <div class="form-group">
                <input type="email" name="uemail" class="form-control" placeholder="Your Email *" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
            </div>

            <!--Password-->
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Your Password *" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
            </div>

            <!--Submit Button-->
            <div class="form-group">
                <button class="btnSubmit" type="submit" name="submit">Submit</button>
            </div>

            <!--Login Link-->
            <div class="form-group">
                <a href="login.php">Already have an account? Login here.</a>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
    </div>

    <!-- From end-->
    <?php  
		if(isset($_POST['submit']))
 		{
 			// reqire the databse connection
 			require 'conn.php';
 			// get the form data in the following variables
	 		$email = mysqli_real_escape_string($con,$_POST['uemail']);
			$fname = mysqli_real_escape_string($con,$_POST['first-name']);
			$lname = mysqli_real_escape_string($con,$_POST['last-name']);
			$phone = mysqli_real_escape_string($con,$_POST['uphone']);
			$address = mysqli_real_escape_string($con,$_POST['address']);
			$city = mysqli_real_escape_string($con,$_POST['city']);
			$password = $_POST['password'];
			$password=md5($password);
			
			//check gender
			if(!empty($_POST['gender']))
			{
				if($_POST['gender']=="male")
					$gender="Male";
				elseif ($_POST['gender']=="female") 
				{
					$gender="Female";
				}
			}

			//check for email already exists or not
			$check_email = "SELECT email_id FROM users WHERE email_id = '$email' ";
			$result_email = mysqli_query($con,$check_email);
			$count = mysqli_num_rows($result_email);
		
			if($count>0)
			{
				echo '<script language="javascript">';
				echo 'alert("Email Exists")';
				echo '</script>';
				exit();
			}
			else
			{
				// check if user input are empty
				if(empty($email) || empty($fname) || empty($lname) || empty($phone) || empty($password) || empty($address) || empty($city))
				{
					echo '<script language="javascript">';
					echo 'alert("Fill all the fields.")';
					echo '</script>';
					exit();
				}
				else
				{
					//check if name characters are valid
					if(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname))
					{
						echo '<script language="javascript">';
						echo 'alert("Invalid Name.")';
						echo '</script>';
						exit();	
					}
					else
					{
						//check if email is valid
						//here, filter_var() is used to both validate and sanitize the data.
						if(!filter_var($email,FILTER_VALIDATE_EMAIL))
						{
							echo '<script language="javascript">';
							echo 'alert("Invalid email.")';
							echo '</script>';
							exit();	
						}
						else
						{
							//Store insert query in a variable
		 					$user_reg_query = "insert into users (email_id,first_name,last_name,phone,password,address,city,gender) values ('$email','$fname','$lname','$phone','$password','$address','$city','$gender')";	
		 					//Execute the query
		 					$user_reg_submit = mysqli_query($con,$user_reg_query) or die(mysqli_error($con));
		 					echo '<script language="javascript">';
							echo 'alert("Account Created.Now login.")';
							echo '</script>';
							exit();
						}
					}
				}
			}
		}
	?>
</div>
	<!-- Footer -->
            <footer class="container-fluid" style="background-color: #101010;padding: 10px">
               Copyright © <?php echo date("Y"); ?> Dashing Store. All Rights Reserved | Contact Us: +91 7385739336
            </footer>
    <!-- Footer End -->

</body>
</html>