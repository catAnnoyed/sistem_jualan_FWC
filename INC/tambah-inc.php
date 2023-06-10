<?php

if (isset($_POST['tambah'])){
    require_once 'database.php';

    $namaProduk = $_POST['namaProduk'];
    $jenama = $_POST['jenama'];
    $kapasiti =$_POST['kapasiti'];
    $jenisBekas = $_POST['jenisBekas'];
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

    # masukkan maklumat ke dalam database
    $sql = "INSERT INTO produk (namaProduk,idJenama,kapasiti,jenisBekas,hargaProduk)
            VALUES (
            '$namaProduk',
            '$idJenama',
            '$kapasiti',
            '$jenisBekas',
            '$hargaProduk');
            ";
    $result = mysqli_query($conn,$sql);
    $idProduk = mysqli_insert_id($conn);

    if ($_FILES['gambar']['size'] > 0) {
        # muat naik gambar
        $folderGambar = "../img/";
        $gambarMuatNaik = basename($_FILES['gambar']['name']);
        $jenisFail = strtolower(pathinfo($gambarMuatNaik)['extension']);
        $namaProdukUnderscore = str_replace(" ","_", $namaProduk);
        $gambar = $namaProdukUnderscore . "." . $jenisFail;
        $lokasiGambar = $folderGambar . $gambar;

        if ($jenisFail != "jpg" && $jenisFail != "jpeg" && $jenisFail != "png"){
            echo "
            <script>
            alert('Hanya gambar jenis jpg, jpeg dan png dibenarkan.');
            window.location.href = '../tambah_produk.php?idProduk=$idProduk';
            </script>
            ";
        } else {
            $namaSementara = $_FILES['gambar']['tmp_name'];
            $pindahGambar = move_uploaded_file($namaSementara,$lokasiGambar);
            $sql = "UPDATE produk 
                    SET gambar = '$gambar'
                    WHERE idProduk = '$idProduk'";
        $result = mysqli_query($conn,$sql);
        }
    }

    echo "
    <script>
        alert('Produk berjaya ditambah');
        window.location.href = '../produk_kemaskini.php?idProduk=$idProduk';
    </script>
     ";

} else {
    header("location: ../tambah_produk.php?ralat=aksestidakdibenarkan");
}

?>