<?php 
    require_once('functions.php');


    if(isset($_GET['id'])) {
        $id_department = $_GET['id'];
    } else {
        header("Location: department.php");
    }

    if(hapus_department($id_department) > 0) {
        header("Location: department.php");
    } else {
        header("Location: department.php");
    }
?>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>