<?php

if (isset($_POST['daftar'])){
    require_once 'database.php';

    #mendapatkan maklumat
    $idPengguna = $_POST["idPengguna"];
    $kataLaluan = $_POST["kataLaluan"];
    $nama = $_POST["nama"];
    $noTelefon = $_POST["noTelefon"];
    $emel = $_POST["emel"];

    $sql = "SELECT * FROM pengguna WHERE idPengguna = '$idPengguna'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    #memastikan tiada duplikasi
    if ($rowCount>0){
        echo "
        <script>
        alert('ID pengguna telah wujud.Sila pilih ID pengguna lain.');
        window.location.href = '../daftar.php';
        </script>
        ";
    } else {
        #masukkan data dalam pangkalan data
        $sql = "INSERT INTO pengguna 
                VALUES (
                '$idPengguna',
                '$kataLaluan',
                '$nama',
                '$noTelefon',
                '$emel')";
        $result = mysqli_query($conn, $sql);

        #paparkan sama ada berjaya
        if($result){
            echo "
            <script>
            alert('Pendaftaran berjaya');
            window.location.href = '../logMasuk.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Pendaftaran gagal');
            window.location.href = '../daftar.php';
            </script>
            ";
        }
    }
} else {
    header("location: ../daftar.php?ralat=aksestidakdibenarkan");
}
?>