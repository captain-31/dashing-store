<!-- Header part-->
<?php	
    require 'header.php';
?>
<!-- Header part-->

<!DOCTYPE html>
<html>
<head>
	<title>Order Placed</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <!-- My orders -->
    <?php
		require 'conn.php';
		$i=1;
		$uid = $_SESSION['user-id'];
		//orders query 
		$select_query = "SELECT products.name, products.price, orders.time_stamp from products, orders WHERE orders.p_id = products.p_id and orders.u_id= $uid ;";
		$select_query_result = mysqli_query($con,$select_query);
		$records_count = mysqli_num_rows($select_query_result);

		//total query
		if ($records_count>0) 
		{
		//display the order records here, if not found display message 
	?>
		<div class="container">
		<br><br>
  		<h2><br>Order History</h2>
  		<p style="font-size: 18px;">You can see your order history here.</p> <br>           
  		<table class="table table-hover">
		    <thead>
		      <tr>
		      	<th>Sr. No</th>
		        <th>Product</th>
		        <th>Price</th>
		        <th>Date / Time</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php while ($row= mysqli_fetch_array($select_query_result)) {?>
		      <tr>
		      	<td><?php echo $i; $i++; ?></td>
		        <td><?php echo $row['name']?></td>
		        <td><?php echo $row['price']?></td>
		        <td><?php echo $row['time_stamp']?></td>
		      </tr>
		      <?php }?>
		    </tbody>
		</table>
		<br>
		
	<br>
	</div>	
	<?php
		}
		else
		{
	?>	
		<div class="container"> 
		<br><br>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
			<br><br>
				<img src="images/emptycart.png" >

			</div>
			<div class="col-md-3"></div>
		</div>
		<br>
		<center><a href="products.php"class="btn btn-info btn-lg" data-toggle="tooltip" data-placement="right" title="Click here to start shopping">You didn't placed any orders yet.</a></center><br>
		</div><br>
	<?php
	}
	?>
    <!-- My orders End -->

    <!-- Footer -->
            <footer class="container-fluid" style="background-color: #101010;padding: 10px">
               Copyright © <?php echo date("Y"); ?> Dashing Store. All Rights Reserved | Contact Us: +91 7385739336
            </footer>
    <!-- Footer End -->

    <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>


</body>
</html>