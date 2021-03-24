<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Amazing Webservice Signup</title>
</head>

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "Mysqlpassword2703", "amazingwebservice");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);

$hashed = hash('sha512', $password);  //hash user password

// attempt insert query execution
$sql = "INSERT INTO persons (username, email, password) VALUES ('$username', '$email', '$hashed')";
if(mysqli_query($link, $sql)){
    echo "Account Created!";
} else{
    echo "ERROR: Something went wrong! :( " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
</html>