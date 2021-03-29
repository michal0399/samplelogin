<?php
session_start();
ini_set('display_errors', 1);
/* Attempt MySQL server connection. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
$link = new mysqli("localhost", "michal", "Mysqlpassword2703", "amazingwebservice");
 
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($link,$_POST['username']);
      $password = mysqli_real_escape_string($link,$_POST['password']);
      $hashed = md5($password); 
      $error = "Check username or password!";
      $sql = "SELECT username FROM users WHERE username = '$username' and password = '$hashed'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $username and $password, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['username'] = $username;
          header("Location: loginsuccess.php");
      }else {
	 $_SESSION["error"] = $error;     
	 header("Location: index.php");  
      }
}

?>

