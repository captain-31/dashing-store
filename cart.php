<!-- Header part-->
<?php	
    require 'header.php';
    //get product if from get parameter
    $pid = $_GET['id'];
    //get user id from session
    $uid = $_SESSION['user-id'];
    
    //check for pid is empty or not
    if(!empty($pid) && isset($pid))
    {
    	require 'conn.php';
    	//insert query into cart
    	$insert_query = "INSERT INTO cart (user_id,p_id) VALUES('$uid','$pid')";
    	$query_result = mysqli_query($con,$insert_query);
    	if($query_result>0)
    	{
    		echo '<script language="javascript">';
			echo 'alert("Product added to cart")';
			echo '</script>';
    	}
    	else
    	{
    		echo '<script language="javascript">';
			echo 'alert("Failed to add")';
			echo '</script>';	
    	}
    }
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body><br><br>
	<?php
		require 'conn.php';
		$i=1;
		$uid = $_SESSION['user-id'];
		//display cart items query
		$select_query = "SELECT name,price,p_id FROM products WHERE p_id IN (SELECT p_id from cart where user_id='$uid');";
		$select_query_result = mysqli_query($con,$select_query);
		$records_count = mysqli_num_rows($select_query_result);

		//total query
		$total_query = "SELECT SUM(price) FROM products WHERE p_id IN (SELECT p_id from cart where user_id='$uid');";
		$total_query_result = mysqli_query($con,$total_query);
		$row = mysqli_fetch_array($total_query_result);
		$total = $row[0];
		if ($records_count>0) 
		{ 
		//display records if the cart table have records or display add to cart message
	?>
		<div class="container">
		<br><br>
  		<h2>My cart</h2>
  		<p>You can see all the products add to your cart and also you can place your order.</p>            
  		<table class="table table-hover">
		    <thead>
		      <tr>
		      	<th>Sr. No</th>
		        <th>Product</th>
		        <th>Price</th>
		        <th></th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php while ($row= mysqli_fetch_array($select_query_result)) {?>
		      <tr>
		      	<td><?php echo $i; $i++; ?></td>
		        <td><?php echo $row['name']?></td>
		        <td><?php echo $row['price']?></td>
		        <td><a href="remove-item.php?p_id=<?php echo $row['p_id'];?>" data-toggle="tooltip" data-placement="left" title="Remove item"><span class="glyphicon glyphicon-trash"></span></a></td>
		      </tr>
		      <?php }?>
		      	<tr>
		      		<td></td>
		      		<td><b>Total</b></td>
		      		<td><?php echo $total;?></td>
		      		<td></td>
		      	</tr>
		    </tbody>
		</table>
		<br>
		<center><a href="products.php" style="font-size: 18px" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left">&nbsp;</span>Go back to Products page</a></center>
	<br>

	<!--Shipping Details start-->
	<?php
		require 'conn.php';
		$uid = $_SESSION['user-id'];
		$uname = $_SESSION['user-name'];
		//get users details
		$details_query = "SELECT address, city from users where id = $uid;";
		$details_query_result = mysqli_query($con,$details_query);
		$row_data = mysqli_fetch_array($details_query_result);
		$uaddress = $row_data['address'];
		$ucity = $row_data['city'];
 
	?>
	
		 <div class="row">
		 	<div class="col-md-3"></div>
		 	<div class="col-md-6">
		 		<!--Display user details-->
		 		<center><h3><hr><b>Shipping Details</b></h3></center>
		 		<p style="font-size: 19px"><b>Name :</b>    <?php echo $uname ;?>    </p>
		 		<p style="font-size: 19px"><b>Address :</b> <?php echo $uaddress ;?> </p>
		 		<p style="font-size: 19px"><b>City :</b>	<?php echo $ucity ;?>    </p>
		 	</div>
		 	<div class="col-md-3"></div>
		 </div>
		 <!--Shipping Details end-->	

		 <!--Confirm order button-->
		 <div class="row"> 
		 	<center><a href="success.php" style="font-size: 20px" class="btn btn-primary"><span class="glyphicon glyphicon-ok">&nbsp;</span>Confirm Order</a></center>
		 </div>
		 <br>
		 <!--Confirm order button-->

	</div>	
	<?php
		}
		else
		{
	?>	
		<div class="container"> 
		<br><br>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4"><img src="images/emptycart.png" ></div>
			<div class="col-md-4"></div>
		</div>
		<br>
		<center><a href="products.php"class="btn btn-info btn-lg">Click here to continue your shopping</a></center><br>
		</div><br>
	<?php
	}
	?>

	<!-- Footer -->
            <footer class="container-fluid" style="background-color: #101010;padding: 10px">
               Copyright © <?php echo date("Y"); ?> Dashing Store. All Rights Reserved | Contact Us: +91 7385739336
            </footer>
    <!-- Footer End -->

    <!--bootstrap tooltip script-->
    <script>
		$(document).ready(function(){
		  $('[data-toggle="tooltip"]').tooltip();   
		});
	</script>
	<!--bootstrap tooltip script end-->
</body>
</html>