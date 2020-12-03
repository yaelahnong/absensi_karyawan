<?php 
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
?>

<footer class="footer">
    © 2020 ABSENSI <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Kelompok E</span>
</footer>