<?php

if(isset($_POST['banding'])){
    session_start();

    #memasukkan produk dalam senarai banding
    $idProduk = $_POST['idProduk'];
    array_push($_SESSION['banding'], $idProduk);
    echo"
    <script>
    alert('Produk dimasukkan dalam senarai banding');
    window.location.href = '../senarai_banding.php';
    </script>
    ";

} else if (isset($_POST['pilih'])){
    require_once 'database.php';
    session_start();

    #menetapkan time zone
    date_default_timezone_set('Asia/Kuala_Lumpur');

    #mendapatkan maklumat
    $idProduk = $_POST['idProduk'];
    $idPengguna = $_SESSION['idPengguna'];
    $tarikh = date("Y-m-d");
    $masa = date("H:i:s");

    #memastikan produk tiada dalam senarai pilihan
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
        window.location.href = '../senarai_pilihan.php';
        </script>
        ";

    } else {
        #memasukkan maklumat ke dalam senarai pilihan
        $sql2 = "INSERT INTO pembelian (idProduk,idPengguna,tarikh,masa)
            VALUES(
            '$idProduk',
            '$idPengguna',
            '$tarikh',
            '$masa')";
        $result = mysqli_query($conn,$sql2);

        #memaparkan sama ada berjaya
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
} else {
    header("Location: ../index.php?ralat=aksestidakdibenarkan");
}

?>