<!doctype html>

<!-- ---------------------------------------------------------------------------------------------  -->
<!--	Author			- Josh Scammell																-->
<!--	Subject			- Computer information and security											-->
<!--	Module			- ISAD251																	-->
<!--	Lecturer		- Shirley Atkinson															-->
<!--	submission Date - 10/01/2020																-->
<!--																								-->
<!--	Program name	- Tea room ordering system													-->
<!--	Version			- 1.0																		-->
<!--																								-->
<!--	Description		-																			-->					
<!--		The application has been designed so that it displays a									-->
<!--		range of drinks and snacks for sale at a tea room. The user is then able to select		-->	
<!--		the desired product and choose a quantity that they would like, once the item has		-->
<!--		been purchased, it will deduct the amount purchased from the quantity in stock on		-->		 
<!--		the database.																			-->
<!--		The website is designed to be used by both staff (administrators) at the tea room		-->
<!--		and by customers placing orders to be delivered to the table.							-->
<!--		The website can be used through a browser of your choice. Once the customer has			-->
<!--		found a table, they can then access the website to order drinks and snacks and			-->		
<!--		select their table number so they can be served. Alternatively they can place the  	    --> 	
<!--		order with a tea room staff member who will go through the same process so that			-->
<!--		the snacks and drinks will be delivered to their table, and ensuring the database		-->
<!--		is kept up to date with what has been purchased.										-->
<!--																								-->
<!--																								-->
<!--																								-->
<!-- ---------------------------------------------------------------------------------------------  -->



<!-- connecting database to website  -->
<?php
$servername = "proj-mysql.uopnet.plymouth.ac.uk";
$database = "ISAD251_JScammell";
$username = "ISAD251_JScammell";
$password = "ISAD251_22212869";


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
die("connection failed: " . mysqli_connect_error());
}
echo "connected successfully";

mysqli_close($conn);

?>


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
		
	<img class="bg" src="images/tea-business.jpg" align="middle">
	

	<!-- Menu Container -->
<div class="w3-container" id="menu">
  <div class="w3-content" style="max-width:100%">
 
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">THE MENU</span></h5>
  
    <div class="w3-row w3-center w3-card w3-padding">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Snacks');" id="myLink">
        <div class="w3-col s6 tablink">Snacks</div>
      </a>

      <a href="javascript:void(0)" onclick="openMenu(event, 'Drinks');">
        <div class="w3-col s6 tablink">Drinks</div>
      </a>
    </div>


		<!-- Snack screen Container -->

