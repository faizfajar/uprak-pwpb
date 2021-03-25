<?php
ob_start();
session_start();
if (isset($_SESSION['username'])) header("location:index.php");
include 'config.php'; //memanggil file koneksi

if (isset($_POST['submit-login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $ketemu = mysqli_query($connect, "SELECT * from user WHERE username = '$username' AND password = '$password'");
    if (mysqli_fetch_row($ketemu) > 0) {
        $row_akun = mysqli_fetch_array($ketemu);
        $_SESSION['user_id'] = $row = ['id'];
        $_SESSION['user_username'] = $row = ['username'];
        header("location:index.php");
    } else {
        header("location:login.php?login-gagal");
    }
}
?>
<html>

<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
    <h3>Form Login</h3>
    <!-- notifikasi -->
    <br />
    <form method="POST" action="">
        <table border="1" class="text-center">
            <tr>
                <td class="form-label">Username</td>
                <td>:</td>
                <td class="form-control"><input type="text" name="username" placeholder="Username"></td>
            </tr>
            <tr>
                <td class="form-label">Password</td>
                <td>:</td>
                <td class="form-control"><input type="password" name="password" placeholder="Password"></td>
            </tr>

            <?php
            if (isset($_GET['logout-berhasil'])) { ?>
                <tr>
                    <td>
                        <div>
                            <p>Selamat, anda berhasil logout, Sampai jumpa!</p>
                        </div>
                    </td>
                </tr>
            <?php } ?>

            <?php
            if (isset($_GET['login-gagal'])) { ?>
                <tr>
                    <td>
                        <div>
                            <p> Maaf , Username / Password yang anda masukan salah</p>
                        </div>
                    </td>
                </tr>
            <?php } ?>

            <tr>
                <td><input type="submit" name="submit-login"></td>
            </tr>
        </table>
    </form>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>

<?php
mysqli_close($connect);
ob_end_flush();

?>