<?php
session_start();
$status = $_SESSION['status'];
if ($status == 'admin'){
    $page = "produk_kemaskini.php";
} else {
    $page = "produk.php";
}

#berhubung dengan database
require_once "inc/database.php";

#mendapatkan 3 produk
$sql = "SELECT * FROM PRODUK ORDER BY RAND() LIMIT 3;";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
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
        <h1 class="teks"><b><u>Menarik hari ini</u></b></h1>
        <div class="galeri teks">
            <?php
            while ($row = mysqli_fetch_assoc($result)){
                $idProduk =$row['idProduk'];
                $namaProduk =$row['namaProduk'];
                $gambar =$row['gambar'];
            ?>
            <div class="item">
                <a href="<?php echo $page?>?idProduk=<?php echo $idProduk?>">
                    <img src="img/<?php echo $gambar?>">
                    <p class= "teks"><?php echo $namaProduk?></p>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
    <script src = "script.js"></script>
    <script>
        document.getElementById("page1").style.backgroundColor ="#3D432E";
    </script>
</body>
</html> 
