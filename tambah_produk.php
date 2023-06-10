<?php
session_start();
if($_SESSION['status'] != "admin"){
    header("location: ../sistem_jualan_FWC/index.php?ralat=aksestidakdibenarkan");
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
        <h1 class="teks"><b><u>Tambah Produk</u></b></h1>
        <form class="borang teks" action="INC/tambah-inc.php" method="post" enctype="multipart/form-data">
            <label class="teks" form="namaProduk">Nama Produk</label>
            <input type="text" name="namaProduk" id="namaProduk" required>
            <label class="teks"form="jenama">Jenama</label>
            <input type="text" name="jenama" id="jenama" required>
            <label class="teks" form="kapasiti">Kapasiti</label>
            <input type="number" name="kapasiti" id="kapasiti" min="0.0" max="10" step="0.01">
            <label class="teks" form="jenisBekas">Jenis Bekas</label>
            <input type="text" name="jenisBekas" id="jenisBekas">
            <label class="teks" form="hargaProduk">Harga</label>
            <input type="number" name="hargaProduk" id="hargaProduk" min="10" max="9999" step="0.01" required>
            <label class="teks" form="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar" required>
            <button type="submit" name="tambah">Tambah</button>
        </form>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
    <script>
        document.getElementById("page8").style.backgroundColor ="#1A472A";
    </script>
</body>
</html> 