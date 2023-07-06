<?php

if(isset($_POST['muatnaik'])) {
    require_once 'database.php';
    $maklumat = fopen($_FILES['failJenama']['tmp_name'],'rb');

    while (($jenama = fgets($maklumat)) !==false) {
        $sql = "INSERT INTO jenama(jenama)
                VALUES ('$jenama')";
        $result = mysqli_query($conn, $sql);
    }

    if ($result) {
        echo "
        <script>
        alert('Muat naik jenama berjaya.');
        window.location.href = '../jenama.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Muat naik jenama gagal.');
        window.location.href = '../jenama.php';
        </script>
        ";
    }
} elseif (isset($_POST['hapus'])) {
    require_once 'database.php';

    $idJenama = $_POST['idJenama'];
    $sql = "DELETE FROM jenama WHERE idJenama = '$idJenama'";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        echo "
        <script>
        alert('Jenama berjaya dihapuskan.');
        window.location.href = '../jenama.php';
        </script>
        ";
    }
} else {
    header("Location: ../index.php?ralat=aksestidakdibenarkan");
}

?>