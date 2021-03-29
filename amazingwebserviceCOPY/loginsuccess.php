<?php
session_start();
?>

<html>
<head>
<title>Signed in!</title>
<link rel='stylesheet' href='css/login.css' >
<body>
<div id="login-box">
<h1>Welcome, <?php echo $_SESSION ['username']; ?>!</h1>
<br>
<br>
<h2>Click <a href='logout.php'>here</a> to logout!</h2>
</div>
</body>
</html>
