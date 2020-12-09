<?php 
    session_start();
    require_once('functions.php');
  
    if(isset($_SESSION['admin'])) {
        $id_akses = $_SESSION['admin']['id_akses'];
    }

        if(isset($_GET['id'])) {
            $id_cuti = $_GET['id'];
    }  else {
            header("Location: leave");
    }

    @$leave_approve = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses AND deskripsi = 'leave_approve' AND akses.id_akses = hak_akses.id_akses")[0];

    if(!$leave_approve) {
        header("Location: index");
    } else {
        if(approve_leave($id_cuti) > 0) {
            header("Location: leave");
        } else {
            header("Location: leave");
    }
}
?>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>