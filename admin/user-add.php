<?php 
    require 'functions.php';
    session_start();

    if(!isset($_SESSION['admin'])) {
        header("Location: login.php");
    }
        $department = query("SELECT * FROM department");
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
            if(isset($_POST['tambah_user'])) {
                if(tambah_user($_POST) > 0) {
                    echo "<script>Swal.fire({
                        title: 'Success!',
                        text: 'Tambah data berhasil',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {window.location.href='user.php';} )</script>";
                } else {
                    echo "<script>Swal.fire({
                        title: 'Error!',
                        text: 'Tambah data gagal',
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
                                    <h4 class="page-title">Tambah User</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Absensi</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                                        <li class="breadcrumb-item active">Tambah User</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
        
                                        <!-- <h4 class="mt-0 header-title">Validation type</h4>
                                        <p class="sub-title">Parsley is a javascript form validation
                                            library. It helps you provide your users with feedback on their form
                                            submission before sending it to your server.</p> -->
        
                                        <form method="post">
                                            <input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s'); ?>">
                                            <div class="form-group">
                                                <label>Employee ID Number</label>
                                                <input type="text" name="nip" class="form-control" required placeholder="Employee ID Number"/>
                                            </div>

                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" name="nama" class="form-control" required placeholder="Full Name"/>
                                            </div>

                                            <div class="form-group">
                                                <label>E-Mail</label>
                                                <div>
                                                    <input type="email" name="email" class="form-control" required
                                                           parsley-type="email" placeholder="Enter a valid e-mail"/>
                                                </div>
                                            </div>
        
                                            <div class="form-group">
                                                <label>Password</label>
                                                <div>
                                                    <input type="password" name="password" id="pass2" class="form-control" required
                                                    data-parsley-minlength="6"   placeholder="Password"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="password2" class="form-control" required
                                                data-parsley-minlength="6" data-parsley-equalto="#pass2"
                                                placeholder="Re-Type Password"/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <div class="form-check">
                                                <div class="row">
                                                    <div class="col-sm-2 col-md-1">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" checked>
                                                        <label class="form-check-label" for="laki-laki">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2 col-md-1">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan">
                                                        <label class="form-check-label" for="perempuan">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <div>
                                                    <textarea required name="alamat" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input data-parsley-type="number" required name="no_telp"
                                                class="form-control" type="tel" placeholder="08xxx" id="example-tel-input">
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input type="text" name="status" class="form-control" required placeholder="Status"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Position</label>
                                                <select class="form-control" name="akses">
                                                    <option value="4">Employee</option>
                                                    <option value="3">Project Manager</option>
                                                    <option value="2">Lead Department</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select class="form-control" name="department">
                                                <?php foreach($department as $row) : ?>
                                                    <option value="<?= $row['id_department']; ?>"><?= $row['ket_department']; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" name="tambah_user" class="btn btn-primary waves-effect waves-light">
                                                        Submit
                                                    </button>
                                                    <a href="user.php" class="btn btn-secondary waves-effect m-l-5 text-light">
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