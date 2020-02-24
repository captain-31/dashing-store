<?php
	require 'header.php';
	$err = "";

			if(isset($_POST['submit']))
	 		{
				require 'conn.php';
				//get the form data in variabls
				$old_password = $_POST['old-password'];
				$new_password = $_POST['new-password'];
				$new_password_confirm = $_POST['new-password-confirm'];

				//convert all the values to md5 i.e message digest algorithm
				$old_password = md5($old_password);
				$new_password = md5($new_password);
				$new_password_confirm = md5($new_password_confirm);

				//check whether the new password and confirm new password are same  
				if(strcmp($new_password,$new_password_confirm)==0)
				{
					
					//get old password from DB
					$uid = $_SESSION['user-id']; 
					$query = "SELECT password from users where id= '$uid' ;";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					$row = mysqli_fetch_array($result);

					//store password from DB in variable
					$db_old_password = $row[0];

					//check whether old password(from db) match with old password entered by user
					if(strcmp($old_password,$db_old_password)==0)
					{
						
						//password update query
						$update_query = "UPDATE users SET password ='$new_password' WHERE id='$uid';";
						$update_result = mysqli_query($con,$update_query);
						if($update_result>0)
						{
							$err = "success";
						}
						else
						{
							$err = "failed";
						}

					}
					else
					{
						$err = "no_match_old";
					}

				}
				else
				{
					$err = "no_match";
				}
			}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container login-container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 login-form">
        <h3>Change Password </h3>
        <form action="settings.php" method="POST">
            <div class="form-group">
                <input type="password" name="old-password" class="form-control" placeholder="Old Password *" required/>
            </div>
            <div class="form-group">
                <input type="password" name="new-password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="New Password *" required/>
            </div>
            <div class="form-group">
                <input type="password" name="new-password-confirm" class="form-control" placeholder="Confirm New Password *" required/>
            </div>
            <div class="form-group">
                <button class="btnSubmit" type="submit" name="submit">Submit</button>
            </div>
            <div style="color: red">
            	<?php
            		switch ($err) 
            		{
            		  	case 'no_match':
            		  		echo "Passwords dot not match";
            		  		break;
            		  	case 'no_match_old':
            		  		echo "Invalid Old Password";
            		  		break;
            		  	case 'failed':
            		  		echo "Failed to update password";
            		  		break;	
            		  	case 'success':
            		  		echo "<p style='color:green;font-size:16px'>Password updated successfully</p>";
            		  		break;	
            		  	
            		  	default:
            		  		break;
            		  }  
            	?>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
    </div>
        
</div>
<!-- Footer -->
     <footer class="container-fluid" style="background-color: #101010;padding: 10px">
          Copyright © <?php echo date("Y"); ?> Dashing Store. All Rights Reserved | Contact Us: +91 7385739336
      </footer>
 <!-- Footer End -->

</body>
</html>