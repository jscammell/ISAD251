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
	<h2>Account Creation</h2>



	</div>
		<form name = "form" action="accountAdd.php" method = "post" enctype = "multipart/form-data" >
			<div class = "container">
		<!--		<div class "form_group">
					<label>Account ID:   </label>
					<input type ="text" name ="accountId" value=""  required/>
		-->
				</div>
				<div class "form_group">
					<label>Permissions ("admin" or "customer"):  </label>
					<input type ="text" name ="permissions" value=""  required/>
				</div>
				<div class "form_group">
					<label>Name (First then Last):   </label>
					<input type ="text" name ="name" value=""  required/>
				</div>
				<div class "form_group">
					<label>Telephone No:   </label>
					<input type ="text" name ="telephone" value=""  required/>
				</div>
				<div class "form_group">
					<label>Email:   </label>
					<input type ="text" name ="email" value=""  required/>
				</div>
				<div class "form_group">
					<label>Password:   </label>
					<input type ="text" name ="accountPwd" value=""  required/>
				</div>

				<!-- Button to Add new accounts	-->
				<div class="accountbutton" id="myForm4">
  					<form method="post" action="accoundAdd.php" class="form-container">
					<input type="submit" name="btnAdd" value="Create Account"</input>
				</div>
					
			</div>
		</form>

		<!-- Buttons Display all accounts	-->
		<form name = "form" action="accountDisplay.php" method = "post" enctype = "multipart/form-data" >
			<div class="accountbutton" id="myForm5">
  					<form method="post" action="accoundDisplay.php" class="form-container">
					<input type="submit" name="btnShow" value="Show Accounts"</input>
			</div>
		</form>

		<!-- Button to return to previous screen	-->
		<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>


	</body>

</html>