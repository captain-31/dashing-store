<!-- Header part-->
<?php
	require 'header.php';
?>
<!-- Header part end-->
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   	<style>
  	* 
  	{
  		box-sizing: border-box;
	}
	/* Create three equal columns that floats next to each other */
	.column 
	{
		float: left;
		width: 33.33%;
		padding: 10px;
		height: auto; 
	}	

	/* Clear floats after the columns */
	.row:after 
	{
		content: "";
		display: table;
		clear: both;
	}
	@media screen and (max-width: 600px) 
	{
		.column 
		{
			width: 100%;
		}
	}
</style>
</head>
<body>
<br><br>
	<div class="container"><br>
	<center><h1 style="letter-spacing: 3px;font-size: 40px">Our Products<hr></h1></center><br>
	<?php
		require 'conn.php';
		//select products from database
		$sql = "select * from products;";
		$result = mysqli_query($con,$sql);
		$result_cnt = mysqli_num_rows($result);
		if($result_cnt>0)
		{
			//here the products are displayed in three columns
			while ($row = mysqli_fetch_assoc($result)) 
			{
				?>
               
				<div class="row">
				<?php if($row) {?>
                <div class="column" >
					<!--Card-->
						<div class="card">
						<!--Card image-->
							<div class="view">
						        <img src="<?php echo $row['image_path']?>" class="card-img-top"
						          alt="photo" height="300px" width="250px">
						    </div>

						    <!--Card content-->
						    <div class="card-body">
						   		<!--Title-->
						    	<h4 class="card-title"><?php echo $row['name']?></h4>
						   	 	<!--Text-->
						        <p class="card-text"><?php echo $row['description']?></p>

						        <p style="font-size: 20px"><span><b>₹&nbsp</b></span><?php echo $row['price']?></p>
						        <!--Check for user login (if logged in show ADD TO CART button else BUY NOW)-->
						        <?php if(isset($_SESSION['logged_in'])  && $_SESSION['logged_in'] == true) { ?>
						        <a href="cart.php?id=<?php echo $row['p_id'];?>" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>Add to cart</a>
						        <?php } else { ?>
						        <a href="login.php" class="btn btn-primary">Buy Now</a>
						        <?php }?>
						    </div>

						</div>
						<!--/.Card-->
					</div>

                   <?php }$row = mysqli_fetch_assoc($result); 
                   if($row) {?>
					<div class="column" >
					<!--Card-->
						<div class="card" >
						<!--Card image-->
							<div class="view">
						        <img src="<?php echo $row['image_path']?>"  class="card-img-top"
						          alt="photo" height="300px" width="250px">
						    </div>

						    <!--Card content-->
						    <div class="card-body">
						   		<!--Title-->
						    	<h4 class="card-title"><?php echo $row['name']?></h4>
						   	 	<!--Text-->
						        <p class="card-text"><?php echo $row['description']?></p>
						        <p style="font-size: 20px"><span><b>₹&nbsp</b></span><?php echo $row['price']?></p>
						        <?php if(isset($_SESSION['logged_in'])  && $_SESSION['logged_in'] == true) { ?>
						        <a href="cart.php?id= <?php echo $row['p_id'];?>" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>Add to cart</a>
						        <?php } else { ?>
						        <a href="login.php" class="btn btn-primary">Buy Now</a>
						        <?php }?>
						    </div>

						</div>	
						<!--/.Card-->
					</div>
                     
                   <?php } $row = mysqli_fetch_assoc($result);  
                   if($row)  {?>
					<div class="column" >
					<!--Card-->
						<div class="card" >
						<!--Card image-->
							<div class="view">
						        <img src="<?php echo $row['image_path']?>"  class="card-img-top"
						          alt="photo" height="300px" width="250px">
						    </div>

						    <!--Card content-->
						    <div class="card-body">
						   		<!--Title-->
						    	<h4 class="card-title"><?php echo $row['name']?></h4>
						   	 	<!--Text-->
						        <p class="card-text"><?php echo $row['description']?></p>
						        <p style="font-size: 20px"><span><b>₹&nbsp</b></span><?php echo $row['price']?></p>
						         <?php if(isset($_SESSION['logged_in'])  && $_SESSION['logged_in'] == true) { ?>
						        <a href="cart.php?id= <?php echo $row['p_id'];?>" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>Add to cart</a>
						        <?php } else { ?>
						        <a href="login.php" class="btn btn-primary">Buy Now</a>
						        <?php }?>
						    </div>

						</div>
						<!--/.Card-->
					</div>
					<?php } ?>
				</div>
				<?php
			
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