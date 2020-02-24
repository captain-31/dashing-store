<!--::header part start::-->
<?php session_start();?>
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css\style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><span style="color: white">Dashing Store</span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <!--Start-->
      <?php if(isset($_SESSION['logged_in'])  && $_SESSION['logged_in'] == true) { ?>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">My account<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="cart.php?id=0">My Cart</a></li>
          <li><a href="myorders.php">My Orders</a></li>
          <li><a href="settings.php">Settings</a></li>
        </ul>
      </li>
     <?php } ?>
      <!--End-->
      <li><a href="index.php">Home</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="contact.php">Contact</a></li>
      
      
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
