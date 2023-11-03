<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="stu_index.php">
        <div class="sidebar-brand-icon">
            <!-- <i class="fas fa-handshake-angle"></i> -->
            <div>
            <img src="../img/neust.png" alt="neust" class="logo">
        </div>
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
<li class="nav-item <?php if (strpos($current_url, 'stu_index.php') !== false) echo 'active'; ?>">
    <a class="nav-link" href="stu_index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- <li class="nav-item < if (strpos($current_url, 'stu_sig.php') !== false) echo 'active'; ?>">
    <a class="nav-link" href="stu_sig.php">
        <i class="fas fa-fw fa-signature"></i>
        <span>Signature Request</span>
    </a>
</li> -->

<!-- Nav Item - Profile -->
<li class="nav-item <?php if (strpos($current_url, 'stu_profile.php') !== false) echo 'active'; ?>">
    <a class="nav-link" href="stu_profile.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Profile</span>
    </a>
</li>

<!-- Nav Item - Peer -->
<li class="nav-item <?php if (strpos($current_url, 'stu_peer.php') !== false) echo 'active'; ?>">
    <a class="nav-link" href="stu_peer.php">
        <i class="fas fa-fw fa-people-group"></i>
        <span>Peer</span>
    </a>
</li>

<li class="nav-item <?php if (strpos($current_url, 'stu_routine.php') !== false) echo 'active'; ?>">
    <a class="nav-link" href="stu_routine.php">
        <i class="fas fa-fw fa-book"></i>
        <span>Routine Interview </span>
    </a>
</li>
<?php
$stid = $_SESSION['stidd'];
$sql = "SELECT * FROM student WHERE stid = '$stid'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$statusA = $row['statusA'];
$statusJ = $row['statusJ'];
$year = $row['year'];


if($year == "4th Year") {
    echo '<li class="nav-item';
    if(strpos($current_url, 'stu_ei.php') !== false) echo ' active';
    echo '">
        <a class="nav-link" href="stu_ei.php">
            <i class="fas fa-fw fa-door-open"></i>
            <span>Exit Interview</span>
        </a>
    </li>';
}


?>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- End of Sidebar -->