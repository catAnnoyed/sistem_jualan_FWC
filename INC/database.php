<?php

$dbHost = "db.be-mons1.bengt.wasmernet.com";
$dbUser = "34b261e3706e8000d7952bb0ffb2";
$dbPass = "068534b2-61e3-7176-8000-458f753ee4d0";
$dbName = "sis_jualan_fwc";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn){
    die("Hubungan ke pangkalan data gagal: ". mysqli_connect_error());
}
?>
