<?php 
    require 'functions.php';
    session_start();

    if(isset($_SESSION['admin'])) {
        if($_SESSION['admin']['id_akses'] == 0 || $_SESSION['admin']['id_akses'] == 1) {
        } else {
            header("Location: index.php");
            exit;
        }
    } else {
        header("Location: login.php");
        exit;
    }

    $user = query("SELECT user.*, akses.ket_akses, department.ket_department 
                    FROM user, akses, department 
                    WHERE akses.id_akses = user.id_akses AND department.id_department = user.id_department ORDER BY id_user DESC");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>user management</title>
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
                                    <h4 class="page-title">User List</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Absensi</a></li>
                                        <li class="breadcrumb-item active">User List</li>
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
                                                    <a class="btn btn-primary text-light" href="user-add.php">[+] Add User</a>
                                                </div>
                                            </div>
                                        </div>

        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Employee ID Number</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Department</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Address</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th>Image</th>
                                                <th>Created at</th>
                                                <th>Updated at</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php foreach($user as $row) : ?>
                                            <tr>
                                                <td><?= $row['nip']; ?></td>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['ket_akses']; ?></td>
                                                <td><?= $row['ket_department']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['no_telp']; ?></td>
                                                <td><?= $row['alamat']; ?></td>
                                                <td><?= $row['jenis_kelamin'] == 'laki-laki' ? 'Male' : 'Female'; ?></td>
                                                <td><?= $row['status']; ?></td>
                                                <td><img src="assets/images/users/<?= $row['foto'];?>" width="50px"></td>
                                                <td><?= $row['created_at']; ?></td>
                                                <td><?= $row['updated_at']; ?></td>
                                                <td>
                                                <?php
                                                    $level = $_SESSION['admin']['id_akses'];
                                                    if($level == 0 || $level == 1 ) : ?>
                                                    <a class="btn btn-warning btn-sm rounded-0 text-light" href="user-edit.php?id=<?= $row['id_user']; ?>"><i class="mdi mdi-square-edit-outline mdi-18px"></a></i>
                                                    <a onclick="popupDelete(<?= $row['id_user']; ?>)" class="btn btn-danger btn-sm rounded-0 text-light"><i class="mdi mdi-trash-can-outline mdi-18px"></i></a>
                                                <?php endif; ?>
                                                </td>
                                            </tr>

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
        <script src="assets/js/sweetalert2.all.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>   

        <!-- App js --> 
        <script src="assets/js/app.js"></script>

        <script>
            function popupDelete(id_user) {
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
                            text: 'Your file has been deleted.',
                            icon: 'success'
                        }).then((result) => {
                            if(result.isConfirmed) {
                                window.location.href=`user-delete.php?id=${id_user}`;
                            }
                        })
                    } else if(result.isDismissed) {

                    }
                });
            }
        </script>
        
    </body>

</html>