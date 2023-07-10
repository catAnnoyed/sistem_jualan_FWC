<?php
session_start();

# berhubung dengan database
require_once 'INC/database.php';

# mendapatkan senarai jenama
$sql = "SELECT * FROM jenama";

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
        <h1 class="teks"><b><u>Senarai Jenama</u></b></h1>
        <div class="senarai teks">
            <table>
                <tr>
                    <th>Bil</th>
                    <th>Jenama</th>
                    <th>Hapus</th>
                </tr>
                <?php 
                $bil = 1;
                while($row = mysqli_fetch_assoc($result)){
                    $idJenama = $row['idJenama'];
                    $jenama = $row['jenama'];
                ?>
                <tr>
                    <td><?php echo $bil?></td> 
                    <td><?php echo $jenama ?></td>
                    <td>
                        <form style="padding:0px;" action="INC/jenama-inc.php" method="post">
                            <input type="hidden" name="idJenama" value="<?php echo $idJenama?>">
                            <button class="pilihanHapusbuttons" type="submit" name="hapus">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php
                $bil += 1;
                }
                ?>
            </table>
            <form action="INC/jenama-inc.php" method="post" class="borang" style="margin-top:80px" enctype="multipart/form-data">
                <label for="failJenama">Senarai Jenama</label>
                <input type="file" name="failJenama" id="failJenama" required>
                <button class="buttons" style="width:200px; margin:10px auto;" type="submit" name="muatnaik">Muat Naik</button>
            </form>
        </div>
    </div>
    <footer class="teks">Hakcipta Terpelihara FWC 2022 &copy;</footer>
    <script src = "script.js"></script>
    <script>
        document.getElementById("page11").style.backgroundColor ="#3D432E";
    </script>
</body>
</html> 