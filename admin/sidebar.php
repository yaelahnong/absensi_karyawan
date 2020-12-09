<?php   
    require_once('functions.php');

    if(isset($_SESSION['admin'])) {
        $id_akses_admin = $_SESSION['admin']['id_akses'];
    }


    @$dashboard_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'dashboard' AND akses.id_akses = hak_akses.id_akses")[0]; 
    @$transaction_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'transaction' AND akses.id_akses = hak_akses.id_akses")[0]; 
    @$attendance_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'attendance' AND akses.id_akses = hak_akses.id_akses")[0]; 
    @$overtime_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'overtime' AND akses.id_akses = hak_akses.id_akses")[0]; 
    @$leave_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'leave' AND akses.id_akses = hak_akses.id_akses")[0]; 
    @$master_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'master' AND akses.id_akses = hak_akses.id_akses")[0];
    @$department_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'department' AND akses.id_akses = hak_akses.id_akses")[0];
    @$user_management_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'user_management' AND akses.id_akses = hak_akses.id_akses")[0];
    @$user_list_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'user_list' AND akses.id_akses = hak_akses.id_akses")[0];
    @$user_level_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'user_level' AND akses.id_akses = hak_akses.id_akses")[0];
    @$settings_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'settings' AND akses.id_akses = hak_akses.id_akses")[0]; 
    @$address_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'address' AND akses.id_akses = hak_akses.id_akses")[0];
    @$schedule_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'schedule' AND akses.id_akses = hak_akses.id_akses")[0];
    @$master_menu = query("SELECT hak_akses.deskripsi FROM akses, hak_akses WHERE akses.id_akses = $id_akses_admin AND deskripsi = 'master' AND akses.id_akses = hak_akses.id_akses")[0];
    
 ?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>
                <?php if($dashboard_menu): ?>
                <li>
                    <a href="index.php" class="waves-effect">
                        <i class="icon-accelerator"></i><!-- <span class="badge badge-success badge-pill float-right">9+</span> --> <span> Dashboard </span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if($transaction_menu): ?>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-squares"></i><span> Transaction <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <?php if($attendance_menu): ?>
                        <li><a href="attendance.php">Attendance</a></li>
                        <?php endif; ?>
                        <?php if($overtime_menu): ?>
                        <li><a href="overtime.php">Overtime</a></li>
                        <?php endif; ?> 
                        <?php if($leave_menu): ?>
                        <li><a href="Leave.php">Leave</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php
                    if($master_menu): 
                ?>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-folder"></i><span> Master <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <?php if ($department_menu):  ?>
                        <li><a href="department.php">Department</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if($user_management_menu): ?>
                <li>
                <a href="javascript:void(0);" class="waves-effect"><i class="icon-profile"></i><span> User Management <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <?php if($user_list_menu): ?>
                        <li><a href="user.php">User List</a></li>
                        <?php endif; ?>
                        <?php if($user_level_menu): ?>
                        <li><a href="user-level.php">User Level</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                
                <?php if($settings_menu): ?>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-setting-2"></i><span> App Settings <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <?php if($address_menu): ?>
                        <li><a href="settings-address.php">Address</a></li>
                        <?php endif ?>
                        <?php if ($schedule_menu): ?>
                        <li><a href="settings-schedule.php">Schedule</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->