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
	<br>
	<h2>Adding to Basket</h2>



<?php

	$servername = "proj-mysql.uopnet.plymouth.ac.uk";
	$database = "ISAD251_JScammell";
	$username = "ISAD251_JScammell";
	$password = "ISAD251_22212869";

//	$orderItemNum = $_POST['orderItemNum'];
//	$quantity = $_POST['quantity'];
//	$productId = $_POST['productId'];
//	$productName = $_POST['productName'];
//	$orderCost = $_POST['orderCost'];
//	$tableNum = $_POST['tableNum'];

//	$productId = $_POST['orderButton'];
	//
	//  convert the button selected from index.php into the productId for adding to the basket.
	// 

	if ($_POST['orderButton'] == 'snack1')	
	{
		$_productId = '1';		
	}
	elseif ($_POST['orderButton'] == 'snack2')
	{
		$_productId = '2';
	}
	elseif ($_POST['orderButton'] == 'snack3')
	{
		$_productId = '3';
	}
	elseif ($_POST['orderButton'] == 'snack4')
	{
		$_productId = '4';
	}
	elseif ($_POST['orderButton'] == 'snack5')
	{
		$_productId = '5';
	}
	elseif ($_POST['orderButton'] == 'snack6')
	{
		$_productId = '6';
	}
	elseif ($_POST['orderButton'] == 'drink1')
	{
		$_productId = '7';
	}
	elseif ($_POST['orderButton'] == 'drink2')
	{
		$_productId = '8';
	}
	elseif ($_POST['orderButton'] == 'drink3')
	{
		$_productId = '9';
	}
	elseif ($_POST['orderButton'] == 'drink4')
	{
		$_productId = '10';
	}
	elseif ($_POST['orderButton'] == 'drink5')
	{
		$_productId = '11';
	}
	elseif ($_POST['orderButton'] == 'drink6')
	{
		$_productId = '12';
	}



	//
	//		Insert selected product details into the Buy Now basket table. 
	//
	{
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
}	}

	//		Read the product table for the product details from the button selected snack/drink
			$sql="SELECT productId, productName, stockCount, cost FROM product WHERE productId='$_productId'";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);


			//	if the quantity stock is > 0, then add the record to the basket.
			if ($obj->stockCount > 0)
			{	
				$sql="INSERT INTO basket (quantity, productId, productName, orderCost, tableNum) VALUES (1, '$_productId', '$obj->productName', '$obj->cost', 17)";
				if ($conn->query($sql) === TRUE)  {
					echo "";		// "New record created successfully";
				} else {
					echo "Error " . $sql . "<br>" . $conn->error;
				}

				echo "<br>";
				echo "<td>**  1x </td>";
				echo "<b>'$obj->productName' </b>";
				echo "<td>Added to Basket  **</td>";
				echo "<br>";

			// else not enough stock so do not insert into basket.				
			} else {
				echo "<br>";
				echo "<td>**  Not enough stock of </td>";
				echo "<b>'$obj->productName' </b>";
				echo "<td> so NOT added to Basket  **</td>";
				echo "<br>";
			}
	

			mysqli_free_result($result);

			mysqli_close($conn);

	//		Return to previous screen - Button
			echo "<br>";
			echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';


?>



</form>


</div>



</body>







</html>
