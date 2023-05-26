<?php
session_start();
if($_SESSION['status'] != 'admin'){
    header("location: .../index.php?ralat=aksestidakdibenarkan");
}

#berhubung dengan database
require_once "inc/database.php";

#mendapatkan maklumat berkenaan produk
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
    $gambar = $row['gambar'];
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
    <script src = "script.js"></script>
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
        <h1 class="teks"><b><u>Kemas Kini Produk</u></b></h1>
        <form class="borang teks" action="INC/kemaskini-inc.php" method="post">
            <input type="hidden" name="idProduk" id="idProduk" value="<?php echo $idProduk?>">
            <input type="hidden" name="gambar" id="gambar" value="<?php echo $gambar?>">
            <label class="teks" form="namaProduk">Nama Produk</label>
            <input type="text" name="namaProduk" id="namaProduk" required value="<?php echo $namaProduk?>">
            <label class="teks"form="jenama">Jenama</label>
            <input type="text" name="jenama" id="jenama" required value="<?php echo $jenama?>">
            <label class="teks" form="kapasiti">Kapasiti</label>
            <input type="number" name="kapasiti" id="kapasiti" min="0.5" max="10" step=0.1 value="<?php echo $kapasiti?>">
            <label class="teks" form="jenis_bekas">Jenis Bekas</label>
            <input type="text" name="jenis_bekas" id="jenis_bekas" value="<?php echo $jenisBekas?>">
            <label class="teks" form="harga">Harga</label>
            <input type="number" name="harga" id="harga" min="1" max="99999" step="0.1" required value="<?php echo $hargaProduk?>">
            <label class="teks" form="gambarBaru">Gambar baru</label>
            <input type="file" name="gambarBaru" id="gambarBaru">
            <button type="submit" name="kemaskini">Kemaskini</button>
            <button type="submit" name="hapus">Hapus</button>
        </form>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
    <script>
        document.getElementById("page9").style.backgroundColor ="#1A472A";
    </script>
</body>
</html> 