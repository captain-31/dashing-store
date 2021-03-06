<?php 
  //start session
  session_start();
?>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css\style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <!--Header start-->

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="admin-dashboard.php"><span style="color: white">Admin Dashboard</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <!--Check whether user is logged in and show the menu bar accordingly-->
          <?php if(isset($_SESSION['logged_in'])  && $_SESSION['logged_in'] == true) { ?>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Products<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="product-upload.php">Upload Product</a></li>
              <li><a href="allproducts.php">All Products</a></li>
              <li><a href="deleteproduct.php">Delete Product</a></li>
            </ul>
          </li>
         <?php } ?>
          <!--End-->
          <li><a href="allusers.php">All Users</a></li>
          <li><a href="sales.php">Sales Report</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php if(empty($_SESSION['logged_in']) ) { ?> 
          
          <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
        <?php } else {?>
        <li><a href="logout.php?logout=1">Logout</a></li>
          <?php }?>
        </div>
      </div>
    </nav>
    <!-- Header part end-->
<br>
    <!--Welcome Message-->
		<div class="container jumbotron">
			<h1>Welcome to Admin Dashboard.</h1>
			<p style="font-size: 20px">You can manage the application from admin dashboard. Default username and password is admin</p><br><br>
      <center><img src="images/ap.png" height="300px" width="300px"></center>
		</div>
    <!--Welcome message end-->

		<!-- Footer -->
    <footer class="container-fluid" style="background-color: #101010;padding: 10px">
        Copyright © <?php echo date("Y"); ?> Dashing Store. All Rights Reserved | Contact Us: +91 7385739336
    </footer>
    <!-- Footer End -->

</body>
</html>


