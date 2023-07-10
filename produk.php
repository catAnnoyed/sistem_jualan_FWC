<?php
session_start();

#berhubung dengan database
require_once "inc/database.php";

#mendapatkan maklumat produk
$idProduk = $_GET['idProduk'];
$sql = "SELECT *
        FROM produk p
        INNER JOIN jenama j
        ON p.idJenama = j.idJenama
        WHERE idProduk='$idProduk';";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)){
    $namaProduk =$row['namaProduk'];
    $jenama = $row['jenama'];
    $kapasiti =$row['kapasiti'];
    $jenisBekas = $row['jenisBekas'];
    $hargaProduk = $row['hargaProduk'];
    $gambar =$row['gambar'];
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kedai Pengisar Makanan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <p class="header teks">Kedai Pengisar Makanan</p>
    <ul class="menu teks">
    <?php include 'INC/menu.php'?>
    </ul>
    <div class="content">
        <div class="btnUbahSaiz"> 
            <button onclick="UbahSaizFont(5)">+</button>
            <button onclick="UbahSaizFont(-5)">-</button>
        </div>
        <div class="produk teks">
            <img src="img\<?php echo $gambar?>" alt="<?php echo $namaProduk?>">
            <p class="namaProduk teks"><?php echo $namaProduk?></p>
            <p class="label teks">Jenama :</p> <p class="detail teks"><?php echo $jenama?></p>
            <p class="label teks">kapsiti :</p><p class="detail teks"><?php echo $kapasiti?> L</p>
            <p class="label teks">Jenis bekas :</p><p class="detail teks"><?php echo ucfirst($jenisBekas)?></p>
            <p class="hargaProduk teks">RM<?php echo $hargaProduk?></p>
            <?php
            if (isset($_SESSION['status'])){
            ?>
            <form action="INC/produk-inc.php" method="post">
                <input type="hidden" name="idProduk" value="<?php echo $idProduk?>">
                <button class="buttons brgbandingpilih" type="submit" name="banding">Banding</button>
                <button class="buttons brgbandingpilih" type="submit" name="pilih">Pilih</button>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
    <script src = "script.js"></script>
</body>
</html> 