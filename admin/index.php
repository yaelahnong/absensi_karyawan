<?php 
    require 'functions.php';
    session_start();

    if(!isset($_SESSION['admin'])) {
        header("Location: login");
    }
    $jml_kehadiran = query("SELECT COUNT(tanggal) AS jumlah_kehadiran FROM absen")[0];
    $karyawan = query("SELECT COUNT(*) AS jumlah_karyawan FROM user")[0];
    $bulan = query("SELECT DATE_FORMAT(tanggal, '%M') AS bulan FROM absen GROUP BY date_format(tanggal, '%M') ORDER BY tanggal");
    $kehadiran = query("SELECT MONTH(tanggal) AS bulan, COUNT(*) AS jumlah_kehadiran FROM absen GROUP BY MONTH(tanggal)");
    $overtime = query("SELECT COUNT(ket_overtime) AS jumlah_overtime FROM overtime")[0];
    $late = query("SELECT COUNT(*) AS jumlah_telat FROM v_late WHERE cek = 1")[0];
    $alpa = query("SELECT  COUNT(keterangan) AS keterangan FROM absen WHERE keterangan = 'alpa'")[0];
    $izin = query("SELECT  COUNT(keterangan) AS keterangan FROM absen WHERE keterangan = 'izin'")[0];
    $sakit = query("SELECT COUNT(keterangan) AS keterangan FROM absen WHERE keterangan = 'sakit'")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Stexo - Responsive Admin & Dashboard Template | Themesdesign</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!--Morris Chart CSS -->
    <!-- <link rel="stylesheet" href="../plugins/morris/morris.css"> -->

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet" type="text/css">

</head>

<body>

        
    <!-- Begin page -->
    <div id="wrapper">

        <?php include 'topbar.php'; ?>

        <?php include 'sidebar.php'; ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Absensi</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <div class="row">

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-account-group bg-primary  text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">Employee</h5>
                                    </div>
                                    <h3 class="mt-4"><?= $karyawan['jumlah_karyawan'] ?></h3>
                                    <div class="progress mt-4" style="height: 4px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="text-muted mt-2 mb-0">Person<span class="float-right"></span></p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-format-list-bulleted-square bg-success text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">Attendance</h5>
                                    </div>
                                    <h3 class="mt-4"><?= $jml_kehadiran['jumlah_kehadiran']; ?></h3>
                                    <div class="progress mt-4" style="height: 4px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0"aria-valuemax="100"></div>
                                    </div>
                                    <p class="text-muted mt-2 mb-0">Person<span class="float-right"></span></p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-file-document-edit-outline bg-warning text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">Overtime</h5>
                                    </div>
                                    <h3 class="mt-4"><?= $overtime['jumlah_overtime']; ?></h3>
                                    <div class="progress mt-4" style="height: 4px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                 <p class="text-muted mt-2 mb-0">Person<span class="float-right"></span></p>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-clock-alert-outline bg-danger text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">Late</h5>
                                    </div>
                                    <h3 class="mt-4"><?= $late['jumlah_telat']; ?></h3>
                                    <div class="progress mt-4" style="height: 4px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="text-muted mt-2 mb-0">Person<span class="float-right"></span></p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->

                    <div class="row">
    
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Absensi</h4>
                                    <!-- <div id="morris-line-example" class="morris-charts" style="height: 300px; width:100%;"></div> -->
                                    <canvas id="canvas"></canvas>
    
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <!-- <div class="col-xl-4">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Donut Chart</h4>

                                    <div id="donut-example" class="morris-charts morris-chart-height"></div>

                                </div>
                            </div>
                        </div> -->
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
                <!-- container-fluid -->

            </div>
            <!-- content -->

            <?php include 'footer.php'; ?>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>

    <!--Morris Chart-->
    <script src="../plugins/morris/morris.min.js"></script>
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="assets/pages/morris.init.js"></script>  


    <script src="assets/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    
</body>

</html>
<script src="../plugins/chartjs/chart.min.js"></script>
<script>
    var ctx = document.getElementById('canvas').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: [<?php foreach($bulan as $bln) { echo "'" . $bln['bulan'] . "',"; } ?>],
            datasets: [{
                label: 'Attendance Count',
                borderColor: "#30419b",
                backgroundColor : "#30419b",
                data: [<?php foreach($kehadiran as $trs) { echo $trs['jumlah_kehadiran'] . ','; } ?>]
            }]
        },

        // Configuration options go here
        options: {}
    });


    Morris.Donut({
      element: 'donut-example',
      data: [
        {label: "Alpa", value: <?= $alpa['keterangan']; ?>},
        {label: "Izin", value: <?= $izin['keterangan']; ?>},
        {label: "Sakit", value: <?= $sakit['keterangan']; ?>}
      ],
      colors: ['#fcbe2d', '#30419b', '#02c58d']
    });

</script>
</html>