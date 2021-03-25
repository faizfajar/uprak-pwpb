<?php
$host = "localhost";
$user = "root"; //user pada phpmyadmin
$password = "";
$database = "uprakphp"; //namadatabase
$connect = mysqli_connect($host, $user, $password, $database) or
    die("Gagal menghubungkan"); //mengecek apakah sudah terkoneksi dengan database 