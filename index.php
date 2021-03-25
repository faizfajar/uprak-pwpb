<?php
ob_start();
session_start();
if (!isset($_SESSION['user_id'])) header("location:login.php");
include 'config.php'; //memanggil file koneksi
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/logo_mcd.png">
    <title>Selamat Datang </title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/mart.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include "layout/header.php" ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include "layout/sidebar.php" ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <?php
                        // mengambil data barang
                        $produk = mysqli_query($connect, "SELECT * FROM produk");

                        // menghitung data barang
                        $jumlah_produk = mysqli_num_rows($produk);

                        $produk = mysqli_fetch_array($produk);
                        ?>
                        <a href="produk.php">
                            <div class="card card-hover">
                                <div class="box bg-danger text-center">
                                    <h3 class="font-bold text-white">Total Produk</h3>
                                    <h6 class="text-white"><?php echo $jumlah_produk; ?></h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-lg-2 col-xlg-2">
                        <a href="">
                            <div class="card card-hover">
                                <div class="box bg-dark p-10 text-white text-center">
                                    <?php
                                    // mengambil data barang
                                    $makanan = mysqli_query($connect, "SELECT * FROM produk WHERE jenis_id = 1");

                                    // menghitung data barang
                                    $jumlah_makanan = mysqli_num_rows($makanan);
                                    ?>
                                    <h5 class="m-b-0 m-t-5"><?php echo $jumlah_makanan; ?></h5>
                                    <small class="font-light">Makanan</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xlg-2">
                        <div class="card card-hover">
                            <a href="">
                                <div class="box bg-dark p-10 text-white text-center">
                                    <?php
                                    // mengambil data barang
                                    $minuman = mysqli_query($connect, "SELECT * FROM produk WHERE jenis_id = 2");

                                    // menghitung data barang
                                    $jumlah_minuman = mysqli_num_rows($minuman);
                                    ?>
                                    <h5 class="m-b-0 m-t-5"><?php echo $jumlah_minuman; ?></h5>
                                    <small class="font-light">Minuman</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
</body>

</html>

<?php
mysqli_close($connect);
ob_end_flush();
?>