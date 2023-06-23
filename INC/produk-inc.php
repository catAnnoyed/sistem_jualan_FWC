<?php

if(isset($_POST['banding'])){
    session_start();

    $idProduk = $_POST['idProduk'];
    array_push($_SESSION['banding']);
    echo"
    <script>
    alert('Produk dimasukkan dalam senarai banding');
    window.location.href = '../senarai_banding.php';
    </script>
    ";

} else if (isset($_POST['pilih'])){
    require_once 'database.php';
    session_start();

    date_default_timezone_set('Asia/Kuala_Lumpur');

    $idProduk = $_POST['idProduk'];
    $idPengguna = $_POST['idPengguna'];
    $tarikh = date("Y-m-d");
    $masa = date("H:i:s");

    $sql = "SELECT *
            FROM pembelian 
            WHERE idProduk = '$idProduk' AND
                  idPengguna = '$idPengguna'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        echo"
        <script>
        alert('Produk telah ada dalam senarai banding');
        window.location.href = '../senarai_banding.php';
        </script>
        ";

    }

    $sql2 = "INSERT INTO pembelian (idProduk,idPengguna,tarikh,masa)
            VALUES(
            '$idProduk',
            '$idPengguna',
            '$tarikh',
            '$masa')";
    $result = mysqli_query($conn,$sql2);

    if ($result) {
        echo "
        <script>
        alert('Produk dimasukkan dalam senarai pilihan');
            window.location.href = '../senarai_pilihan.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Produk gagal dimasukkan dalam senarai pilihan');
        window.location.href = '../produk.php?idProduk=<?php echo $idProduk?>';
        </script>
        ";
    }
}

?>