<?php
include '../config.php';

if (!empty($_GET['produk'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];

    $sql = "UPDATE produk SET nama_produk='$nama', harga='$harga', gambar='$gambar' WHERE id='$id'";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        header('Location: ../produk.php');
    } else {
        header('Location: edit.php?status=gagal');
    }
}
