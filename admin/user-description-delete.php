<?php 
    session_start();
    require_once('functions.php');
    
    if(isset($_SESSION['admin'])) {
        $id_akses = $_SESSION['admin']['id_akses'];
    }
    
    if(isset($_GET['id'])) {
        $id_hak_akses = $_GET['id'];
    } else {
        header("Location: user-level");
    }

    @$user_description_delete = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses AND deskripsi = 'user_description_delete' AND akses.id_akses = hak_akses.id_akses")[0];

    if(!$user_description_delete) {
        header("Location: index");
    } else {
        if(hapus_hak_akses($id_hak_akses) > 0) {
        echo "<script>window.history.back();</script>";
    } else {
        echo "<script>window.history.back();</script>";
    }
}

?>