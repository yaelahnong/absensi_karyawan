<?php 
    session_start();
    require_once('functions.php');
    
     if (isset($_SESSION['admin'])) {
        $id_akses = $_SESSION['admin']['id_akses'];
    }

    if(isset($_GET['id'])) {
        $id_admin = $_GET['id'];
    } else {
        header("Location: user");
    }

    @$user_delete = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses AND deskripsi = 'user_delete' AND akses.id_akses = hak_akses.id_akses")[0];

    if(!$user_delete) {
        header("Location: index");
    } else {
        if(hapus_user($id_admin) > 0) {
            header("Location: user");
        } else {
            header("Location: user");
        }
    }

?>