<?php
include '../config.php';
if (!empty($_GET['produk'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM produk WHERE id = $id";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        header('location: ../produk.php');
    } else {
        header('location: hapusproduk.php?status=gagal');
    }
}
