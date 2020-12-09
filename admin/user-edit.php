<?php 
    require 'functions.php';
    session_start();

    if(!isset($_SESSION['admin'])) {
        header("Location: login");     
    } else {
        $id_akses = $_SESSION['admin']['id_akses'];
    }

    if(isset($_GET['id'])) {
        $id_admin = $_GET['id'];
    } else {
        header("user");
    }

     @$user_list_edit = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses AND deskripsi = 'user_list_edit' AND akses.id_akses = hak_akses.id_akses")[0];

    
    if(!$user_list_edit) {
        header("Location: index");
    }

    $user = query("SELECT * FROM admin WHERE id_admin = '$id_admin'")[0];
    $department = query("SELECT * FROM department");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>ABSENSI | Edit User</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Sweetalert -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
        <script src="assets/js/sweetalert2.all.min.js"></script>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet" type="text/css">

    </head>

    <body>

        <?php 
            if(isset($_POST['ubah_user'])) {
                if(ubah_user($_POST) > 0) {
                    echo "<script>Swal.fire({
                        title: 'Success!',
                        text: 'Edit user success',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {window.location.href='user';} )</script>";
                } else {
                    echo "<script>Swal.fire({
                        title: 'Failed!',
                        text: 'Edit user failed',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then(() => {window.history.back();} )</script>";
                }
            }
        ?>

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
                                    <h4 class="page-title">Edit User</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Absensi</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">User Management</a></li>
                                        <li class="breadcrumb-item"><a href="user">User List</a></li>
                                        <li class="breadcrumb-item active">Edit User</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                    <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card m-b-30">
                                        <div class="card-body">
        
                                        <!-- <h4 class="mt-0 header-title">Validation type</h4>
                                        <p class="sub-title">Parsley is a javascript form validation
                                            library. It helps you provide your users with feedback on their form
                                            submission before sending it to your server.</p> -->
        
                                        <form method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id_admin" value="<?= $user['id_admin']; ?>">
                                            <input type="hidden" name="gambarLama" value="<?= $user['photo']; ?>">
                                            <input type="hidden" name="updated_at" value="<?= date('Y-m-d H:i:s'); ?>">

                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" name="nama" value="<?= $user['nama']; ?>" class="form-control" required placeholder="Full Name"/>
                                            </div>
                                            <div class="from-grup">
                                                <label>Image</label><br>
                                                <img src="assets/images/users/<?= $user['photo'];?>" width="50px"><br>
                                                <div class="form-group"><br>
                                                <input name="photo" type="file">
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" name="ubah_user" class="btn btn-primary waves-effect waves-light">
                                                        Submit
                                                    </button>
                                                    <a href="employee" class="btn btn-secondary waves-effect m-l-5 text-light">
                                                        Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                                
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

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

        
    </body>

</html>