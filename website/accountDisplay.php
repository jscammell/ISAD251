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
	<h2>Display All Accounts</h2>


<?php

	$servername = "proj-mysql.uopnet.plymouth.ac.uk";
	$database = "ISAD251_JScammell";
	$username = "ISAD251_JScammell";
	$password = "ISAD251_22212869";

//
//  Data values entered on the account.php page
//
//	$accountId = $_POST['accountId'];
//	$permissions = $_POST['permissions'];
//	$name = $_POST['name'];
//	$telephone = $_POST['telephone'];
//	$email = $_POST['email'];
//	$accountPwd = $_POST['accountPwd'];


//	$orderItemNum = $_POST['orderItemNum'];
//	$quantity = $_POST['quantity'];
//	$productId = $_POST['productId'];
//	$productName = $_POST['productName'];
//	$orderCost = $_POST['orderCost'];
//	$tableNum = $_POST['tableNum'];



//		//	Insert Account details into the account table. 
//	{
//			$conn = mysqli_connect($servername, $username, $password, $database);
//			if (!$conn) {
//				die("connection failed: " . mysqli_connect_error());
//	}
//
//			$sql="SELECT accountId, permissions, name, telephone, email, password FROM account";
//			$result = $conn->query($sql);
//			$obj = mysqli_fetch_object($result);
//
//		//	$sql="INSERT INTO basket (quantity, productId, productName, orderCost, tableNum) VALUES (2, '$obj->productId', '$obj->productName', '$obj->cost', 17)";
//		//	if ($conn->query($sql) === TRUE)  {
//		//		echo "New record created successfully";
//		//	} else {
//		//		echo "Error " . $sql . "<br>" . $conn->error;
//		//	}
//
//		
//
//			mysqli_free_result($result);
//
//			mysqli_close($conn);
//
//		//	return;


		if ($_POST['btnShow'])  {	
		//
		//	Display all records saved in the Account table when button-show pressed
		//
		//	{
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
			}

			$sql="SELECT accountId, permissions, name, telephone, email, accountPwd FROM account  WHERE accountId>0";
			$result = $conn->query($sql);
	//		$obj = mysqli_fetch_object($result);

	//		if ($result -> $obj->accountId > 0)  {
				echo "<br>";
				echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
				
				echo "<br>";
				echo " ID ... Permissions. Name...... .. email.... ... Password";
				echo "<br>";
				while ($obj=mysqli_fetch_object($result))
					{
					printf ("%s ",$obj->accountId);
					echo " ...    ";
					printf ("%s ",$obj->permissions);
					echo "  ...   ";
					printf ("%s ",$obj->name);
					echo "........     ";
					printf ("%s ",$obj->telephone);
					echo "  ..... .......  ";
					printf ("%s ",$obj->email);
					echo "   .......  ";
					printf ("%s \n",$obj->accountPwd);
					echo "<br>";
				
				} //end while
	
				mysqli_free_result($result);

	//		}  //endif

			mysqli_close($conn);


		} // end if
	
		echo "<br>";
		echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';

?>

</body>

</html>