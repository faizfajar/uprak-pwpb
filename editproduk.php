<?php
include 'config.php'; //memanggil file koneksi

$id = $_GET['id'];
// $sql = "SELECT * FROM produk WHERE id='$id'";
$sql = "SELECT produk.*, jenis_produk.* FROM produk LEFT JOIN jenis_produk ON jenis_produk.id_jenis=produk.jenis_id WHERE id=$id";
$query = mysqli_query($connect, $sql);
$produk = mysqli_fetch_assoc($query);


if (mysqli_num_rows($query) < 1) {
    die("data tidak ditentukan...");
}
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
    <title>Update Produk</title>
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
                        <h4 class="page-title">Update Produk <span class="h3 yellowmekdi bg-dark p-1"><?php echo $produk['nama_produk'] ?></span></h4>
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
                <div class="card">
                    <div class="card-body px-5">
                        <form action="fungsi/edit.php?produk=edit" method="POST">
                            <div class="form-group row">
                                <input type="hidden" name="id" value="<?php echo $produk['id'] ?>" />

                                <label for="nama" class="col-sm-3 col-form-label">Nama Produk </label>
                                <div class="col-sm-1 mt-2">:</div>
                                <div class="col-sm-8">
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $produk['nama_produk'] ?>" placeholder="nama produk">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="col-sm-3 col-form-label">Harga Produk </label>
                                <div class="col-sm-1 mt-2">:</div>
                                <div class="col-sm-8">
                                    <input type="number" name="harga" class="form-control" id="harga" value="<?php echo $produk['harga'] ?>" placeholder="harga produk">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-1 mt-2">:</div>
                                <div class="col-sm-8">
                                    <input type="text" name="gambar" class="form-control" id="gambar" value="<?php echo $produk['gambar'] ?>" placeholder="gambar">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="produk.php" class="btn btn-info p-1 px-3"><i class="fas fa-arrow-left mr-3"></i>Back</a>
                                <input type="submit" class="btn bg-red text-white p-1 px-3" value="Save" name="produk">
                            </div>
                        </form>
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

</body>

</html>