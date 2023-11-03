<?php
session_start();
include('../dbc.php');
include('utilities/head.php');
if (!isset($_SESSION['unamee'])) {
    header("Location:coun_login.php");
    die();
}
if (isset($_GET['viewstid'])) {
    $stid = $_GET['viewstid'];
    $select = mysqli_query($link, "SELECT * FROM `student` WHERE stid='$stid'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
    }
    $per = mysqli_query($link, "SELECT * FROM `personal` WHERE stid='$stid'") or die('query failed');
    $row2 = mysqli_fetch_assoc($per);
}

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include('utilities/sidebar.php');
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include('utilities/topbar.php');
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <nav class="nav nav-borders">
                        <?php
                        $stid = $_GET['viewstid'];
                        $sql = "SELECT * FROM `student` WHERE stid='$stid'";
                        $result = mysqli_query($link, $sql);
                        while ($fetch = mysqli_fetch_assoc($result)) {
                            echo "
                            <a class='nav-link active' href='dir_view.php?viewstid=" . $fetch['stid'] . " '>Account Information</a>
                            <a class='nav-link' href='dir_viewProf.php?viewstid=" . $fetch['stid'] . "'>Profiling</a>
                            <a class='nav-link' href='dir_viewReq.php?viewstid=" . $fetch['stid'] . "'>Request</a>
                            <a class='nav-link' href='dir_viewRout.php?viewstid=" . $fetch['stid'] . "'>Routine</a>
                            <a class='nav-link' href='dir_viewPeer.php?viewstid=" . $fetch['stid'] . "'>Peer</a>
                            <a class='nav-link' href='dir_viewEi.php?viewstid=" . $fetch['stid'] . "'>Exit Interview</a>
                ";
                        }
                        ?>
                    </nav>
                    <hr class="mt-0 mb-4" />

                    <div class="card mb-4">
                        <div class="card-header">Peer Application Form</div>
                        <div class="card-body">
                        <?php
                    $dis = "SELECT * FROM peer WHERE stid = '$stid'";
                    $dis_run = mysqli_query($link, $dis);
                    $row = mysqli_fetch_assoc($dis_run);
                    ?>
                        
                                <div class="mb-3">
                                    <label class="xl mb-1">List trainings attended related to leadership and social responsibility</label><br>

                                    <textarea cols="100" rows="5" name="training" readonly><?= $row['training'] ?? '' ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="xl mb-1">Essay on "What it means to be a Peer facilitator</label><br>
                                    <textarea cols="100" rows="5" name="faci" readonly><?= $row['faci'] ?? '' ?></textarea>
                                </div>
                                
                            
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php
            include('utilities/footer.php');
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <?php
    include('utilities/logout.php');
    include('utilities/script.php');
    ?>
</body>

</html>