<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dir_index.php">
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
    <li class="nav-item <?php if (strpos($current_url, 'dir_index.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="dir_index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if (strpos($current_url, 'dir_users.php') !== false || strpos($current_url, 'dir_peerMem.php') !== false)  echo 'active'; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Students</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if (strpos($current_url, 'dir_users.php') !== false) echo 'active'; ?>" href="dir_users.php">Registered Students</a>
                <a class="collapse-item <?php if (strpos($current_url, 'dir_peerMem.php') !== false) echo 'active'; ?>" href="dir_peerMem.php">Peer Members</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item <php if (strpos($current_url, 'dir_docu.php') !== false || strpos($current_url, 'dir_app.php') !== false || strpos($current_url, 'dir_peer.php') !== false || strpos($current_url, 'dir_routine.php') !== false) echo 'active'; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Request</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <php if (strpos($current_url, 'dir_docu.php') !== false) echo 'active'; ?>" href="dir_docu.php">Document</a>
                <a class="collapse-item <php if (strpos($current_url, 'dir_app.php') !== false) echo 'active'; ?>" href="dir_app.php">Counseling</a>
                <a class="collapse-item <php if (strpos($current_url, 'dir_peer.php') !== false) echo 'active'; ?>" href="dir_peer.php">Peer</a>
                <a class="collapse-item <php if (strpos($current_url, 'dir_routine.php') !== false) echo 'active'; ?>" href="dir_routine.php">Routine</a>
            </div>
        </div>
    </li> -->


    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item <?php if (strpos($current_url, 'dir_scholarship.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="dir_scholarship.php">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Assistance</span>
        </a>
    </li>


    <li class="nav-item <?php if (strpos($current_url, 'dir_ei.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="dir_ei.php">
            <i class="fas fa-fw fa-door-open"></i>
            <span>Exit Interview</span>
        </a>
    </li>
    <li class="nav-item <?php if (strpos($current_url, 'dir_filledRoutine.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="dir_filledRoutine.php">
            <i class="fas fa-fw fa-book"></i>
            <span>Routine</span>
        </a>
    </li>


    <li class="nav-item <?php if (strpos($current_url, 'dir_history.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="dir_history.php">
            <i class="fas fa-fw fa-earth-asia"></i>
            <span>History Logs</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($current_url, 'dir_sig.php') !== false) echo 'active'; ?>">
        <a class="nav-link" href="dir_sig.php">
            <i class="fas fa-fw fa-signature"></i>
            <span>Signature Request</span>
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