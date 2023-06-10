<?php
session_start();

# berhubung dengan database
require_once 'INC/database.php';

# mendapatkan produk pilihan pengguna
$idPengguna = $_SESSION['idPengguna'];
$sql = "SELECT *
        FROM pembelian 
        WHERE idPengguna = '$idPengguna'";
$result = mysqli_query($conn, $sql);

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
    <p class="header teks print_header">Kedai Pengisar Makanan</p>
    <ul class="menu teks print">
        <?php include 'INC/menu.php'?>
    </ul>
    <div class="content">
        <div class="btnUbahSaiz print"> 
            <button onclick="UbahSaizFont(5)">+</button>
            <button onclick="UbahSaizFont(-5)">-</button>
        </div>
        <h1 class="teks"><b><u>Senarai Pilihan</u></b></h1>
        <div class="senarai teks">
            <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Jenama</th>
                    <th>Kapasiti</th>
                    <th>Jenis Bekas</th>
                    <th>Harga</th>
                    <th>Tarikh & Waktu</th>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($result)){
                    $idProduk = $row['idProduk'];
                    $tarikh = date('d/m/Y', strtotime($row['tarikh']));
                    $masa = date('h:i A', strtotime($row['masa']));
                }
                ?>

                <tr>
                    <td>
                        <a href="product.html">
                            <img src="img/tefalBlenderforcebl3171.jpeg" alt="">
                        </a>
                    </td>
                    <td>Tefal Blenderforce 3171</td>
                    <td>Tefal</td>
                    <td>2L</td>
                    <td>plastik</td>
                    <td>RM500</td>
                    <td>
                        <p>29/11/2022</p>
                        <p>12.30 p.m.</p>
                        <a href="" class="print">Hapus</a>
                    </td>
                </tr>
            </table>
            <button onclick="window.print(); return false;" class="print">Cetak</button>
        </div>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
    <script src = "script.js"></script>
    <script>
        document.getElementById("page5").style.backgroundColor ="#1A472A";
    </script>
</body>
</html> 