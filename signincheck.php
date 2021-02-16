<?php

$json=$_POST["elina19161_tunnukset"];
$tunnukset=json_decode($json, false);

$username = $tunnukset->username;
$password= $tunnukset->password;

if (empty($username) || empty($password)) {
	print "Täytä kaikki tiedot.";
	exit;
}

#yhteys tietokantaan
$yhteys = mysqli_connect("localhost", "trtkp20a3","trtkp20a3passwd");

#virheilmoitukset, jos tietokantaan ei saada yhteyttä
if (!yhteys){
	print "Tietojen tallennuksessa tapahtui virhe.";
	exit;
}

$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");

if  (!$tietokanta) {
	print "Tietojen tallennuksessa tapahtui virhe.";
	exit;
}

#jos tietokantaan saadaan yhteys, tallennetaan tiedot valittuun tietokantaan.
$sql='insert into elina19161_tunnukset(username, password) values (?,?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($yhteys);
mysqli_close($yhteys);
print "Tiedot tallennettu onnistuneesti!";
exit;
?>