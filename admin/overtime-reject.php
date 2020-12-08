<?php 
    session_start();
    require_once('functions.php');
    if($_SESSION['admin']['id_akses'] == 0 || $_SESSION['admin']['id_akses'] == 2) {
        if(isset($_GET['id'])) {
            $id_overtime = $_GET['id'];
        } else {
            header("Location: overtime");
        }
    
        if(reject_overtime($id_overtime) > 0) {
            header("Location: overtime");
        } else {
            header("Location: overtime");
        }
    } else {
        header("Location: overtime");
    }

?>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>