<form name = "form" action="basketAdd.php" method = "post" enctype = "multipart/form-data" >
    <div id="Snacks" class="w3-container menu w3-padding-48 w3-card">
      <div class="w3-row">
		<div class="w3-col l3 s6">

		<!--	Display Muffins	  - snack 1	 -->
		<div class="w3-display-container">
			<img src="images/snack_1.jfif" style="width:100%">          
			<div class="w3-display-middle w3-display-hover">
    <!--		<button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>	-->
				<button name='orderButton' value="snack1" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
			</div>   
			
			 <?php
		//	Read the Product table and display cost, product and description contents on the website page. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			$sql="SELECT productName, productDetails, stockCount, cost FROM product WHERE productId= 1";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);

			echo "<br><td>{$obj->productName}</td>";
			echo "<br><b>$<td>{$obj->cost}</td></b>";
			echo "<br><br>";
			if ($obj->stockCount < 1)
			{
				echo "<b><td> OUT OF STOCK </td></b>";
			} else {
				echo "<td>{$obj->productDetails}</td>";
			}
			echo "<br><br><br>";
			}
		?>
		</div>

	<!--	Display Biscuits	- snack 2	-->
	  <div class="w3-Container">
      <div class="w3-display-container">
          <img src="images/snack_2.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
    <!--      <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>      -->
	  		<button name='orderButton' value="snack2" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
		  </div>

		 <?php
		//	Read the Product table and display cost, product and description contents on the website page. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			$sql="SELECT productName, productDetails, stockCount, cost FROM product WHERE productId= 2";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);

			echo "<br>";
			echo "<td>{$obj->productName}</td>";
			echo "<br>";
			echo "<b>$<td>{$obj->cost}</td></b>";
			echo "<br>";
			echo "<br>";
			if ($obj->stockCount < 1)
			{
				echo "<b><td> OUT OF STOCK </td></b>";
			} else {
				echo "<td>{$obj->productDetails}</td>";
			}
			echo "<br><br>";
			echo "<br>";
			}
		?>
      </div>
    </div>

 
 	<!--	Display Crisps	- snack 3	-->
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="images/snack_3.jpeg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">      
	  		<button name='orderButton' value="snack3" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
		  </div>
		<?php
		//	Read the Product table and display cost, product and description contents on the website page. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			$sql="SELECT productName, productDetails, stockCount, cost FROM product WHERE productId= 3";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);

			echo "<br><td>{$obj->productName}</td>";
			echo "<br><b>$<td>{$obj->cost}</td></b>";
			echo "<br><br>";
			if ($obj->stockCount < 1)
			{
				echo "<b><td> OUT OF STOCK </td></b>";
			} else {
				echo "<td>{$obj->productDetails}</td>";
			}
			echo "<br><br><br>";
			}
		?>
      </div>


	<!--	Display Brownie 	- snack 4	-->	
      <div class="w3-display-container">
          <img src="images/snack_4.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
	  		<button name='orderButton' value="snack4" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
		<?php
		//	Read the Product table and display cost, product and description contents on the website page. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			$sql="SELECT productName, productDetails, stockCount, cost FROM product WHERE productId= 4";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);

			echo "<br><td>{$obj->productName}</td>";
			echo "<br><b>$<td>{$obj->cost}</td></b>";
			echo "<br><br>";
			if ($obj->stockCount < 1)
			{
				echo "<b><td> OUT OF STOCK </td></b>";
			} else {
				echo "<td>{$obj->productDetails}</td>";
			}
			echo "<br><br><br>";
			}
		?>
      </div>
    </div>


	<!--	Display Shortbread	- snack 5	-->	
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="images/snack_5.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
	  		<button name='orderButton' value="snack5" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>       
		  </div>
		<?php
		//	Read the Product table and display cost, product and description contents on the website page. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			$sql="SELECT productName, productDetails, stockCount, cost FROM product WHERE productId= 5";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);

			echo "<br><td>{$obj->productName}</td>";
			echo "<br><b>$<td>{$obj->cost}</td></b>";
			echo "<br><br>";
			if ($obj->stockCount < 1)
			{
				echo "<b><td> OUT OF STOCK </td></b>";
			} else {
				echo "<td>{$obj->productDetails}</td>";
			}
			echo "<br><br><br>";
			}
		?>
      </div>
	  

	<!--	Display Bananas	  - snack 6	-->
      <div class="w3-display-container">
          <img src="images/snack_6.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
	  		<button name='orderButton' value="snack6" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
		<?php
		//	Read the Product table and display cost, product and description contents on the website page. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			$sql="SELECT productName, productDetails, stockCount, cost FROM product WHERE productId= 6";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);

			echo "<br><td>{$obj->productName}</td>";
			echo "<br><b>$<td>{$obj->cost}</td></b>";
			echo "<br><br>";
			if ($obj->stockCount < 1)
			{
				echo "<b><td> OUT OF STOCK </td></b>";
			} else {
				echo "<td>{$obj->productDetails}</td>";
			}
			echo "<br><br><br>";
			}
		?>
      </div>
    </div>
    </div>
	</div>
</form>


		<!-- Drinks screen Container -->
