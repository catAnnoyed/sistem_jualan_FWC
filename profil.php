<?php
session_start();
if($_SESSION['status'] != 'pengguna'){
    header("location: ../sistem_jualan_FWC/index.php?ralat=aksestidakdibenarkan");
}

#berhubung dengan database
require_once "INC/database.php";

#mendapatkan maklumat pengguna
$idPengguna = $_SESSION['idPengguna'];
$sql = "SELECT * FROM pengguna WHERE idPengguna = '$idPengguna'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    $kataLaluan = $row['kataLaluan'];
    $nama = $row['nama'];
    $email = $row['email'];
    $noTelefon = $row['noTelefon'];
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
        <h1 class="teks"><b><u>Kemas Kini Maklumat Pengguna</u></b></h1>
        <form class="borang teks" action="INC/profil-inc.php" method="post">
            <label class="teks" for="idPengguna">ID Pengguna</label>
            <input type="text" name="idPengguna" id="idPengguna" readonly value="<?php echo $idPengguna?>">
            <label class="teks" for="kataLaluan">Kata Laluan</label>
            <input type="password" name="kataLaluan" id="kataLaluan" minlength="8" maxlength="15" required value="<?php echo $kataLaluan?>" >
            <label class="teks" for="nama" name="nama">Nama</label>
            <input type="text" name="nama" id="nama" pattern="[A-Za-z ]+" title="Sila guna huruf sahaja" required value="<?php echo $nama?>"> 
            <label class="teks" for="noTelefon" name="noTelefon">NO Telefon</label>
            <input type="text" name="noTelefon" id="noTelefon" pattern="[0-9]+" title="Sila masukkan nombor sahaja" required value="<?php echo $noTelefon?>">
            <label class="teks" for="email" name="email">E-mel</label>
            <input type="email" name="email" id="email" value="<?php echo $email?>">
            <button class="buttons" type="submit" name="kemasKini">Kemas Kini</button>
        </form>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
    <script src = "script.js"></script>
    <script>
        document.getElementById("page6").style.backgroundColor ="#3D432E";
    </script>
</body>
</html> 