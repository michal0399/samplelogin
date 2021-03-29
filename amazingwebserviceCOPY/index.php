<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Amazing Webservice</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<form action='fetch.php' method='POST'>
<div id="login-box">
  <div class="left">
<?php
if(isset($_SESSION["logout"])){
	$logout = $_SESSION["logout"];
	echo "<span><h3>$logout</h3></span>";
	unset($_SESSION["logout"]);
}else{
	echo "<span><h1>Amazing Webservice</h1></span>";
}
?>
    <h4>Login</h4>
    
    <input type="text" name="username" id="username"  placeholder="Username" />
    <input type="password" name="password" id="password" placeholder="Password" />
        
<?php
if(isset($_SESSION['error'])){
      $error = $_SESSION['error'];
      echo "<span>$error</span>";
      }
?>

    <input type="submit" name="login_submit" value="LOGIN" />
	<br>
	<p> Click <a href='signup.php'> here </a> to create an account</p>
  </div>
</form>  
</body>  
</div>
</html>
<?php
unset($_SESSION["error"]);
?>

