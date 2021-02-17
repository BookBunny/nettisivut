<?php
session_start();
if (!isset($_SESSION["user_ok"])){
	$_SESSION["paluuosoite"]="logincheck.php";
	header("Location:login.php");
	exit;
}

print "xd";
header("Location:profile.html");
?>