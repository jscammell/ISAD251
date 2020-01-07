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
	<h2>Logoff</h2>


<?php

	$servername = "proj-mysql.uopnet.plymouth.ac.uk";
	$database = "ISAD251_JScammell";
	$username = "ISAD251_JScammell";
	$password = "ISAD251_22212869";

//
//  Data values entered on the logoff.php page
//

//		


	
		// Deleting records from the loggedon table which is used to show who is logged on to the system
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
			}


	

			//	DELETE any user already logged onto the system by deleting entries from "LoggedOn" Table		
			$sql="DELETE FROM loggedon WHERE accountId>0";

				if ($conn->query($sql) === TRUE)  {
					echo "logged out successfully";		// "Records deleted successfully";
				} else {
					echo "Error " . $sql . "<br>" . $conn->error;
				}

	

			mysqli_close($conn);
			
		
	

	echo "<br>";
	echo "<br>";
	echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
?>



</body>

</html>

