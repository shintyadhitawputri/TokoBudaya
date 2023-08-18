<?php 
session_start();

$_SESSION["daftar_id"];
$_SESSION["daftar_username"];

unset($_SESSION["daftar_id"]);
unset($_SESSION["daftar_username"]);

session_unset();
session_destroy();

header("location:index.php");

 ?>