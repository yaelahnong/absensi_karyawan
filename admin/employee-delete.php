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
        $id_user = $_GET['id'];
    } else {
        header("Location: employee");
    }

    if(hapus_employee($id_user) > 0) {
        header("Location: employee");
    } else {
        header("Location: employee");
    }


?>