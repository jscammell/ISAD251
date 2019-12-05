<!DOCTYPE html>
<html>
<head>
<Title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="login.css" rel="stylesheet" type="text/css">
</head>

<body class="w3-content" style="max-width:100%">

<div class="header"><?php include('./header.html');?></div>

</br>


<h2>Login Form</h2>

<form action="/action_page.php" method="post">

</br>
</br>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>

  </br>
  </br>

</form>

</br>

	<div class="footer"><?php include('./footer.html');?></div>

</body>
</html>
