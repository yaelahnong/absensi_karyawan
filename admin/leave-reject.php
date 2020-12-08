<?php 
    require_once('functions.php');


    if(isset($_GET['id'])) {
        $id_cuti = $_GET['id'];
    } else {
        header("Location: leave");
    }

    if(reject_leave($id_cuti) > 0) {
        header("Location: leave");
    } else {
        header("Location: leave");
    }
?>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>