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
	<h2>New Account Status</h2>


<?php

	$servername = "proj-mysql.uopnet.plymouth.ac.uk";
	$database = "ISAD251_JScammell";
	$username = "ISAD251_JScammell";
	$password = "ISAD251_22212869";

//
//  Data values entered on the account.php page
//
//	$accountId = $_POST['accountId'];
	$permissions = $_POST['permissions'];
	$name = $_POST['name'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$accountPwd = $_POST['accountPwd'];


	   	 
	//  Check permissions of the person logged on is allowed to use the Account screen.		
	//  Only permissions = Admin is allowed.												
	//  Read the "LoggedOn" table to check user and permissions.							

    $conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn) {
		die("connection failed: " . mysqli_connect_error());
	}
	
	// Check that the email address (Account Number) does not already exist.
	// If so, then return an error and not create the account.
	//
	$sql="SELECT permissions FROM loggedon WHERE permissions = 'admin'";
	$result = $conn->query($sql);
	$obj = mysqli_fetch_object($result);
	$numrows = mysqli_num_rows($result);
	if (($numrows == 0) or ($obj->permissions != 'admin'))  {
		echo "You do not have permissions to use this screen. ";
		echo "<br>";
		echo "Please login with a differnt user account ";
		echo "<br>";

		//		mysqli_free_result($result);
		mysqli_close($conn);

	//
	// Else user has persissions to use this screen
	} else {




		if ($_POST['btnAdd'])  {	
		//
		//	Insert (Add) the single Account record in the Account table when button-add pressed
		//
		//	{
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
			}


		// Check that the email address (Account Number) does not already exist.
		// If so, then return an error and not create the account.
		//
		$sql="SELECT email FROM account WHERE email = '$email'";
		$result = $conn->query($sql);
		$obj = mysqli_fetch_object($result);
		$numrows = mysqli_num_rows($result);
		if ($numrows > 0) {
				echo "Account creation unsuccessful - account already exists. ";
				echo "<br>";
				echo "Account: ";
				printf ("%s ",$email);
				echo "<br>";
		//
		// Else new account can be created
		} else {

			$sql="INSERT INTO account (permissions, name, telephone, email, accountPwd) VALUES ('$permissions', '$name', '$telephone', '$email', '$accountPwd')";
			if ($conn->query($sql) === TRUE)  {
				echo "New account created successfully. ";
				echo "<br>";
				echo "Account: ";
				printf ("%s ",$email);
				echo " -  Name: ";
				printf ("%s ",$name);
				echo "<br>";
			} else {
				echo "Error " . $sql . "<br>" . $conn->error;
			}
	
	//		mysqli_free_result($result);

			mysqli_close($conn);
			

		} // end if
	} // end elseif
}



	echo "<br>";
	echo "<br>";
	echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
?>



</body>

</html>

