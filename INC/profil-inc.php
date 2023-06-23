<?php

if (isset($_POST['kemasKini'])){
    require_once 'database.php';

    $idPengguna = $_POST['idPengguna'];
    $nama = $_POST['nama'];
    $kataLaluan = $_POST['kataLaluan'];
    $noTelefon = $_POST['noTelefon'];
    $email = $_POST['email'];

    $sql = "UPDATE pengguna 
            SET
                kataLaluan = '$kataLaluan',
                nama = '$nama',
                noTelefon = '$noTelefon',
                email = '$email'
            WHERE 
                idPengguna = '$idPengguna'";
    $result = mysqli_query($conn,$sql);

    if ($result){
        echo "
        <script>
        alert('Kemaskini profil berjaya');
            window.location.href = '../profil.php';
        </script>
         ";
    } else {
        echo "
        <script>
        alert('Kemaskini profil gagal');
            window.location.href = '../profil.php';
        </script>
         ";
    }
} else {
    header("location: ../index.php?ralat=aksestidakdibenarkan");
}
?>