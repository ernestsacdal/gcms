<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="coun_index.php">
        <div>
            <!-- <i class="fas fa-handshake-angle"></i> -->
            <img src="../img/neust.png" alt="neust" class="logo">
        </div>
        <div class="sidebar-brand-text mx-8">Guidance & Counseling</div>
    </a>
    <style>
        .logo{
    width: 50%;
    height: 50%;
    object-fit: contain;
}
</style>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php
    // Get the current page URL
    $current_url = $_SERVER['REQUEST_URI'];
    ?>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if (strpos($current_url, 'coun_index.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="coun_index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if (strpos($current_url, 'coun_users.php') !== false || strpos($current_url, 'coun_peerMem.php') !== false)  echo 'active'; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Students</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if (strpos($current_url, 'coun_users.php') !== false) echo 'active'; ?>" href="coun_users.php">Registered Students</a>
                <a class="collapse-item <?php if (strpos($current_url, 'coun_alum.php') !== false) echo 'active'; ?>" href="coun_alum.php">Alumni</a>
                <a class="collapse-item <?php if (strpos($current_url, 'coun_peerMem.php') !== false) echo 'active'; ?>" href="coun_peerMem.php">Peer Members</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if (strpos($current_url, 'coun_docu.php') !== false || strpos($current_url, 'coun_app.php') !== false || strpos($current_url, 'coun_peer.php') !== false || strpos($current_url, 'coun_routine.php') !== false) echo 'active'; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Request</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if (strpos($current_url, 'coun_docu.php') !== false) echo 'active'; ?>" href="coun_docu.php">Document</a>
                <a class="collapse-item <?php if (strpos($current_url, 'coun_app.php') !== false) echo 'active'; ?>" href="coun_app.php">Counseling</a>
                <a class="collapse-item <?php if (strpos($current_url, 'coun_peer.php') !== false) echo 'active'; ?>" href="coun_peer.php">Peer</a>
                <a class="collapse-item <?php if (strpos($current_url, 'coun_routine.php') !== false) echo 'active'; ?>" href="coun_routine.php">Routine</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item <?php if (strpos($current_url, 'coun_appo.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="coun_appo.php">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Appointment</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($current_url, 'coun_scholarship.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="coun_scholarship.php">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Assistance</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($current_url, 'coun_ei.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="coun_ei.php">
            <i class="fas fa-fw fa-door-open"></i>
            <span>Exit Interview</span>
        </a>
    </li>
    <li class="nav-item <?php if (strpos($current_url, 'coun_filledRoutine.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="coun_filledRoutine.php">
            <i class="fas fa-fw fa-book"></i>
            <span>Routine</span>
        </a>
    </li>


    <li class="nav-item <?php if (strpos($current_url, 'coun_counHis.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="coun_counHis.php">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Counseling History</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($current_url, 'coun_history.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="coun_history.php">
            <i class="fas fa-fw fa-earth-asia"></i>
            <span>History Logs</span>
        </a>
    </li>
    <!-- Nav Item - Charts -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->