<?php 
    require 'functions.php';
    session_start();

    if(!isset($_SESSION['admin'])) {
        header("Location: login.php");
    }

    $v_absen = query("SELECT absen.id_absen, user.nip, user.nama, user.foto, akses.ket_akses, akses.ket_akses, absen.jam_masuk, absen.jam_keluar, absen.tanggal, timediff(absen.jam_masuk, schedule.jam_masuk) > 0 AS keterangan
                        FROM user, absen, akses, schedule 
                        WHERE user.id_user = absen.id_user
                        AND akses.id_akses = user.id_akses AND absen.tanggal = curdate() 
                    ");
    $attendance = query("SELECT user.nip, user.nama, user.foto, akses.ket_akses, akses.ket_akses, absen.jam_masuk, absen.jam_keluar, absen.tanggal, timediff(absen.jam_masuk, schedule.jam_masuk) > 0 AS keterangan
                        FROM user, absen, akses, schedule 
                        WHERE user.id_user = absen.id_user
                        AND akses.id_akses = user.id_akses 
                    ");
    $maps = query("SELECT user.foto, absen.koordinat FROM user, absen WHERE user.id_user = absen.id_user");

    if(isset($_GET['id'])) {
        $id_absen = $_GET['id'];
        $maps = query("SELECT user.foto, absen.koordinat FROM user, absen WHERE absen.id_absen = $id_absen AND user.id_user = absen.id_user")[0];

        $data = explode(',', $maps['koordinat']);
    }


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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>

    <!-- DataTables -->
    <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--Morris Chart CSS -->
    <!-- <link rel="stylesheet" href="../plugins/morris/morris.css"> -->

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet" type="text/css">

    <style type="text/css">
        #mapid {
            height: 75vh;
            width: 180%;
        }

        .left-side {
            max-height: 75vh;
            overflow-y: scroll;
        }
        .alert{
            padding: 5px;
            width: 120px;
        }

    </style>
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
                                <h4 class="page-title">Attendance</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Absensi</a></li>
                                    <li class="breadcrumb-item active">Attendance</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <!-- START ROW -->
                    <div class="row pb-4">
                        <div class="col-xl-3 left-side">
                            <?php foreach($v_absen as $row): ?> 
                                <a href="attendance.php?id=<?= $row['id_absen'];?>">
                                    
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div>
                                                    <img class="rounded-circle" width="40px" height="40px" src="assets/images/users/<?= $row['foto'];?>"></img>
                                                </div>
                                                <div class="pl-3">  
                                                    <span><b><?= $row['nama']; ?></b></span>
                                                    <span class="d-block"><?= $row['ket_akses']; ?></span>
                                                </div>
                                            </div>
                                            <?php
                                                if($row['keterangan'] == 0):                                    
                                            ?>
                                            <div class="alert alert-success mt-3 text-center" role="alert">
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-alarm" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                                                </svg>
                                                <span class="pl-2">
                                                <?php 
                                                    $jam_masuk = strtotime($row['jam_masuk']);
                                                    echo date('H:i A', $jam_masuk);
                                                ?> 
                                                </span>                                   
                                            </div>
                                            <?php else: ?>
                                            <div class="alert alert-danger mt-3 text-center" role="alert">
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-alarm" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                                                </svg>
                                                <span class="pl-2">
                                                <?php 
                                                    $jam_masuk = strtotime($row['jam_masuk']);
                                                    echo date('H:i A', $jam_masuk);
                                                ?> 
                                                </span>                                   
                                            </div>
                                            <?php endif; ?>
                                            <?php
                                                if($row['jam_keluar']):
                                            ?>
                                            <div class="alert alert-success mt-3 text-center" role="alert">
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-alarm" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                                                </svg>
                                                <span class="pl-2">
                                                <?php 
                                                    $jam_keluar = strtotime($row['jam_keluar']);
                                                    echo date('H:i A', $jam_keluar);
                                                ?> 
                                                </span>                                   
                                            </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-xl-9">
                            <div id="mapid"></div>
                        </div>

                    </div><div class="row pb-4">
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                   <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                    <th scope="col">Employee ID Number</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Start</th>
                                                    <th scope="col">Leave</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php foreach($attendance as $row): ?>
                                                <tr>
                                                    <td><?= $row['nip']; ?></td>
                                                    <td><?= $row['nama']; ?></td>
                                                    <td><?= $row['ket_akses']; ?></td>
                                                    <td><?= $row['jam_masuk']; ?></td>
                                                    <td><?= $row['jam_keluar']; ?></td>
                                                    <td><?= $row['tanggal']; ?></td>
                                                </tr>

                                            <?php endforeach; ?>
                                            
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END ROW -->

                </div>
                <!-- container-fluid -->

            </div>
            <!-- content -->

            <footer class="footer">
                © 2019 - 2020 Stexo <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</span>.
            </footer>

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

    <!-- Required datatable js -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/datatables/jszip.min.js"></script>
    <script src="../plugins/datatables/pdfmake.min.js"></script>
    <script src="../plugins/datatables/vfs_fonts.js"></script>
    <script src="../plugins/datatables/buttons.html5.min.js"></script>
    <script src="../plugins/datatables/buttons.print.min.js"></script>
    <script src="../plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!--Morris Chart-->
    <!-- <script src="../plugins/morris/morris.min.js"></script> -->
    <!-- <script src="../plugins/raphael/raphael.min.js"></script> -->

    <!-- <script src="assets/pages/dashboard.init.js"></script> -->
    
    <!-- Datatable init js -->
    <script src="assets/pages/datatables.init.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script> 

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <script type="text/javascript">
        <?php if(isset($_GET['id'])): ?>
            var mymap = L.map('mapid').setView([<?= $data[0] . ', ' . $data[1]; ?>], 13);
        <?php else: ?>
            var mymap = L.map('mapid').setView([-6.338117, 106.741689], 13);
        <?php endif; ?>

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoicHVwdW9rdGF2aWEiLCJhIjoiY2tocHYzdjgwMDNuNjJ0bXNiZzV5ZWUzdiJ9.qB31-A5w3D7Mwq47EaGrXg'
        }).addTo(mymap);
        <?php if(isset($_GET['id'])): ?>
           var marker = L.marker([<?= $data[0] . ', ' . $data[1]; ?>]).addTo(mymap);
       <?php endif; ?>


    </script>
</body>
</html>