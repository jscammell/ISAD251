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
	<h2>Confirming Final Order</h2>



<?php

	//	This confrmOrder.php screen will read the information from the basket and convert it into a final customer order. 
	//	It uses the following tables:
	//		- basket
	//		- orderId
	//		- placeholder
	//		- loggedOn
	//
	//	Several steps are used for this...
	//	1.	Read Table number send over from the basket.php screen
	//	2.	Create new order number from orderId table
	//	3.	Read who is logged on from the loggedOn table, and populate orderId Table
	//	4.	Move each item from the basket table to placeholder table, and add orderId and table number
	//	5.	Whilst moving basket records into placedorder table, add up all the prices, then UPDATE this back into orderId Table cost field.
	//	6.	Delete all records in the basket



	$servername = "proj-mysql.uopnet.plymouth.ac.uk";
	$database = "ISAD251_JScammell";
	$username = "ISAD251_JScammell";
	$password = "ISAD251_22212869";


//
//	1.	Read Table number sent over from the basket.php screen when placing the final "Confirm Order" button.
//		
$table = $_POST['table'];	// Table number



	//
	//	2.	Read who is logged on from the loggedOn table, and populate accountId for table orderId 
	//
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
			}

			$sql="SELECT accountId, email, permissions FROM loggedon  WHERE accountId>0";
			$resultloggedOn = $conn->query($sql);
			$objloggedOn = mysqli_fetch_object($resultloggedOn);

	//		if ($result -> $obj->accountId > 0)  {
					printf ("%s ",$objloggedOn->accountId);
					echo " ...    ";
					printf ("%s ",$objloggedOn->permissions);
					echo "  ...   ";
					printf ("%s ",$objloggedOn->email);
					echo "   .......  ";

					$accountId = $objloggedOn->accountId;
					printf ("%s ",$accountId);
					echo "<br><br>";

				mysqli_free_result($resultloggedOn);

	//		}  //endif

			mysqli_close($conn);





	//
	//	3.	Create new order number from orderId table
	//			Once created, re-read table orderId to get the last Order Number created.  
	//			It's this order number that is used in  the placedorder table for each item taken from the basket table.
	//			
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
			}

//			$sql="INSERT INTO orderId (accountId, Cost) VALUES ($accountId, 0.01)";
//			if ($conn->query($sql) === TRUE)  {
//				$last_orderId = $conn->insert_id;
//				echo "";		// "New record created successfully";
//			} else {
//				echo "Error " . $sql . "<br>" . $conn->error;
//			}
				$last_orderId = 1;  //$conn->insert_id;
			mysqli_close($conn);



	//
	//	4.	Move each item from the basket table to placeholder table, and add orderId and table number
	//			- Also, add orderCost for each ordered item and keep the total ( $orderCost_Total ) to UPDATE "orderid" table later.
	//	
		//	Reset $orderCost_Total back to zero before reading each basket record.
		$orderCost_Total = 0;
		
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
			}	

	//		Read the product table for the product details from the button selected snack/drink
			$sql="SELECT orderItemNum, quantity, productId, productName, orderCost FROM basket WHERE orderItemNum>0";
			$resultbasket = $conn->query($sql);
	//		$objbasket = mysqli_fetch_object($resultbasket);


			while ($objbasket=mysqli_fetch_object($resultbasket))
			{
				// Insert new records into "placedorder" table from "basket" and "orderId" table values
				$sql="INSERT INTO placedorder (orderId, orderItemNum, quantity, productId, productName, orderCost, tableNum) 
						VALUES (1, '$objbasket->orderItemNum', '$objbasket->quantity', '$objbasket->productId', '$objbasket->productName', '$objbasket->orderCost', '$table')";
//				$sql="INSERT INTO placedorder (orderId, orderItemNum, quantity, productId, orderCost, tableNum) 
//					VALUES ($last_orderId, '$objbasket->orderItemNum', '$objbasket->quantity', '$objbasket->productId', '$objbasket->orderCost', '$table')";

				if ($conn->query($sql) === TRUE)  {
					echo "";		// "New record created successfully";
				} else {
					echo "Error " . $sql . "<br>" . $conn->error;
				}

				// Add orderCost to $orderCost_Total to be used later in UPDATING costs in "orderid" table.
				$orderCost_Total = $orderCost_Total + $objbasket->orderCost;


				// Print on screen for records processed.
				printf ("%s ",$last_orderId);
				echo " ...    ";
				printf ("%s ",$objbasket->orderItemNum);
				echo " ...    ";
				printf ("%s ",$objbasket->quantity);
				echo "  ...   ";
				printf ("%s ",$objbasket->productId);
				echo "........     ";
				printf ("%s ",$objbasket->productName);
				echo "........     ";
				printf ("%s ",$objbasket->orderCost);
				echo "  ..... .......  ";
				printf ("%s ",$table);
				echo "   .......  ";
				printf ("%s ",$accountId);
				echo "   .......  ";
				echo "<br>";

			} //end while


