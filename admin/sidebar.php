<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="index.php" class="waves-effect">
                        <i class="icon-accelerator"></i><!-- <span class="badge badge-success badge-pill float-right">9+</span> --> <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-squares"></i><span> Transaction <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="attendance.php">Attendance</a></li>
                        <li><a href="overtime.php">Overtime</a></li>
                        <li><a href="Leave.php">Leave</a></li>
                    </ul>
                </li>

                <?php if($_SESSION['admin']['id_akses'] == 0 || $_SESSION['admin']['id_akses'] == 1): ?>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-folder"></i><span> Master <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="department.php">Department</a></li>
                    </ul>
                </li>

                <li>
                <a href="javascript:void(0);" class="waves-effect"><i class="icon-profile"></i><span> User Management <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="admin.php">User List</a></li>
                        <li><a href="employee.php">Employee</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                
                <?php if($_SESSION['admin']['id_akses'] == 0): ?>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-setting-2"></i><span> App Settings <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="settings-address.php">Address</a></li>
                        <li><a href="settings-schedule.php">Schedule</a></li>
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