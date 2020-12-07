<?php 

    require 'functions.php';
    session_start();

    if(isset($_SESSION['admin'])) {
        header("Location: index.php");
    }

    if(isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");

        if(mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['password'])) {
                $_SESSION['admin'] = $row;

                header("Location: index.php");
                exit;
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Absensi Karyawan</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <!-- <link href="assets/css/style.css" rel="stylesheet" type="text/css"> -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
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
                        <h5 class="font-18 text-center">Sign in to continue to Stexo.</h5> -->
    
                        <form class="form-horizontal m-t-10" method="post">
    
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
    
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button name="login" class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
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