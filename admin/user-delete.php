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
        $id_user = $_GET['id'];
    } else {
        header("Location: user.php");
    }

    if(hapus_user($id_user) > 0) {
        header("Location: user.php");
    } else {
        header("Location: user.php");
    }


?>