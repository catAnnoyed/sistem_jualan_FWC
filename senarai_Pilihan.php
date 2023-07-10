<?php
session_start();

# berhubung dengan database
require_once "INC/database.php";

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
            <button onclick="UbahSaizFont(2)">+</button>
            <button onclick="UbahSaizFont(-2)">-</button>
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
                    $idPembelian = $row['idPembelian'];
                    $idProduk = $row['idProduk'];
                    $tarikh = date('d.m.Y', strtotime($row['tarikh']));
                    $masa = date('h:i A', strtotime($row['masa']));

                    $sql2 ="SELECT * 
                            FROM produk p
                            INNER JOIN jenama j
                            ON p.idJenama = j.idJenama
                            WHERE idProduk = '$idProduk'";
                    $result2 = mysqli_query($conn, $sql2);

                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $namaProduk = $row2['namaProduk'];
                        $jenama = $row2['jenama'];
                        $kapasiti = $row2['kapasiti'];
                        $jenisBekas = $row2['jenisBekas'];
                        $hargaProduk = $row2['hargaProduk'];
                        $gambar = $row2['gambar'];
                    }
                ?>

                <tr>
                    <td>
                        <a href="produk.php?idProduk=<?php echo $idProduk?>">
                            <img src="img/<?php echo $gambar ?>" alt="<?php echo $namaProduk?>">
                        </a>
                    </td>
                    <td><?php echo $namaProduk?></td>
                    <td><?php echo $jenama?></td>
                    <td><?php echo $kapasiti?> L</td>
                    <td><?php echo ucfirst($jenisBekas)?></td>
                    <td>RM<?php echo $hargaProduk?></td>
                    <td>
                        <p><?php echo $tarikh?></p>
                        <p><?php echo $masa?></p>
                        <a href="INC/hapus-inc.php?idPembelian=<?php echo $idPembelian?>">
                            <button class="pilihanHapusbuttons print" type="button" name="">Hapus</button>
                        </a>
                </tr>
                <?php 
                }
                ?>
            </table>
            <button class="buttons print" onclick="window.print(); return false;" class="print">Cetak</button>
        </div>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
    <script src = "script.js"></script>
    <script>
        document.getElementById("page5").style.backgroundColor ="#3D432E";
    </script>
</body>
</html> 