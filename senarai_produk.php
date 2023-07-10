<?php
session_start();
$page = 'produk.php';
if (isset($_SESSION['status'])){
    $status = $_SESSION['status'];
    if ($status == "admin"){
        $page = "produk_kemaskini.php";
    } 
}

#berhubung dengan database
require_once "inc/database.php";

# mendapatkan semua produk
$namaProduk = "";
$hargaMin = "0";
$hargaMax =  "9999";

if(isset($_POST['carian'])){
    $namaProduk = $_POST['namaProduk'];
    $hargaMin = $_POST['hargaMin'];
    $hargaMax = $_POST['hargaMax'];
}

$sql = "SELECT *
        FROM produk
        WHERE namaProduk LIKE '%".$namaProduk."%' 
        AND hargaProduk >= '$hargaMin'
        AND hargaProduk <= '$hargaMax';";
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
            <button onclick="UbahSaizFont(2)">+</button>
            <button onclick="UbahSaizFont(-2)">-</button>
        </div>
        <h1 class="teks"><b><u>Senarai Pengisar</u></b></h1>
        <form action="" class="borang" style="flex-direction:row; margin:0px;" method="post">
            <label for="namaProduk" class="teks">Nama Produk</label>
            <input type="text" name="namaProduk" id="idProduk" class="carian">
            <label for="hargaMin" class="teks">Harga Minimum</label>
            <input type="number" name="hargaMin" id="hargaMin" min="0" value="0" class="carian">
            <label for="hargaMax" class="teks">Harga Maximum</label>
            <input type="number" name="hargaMax" id="hargaMax" min="0" value="9999" class="carian">
            <button class="buttons" style="margin:auto;" type="submit" name="carian">Carian</button>
        </form>
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
        document.getElementById("page2").style.backgroundColor ="#3D432E";
    </script>
</body>
</html> 
