<!doctype html>


<html>
<head>
<meta charset="utf-8">
<title>Home</title>
	
	        <link href="header.css" rel="stylesheet" type="text/css">
			<link href="index.css" rel="stylesheet" type="text/css">
			<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body class="w3-content" style="max-width:100%">


	<div class="header"><?php include('./header.html');?></div>
	<link href="header.css" rel="stylesheet" type="text/css">
	<h2>Modify Product</h2>


<?php

	$servername = "proj-mysql.uopnet.plymouth.ac.uk";
	$database = "ISAD251_JScammell";
	$username = "ISAD251_JScammell";
	$password = "ISAD251_22212869";

//
//  Data values entered on the product.php page
//
	$productId = $_POST['productId'];
	
//		


//	if ($_POST['btnAdd'])  {	
		//
		//	Modify a single product record in the product table when the button-modify pressed
		//
		//	{
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
				}

			$sql="SELECT productId, productName, productDetails, stockCount, category, cost FROM product  WHERE productId=14";
	//		$sql="SELECT productId, productName, productDetails, stockCount, category, cost FROM product  WHERE productId='$productId'";
			$resultModify = $conn->query($sql);
			$objModify = mysqli_fetch_object($resultModify);


	//		if ($result -> $obj->accountId > 0)  {
?>
	<form name = "form" action="productModifySave.php" method = "post" enctype = "multipart/form-data" >
		<div class = "container">
			// setting out fields on the screen to show product information to modify
			</div>
				
				<div class "form_group">
					<label>Product Name:  </label>
					<input type ="text" name ="productName" value="$obj->productName"  required/>
				</div>
				<div class "form_group">
					<label>Product Details:   </label>
					<input type ="text" name ="productDetails" value="$obj->productDetails"  required/>
				</div>
				<div class "form_group">
					<label>Stock Count:   </label>
					<input type ="text" name ="stockCount" value="$obj->stockCount"  required/>
				</div>
				<div class "form_group">
					<label>Category (Drink or Snack):   </label>
					<input type ="text" name ="category" value=$obj->category  required/>
				</div>
				<div class "form_group">
					<label>Cost:   </label>
					<input type ="text" name ="cost" value="$obj->cost"  required/>
				</div>

				
			//	<!-- Button to save product updates	-->
				<div class="productbutton" id="myForm4">
  					<form method="post" action="productModifySave.php" class="form-container">
					<input type="submit" name="btnAdd" value="Save Changes"</input>
				</div>
					
		</div>
	</form>


  </div>

	//		mysqli_free_result($result);

	mysqli_close($conn);
			
<?php
//		} // end if
	//}



	echo "<br>";
	echo "<br>";
	echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
?>



</body>

</html>

