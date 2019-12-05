<!doctype html>

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



    <div id="Snacks" class="w3-container menu w3-padding-48 w3-card">
      <div class="w3-row">
    <div class="w3-col l3 s6">
              <div class="w3-display-container">
          <img src="images/snack_1.jfif" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>       
        <p>Muffins<br><b>$2.49</b></p>
      </div>

	  <div class="w3-Container">
      <div class="w3-display-container">
          <img src="images/snack_2.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
		  </div>
        <p>Buscuits<br><b>$19.99</b></p>
      </div>
    </div>
   


	
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="images/snack_3.jpeg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
		  </div>
        <p>Ready salted crisps<br><b>$24.99</b></p>
      </div>

      <div class="w3-display-container">
          <img src="images/snack_4.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
        <p>Brownies<br><b>$19.99</b></p>
      </div>
    </div>

	
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="images/snack_5.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>       
		  </div>
        <p>Millionaires shortbread<br><b>$24.99</b></p>
      </div>
	  

      <div class="w3-display-container">
          <img src="images/snack_6.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
        <p>Banana<br><b>$19.99</b></p>
      </div>
    </div>
    </div>
	</div>



    <div id="Drinks" class="w3-container menu w3-padding-48 w3-card">
      <div class="w3-row">
    <div class="w3-col l3 s6">
              <div class="w3-display-container">
          <img src="images/drink_1.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>       
        <p>Tea<br><b>$2.49</b></p>
      </div>

	  <div class="w3-Container">
      <div class="w3-display-container">
          <img src="images/drink_2.jfif" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
		  </div>
        <p>Americano<br><b>$19.99</b></p>
      </div>
    </div>
   


	
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="images/drink_3.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
		  </div>
        <p>Latte<br><b>$24.99</b></p>
      </div>

      <div class="w3-display-container">
          <img src="images/drink_4.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
        <p>Espresso<br><b>$19.99</b></p>
      </div>
    </div>

	
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="images/drink_5.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>       
		  </div>
        <p>Macchiato<br><b>$24.99</b></p>
      </div>
	  

      <div class="w3-display-container">
          <img src="images/drink_6.jpg" style="width:100%">          
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
        <p>Filter coffee<br><b>$19.99</b></p>
      </div>
    </div>
    </div>
	</div>
	</div>




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