<?php
session_start();
ini_set('display_errors', 1);
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = new mysqli("localhost", "michal", "Mysqlpassword2703", "amazingwebservice");
 
// Check connection
if($link === false){
	die("Connection Failed");
	
}else{	
	
}

 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$verifiedpass = mysqli_real_escape_string($link, $_REQUEST['passver']);
if($password == $verifiedpass){
	$hashed = md5($password); //hash user password
	// attempt insert query execution
	$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed')";

	if(mysqli_query($link, $sql)){
		echo "Account Created!";
		header("Location: success.php");
		mysqli_close($link);
		exit;
	}else{
		echo "ERROR: Something went wrong! :( " . mysqli_error($link);
		mysqli_close($link);
		exit;
	}
}else{
	$mismatch = "Passwords must match!";
	$_SESSION['mismatch'] = $mismatch;
	header("Location: signup.php");
	exit;
}
?>

