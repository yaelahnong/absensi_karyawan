<?php 
    require 'functions.php';
    session_start();

    if(!isset($_SESSION['admin'])) {
        header("Location: login");
    } else {
        $id_akses = $_SESSION['admin']['id_akses'];
    }

    @$schedule_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses AND deskripsi = 'schedule' AND akses.id_akses = hak_akses.id_akses")[0];

      if(!$schedule_menu) {
        header("Location: index");
    }

    $schedule = query("SELECT * FROM schedule");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>ABSENSI | Schedule Settings</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Sweetalert CSS -->
        <link href="../plugins/sweet-alert2/sweetalert2.css" rel="stylesheet" type="text/css">

        <!-- Responsive datatable examples -->
        <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <?php include('topbar.php'); ?>

            <?php include('sidebar.php'); ?>

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
                                    <h4 class="page-title">Schedule</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Absensi</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">App Settings</a></li>
                                        <li class="breadcrumb-item active">Schedule</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->
        
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
        
                                        <!-- <h4 class="mt-0 header-title">Buttons example</h4> -->
                                        <!-- <p class="sub-title../plugins">The Buttons extension for DataTables
                                            provides a common set of options, API methods and styling to display
                                            buttons on a page that will interact with a DataTable. The core library
                                            provides the based framework upon which plug-ins can built.
                                        </p> -->
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Check-in</th>
                                                <th>Check-out</th>
                                                <th>created_at</th>
                                                <th>updated_at</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
                                            <tbody>
                                                <?php $i= 1; ?> 
                                            <?php foreach($schedule as $row) : ?>
                                            <tr>

                                                <td><?= $row['jam_masuk']; ?></td>
                                                <td><?= $row['jam_keluar']; ?></td>
                                                <td><?= $row['created_at']; ?></td>
                                                <td><?= $row['updated_at']; ?></td>
                                                <td>
                                                    <a class="btn btn-warning btn-sm rounded-0 text-light" href="schedule-edit?id=<?= $row['id_schedule']; ?>"><i class="mdi mdi-square-edit-outline mdi-18px"></a></i>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                            
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div> <!-- end row -->   

                  </div>
                    <!-- container-fluid -->


                </div>
                <!-- content -->

                <?php include('footer.php'); ?>

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

        <!-- Sweet-Alert  -->
        <script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>
        <!-- <script src="assets/js/sweetalert2.all.min.js"></script> -->
        <!-- <script src="assets/pages/sweet-alert.init.js"></script>  -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>   

        <!-- App js --> 
        <script src="assets/js/app.js"></script>

        <script>

        </script>
        
    </body>

</html>