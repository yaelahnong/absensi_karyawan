<?php 
    require 'functions.php';
    session_start();

    if(!isset($_SESSION['admin'])) {
        header("Location: login");
    } else {
        $id_akses = $_SESSION['admin']['id_akses'];
    }

    @$leave_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses AND deskripsi = 'leave' AND akses.id_akses = hak_akses.id_akses")[0]; 

    if(!$leave_menu) {
        header("Location: index");
    }
      
    $v_leave = query("SELECT cuti.id_cuti, user.nip, user.nama, akses.ket_akses, cuti.tanggal_mulai, cuti.tanggal_selesai, cuti.ket_cuti, cuti.status 
        FROM user, akses, cuti
        WHERE user.id_user = cuti.id_user 
        AND akses.id_akses = user.id_akses
        ORDER BY id_cuti DESC
        ");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>ABSENSI | Leave</title>
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
                                <h4 class="page-title">Leave</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Absensi</a></li>
                                    <li class="breadcrumb-item"><a href="leave">Transaction</a></li>
                                    <li class="breadcrumb-item active">Leave</li>
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
                                                    <th scope="col">Start Date</th>
                                                    <th scope="col">End Date</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Status</th>
                                                    <?php if($_SESSION['admin']['id_akses'] == 0 || $_SESSION['admin']['id_akses'] == 2 ): ?>
                                                    <th scope="col">Action</th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php foreach($v_leave as $row): ?>
                                                <tr>
                                                    <td><?= $row['nip']; ?></td>
                                                    <td><?= $row['nama']; ?></td>
                                                    <td><?= $row['ket_akses']; ?></td>
                                                    <td><?= $row['tanggal_mulai']; ?></td>
                                                    <td><?= $row['tanggal_selesai']; ?></td>
                                                    <td><?= $row['ket_cuti']; ?></td>
                                                    <td><?= $row['status']; ?></td>
                                                    <?php if($_SESSION['admin']['id_akses'] == 0 || $_SESSION['admin']['id_akses'] == 2): ?>
                                                    <td>
                                                        <?php if($row['status'] == 'pending'): ?>
                                                        <a onclick="popupApprove(<?= $row['id_cuti']; ?> )" class="btn btn-success btn-sm rounded-0 text-light"><i class="mdi mdi-check mdi-18px"></i></a>
                                                        <a onclick="popupReject(<?= $row['id_cuti']; ?>)" class="btn btn-danger btn-sm rounded-0 text-light"><i class="mdi mdi-close mdi-18px"></i></a>
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
            function popupApprove(id_cuti) {
                swal.fire({
                    title: 'Are you sure?',
                    text: 'You sure approve with this leave',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Approve it!',
                }).then((result) => {
                    if(result.isConfirmed) {
                        swal.fire({
                            title:'Approve!',
                            text: 'Leave has been Approved.',
                            icon: 'success'
                      }).then((result) => {
                            if(result.isConfirmed) {
                                window.location.href=`leave-approve?id=${id_cuti}`;
                            }
                        })
                    } else if(result.isDismissed) {

                    }
                });
            }

            function popupReject(id_cuti) {
                swal.fire({
                    title: 'Are you sure?',
                    text: 'You sure reject with this leave',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, reject it!',
                }).then((result) => {
                    if(result.isConfirmed) {
                        swal.fire({
                            title:'Reject!',
                            text: 'Leave has been Rejectend.',
                            icon: 'success'
                      }).then((result) => {
                            if(result.isConfirmed) {
                                window.location.href=`leave-reject?id=${id_cuti}`;
                            }
                        })
                    } else if(result.isDismissed) {

                    }
                });
            }
        </script>
</body>

</html>
