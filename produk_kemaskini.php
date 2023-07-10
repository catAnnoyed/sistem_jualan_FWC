<?php
session_start();
if($_SESSION['status'] != 'admin'){
    header("location: ../sistem_jualan_FWC/index.php?ralat=aksestidakdibenarkan");
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
            <button onclick="UbahSaizFont(2)">+</button>
            <button onclick="UbahSaizFont(-2)">-</button>
        </div>
        <h1 class="teks"><b><u>Kemas Kini Produk</u></b></h1>
        <form class="borang teks" action="INC/kemaskini-inc.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idProduk" id="idProduk" value="<?php echo $idProduk?>">
            <input type="hidden" name="gambar" id="gambar" value="<?php echo $gambar?>">
            <label class="teks" form="namaProduk">Nama Produk</label>
            <input type="text" name="namaProduk" id="namaProduk" required value="<?php echo $namaProduk?>">
            <label class="teks"form="jenama">Jenama</label>
            <input type="text" name="jenama" id="jenama" required value="<?php echo $jenama?>">
            <label class="teks" form="kapasiti">Kapasiti</label>
            <input type="number" name="kapasiti" id="kapasiti" min="0.5" max="10" step=0.01 value="<?php echo $kapasiti?>">
            <label class="teks" form="jenisBekas">Jenis Bekas</label>
            <input type="text" name="jenisBekas" id="jenisBekas" value="<?php echo $jenisBekas?>">
            <label class="teks" form="hargaProduk">Harga</label>
            <input type="number" name="hargaProduk" id="hargaProduk" min="1" max="99999" step="0.01" required value="<?php echo $hargaProduk?>">
            <label class="teks" form="gambarBaru">Gambar baru</label>
            <input type="file" name="gambarBaru" id="gambarBaru">
            <button class="buttons" type="submit" name="kemaskini">Kemaskini</button>
            <button class="pilihanHapusbuttons" type="submit" name="hapus">Hapus</button>
        </form>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
    <script>
        document.getElementById("page9").style.backgroundColor ="#3D432E";
    </script>
</body>
</html> 