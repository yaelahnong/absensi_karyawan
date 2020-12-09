<?php 
    require 'functions.php';
    session_start();

    if(isset($_GET['id'])) {
        $id_akses= $_GET['id'];
    } else {
        header("user-level");
    }

    if(!isset($_SESSION['admin'])) {
        header("Location: login");
    } else {
        $id_akses_admin = $_SESSION['admin']['id_akses'];
    }


    @$user_description = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'user_description' AND akses.id_akses = hak_akses.id_akses")[0];

    if(!$user_description) {
        header("Location: index");
    }


    $h_akses = query("SELECT * FROM akses, hak_akses WHERE akses.id_akses = $id_akses AND akses.id_akses = hak_akses.id_akses ORDER BY hak_akses.id_hak_akses DESC");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>ABSENSI | User Description</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Sweetalert -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
        <script src="assets/js/sweetalert2.all.min.js"></script>

        <!-- DataTables -->
        <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                                    <h4 class="page-title">User Description</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Absensi</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">User Management</a></li>
                                        <li class="breadcrumb-item"><a href="user-level">User level</a></li>
                                        <li class="breadcrumb-item active">User Description</li>
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
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6"></div>
                                                <div class="col-sm-12 col-md-6 text-right mb-2 pb-1">
                                                    <a class="btn btn-primary text-light" href="user-description-add?id=<?= $id_akses ?>">[+] Add Description</a>
                                                </div>
                                            </div>
                                        </div>
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Created at</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $i= 1; ?> 
                                                <?php foreach($h_akses as $row) : ?>
                                            <tr>

                                                <td><?= $row['deskripsi']; ?></td>
                                                <td><?= $row['created_at']; ?></td>
                                                <td>

                                                    <?php
                                                    $level = $_SESSION['admin']['id_akses'];
                                                    if($level == 0  ) : ?>
                                                    <a onclick="popupDelete(<?= $row['id_hak_akses']; ?>)" class="btn btn-danger btn-sm rounded-0 text-light"><i class="mdi mdi-trash-can-outline mdi-18px"></i></a>
                                                    <?php endif; ?>
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

        <!-- Parsley js -->
        <script src="../plugins/parsleyjs/parsley.min.js"></script>

        <!-- Sweet-Alert  -->
        <script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="assets/js/sweetalert2.all.min.js"></script>

        <!-- Required datatable js -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>   


        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
            function popupDelete(id_hak_akses) {
                swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if(result.isConfirmed) {
                        swal.fire({
                            title: 'Deleted!',
                            text: 'Description has been deleted.',
                            icon: 'success'
                        }).then((result) => {
                            if(result.isConfirmed) {
                                window.location.href=`user-description-delete?id=${id_hak_akses}`;
                            }
                        })
                    } else if(result.isDismissed) {

                    }
                });
            }

            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

        
    </body>

</html>