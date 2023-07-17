<?php
session_start();
#memastikan adalah admin
if($_SESSION['status'] != 'admin'){
    header("location: ../sistem_jualan_FWC/index.php?ralat=aksestidakdibenarkan");
}

# berhubung dengan database
require_once 'INC/database.php';

# mendapatkan produk pilihan pengguna
$sql = "SELECT
            COUNT(idPengguna) AS bil,
            pmb.idProduk,
            namaProduk,
            idJenama,
            hargaProduk,
            gambar
        FROM pembelian pmb
        INNER JOIN produk prd
        ON pmb.idProduk = prd.idProduk
        GROUP BY idProduk
        ORDER BY bil DESC";

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
        <h1 class="teks"><b><u>Senarai Pilihan Pengguna</u></b></h1>
        <div class="senarai teks">
            <!--table senarai pilihan pengguna-->
            <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Jenama</th>
                    <th>Harga</th>
                    <th>Bil. Pengguna</th>
                </tr>
                <?php 
                while($row = mysqli_fetch_assoc($result)){
                    $bil = $row['bil'];
                    $idProduk = $row['idProduk'];
                    $namaProduk = $row['namaProduk'];
                    $idJenama = $row['idJenama'];
                    $harga = $row['hargaProduk'];
                    $gambar = $row['gambar'];

                    $sql2 = "SELECT jenama FROM jenama WHERE idJenama = '$idJenama'";
                    $result2 = mysqli_query($conn, $sql2);
                    $jenama = mysqli_fetch_assoc($result2)['jenama'];
                ?>
                <tr>
                    <td>
                        <a href="produk_kemaskini.php?idProduk=<?php echo $idProduk ?>">
                            <img src="img/<?php echo $gambar ?>" alt="">
                        </a>
                    </td>
                    <td><?php echo $namaProduk ?></td> 
                    <td><?php echo $jenama ?></td>
                    <td><?php echo $harga ?></td>
                    <td><?php echo $bil ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <!--button print-->
            <button class="buttons print" onclick="window.print(); return false;">Cetak</button>
        </div>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
    <script src = "script.js"></script>
    <script>
        document.getElementById("page10").style.backgroundColor ="#3D432E";
    </script>
</body>
</html> 