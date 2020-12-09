<?php 
    session_start();
    require_once('functions.php');
  
     if(isset($_SESSION['admin'])) {
        $id_akses = $_SESSION['admin']['id_akses'];
    }
        if(isset($_GET['id'])) {
            $id_overtime = $_GET['id'];
      } else {
            header("Location: overtime.php");
        }

    @$overtime_reject = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses AND deskripsi = 'overtime_reject' AND akses.id_akses = hak_akses.id_akses")[0];

    if(!$overtime_reject) {
        header("Location: index.php");
    } else {
    
        if(reject_overtime($id_overtime) > 0) {
            header("Location: overtime.php");
        } else {
            header("Location: overtime.php");
        }
    }
?>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>