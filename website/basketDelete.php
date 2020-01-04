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
	<h2>Delete Basket</h2>



<?php

	$servername = "proj-mysql.uopnet.plymouth.ac.uk";
	$database = "ISAD251_JScammell";
	$username = "ISAD251_JScammell";
	$password = "ISAD251_22212869";

	{
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn) {
				die("connection failed: " . mysqli_connect_error());
}	}
	//		DELETE all values from Basket table.
			$sql="DELETE FROM basket WHERE 1=1";

				if ($conn->query($sql) === TRUE)  {
					echo "";		// "Records deleted successfully";
				} else {
					echo "Error " . $sql . "<br>" . $conn->error;
				}

				echo "<br>";
				echo "<td>**  Deleted Order Basket   **</td>";
				echo "<br>";
	

	//		mysqli_free_result($result);

			mysqli_close($conn);



	//		Return to previous screen - Button
			echo "<br>";
		
?>

	<!-- Button to return Basket screen	-->
	<div class="form-popup3" id="myForm3">
		<form action="index.php" class="form-container">
			<button type="submit" class="btn">Return Home</button>  
		</form>
	</div>


</form>

</div>


</body>

</html>
