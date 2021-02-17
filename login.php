<?php
session_start();

$username =$_POST["username"];
$password =$_POST["password"];

$yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");

if (!$yhteys){
    header("Location:error.html");
    exit;
}

$ok=mysqli_select_db($yhteys, "trtkp20a3");

if (!$ok){
    header("Location:error.html");
    exit;
} 

$tulos=mysqli_query($yhteys, "select * from elina19161_tunnukset where tunnus='".$username."' and salasana='".md5($password)."'");

if ($tulos){
    $_SESSION["user"]="OK";
    header("Location:profile.html");
    exit;
}
header("Location:login.html");

?>