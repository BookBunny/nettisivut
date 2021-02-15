<?phpsession_start();

if (isset($_POST["username"]) && isset($_POST["password"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
}
else{
    header("Location:login.html");
    exit;
}

$yhteys=mysqli_connect("trtkp20a3", "", "");
$tietokanta=mysqli_select_db($yhteys, "poj_userdata");

$sql="select * from poj_users where username=? and password=md5(?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username. $password);
mysqli_execute($stmt);
$tulos_mysqli_stmt_get_result($stmt);

if ($rivi=mysqli_fetch_object($tulos)){
    $_SESSION["user_ok"]="ok";
    header("Location:".$_SESSION["profile.html"]);
    exit;
}
else{
    header("Location:login.php");
    exit;
}
?>