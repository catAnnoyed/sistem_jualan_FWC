<?php
session_start();

if(isset($_SESSION['status']) && $_GET['idPembelian']) {
    require_once 'database.php';

    $idPembelian = $_GET['idPembelian'];
    $sql = "DELETE FROM pembelian
            WHERE idPembelian = '$idPembelian'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "
            <script>
            alert('Pilihan berjaya dihapus');
            window.location.href = '../senarai_pilihan.php';
            </script>
            ";
    } else {
        echo "
            <script>
            alert('Pilihan tidak berjaya dihapus');
            window.location.href = '../senarai_pilihan.php';
            </script>
            ";
    }
}
?>