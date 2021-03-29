<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Amazing Webservice</title>
<link rel="stylesheet" href="css/signup.css">
</head>
<body>
<script>
var check = function() {
  if (document.getElementById('password').value == document.getElementById('passver').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
function submit(){
	if(document.getElementById('password').value == document.getElementById('passver').value){
		window.location.replace("insert.php");
	}else{	
	       	document.getElementById('message').style.color = 'red';
	       	document.getElementById('message').innerHTML = 'not matching';
	}
}
</script>
<form action="insert.php" method="POST">
<div id="login-box">
  <div class="left">
    <p><a href='index.php'> Login Here </a></p>
    <h4>Sign up</h4>
    <input type="text" name="username" id="username" title="Lowercase letters only" placeholder="Username*" required/>
    <input type="text" name="email" id="email" title="Enter a valid email" placeholder="E-mail*" required/>
    <input type="password" name="password" id="password" title="Minimum 8 characters" minlength="8" placeholder="Password*" onkeyup='check();' required/>
    <input type="password" name="passver" id="passver" title="Confirm your password" placeholder="Confirm Password*" onkeyup='check();' required/>
    <span id='message'></span> <?php if(isset($_SESSION['mismatch'])){$mismatch = $_SESSION['mismatch']; echo "<span>$mismatch</span>";} ?>
	<br>
	<input type="submit" name="signup_submit" value="Sign me up" />
  </div>
</form>  
</body>  
</div>
</html>
<?php

	unset($_SESSION['mismatch']);

?>
