 <?php
 	session_start();
	require 'conn.php';
	if(isset($_POST['submit']))
	{
		//fetch all the form data into varibales
		$product_name = mysqli_real_escape_string($con,$_POST['product-name']);
		$product_description = mysqli_real_escape_string($con,$_POST['product-description']);
		$product_price = mysqli_real_escape_string($con,$_POST['product-price']);

		$product_category = mysqli_real_escape_string($con,$_POST['product-category']);

		//echo "$product_category";
		//get file details
	  	$name = $_FILES['image']['name'];
	  	$target_dir = "product-images/";

	  	$path = $target_dir.''.$name;

	  	//store this path in DB
	 	//echo $path;

		$target_file = $target_dir . basename($_FILES["image"]["name"]);

	 	 //image size
	 	$image_size = $_FILES['image'][ 'size' ]; 
		
		// Select file type
	  	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	  	// Valid file extensions
	 	 $extensions_arr = array("jpg","jpeg","png");

	 	 // Check extension
		if( in_array($imageFileType,$extensions_arr) )
	  	{
	 		// Check file size
			if ($_FILES["image"]["size"] > 500000) 
			{
				echo '<script language="javascript">';
				echo 'alert("Sorry, your file is too large.")';
				echo '</script>';
			}
			else
			{
				//product insert query
			    $pro_query = "insert into products (name,description,price,category,image_path) values ('".$product_name."','".$product_description."','".$product_price."','".$product_category."','".$path."')";
			    mysqli_query($con,$pro_query);
			  
			    // Upload file
			    move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);
				//message
			    echo '<script language="javascript">';
				echo 'alert("Product Inserted.")';
				echo '</script>';

				
			 }
		}	
	  	else
	 	{
	  		echo '<script language="javascript">';
			echo 'alert("Invalid file type.")';
			echo '</script>';
	  	}
	 
	}
?>
<html>
<head>
	<title>Add Products</title>
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
          <!--Start-->
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

    <!--Product upload form-->
	<div class="container login-container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 login-form">
        <h3>Add Product</h3>
        <form method="POST" action="" enctype='multipart/form-data'>

        	<!--Product Name-->
            <div class="form-group">
                <input type="text" name="product-name" class="form-control" placeholder="Product Name *" value='<?php echo isset($_POST['product-name']) ? $_POST['product-name'] : ''; ?>' required /></input>
            </div>

            <!--Description-->
            <div class="form-group">
            	<textarea  rows="2" type="text" placeholder="Description *" name="product-description" class="form-control"required><?php echo isset($_POST['product-description']) ? $_POST['product-description'] : ''; ?></textarea>
            </div>

            <!--Price-->
            <div class="form-group">
            	<input type="number" placeholder="Price *" name="product-price" class="form-control" value='<?php echo isset($_POST['product-price']) ? $_POST['product-price'] : ''; ?>'  required></input>
            </div>

            <!--Category-->
            <div class="form-group">
			    <select name="product-category" class="form-control">
			      <option value="select">--Select Category--</option>
			      <option value="Fashion">Fashion</option>
			      <option value="Electronics">Electronics</option>
			      <option value="Accesories">Accesories</option>
			      <option value="Footwear">Footwear</option>
			    </select>
            </div>
			<div class="custom-file mb-3">
      			<input accept=".png,.jpg,.jpeg,.gif|image/*|media_type" name='image' type="file" class="custom-file-input" id="customFile" required>
      			<label class="custom-file-label" for="customFile">Choose Product Image</label>
    		</div>
            <!--Submit Button-->
            <div class="form-group">
                <button class="btnSubmit" type="submit" name="submit">Upload</button>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
    </div>
    </div>
    <!-- product upload form end-->
    <script>
		// Add the following code if you want the name of the file appear on select
		$(".custom-file-input").on("change", function() 
		{
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
	</script>

	<!-- Footer -->
    <footer class="container-fluid" style="background-color: #101010;padding: 10px">
        Copyright © <?php echo date("Y"); ?> Dashing Store. All Rights Reserved | Contact Us: +91 7385739336
    </footer>
    <!-- Footer End -->

</body>
</html>


