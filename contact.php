 <!--Header code-->
<?php
    require 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<br><br><br><br>
	 <!--Head Text-->
	 <div class="container">
		<center><h1 style="font-size: 60px; letter-spacing: 3px;"><b>Get in Touch!</b></h1><hr><br>
		<p style="font-size: 20px">For general inquiries, product information or any other issues just drop a message here and we will get back to you.</p></center>
	</div>
	 <!--Head Text-->

    <!-- Contact from start-->
    <div class="container login-container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 login-form">
        <form action="" method="POST">
            <div class="form-group">
                <input type="name" name="name" class="form-control" placeholder="Your Full Name *"  required />
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Your Email *" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required/>
            </div>
            
            <div class="form-group">
            	<textarea  rows="2" type="text" placeholder="Your Message..." name="message" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <button class="btnSubmit" type="submit" name="submit">Get in Touch</button>
            </div>
        </form>
    </div>
    <!-- contact form end-->

    <?php
    	if(isset($_POST['submit']))
    	{
    		require 'conn.php';
            //get all form data
    		$name = mysqli_real_escape_string($con,$_POST['name']);
    		$email = mysqli_real_escape_string($con,$_POST['email']);
    		$message = mysqli_real_escape_string($con,$_POST['message']);
            
            //insert data into contact table
    		$insert_query = "INSERT INTO contact (name,email,message) VALUES ('$name','$email','$message');";
    		$insert_query_result = mysqli_query($con,$insert_query);
    		if($insert_query_result>0)
    		{
    			echo '<script language="javascript">';	
				echo 'alert("Your message submitted.")';
				echo '</script>';
    		}
    		else
    		{
    			echo '<script language="javascript">';	
				echo 'alert("Failed.")';
				echo '</script>';
    		}
    	}
    	
    ?>

    <!---->
    <div class="col-md-3"></div>
    </div>
    </div><br><br>
    <!-- Contact End -->

    <!-- Info -->
    <div class="container-fluid">
    	<div class="row" style="background-color: #4285F4;color: white;"><br>
            <div class="col-md-3">
                <center>
	                <h1><span class="glyphicon glyphicon-map-marker"></span></h1>
	                <h3 style="letter-spacing: 2px"><b>Address</b></h3>
	                <p style="font-size: 16px">Samarth Plot, Parvati colony, Sangli 416 416.</p>
                </center>
            </div>
            <div class="col-md-3">
                <center>
	                <h1><span class="glyphicon glyphicon-phone"></span></h1>
	                <h3 style="letter-spacing: 2px"><b>Contact Number</b></h3>
	                <p><a href="telto:+917385739336" style="color: white;font-size: 16px">+91 7385739336</a></p>
                </center>
            </div>
            <div class="col-md-3">
                <center>
	               	<h1><span class="glyphicon glyphicon-envelope"></span></h1> 
	                <h3 style="letter-spacing: 2px"><b>Email Address</b></h3>
	                <p><a style="color: white;font-size: 16px" href="mailto:contact@dashing-store.com">contact@dashing-store.com</a></p>
                </center>
            </div>
            <div class="col-md-3">
                <center>
	                <h1><span class="glyphicon glyphicon-globe"></span></h1>
	                <h3 style="letter-spacing: 2px"><b>Website</b></h3>
	                <p><a style="color: white;font-size: 16px" href="index.php">dashing-store.com</a></p><br>
                </<center>
            </div>
        </div>

        <div class="row">
        <center>
        	<h2 style="font-size: 45px;letter-spacing: 3px"><br>Find us on <span style="color: #4285F4">G</span><span style="color: #DB4437">o</span><span style="color: #F4B400">o</span><span style="color: #4285F4">g</span><span style="color: #0F9D58">l</span><span style="color: #DB4437">e</span> Maps</h2><br><br>
        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7736979.908820221!2d72.2746352041393!3d18.76147634888302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcfc41e9c9cd6f9%3A0x1b2f22924be04fb6!2sMaharashtra!5e0!3m2!1sen!2sin!4v1563703845889!5m2!1sen!2sin" width="350px" height="600px" frameborder="0" style="border:0"></iframe>
        </center>
        </div>

        </div>
    <br><br>
    <!-- Info End -->

    <!-- Footer -->
            <footer class="container-fluid" style="background-color: #101010;padding: 10px">
               Copyright © <?php echo date("Y"); ?> Dashing Store. All Rights Reserved | Contact Us: +91 7385739336
            </footer>
    <!-- Footer End -->


</body>
</html>