//			//	if the quantity stock is > 0, then add the record to the basket.
//			if ($obj->stockCount > 0)
//			{	
//				$sql="INSERT INTO placeholder (orderId, orderItemNum, quantity, productId, orderCost, tableNum) VALUES ($last_orderId, '$objbasket->orderItemNum', '$objbasket->quantity', '$objbasket->productId', '$objbasket->orderCost', '$table')";
//				if ($conn->query($sql) === TRUE)  {
//					echo "";		// "New record created successfully";
//				} else {
//					echo "Error " . $sql . "<br>" . $conn->error;
//				}
//
//				echo "<br>";
//				echo "<td>**  1x </td>";
//				echo "<b>'$obj->productName' </b>";
//				echo "<td>Added to Basket  **</td>";
//				echo "<br>";
//
//			// else not enough stock so do not insert into basket.				
//			} else {
//				echo "<br>";
//				echo "<td>**  Not enough stock of </td>";
//				echo "<b>'$obj->productName' </b>";
//				echo "<td> so NOT added to Basket  **</td>";
//				echo "<br>";
//			}
//	

			mysqli_free_result($resultbasket);

			mysqli_close($conn);

//	//		Return to previous screen - Button
//			echo "<br>";
//			echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';



	//
	//	5.	Whilst moving basket records into placedorder table, the $orderCost_Total value was added.
	//        This step will UPDATE the "orderid" table with the total cost of order.
	//
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
			}

//			$sql="UPDATE orderid SET cost = $orderCost_Total  WHERE  orderId = $last_orderId;	
			$sql="UPDATE orderid SET cost = $orderCost_Total  WHERE  orderId = 1";	
			if ($conn->query($sql) === TRUE)  {
				echo "";		// "Record UPDATED successfully";
			} else {
				echo "Error " . $sql . "<br>" . $conn->error;
			}

			mysqli_close($conn);







	//
	//	6.	Delete all records in the basket
	//
	//		Now all placedorder and orderid tables have been updated, 
	//		it is necessary to DELETE the original basket to stop a second order being placed by mistake.
	//
	{
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
}	}
//	//		DELETE all values from Basket table.
//			$sql="DELETE FROM basket WHERE 1=1";
//
//				if ($conn->query($sql) === TRUE)  {
//					echo "";		// "Records deleted successfully";
//				} else {
//					echo "Error " . $sql . "<br>" . $conn->error;
//				}
//
//				echo "<br>";
//				echo "<td>**  Deleted Order Basket   **</td>";
//				echo "<br>";	


			mysqli_close($conn);




	//
	//	7.	Display the order details on screen.
	//			Including:
	//				- OrderId, Person placing order, Total cost, Table number
	//				-    Each item ordered, price, quantity
	//
			
		//	SELECT all records needed from each table. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
}			}

			//  Find orderId information
			$sql="SELECT orderId, accountId, cost  FROM  orderid  WHERE orderId = '$last_orderId'";
			$resultOrderId = $conn->query($sql);
			$objOrderId = mysqli_fetch_object($resultOrderId);

			//  now find the email/name using accountId from table "account"
			$sql="SELECT name, email FROM  account  WHERE accountId = $objOrderId->accountId";
			$resultAccount = $conn->query($sql);
			$objAccount = mysqli_fetch_object($resultAccount);

			//  now find the order details from table "placedorder" using OrderId from the main order
			$sql="SELECT orderItemNum, quantity, productId, productName, orderCost, tableNum FROM placedorder WHERE orderId = $objOrderId->orderId";
			$resultPlacedOrder = $conn->query($sql);
	//		$objPlacedOrder = mysqli_fetch_object($resultPlacedOrder);

		
		//	Print on screen the Order, Person and Detail information
					   
				echo "Order Number: ";
				printf ("%s ",$objOrderId->orderId);
				echo "Total Cost: $";
				printf ("%s ",$objOrderId->cost);
				echo ".....";
				printf ("%s ",$objAccount->name);
				echo " / ";
				printf ("%s ",$objAccount->email);
				echo "<br><br>";

				while ($objPlacedOrder=mysqli_fetch_object($resultPlacedOrder))
				{
					echo "Order Quantity: ";
					printf ("%s ",$objPlacedOrder->quantity);
					echo " ...    ";
					
					echo "Item ";
					printf ("%s ",$objPlacedOrder->productName);
					echo " ...    ";

					echo "Item Cost  $";
					printf ("%s ",$objPlacedOrder->orderCost);
					echo " ...    ";
					
					echo "<br>";

				} // end While

				echo "<br>";


				echo "Table Number:  ";
				printf ("%s ",$table);
				echo "<br><br>";
				


				mysqli_free_result($resultOrderId);
				mysqli_free_result($resultPlacedOrder);
				mysqli_free_result($resultAccount);
			



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


<!-- Button to return to Home page	-->
<div class="form-popup2" id="myForm2">
  <form action="index.php" class="form-container">
     <button type="submit" class="btn">Return Home</button>  
  </form>
</div>





</form>

</div>

</body>


</html>
