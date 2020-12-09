<?php 
    require 'functions.php';
    session_start();

    if(!isset($_SESSION['admin'])) {
        header("Location: login");
    } else {
        $id_akses = $_SESSION['admin']['id_akses'];

    if(isset($_GET['id'])) {
        $id_overtime = $_GET['id'];
    } else {
        header("overtime");
    }

    @$overtime_edit = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses AND deskripsi = 'overtime_edit' AND akses.id_akses = hak_akses.id_akses")[0]; 

     if(!$overtime_edit) {
        header("Location: index");
    }

    $overtime = query("SELECT overtime.id_overtime, user.nip, user.nama, akses.ket_akses, overtime.jam_mulai, overtime.jam_selesai, overtime.ket_overtime, overtime.tanggal, overtime.status 
        FROM user, akses, overtime
        WHERE user.id_user = overtime.id_user 
        AND akses.id_akses = user.id_akses
        ORDER BY id_overtime DESC")[0];
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>ABSENSI | Overtime Revision</title>
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
            if(isset($_POST['ubah_overtime'])) {
                if(ubah_overtime($_POST) > 0) {
                    echo "<script>Swal.fire({
                        title: 'Success!',
                        text: 'Edit overtime success',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {window.location.href='overtime';} )</script>";
                } else {
                    echo "<script>Swal.fire({
                        title: 'Failed!',
                        text: 'Edit data failed',
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
                                    <h4 class="page-title">Ubah Overtime</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Absensi</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Transaction</a></li>
                                        <li class="breadcrumb-item"><a href="overtime">Overtime</a></li>
                                        <li class="breadcrumb-item active">Ubah Overtime</li>
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
        
                                        <form method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id_overtime" value="<?= $overtime['id_overtime']; ?>">
                                            <input type="hidden" name="updated_at" value="<?= date('Y-m-d H:i:s'); ?>">
                                            <div class="form-group">
                                                <label>Employee ID Number</label>
                                                <input type="text" name="nip" value="<?= $overtime['nip']; ?>" class="form-control" required placeholder="Nomor Induk Pegawai" readonly/>
                                            </div>

                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" name="nama" value="<?= $overtime['nama']; ?>" class="form-control" required placeholder="Full Name" readonly />
                                            </div>

                                            <div class="form-group">
                                                <label>Position</label>
                                                <input type="text" name="akses" value="<?= $overtime['ket_akses']; ?>" class="form-control" required placeholder="Full Name" readonly />
                                            </div>

                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <div>
                                                    <input type="time" name="jam_mulai" value="<?= $overtime['jam_mulai']; ?>" class="form-control" required
                                                    placeholder=""/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Start End</label>
                                                <div>
                                                    <input type="time" name="jam_selesai" value="<?= $overtime['jam_selesai']; ?>" class="form-control" required placeholder=""/>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Description</label>
                                                <div>
                                                    <textarea required name="ket_overtime" class="form-control" rows="5"><?= $overtime['ket_overtime']; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Date</label>
                                                <div>
                                                    <input type="date" name="tanggal" value="<?= $overtime['tanggal']; ?>" class="form-control" required placeholder=""/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" name="ubah_overtime" class="btn btn-primary waves-effect waves-light">
                                                        Submit
                                                    </button>
                                                    <a href="overtime" class="btn btn-secondary waves-effect m-l-5 text-light">
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