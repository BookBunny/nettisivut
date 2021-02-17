<?php
session_start();

$username =$_POST["username"];
$password =$_POST["password"];

$yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");
if (!$yhteys){
    header("Location:error.html");
    exit;
}


if (!$tietokanta){
    header("Location:error.html");
    exit;
} 

$sql="select * from elina19161_tunnukset where tunnus='".$username."' and salasana='".md5($password)."'";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);
$tulos=mysqli_stmt_get_result($stmt);


if ($rivi=mysqli_fetch_object($tulos)){
    $_SESSION["user_ok"]="ok";
    header("Location:".$_SESSION["paluuosoite"]);
    exit;
}
else{
	header("Location:login.html");
}
?>