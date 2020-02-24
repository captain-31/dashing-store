<?php
	require 'conn.php';
	session_start();
	//get product id from get parameter
 	$p_id = $_GET['p_id'];
 	//delete query
	$delete_item = "DELETE FROM products where p_id=$p_id;";
	$delete_query_result = mysqli_query($con,$delete_item);

	if($delete_query_result == true)
	{	
		echo '<script language="javascript">';	
		echo 'alert("Product removed.")';
		echo '</script>';
		header("Location: deleteproduct.php");
	}
	else
	{
		echo '<script language="javascript">';	
		echo 'alert("Failed.")';
		echo '</script>';
		header("Location: deleteproduct.php");
	}

?>