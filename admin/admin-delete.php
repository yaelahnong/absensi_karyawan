<?php 
    session_start();
    require_once('functions.php');
    
    if(isset($_SESSION['admin'])) {
        if($_SESSION['admin']['id_akses'] == 0 || $_SESSION['admin']['id_akses'] == 1) {

        } else {
            header("Location: index.php");
            exit;
        }
    } else {
        header("Location: login.php");
        exit;
    }
    
    if(isset($_GET['id'])) {
        $id_admin = $_GET['id'];
    } else {
        header("Location: admin.php");
    }

    if(hapus_admin($id_admin) > 0) {
        header("Location: admin.php");
    } else {
        header("Location: admin.php");
    }


?>