<?php 
    require_once('functions.php');


    if(isset($_GET['id'])) {
        $id_cuti = $_GET['id'];
    } else {
        header("Location: leave.php");
    }

    if(reject_leave($id_cuti) > 0) {
        header("Location: leave.php");
    } else {
        header("Location: leave.php");
    }
?>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>