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
	<h2>Order Basket</h2>




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


			
		//	Display all records saved in the basket table. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
}			}

			$sql="SELECT orderItemNum, quantity, productId, productName, orderCost, tableNum FROM basket WHERE orderItemNum>0";
			$result = $conn->query($sql);
	//		$obj = mysqli_fetch_object($result);

			
	//		if ($result -> $obj->orderItemNum > 0)		// If basket contains order  then print on screen.
			if ($result)		// If basket contains order  then print on screen.
			{
				echo "<br>";
				echo " Order Item ... Qty ... ProdId .. Product Name ................ Cost ";
				echo "<br>";
				while ($obj=mysqli_fetch_object($result))
					{
					printf ("%s ",$obj->orderItemNum);
					echo " ..............    ";
					printf ("%s ",$obj->quantity);
					echo "  ......   ";
					printf ("%s ",$obj->productId);
					echo "..........     ";
					printf ("%s ",$obj->productName);
					echo "  ................  $";
					printf ("%s ",$obj->orderCost);

					echo "<br>";


				} // end While

				echo "<br>";
			}	
			else	// Basket is empty
			{
				echo "<br>";
				echo " Basket Empty";
				echo "<br>";

			}	// end if-else

		
				
			mysqli_free_result($result);

			mysqli_close($conn);

//			}

?>


<!-- Button to ask for a customer table number and calls basketConfirm screen.  	-->
<!--     basketConfirm screen will convert the basket into a completed order.		-->
<div class="form-popup" id="myForm">
	<form name = "form" action="basketConfirm.php" method = "post" enctype = "multipart/form-data" >
 <!-- <form action="basketConfirm.php" class="form-container">   -->
		<h1></h1>
		<button type="submit" class="btn">Confirm Order</button>
		<label for="Table Number"><b>Table Number</b></label>
		<input type="text" placeholder="?" name="table" required/>    
  </form>
</div>

  </form>
</div>


<!-- Button to call basketDelete code	-->
<div class="form-popup2" id="myForm2">
  <form action="basketDelete.php" class="form-container">
     <button type="submit" class="btn">Delete Basket Order</button>  
  </form>
</div>


<!-- Button to return to previous screen	-->
	<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>



</body>

<script>

</script>

</html>
