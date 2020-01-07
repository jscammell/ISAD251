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
	<h2>Login</h2>


<?php

	$servername = "proj-mysql.uopnet.plymouth.ac.uk";
	$database = "ISAD251_JScammell";
	$username = "ISAD251_JScammell";
	$password = "ISAD251_22212869";

//
//  Data values entered on the account.php page
//
//	$accountId = $_POST['accountId'];
	$email = $_POST['email'];
	$accountPwd = $_POST['accountPwd'];
//		


	if ($_POST['btnAdd'])  {	
		//
		//	Insert (Add) the single Account record in the Account table when button-add pressed
		//
		//	{
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
			}


		// Check that the email address (Account Number) exists.
		// If not, then return an error and not log them onto the system.
		//
		// Check Username and Password are correct
		$sql="SELECT accountId, email, name, accountPwd, permissions FROM account WHERE email = '$email'";
		$resultAccount = $conn->query($sql);
		$objAccount = mysqli_fetch_object($resultAccount);
		$numrows = mysqli_num_rows($resultAccount);
		// Check Username and Password are correct, and account exists
		if (($numrows == 0) or ($email != $objAccount->email) or ($accountPwd != $objAccount->accountPwd)) {
				echo "Account Problems - Logon unsuccessful. ";
				echo "<br>";
				echo "Username: ";
				printf ("%s ",$email);
				echo "<br>";
		//
		// Else Account exists so can log on to the website.
		} else {

			//	DELETE any user already logged onto the system by deleting entries from "LoggedOn" Table		
			$sql="DELETE FROM loggedon WHERE accountId>0";

				if ($conn->query($sql) === TRUE)  {
					echo "";		// "Records deleted successfully";
				} else {
					echo "Error " . $sql . "<br>" . $conn->error;
				}


			
			// As all details are correct.
			// Now INSERT new Logon username (email and permissions) into "LoggedOn" table
			//
			$sql="INSERT INTO loggedon (accountId, email, permissions) VALUES ('$objAccount->accountId', '$email', '$objAccount->permissions')";
			if ($conn->query($sql) === TRUE)  {
				echo "Login Successful. ";
				echo "<br>";
				echo "Account: ";
				printf ("%s ",$email);
				echo " -  Name: ";
				printf ("%s ",$objAccount->name);
				echo "<br>";
			} else {
				echo "Error " . $sql . "<br>" . $conn->error;
			}
	
			mysqli_free_result($resultAccount);

			mysqli_close($conn);
			

		} // end elseif
	} // end if
	
	

	echo "<br>";
	echo "<br>";
	echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
?>



</body>

</html>

