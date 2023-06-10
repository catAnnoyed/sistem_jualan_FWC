<?php

if (isset($_POST['kemaskini'])){
    include_once 'database.php';

    $idProduk = $_POST['idProduk'];
    $namaProduk = $_POST['namaProduk'];
    $jenama = $_POST['jenama'];
    $kapasiti =$_POST['kapasiti'];
    $jenisBekas = $_POST['jenisBekas'];
    $gambar = $_POST['gambar'];
    $hargaProduk = $_POST['hargaProduk'];

    # dapatkan idJenama
    $sql = "SELECT idJenama FROM jenama WHERE jenama = '$jenama'";
    $result = mysqli_query($conn,$sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $idJenama = mysqli_fetch_assoc($result)['idJenama'];
    } else {
        $sql2 ="INSERT INTO jenama(jenama)
                VALUES ('$jenama')";
        $result2 = mysqli_query($conn,$sql2);
        $idJenama = mysqli_insert_id($conn);
    }

    # kemaskini maklumat produk
    $sql = "UPDATE produk 
            SET 
                namaProduk = '$namaProduk',
                idJenama = '$idJenama',
                kapasiti = '$kapasiti',
                jenisBekas = '$jenisBekas',
                hargaProduk = '$hargaProduk'
            WHERE 
                idProduk = '$idProduk'";
     $result = mysqli_query($conn,$sql);

     if ($_FILES['gambarBaru']['size'] > 0) {
        # muat naik gambar baru
        $folderGambar = "../img/";
        $gambarMuatNaik = basename($_FILES['gambarBaru']['name']);
        $jenisFail = strtolower(pathinfo($gambarMuatNaik)['extension']);
        $namaProdukUnderscore = str_replace(" ","_", $namaProduk);
        $gambar = $namaProdukUnderscore . "." . $jenisFail;
        $lokasiGambar = $folderGambar . $gambar;

        #echo"<script>console.log(\"DEBUG:$gambarMuatNaik,$gambar,$jenisFail,$lokasiGambar\");</script> ";

        if ($jenisFail != "jpg" && $jenisFail != "jpeg" && $jenisFail != "png"){
            echo "
            <script>
            alert('Hanya gambar jenis jpg, jpeg dan png dibenarkan ');
            window.location.href = '../produk_kemaskini.php?idProduk=$idProduk';
            </script>
            ";
        } else {
            $namaSementara = $_FILES['gambarBaru']['tmp_name'];
            $pindahGambar = move_uploaded_file($namaSementara,$lokasiGambar);
            $sql = "UPDATE produk 
                    SET gambar = '$gambar'
                    WHERE idProduk = '$idProduk'";
        $result = mysqli_query($conn,$sql);
        }
    }
    echo "
    <script>
    alert('Produk kemaskini berjaya');
        window.location.href = '../index.php';
    </script>
     ";

} elseif (isset($_POST['hapus'])){
    include_once 'database.php';

    $idProduk = $_POST['idProduk'];
    $gambar = $_POST['gambar'];

    $sql = "DELETE FROM produk WHERE idProduk = $idProduk";
    $result = mysqli_query($conn,$sql);

    if ($result){
        $file = '.../img/'. $gambar;
        unlink($file);

        echo "
        <script>
            alert('Produk berjaya dihapus');
            window.location.href = '../index.php';
        </script>
         ";
    }
} else {
    header("location: ../produk_kemaskini.php?ralat=aksestidakdibenarkan");
}

?>