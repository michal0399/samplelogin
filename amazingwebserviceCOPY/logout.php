<?php
session_start();
unset($_SESSION['username']);
$logout = "Successfully logged out!";
$_SESSION["logout"] = $logout;
header('Location: index.php');
exit;
?>
