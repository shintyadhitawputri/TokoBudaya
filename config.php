<?php

/** KONEKSI DATABASE **/
global $connection;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tokobudaya";

$connection = mysqli_connect($servername, $username, $password, $dbname);
/** CEK KONEKSI **/
if (!$connection) {
	die("connection failed" . mysqli_connect_error());
}
