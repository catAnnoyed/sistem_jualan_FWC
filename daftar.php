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
        <h1 class="teks"><b><u>Daftar</u></b></h1>
        <form class="borang teks" action="inc/daftar-inc.php" method="post">
            <label class="teks" for="idPengguna">ID Pengguna</label>
            <input type="text" name="idPengguna" id="idPengguna" required>
            <label class="teks" for="kataLaluan">Kata Laluan</label>
            <input type="password" name="kataLaluan" id="kataLaluan" minlength="8" maxlength="15" required>
            <label class="teks" for="nama" name="nama">Nama</label>
            <input type="text" name="nama" id="nama" pattern="[A-Za-z]+" title="Sila guna huruf sahaja" required> 
            <label class="teks" for="noTelefon" name="noTelefon">NO Telefon</label>
            <input type="text" name="noTelefon" id="noTelefon" pattern="[0-9]+" title="Sila masukkan nombor sahaja">
            <label class="teks" for="emel" name="emel">E-mel</label>
            <input type="email" name="emel" id="emel">
            <button class="buttons" type="submit" name="daftar">Daftar</button>
        </form>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
</body>
</html> 