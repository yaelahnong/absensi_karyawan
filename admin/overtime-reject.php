<?php 
    require_once('functions.php');


    if(isset($_GET['id'])) {
        $id_overtime = $_GET['id'];
    } else {
        header("Location: overtime.php");
    }

    if(reject_overtime($id_overtime) > 0) {
        header("Location: overtime.php");
    } else {
        header("Location: overtime.php");
    }
?>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>