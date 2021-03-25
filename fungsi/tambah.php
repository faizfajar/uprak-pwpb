<?php
include '../config.php';
if (!empty($_GET['produk'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $jenis = $_POST['jenis'];

    $insert = "INSERT INTO `produk` (`nama_produk`, `harga`, `gambar`, `jenis_id`) VALUES ('$nama', '$harga', '$gambar', '$jenis'); ";

    $query = mysqli_query($connect, $insert);

    if ($query) {
        header('Location: ../produk.php');
    } else {
        header('Location: tambah.php?status=gagal');
    }
}
