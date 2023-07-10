<?php
if (isset($_SESSION['status'])){
    if ($_SESSION['status'] == "pengguna"){
        echo '
        <li id="page1"><a href="index.php">Menu Utama</a></li>
        <li id="page2"><a href="senarai_produk.php">Senarai Pengisar</a></li>
        <li id="page4"><a href="senarai_banding.php">Senarai Banding</a></li>
        <li id="page5"><a href="senarai_pilihan.php">Senarai Pilihan</a></li>
        <li id="page6"><a href="profil.php">Profil</a></li>
        <li id="page7"><a href="INC/logKeluar-inc.php">Log Keluar</a></li>
        ' ; 
    } else if ($_SESSION['status'] == "admin") {
        echo '
        <li id="page1"><a href="index.php">Menu Utama</a></li>
        <li id="page2"><a href="senarai_produk.php">Senarai Pengisar</a></li>
        <li id="page8"><a href="tambah_produk.php">Tambah Produk</a></li>
        <li id="page10"><a href="senarai_pilihan_pengguna.php">Senarai Pilihan Pengguna</a></li>
        <li id="page11"><a href="jenama.php">Senarai Jenama</a></li>
        <li id="page7"><a href="INC/logKeluar-inc.php">Log Keluar</a></li>
        ' ;
    }
} else {
    echo '
    <li id="page1"><a href="index.php">Menu Utama</a></li>
    <li id="page2"><a href="senarai_produk.php">Senarai Pangisar</a></li>
    <li id="page3"><a href="logMasuk.php">Log Masuk</a></li>
' ;
}
?>