<?php

if (isset($_POST['logMasuk'])){
    require_once 'database.php';

    #mendapatkan id dan kata laluan
    $idPengguna = $_POST['idPengguna'];
    $kataLaluan = $_POST["kataLaluan"];

    #mengenal pasti sama ada adalah admin
    $sql = "SELECT * FROM admin WHERE idAdmin = '$idPengguna'";
    $result = mysqli_query($conn,$sql);
    $rowCount = mysqli_num_rows($result);
    if($rowCount == 0) {
        #mengenal pasti pengguna wujud
        $sql = "SELECT * FROM pengguna WHERE idPengguna = '$idPengguna'";
        $result = mysqli_query($conn,$sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount == 0) {
            echo "
            <script>
            alert('ID Pengguna tidak wujud. Sila daftar dahulu.');
            window.location.href = '../daftar.php';
            </script>
            ";
        } else {
            $status = 'pengguna';
        }
    } else {
        $status = 'admin';
    }
    while ($row = mysqli_fetch_assoc($result)){
        #mengenal pasti kata laluan adalah betul
        $kataLaluanSebenar = $row['kataLaluan'];
        if ($kataLaluan == $kataLaluanSebenar){
            session_start();
            $_SESSION['idPengguna'] = $idPengguna;
            $_SESSION['status'] = $status;
            $_SESSION['banding'] = array();
            echo "
            <script>
            alert('Log masuk berjaya.');
            window.location.href = '../index.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Kata Laluan salah.');
            window.location.href = '../logMasuk.php';
            </script>
            ";
        }
    }
} else {
    header("location: ../logMasuk.php?ralat=aksestidakdibenarkan");
}

?>