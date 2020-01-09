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
	<h2>Product Details</h2>

	</div>
		<form name = "form" action="productAdd.php" method = "post" enctype = "multipart/form-data" >
			<div class = "container">
		<!--		<div class "form_group">
					<label>Account ID:   </label>
					<input type ="text" name ="accountId" value=""  required/>
		-->
				</div>
				<div class "form_group">
					<label>Product Name:  </label>
					<input type ="text" name ="productName" value=""  required/>
				</div>
				<div class "form_group">
					<label>Product Details:   </label>
					<input type ="text" name ="productDetails" value=""  required/>
				</div>
				<div class "form_group">
					<label>Stock Count:   </label>
					<input type ="text" name ="stockCount" value=""  required/>
				</div>
				<div class "form_group">
					<label>Category (Drink or Snack):   </label>
					<input type ="text" name ="category" value=""  required/>
				</div>
				<div class "form_group">
					<label>Cost:   </label>
					<input type ="text" name ="cost" value=""  required/>
				</div>

				<!-- Button to Add new products	-->
				<div class="productbutton" id="myForm4">
  					<form method="post" action="productAdd.php" class="form-container">
					<input type="submit" name="btnAdd" value="Create Product"</input>
				</div>
					
			</div>
		</form>

		<!-- Buttons Display all products	-->
		<form name = "form" action="productDisplay.php" method = "post" enctype = "multipart/form-data" >
			<div class="productbutton" id="myForm5">
  					<form method="post" action="productDisplay.php" class="form-container">
					<input type="submit" name="btnShow" value="Show Products"</input>
			</div>
		</form>

		<!-- Buttons Modify selected product	-->
		<form name = "form" action="productModify.php" method = "post" enctype = "multipart/form-data" >
			<div class="productbutton" id="myForm6">
  					<form method="post" action="productModify.php" class="form-container">
					<input type="submit" name="btnShow" value="Modify Products"</input>
			</div>
			<div class "form_group">
					<label>(Enter product ID to Modify):   </label>
					<input type ="text" name ="productId" value=""  required/>
			</div>
		</form>

		<!-- Button to return to previous screen	-->
		<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>


	</body>

</html>