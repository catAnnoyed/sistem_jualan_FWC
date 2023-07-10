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
        <h1 class="title teks"><b><u>Log Masuk</u></b></h1>
        <form class="borang teks" action="inc/logMasuk-inc.php" method="post">
            <label for="idPengguna" class="teks">ID Pengguna</label>
            <input type="text" name="idPengguna" id="idPengguna" required>
            <label for="kataLaluan" class="teks">Kata Laluan</label>
            <input type="password" name="kataLaluan" id="kataLaluan"required>
            <button class="buttons" type="submit" name="logMasuk">Log Masuk</button>
        </form>
        <p class="randomTexts teks">Pengguna baharu?<a href= daftar.php>Click di sini</a> untuk mendaftar</p>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
    <script src = "script.js"></script>
    <script>
        document.getElementById("page3").style.backgroundColor ="#3D432E";
    </script>
</body>
</html> 
