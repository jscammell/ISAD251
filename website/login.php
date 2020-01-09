<html>
<head>
<meta charset="utf-8">
<title>Login</title>
	
	        <link href="header.css" rel="stylesheet" type="text/css">
			<link href="index.css" rel="stylesheet" type="text/css">
			<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body class="w3-content" style="max-width:100%">


	<div class="header"><?php include('./header.html');?></div>
	<link href="header.css" rel="stylesheet" type="text/css">
	<h2>Login Form</h2>




	</div>
		<form name = "form" action="loginAdd.php" method = "post" enctype = "multipart/form-data" >
			<div class = "container">
		<!--		<div class "form_group">
					<label>Account ID:   </label>
					<input type ="text" name ="accountId" value=""  required/>
		-->
				</div>
				<div class "form_group">
					<label>Username (email address):  </label>
					<input type ="text" name ="email" value=""  required/>
				</div>
				<div class "form_group">
					<label>Password:   </label>
					<input type ="password" name ="accountPwd" value=""  required/>
				</div>
				
				<!-- Button to call LoginAdd screen	-->
				<div class="accountbutton" id="myForm4">
  					<form method="post" action="loginAdd.php" class="form-container">
					<input type="submit" name="btnAdd" value="Submit"</input>
				</div>
					
			</div>
		</form>

		<!-- Buttons to Cancel login and return to Home page.	-->
		<form name = "form" action="index.php" method = "post" enctype = "multipart/form-data" >
			<div class="cancelbutton" id="myForm5">
  					<form method="post" action="index.php" class="form-container">
					<input type="submit" name="btnCancel" value="Cancel"</input>
			</div>
		</form>

			   		 	  
</body>

</html>


