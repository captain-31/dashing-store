<?php
	//logout code. Clear all session
	if(isset($_GET['logout']))
	{
		session_start();
		session_unset();
		unset($_SESSION['logged_in']);
		session_destroy();
		header("Location: index.php");
			
	}
?>