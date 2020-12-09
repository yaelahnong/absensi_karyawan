<?php 
    session_start();
    require_once('functions.php');
    
     if (isset($_SESSION['admin'])) {
        $id_akses = $_SESSION['admin']['id_akses'];
    }

    if(isset($_GET['id'])) {
        $id_user = $_GET['id'];
    } else {
        header("Location: user.php");
    }
    @$user_list_hapus = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses AND deskripsi = 'user_list_hapus' AND akses.id_akses = hak_akses.id_akses")[0];

    if(!$user_list_hapus) {
        header("Location: index.php");
    } else {
        if(hapus_user($id_user) > 0) {
            header("Location: user.php");
        } else {
            header("Location: user.php");
        }
    }

?>