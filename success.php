<?php
    require 'header.php';
    require 'conn.php';
    $uid = $_SESSION['user-id'];

    //get timestamp 
	date_default_timezone_set('Asia/Kolkata');
	$created_date = date("d-m-Y h:i A");
	//echo "$created_date";

	//get all cart details
	$select_cart_details = "SELECT p_id from cart where user_id = $uid;";
	$select_cart_details_result = mysqli_query($con,$select_cart_details);

	$row_count = mysqli_num_rows($select_cart_details_result);

	//insert into order
	while($row_count>0)
	{	
		//echo $row_count."<br>";
		$row_data = mysqli_fetch_array($select_cart_details_result);
		$pid = $row_data['p_id']; 
		$insert_order = "INSERT into orders (p_id,time_stamp,u_id) VALUES ($pid,'$created_date',$uid)";
		$insert_order_result = mysqli_query($con,$insert_order);
		$row_count--;

	}
         	
	//delete cart for that user
	if($row_count==0)
	{
		$delete_cart = "DELETE FROM cart WHERE user_id = $uid;";
		$delete_cart_result = mysqli_query($con,$delete_cart);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Placed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <!-- About -->
    <div class="container">
        <br><br><br><br>

        <div class="row">
            <div class="col-sm-3">
              
            </div>
            <div class="col-sm-6">
                <center>
                <img src="images/tick.png">
                <h2 style="color:green">Order Placed Successfully..!</h2><br><hr>
                <a href="myorders.php" style="font-size: 18px"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>Click here to see your order history.</a>
                </center>
            </div>
            <div class="col-sm-3">
            	
            </div>
        </div>
        <br><br><br>
        
    </div><br>
    <!-- About End -->

    <!-- Footer -->
            <footer class="container-fluid" style="background-color: #101010;padding: 10px">
               Copyright © <?php echo date("Y"); ?> Dashing Store. All Rights Reserved | Contact Us: +91 7385739336
            </footer>
    <!-- Footer End -->

</body>
</html>