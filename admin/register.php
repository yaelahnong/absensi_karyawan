<?php 

    require 'functions.php';
    // session_start();

    // if(!isset($_SESSION['admin'])) {
    //     header("Location: login.php");
    // }

    if(isset($_POST['register'])) {
        
        if(registrasi($_POST) > 0) {
            echo "<script>alert('Success!');</script>";
        } else {
            echo "<script>alert('Failed!');</script>";
        }

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

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <!-- <div class="home-btn d-none d-sm-block">
            <a href="index.php" class="text-white"><i class="fas fa-home h2"></i></a>
        </div> -->
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <!-- <div class="text-center m-t-0 m-b-15">
                                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-dark.png" alt="" height="24"></a>
                        </div>
                        <h5 class="font-18 text-center">Register</h5> -->
    
                        <form class="form-horizontal m-t-20" method="post" enctype="multipart/form-data">

                                <!-- <div class="form-group">
                                        <div class="col-12">
                                                <label>Email</label>
                                            <input class="form-control" type="text" required="" placeholder="Email">
                                        </div>
                                    </div> -->
                            <input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s'); ?>">
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Username</label>
                                    <input class="form-control" type="text" name="username" required="" placeholder="Username">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Password</label>
                                    <input class="form-control" type="password" name="password" required="" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12">
                                        <input name="photo" type="file" multiple="multiple">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12">
                                    <label>User Level</label>
                                    <select class="form-control" name="akses">
                                        <option value="1">Admin</option>
                                        <option value="2">Project Manager</option>
                                        <option value="3">Lead Department</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <!-- <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label font-weight-normal" for="customCheck1">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                                            </div> -->
                                </div>
                            </div>
    
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button name="register" class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>
    
                            <!-- <div class="form-group mb-0 row">
                                <div class="col-12 m-t-10 text-center">
                                    <a href="pages-login.html" class="text-muted">Already have account?</a>
                                </div>
                            </div> -->
                        </form>
                    </div>
    
                </div>
            </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metismenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        
    </body>

</html>