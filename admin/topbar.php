<!-- Top Bar Start -->
<div class="topbar">

<!-- LOGO -->
<div class="topbar-left">
    <a href="index.php" class="logo">
        <span class="logo-light">
            <i class="mdi mdi-qrcode-scan"></i> Absensi
        </span>
        <span class="logo-sm">
            <i class="mdi mdi-qrcode-scan"></i>
        </span>
    </a>
</div>

<nav class="navbar-custom">
    <ul class="navbar-right list-inline float-right mb-0">

        <!-- full screen -->
        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                <i class="mdi mdi-arrow-expand-all noti-icon"></i>
            </a>
        </li>

        <li class="dropdown notification-list list-inline-item">
            <div class="dropdown notification-list nav-pro-img">
                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/users/<?= $_SESSION['admin']['photo']; ?>" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item">
                        <div class="d-flex">
                            <div>
                                <img src="assets/images/users/<?= $_SESSION['admin']['photo']; ?>" alt="user" width="45px" class="rounded-circle">
                            </div>
                            <div class="pl-2">
                                <span class="mt-0 profile-name font-weight-bold text-capitalize"><?= $_SESSION['admin']['nama']; ?></span>
                                <span class="d-block text-muted">
                                    <?php 
                                        if($_SESSION['admin']['id_akses'] == 0) {
                                            echo "Super Admin";
                                        } else if($_SESSION['admin']['id_akses'] == 1) {
                                            echo "Admin";
                                        } else if($_SESSION['admin']['id_akses'] == 2) {
                                            echo "Lead Department";
                                        } else if($_SESSION['admin']['id_akses'] == 3) {
                                            echo "Project Manager";
                                        }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-wallet"></i> My Wallet</a>
                    <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline"></i> Lock screen</a> -->
                    <div class="dropdown-divider"></div>
                    <a id="logout-btn" class="dropdown-item btn text-danger"><i class="mdi mdi-power text-danger"></i> Logout</a>
                </div>
            </div>
        </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
        <!-- <li class="d-none d-md-inline-block">
            <form role="search" class="app-search">
                <div class="form-group mb-0">
                    <input type="text" class="form-control" placeholder="Search..">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </li> -->
    </ul>

</nav>

</div>
<!-- Top Bar End -->

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>
<!-- <script src="assets/js/sweetalert2.all.min.js"></script> -->
<!-- <script src="assets/pages/sweet-alert.init.js"></script>  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(document).ready(function() {
        $('#logout-btn').on('click', function() {
            swal.fire({
                    title: 'Are you sure?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Logout',
                }).then((result) => {
                    if(result.isConfirmed) {
                        window.location.href = 'logout.php';
                    }
                });
        })
    });
</script>