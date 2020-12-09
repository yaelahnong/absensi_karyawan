<?php 
session_start();
require_once('functions.php');
if(isset($_SESSION['admin'])) {
        $id_akses = $_SESSION['admin']['id_akses'];
    }
        if(isset($_GET['id'])) {
            $id_overtime = $_GET['id'];
      } else {
            header("Location: overtime");
        }
    @$overtime_approve = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses AND deskripsi = 'overtime_approve' AND akses.id_akses = hak_akses.id_akses")[0];

    if(!$overtime_approve) {
        header("Location: index");
    } else {
      if(approve_overtime($id_overtime) > 0) {
        header("Location: overtime");
    } else {
        header("Location: overtime");
    }
}
?>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>