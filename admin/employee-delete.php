<?php 
    session_start();
    require_once('functions.php');

    if(!isset($_SESSION['admin'])) {
        header("Location: login");
        exit;
    } else {
        $id_akses_admin = $_SESSION['admin']['id_akses'];
    }

    @$employee_delete = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'employee_delete' AND akses.id_akses = hak_akses.id_akses")[0];
    
    if($employee_delete) {
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
    } else {
        header("Location: index");
    }

    


?>