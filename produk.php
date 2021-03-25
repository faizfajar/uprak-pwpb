<?php
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
    <title>Produk</title>
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
                        <h3 class="page-title">Produk</h3>
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

                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link text-dark active" data-toggle="tab" href="#card" role="tab"><span class="hidden-sm-up"></span>
                                <h5 class="hidden-xs-down">Card</h5>
                            </a>
                        </li>
                        <li class="nav-item"> <a class="nav-link text-dark" data-toggle="tab" href="#table" role="tab"><span class="hidden-sm-up"></span>
                                <h5 class="hidden-xs-down">Table</h5>
                            </a>
                        </li>
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#tambahProduk">
                            <i class="fas fa-plus-square"></i>
                            Tambah Produk
                        </button>
                        <div class="modal fade" id="tambahProduk" tabindex="-1" aria-labelledby="tambahProdukLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark text-warning">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahProduk">Masukan Data Produk</h5>
                                    </div>
                                    <div class="modal-body bg-dark text-warning">
                                        <form action="fungsi/tambah.php?produk=tambah" method="POST">
                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-3 col-form-label" required>Nama Produk </label>
                                                <div class="col-sm-1 mt-2">:</div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="nama produk">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="harga" class="col-sm-3 col-form-label" required>Harga Produk </label>
                                                <div class="col-sm-1 mt-2">:</div>
                                                <div class="col-sm-8">
                                                    <input type="number" name="harga" class="form-control" id="harga" placeholder="harga produk">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="gambar" class="col-sm-3 col-form-label" required>Gambar</label>
                                                <div class="col-sm-1 mt-2">:</div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="gambar" class="form-control" id="gambar" placeholder="gambar">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jenis" class="col-sm-3 col-form-label" required>Jenis</label>
                                                <div class="col-sm-1 mt-2">:</div>
                                                <div class="col-sm-8">
                                                    <select name="jenis" class="form-control" id="jenis">
                                                        <option value="">-- Pilih --</option>
                                                        <?php
                                                        $jenisSql = "SELECT * FROM jenis_produk";
                                                        $jenisQuery = mysqli_query($connect, $jenisSql);
                                                        foreach ($jenisQuery as $jenis) { ?>
                                                            <option value="<?php echo $jenis['id_jenis'] ?>"><?php echo $jenis['jenis'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
                                                <input type="submit" class="btn bg-red text-white" value="Save" name="produk">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane active" id="card" role="tabpanel">
                            <div class="p-20">
                                <div class="list-produk mt-1">
                                    <div class="card-produk justify-content-center">
                                        <div id="listproduk">
                                            <?php
                                            $sql = "SELECT * FROM produk";
                                            $query = mysqli_query($connect, $sql);
                                            while ($produkCard = mysqli_fetch_array($query)) {
                                                // echo '<form action="fungsi/tambah.php?keranjang=tambah" method="POST">';
                                                echo '<button type="submit" name="keranjang" class="btn btn-light card float-lg-left mb-0">';
                                                echo '<input class="form-control" type="hidden" id="produk_id" name="produk_id" value="' . $produkCard['id'] . '">';
                                                echo '<input class="form-control" type="hidden" id="quantity" name="quantity" value="1">';
                                                echo '<input class="form-control" type="hidden" id="harga" name="harga" value="' . $produkCard['harga'] . '">';
                                                echo '<div class="card-body">';
                                                echo '<img src="img/' . $produkCard['gambar'] . '" alt="">';
                                                echo '<h5 class="mt-2">' . $produkCard['nama_produk'] . '</h5>';
                                                // echo '<span class="badge badge-dark">New</span>';
                                                echo '<h5 class="font-fira bg-red yellowmekdi p-1" id="hargaProduk">Rp. '  . number_format($produkCard['harga']) . '</h5>';
                                                echo '<div class="btn-group btn-group-sm" role="group">';
                                                echo '<a class="btn btn-outline-dark" href="editproduk.php?produk=edit&id=' . $produkCard['id'] . '"><i class="fas fa-edit"></i></a>';
                                                echo '<a class="btn btn-danger" href="fungsi/hapus.php?produk=hapus&id=' . $produkCard['id'] . '"><i class="fas fa-trash"></i></a>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</button>';
                                                echo '</form>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="table" role="tabpanel">
                            <div class="p-20">
                                <div class="card-produk justify-content-center">
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped text-center black">
                                            <thead>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Jenis</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $produkJoin = "SELECT produk.*, jenis_produk.* FROM produk LEFT JOIN jenis_produk ON jenis_produk.id_jenis=produk.jenis_id";
                                                $produkJoinQuery = mysqli_query($connect, $produkJoin);
                                                $number =  mysqli_num_rows($produkJoinQuery);

                                                if ($number > 0) {
                                                    foreach ($produkJoinQuery as $key => $produk) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo ++$key ?></td>
                                                            <td><?php echo $produk['nama_produk'] ?></td>
                                                            <td class="font-fira yellowmekdi">Rp . <?php echo number_format($produk['harga']) ?></td>
                                                            <td><?php echo $produk['jenis'] ?></td>
                                                            <td>
                                                                <?php

                                                                echo '<a class="btn btn-info" href="viewproduk.php?produk=view&id=' . $produk['id'] . '">View</a>';
                                                                echo '<a class="btn btn-success mx-2" href="editproduk.php?produk=edit&id=' . $produk['id'] . '"><i class="fas fa-edit"></i></a>';
                                                                ?>
                                                                <a class="btn btn-danger" href="fungsi/hapus.php?produk=hapus&id='<?php echo $produk['id'] ?>'">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } else { ?>
                                                    <tr>
                                                        <td colspan="5">No Data Found</td>
                                                    </tr>;
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
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