<?php
session_start();
if (isset($_SESSION["user"])){
    print "JEE";
}
else{
    print "XD TYPO";
}
?>