<?php
include "login.html";

?>

<?php

$etunimi =$_POST["etunimi"];
$sukunimi =$_POST["sukunimi"];

$yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");

if (!$yhteys){
    //die("Yhteyden muodostaminen epäonnistui: ". mysqli_connect_error());
    header("Location:error.html");
    exit;
}

$tietokanta = mysqli_select_db($yhteys, "trtkp20a3");

if (!$tietokanta){
    //die("Tietokannan valinta epäonnistui: " . mysqli_connect_error());
    header("Location:error.html");
    exit;
} 

$sql="insert into //TEE UUSI TIETOKANTA// (etunimi,sukunimi) values(?,?)";
$stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $etunimi, $sukunimi);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysql_close($yhteys);

    header("Location:profile.html")
exit;
 ?>