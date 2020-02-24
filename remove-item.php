<?php
	require 'conn.php';
	session_start();
	//get user id from session
	$u_id = $_SESSION['user-id'];
	//get product id from get parameter
 	$p_id = $_GET['p_id'];
 	//delete query
	$delete_item = "DELETE FROM cart where user_id = $u_id && p_id=$p_id;";
	$delete_query_result = mysqli_query($con,$delete_item);

	if($delete_query_result == true)
	{	
		echo '<script language="javascript">';	
		echo 'alert("Item removed.")';
		echo '</script>';
		header("Location: cart.php");
	}
	else
	{
		echo '<script language="javascript">';	
		echo 'alert("failed.")';
		echo '</script>';
		header("Location: cart.php");
	}

?>