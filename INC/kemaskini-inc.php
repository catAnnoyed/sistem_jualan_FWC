<?php

if  (isset($_POST['kemaskini'])){

} elseif (isset($_POST['hapus'])){
    include_once 'database.php';

    $idProduk = $_POST['idProduk']
    $gambar = $_POST['gambar']

    $sql = "DELETE FROM produk WHERE idProduk = $idProduk";
    $result = mysqli_query($conn,$sql);

    if ($result){
        $file = '.../img/', $gambar;
        unlink $file;

        echo "
        <script>
            alert('Produk berjaya dihapus');
            window.location.href = '../index.php';
        </script>
         ";
    }
} else {
    header("location: ../kemaskini.php?ralat=aksestidakdibenarkan");
}

?>