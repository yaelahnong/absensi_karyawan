<?php 
    require_once('functions.php');


    if(isset($_GET['id'])) {
        $id_user = $_GET['id'];
    } else {
        header("Location: user.php");
    }

    if(hapus_user($id_user) > 0) {
        header("Location: user.php");
    } else {
        header("Location: user.php");
    }
?>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>