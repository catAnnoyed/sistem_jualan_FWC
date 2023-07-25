<?php
session_start();

# berhubung dengan database
require_once "INC/database.php";

# mendapatkan produk pilihan pengguna
$idPengguna = $_SESSION['idPengguna'];
$senaraiBanding = $_SESSION['banding'];

#function mengosongkan senarai banding
if (isset($_POST['reset'])) {
    $_SESSION['banding'] = [];
    echo "
    <script>
        alert('Senarai banding telah dikosongkan');
            window.location.href = '../sistem_jualan_FWC/senarai_produk.php';
    </script>
    ";
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
            <button onclick="UbahSaizFont(2)">+</button>
            <button onclick="UbahSaizFont(-2)">-</button>
        </div>
        <h1 class="teks"><b><u>Senarai Banding</u></b></h1>
        <div class="senarai teks">
            <?php
            if (count($senaraiBanding) > 0){
            ?>
            <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Jenama</th>
                    <th>Kapasiti</th>
                    <th>Jenis Bekas</th>
                    <th>Harga</th>
                </tr>
                <?php
                #mendapatkan maklumat produk
                foreach($senaraiBanding as $idProduk) {
                    $sql = "SELECT * 
                            FROM produk p
                            INNER JOIN jenama j
                            ON p.idJenama = j.idJenama
                            WHERE idProduk = '$idProduk'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $namaProduk = $row['namaProduk'];
                $jenama = $row['jenama'];
                $kapasiti = $row['kapasiti'];
                $jenisBekas = $row['jenisBekas'];
                $hargaProduk = $row['hargaProduk'];
                $gambar = $row['gambar'];
                ?>
                <!--masukkan maklumat ke dalam senarai-->
                <tr>
                    <td>
                        <a href="produk.php?idProduk=<?php echo $idProduk?>">
                            <img src="img/<?php echo $gambar ?>" alt="<?php echo $namaProduk ?>">
                        </a>
                    </td>
                    <td><?php echo $namaProduk ?></td>
                    <td><?php echo $jenama ?></td>
                    <td><?php echo $kapasiti ?> L</td>
                    <td><?php echo ucfirst($jenisBekas) ?></td>
                    <td>RM<?php echo $hargaProduk ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <!--button reset-->
            <form action="" method="post">
                <button class="buttons teks" type="submit" name="reset">Reset</button>
            </form>
            <?php
            #dipaparkan jika tiada produk untuk dibanding
            } else {
                echo "<p>Tiada produk untuk dibandingkan</p> <img src='img/duck.gif'>";
            }
            ?>
            
        </div>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
    <script src = "script.js"></script>
    <script>
        document.getElementById("page4").style.backgroundColor ="#3D432E";
    </script>
</body>
</html> 