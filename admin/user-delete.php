<?php 
    session_start();
    require_once('functions.php');
    
    if(isset($_SESSION['admin'])) {
        if($_SESSION['admin']['id_akses'] == 0 || $_SESSION['admin']['id_akses'] == 1) {

        } else {
            header("Location: index");
            exit;
        }
    } else {
        header("Location: login");
        exit;
    }
    
    if(isset($_GET['id'])) {
        $id_admin = $_GET['id'];
    } else {
        header("Location: user");
    }

    if(hapus_user($id_admin) > 0) {
        header("Location: user");
    } else {
        header("Location: user");
    }


?>