<form name = "form2" action="basketAdd.php" method = "post" enctype = "multipart/form-data" >
    <div id="Drinks" class="w3-container menu w3-padding-48 w3-card">
    <div class="w3-row">
	  <div class="w3-col l3 s6">

		<!--	Display Tea	  - drink 1	 -->
          <div class="w3-display-container">
          <img src="images/drink_1.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
			 <button name='orderButton' value="drink1" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>   
		  <?php
			//	Read the Product table and display cost, product and description contents on the website page. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			$sql="SELECT productName, productDetails, stockCount, cost FROM product WHERE productId= 7";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);

			echo "<br><td>{$obj->productName}</td>";
			echo "<br><b>$<td>{$obj->cost}</td></b>";
			echo "<br><br>";
			if ($obj->stockCount < 1)
			{
				echo "<b><td> OUT OF STOCK </td></b>";
			} else {
				echo "<td>{$obj->productDetails}</td>";
			}
			echo "<br><br><br>";
			}
		?>

         </div> 
       
	   		 	  
	  <div class="w3-Container">
        <div class="w3-display-container">
          <img src="images/drink_2.jfif" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
			 <button name='orderButton' value="drink2" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>   
		</div>
		  <?php
			//	Read the Product table and display cost, product and description contents on the website page. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			$sql="SELECT productName, productDetails, stockCount, cost FROM product WHERE productId= 8";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);

			echo "<br><td>{$obj->productName}</td>";
			echo "<br><b>$<td>{$obj->cost}</td></b>";
			echo "<br><br>";
			if ($obj->stockCount < 1)
			{
				echo "<b><td> OUT OF STOCK </td></b>";
			} else {
				echo "<td>{$obj->productDetails}</td>";
			}
			echo "<br><br><br>";
			}
		?>

       </div> 
	 </div>
 
 
	
    <div class="w3-col l3 s6">	
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="images/drink_3.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
			 <button name='orderButton' value="drink3" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>  
		</div>
		  <?php
			//	Read the Product table and display cost, product and description contents on the website page. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			$sql="SELECT productName, productDetails, stockCount, cost FROM product WHERE productId= 9";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);

			echo "<br><td>{$obj->productName}</td>";
			echo "<br><b>$<td>{$obj->cost}</td></b>";
			echo "<br><br>";
			if ($obj->stockCount < 1)
			{
				echo "<b><td> OUT OF STOCK </td></b>";
			} else {
				echo "<td>{$obj->productDetails}</td>";
			}
			echo "<br><br><br>";
			}
		?>

       </div> 
	
 

      <div class="w3-display-container">
          <img src="images/drink_4.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
			 <button name='orderButton' value="drink4" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>  
	  
		  <?php
			//	Read the Product table and display cost, product and description contents on the website page. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			$sql="SELECT productName, productDetails, stockCount, cost FROM product WHERE productId= 10";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);

			echo "<br><td>{$obj->productName}</td>";
			echo "<br><b>$<td>{$obj->cost}</td></b>";
			echo "<br><br>";
			if ($obj->stockCount < 1)
			{
				echo "<b><td> OUT OF STOCK </td></b>";
			} else {
				echo "<td>{$obj->productDetails}</td>";
			}
			echo "<br><br><br>";
			}
		?>

      </div> 
	</div>


	
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="images/drink_5.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
			 <button name='orderButton' value="drink5" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
		</div>
		  <?php
			//	Read the Product table and display cost, product and description contents on the website page. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			$sql="SELECT productName, productDetails, stockCount, cost FROM product WHERE productId= 11";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);

			echo "<br><td>{$obj->productName}</td>";
			echo "<br><b>$<td>{$obj->cost}</td></b>";
			echo "<br><br>";
			if ($obj->stockCount < 1)
			{
				echo "<b><td> OUT OF STOCK </td></b>";
			} else {
				echo "<td>{$obj->productDetails}</td>";
			}
			echo "<br><br><br>";
			}
		?>

      </div> 
		  

      <div class="w3-display-container">
          <img src="images/drink_6.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
			 <button name='orderButton' value="drink6" class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          <div>  
		</div>
		  <?php
			//	Read the Product table and display cost, product and description contents on the website page. 
			{
			$conn = mysqli_connect($servername, $username, $password, $database);
			$sql="SELECT productName, productDetails, stockCount, cost FROM product WHERE productId= 12";
			$result = $conn->query($sql);
			$obj = mysqli_fetch_object($result);

			echo "<br><td>{$obj->productName}</td>";
			echo "<br><b>$<td>{$obj->cost}</td></b>";
			echo "<br><br>";
			if ($obj->stockCount < 1)
			{
				echo "<b><td> OUT OF STOCK </td></b>";
			} else {
				echo "<td>{$obj->productDetails}</td>";
			}
			echo "<br><br><br>";
			}
		?>

        </div> 
	</div>



 <!--   
   	
-->
	</div>
	</div>
	</div>

	</form>

<!--
	</div>
-->





<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>

	</br>
		
	
	<div class="footer"><?php include('./footer.html');?></div>
</body>
</html>