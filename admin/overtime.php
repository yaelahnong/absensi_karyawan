<?php 
    require 'functions.php';
    session_start();

    if(!isset($_SESSION['admin'])) {
        header("Location: login.php");
    }

    $v_overtime = query("SELECT overtime.id_overtime, user.nip, user.nama, akses.ket_akses, overtime.jam_mulai, overtime.jam_selesai, overtime.ket_overtime, overtime.tanggal, overtime.status 
        FROM user, akses, overtime
        WHERE user.id_user = overtime.id_user 
        AND akses.id_akses = user.id_akses
        ORDER BY id_overtime DESC
        ");
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

    <!-- DataTables -->
    <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweetalert CSS -->
    <link href="../plugins/sweet-alert2/sweetalert2.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                                    <li class="breadcrumb-item active">Overtime</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <!-- START ROW -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                    <th scope="col">Employee ID Number</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Start Time</th>
                                                    <th scope="col">Leave Time</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <?php if($_SESSION['admin']['id_akses'] == 0 || $_SESSION['admin']['id_akses'] == 2 || $_SESSION['admin']['id_akses'] == 3 ): ?>
                                                    <th scope="col">Action</th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php foreach($v_overtime as $row): ?>
                                                <tr>
                                                    <td><?= $row['nip']; ?></td>
                                                    <td><?= $row['nama']; ?></td>
                                                    <td><?= $row['ket_akses']; ?></td>
                                                    <td><?= $row['jam_mulai']; ?></td>
                                                    <td><?= $row['jam_selesai']; ?></td>
                                                    <td><?= $row['ket_overtime']; ?></td>
                                                    <td><?= $row['tanggal']; ?></td>
                                                    <td><?= $row['status']; ?></td>
                                                    <?php if($_SESSION['admin']['id_akses'] == 0 || $_SESSION['admin']['id_akses'] == 2 || $_SESSION['admin']['id_akses'] == 3 ): ?>
                                                    <td>
                                                        <?php if($_SESSION['admin']['id_akses'] == 0 || $_SESSION['admin']['id_akses'] == 2): ?>
                                                            <?php if($row['status'] == 'pending'): ?>
                                                        <a onclick="popupApprove(<?= $row['id_overtime']; ?>)" class="btn btn-success btn-sm rounded-0 text-light"><i class="mdi mdi-check mdi-18px"></i></a>
                                                        <a onclick="popupReject(<?= $row['id_overtime']; ?> )" class="btn btn-danger btn-sm rounded-0 text-light"><i class="mdi mdi-close mdi-18px"></i></a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php if($_SESSION['admin']['id_akses'] == 0 || $_SESSION['admin']['id_akses'] == 3): ?>
                                                            <?php if($row['status'] == 'approved' || $row['status'] == 'rejected'): ?>
                                                        <a class="btn btn-warning btn-sm rounded-0 text-light" href="overtime-edit.php?id=<?= $row['id_overtime']; ?>"><i class="mdi mdi-square-edit-outline mdi-18px"></a></i>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <?php endif; ?>
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

    <!-- Sweet-Alert  -->
    <script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>
    <!-- <script src="assets/js/sweetalert2.all.min.js"></script> -->
    <!-- <script src="assets/pages/sweet-alert.init.js"></script>  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!--Morris Chart-->
    <!-- <script src="../plugins/morris/morris.min.js"></script> -->
    <!-- <script src="../plugins/raphael/raphael.min.js"></script> -->

    <!-- <script src="assets/pages/dashboard.init.js"></script> -->
    
    <!-- Datatable init js -->
    <script src="assets/pages/datatables.init.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script> 

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <script>
            function popupApprove(id_overtime) {
                swal.fire({
                    title: 'Are you sure?',
                    text: 'You sure approve with this overtime!',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Approve it!',
                }).then((result) => {
                    if(result.isConfirmed) {
                        swal.fire({
                            title:'Approve!',
                            text: 'File has been Approve.',
                            icon: 'success'
                    }).then((result) => {
                            if(result.isConfirmed) {
                                window.location.href=`overtime-approve.php?id=${id_overtime}`;
                            }
                        })
                    } else if(result.isDismissed) {

                    }
                });
            }

            function popupReject(id_overtime) {
                swal.fire({
                    title: 'Are you sure?',
                    text: 'You sure reject with this overtime!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, reject it!',
                }).then((result) => {
                    if(result.isConfirmed) {
                        swal.fire({
                            title:'Reject!',
                            text: 'File has been Rejectend.',
                            icon: 'success'
                    }).then((result) => {
                            if(result.isConfirmed) {
                                window.location.href=`overtime-reject.php?id=${id_overtime}`;
                            }
                        })
                    } else if(result.isDismissed) {

                    }
                });
            }
        </script>
</body>

</html>
