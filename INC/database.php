<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "sis_jualan_fwc";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn){
    die("Hubungan ke pangkalan data gagal: ". mysqli_connect_error());
}
?>
