<?php 
    require_once('functions.php');
    session_start();

    if (isset($_SESSION['admin'])) {
        $id_akses_admin = $_SESSION['admin']['id_akses'];
    }

    if(isset($_GET['id'])) {
        $id_department = $_GET['id'];
    } else {
        header("Location: department");
    }

    @$department_delete = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'department_delete' AND akses.id_akses = hak_akses.id_akses")[0];

    if(!$department_delete) {
        header("Location: index");
    } else {
        if(hapus_department($id_department) > 0) {
            header("Location: department");
        } else {
            header("Location: department");
        }
    }


?>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>