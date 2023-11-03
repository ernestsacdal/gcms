<?php
session_start();
include('../dbc.php');
include('utilities/head.php');
if (!isset($_SESSION['uname'])) {
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

<style>
     .card-header {
        display: flex;
        /* establish flex container */
        justify-content: space-between;
        align-items: center;
        /* vertically align */
        /* padding: 10px; */
    }
</style>
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
                <a class='nav-link active' href='coun_view.php?viewstid=" . $fetch['stid'] . " '>Account Information</a>
                <a class='nav-link' href='coun_viewProf.php?viewstid=" . $fetch['stid'] . "'>Profiling</a>
                <a class='nav-link' href='coun_viewReq.php?viewstid=" . $fetch['stid'] . "'>Request</a>
                <a class='nav-link' href='coun_viewRout.php?viewstid=" . $fetch['stid'] . "'>Routine</a>
                <a class='nav-link' href='coun_viewPeer.php?viewstid=" . $fetch['stid'] . "'>Peer</a>
                <a class='nav-link' href='coun_viewEi.php?viewstid=" . $fetch['stid'] . "'>Exit Interview</a>
                ";
                        }
                        ?>
                    </nav>
                    <hr class="mt-0 mb-4" />

                    <div class="card mb-4">
                        <div class="card-header">Routine Interview
                        <div class="button-container">
                            <button class="right-side-button btn btn-primary" id="goToPage">Print</button>
                        </div>
                        </div>
                        <div class="card-body">
                            <?php
                            $dis = "SELECT * FROM routine WHERE stid = '$stid'";
                            $dis_run = mysqli_query($link, $dis);
                            $row = mysqli_fetch_assoc($dis_run);
                            ?>

                            <h5>FAMILY BACKGROUND</h5>
                            <div class="mb-3">
                                <label class="small mb-1">Relationship with Parents</label><br>
                                <textarea cols="100" name="parents" readonly><?= $row['parents'] ?? '' ?></textarea><br>
                                <label class="small mb-1">Relationship with siblings</label><br>
                                <textarea cols="100" name="siblings" readonly><?= $row['siblings'] ?? '' ?></textarea><br>
                                <label class="small mb-1">Relationship with Relatives</label><br>
                                <textarea cols="100" name="relatives" readonly><?= $row['relatives'] ?? '' ?></textarea><br>
                                <label class="small mb-1">Parent concerns in the family</label><br>
                                <textarea cols="100" name="family" readonly><?= $row['family'] ?? '' ?></textarea><br>

                            </div>

                            <h5>SCHOOL EXPERIENCE</h5>
                            <div class="mb-3">
                                <label class="small mb-1">Class Performance</label><br>
                                <textarea cols="100" name="perf" readonly><?= $row['perf'] ?? '' ?></textarea><br>
                                <label class="small mb-1">Concerns towards classmates</label><br>
                                <textarea cols="100" name="classmates" readonly><?= $row['classmates'] ?? '' ?></textarea><br>
                                <label class="small mb-1">Concerns towards teachers</label><br>
                                <textarea cols="100" name="teachers" readonly><?= $row['teachers'] ?? '' ?></textarea><br>
                                <label class="small mb-1">Concern towards school staff</label><br>
                                <textarea cols="100" name="staff" readonly><?= $row['staff'] ?? '' ?></textarea><br>
                                <label class="small mb-1">Concerns toward students activities and organizations</label><br>
                                <textarea cols="100" name="org" readonly><?= $row['org'] ?? '' ?></textarea><br>
                                <label class="small mb-1">Concern towards facilities and services</label><br>
                                <textarea cols="100" name="services" readonly><?= $row['services'] ?? '' ?></textarea><br>

                            </div>



                            <h5>INTERPERSONAL RELATIONS</h5>
                            <div class="mb-3">
                                <label class="small mb-1">Friends</label><br>
                                <textarea cols="100" name="friends" readonly><?= $row['friends'] ?? '' ?></textarea><br>
                                <label class="small mb-1">Romantic relationships</label><br>
                                <textarea cols="100" name="romantic" readonly><?= $row['romantic'] ?? '' ?></textarea><br>

                            </div>

                            <h5>OTHER CONCERNS</h5>
                            <div class="mb-3">

                                <textarea cols="100" readonly><?= $row['other'] ?? '' ?></textarea>

                            </div>
                            <div class="mb-3">
                                <label class="large mb-1">Other guide questions:</label><br>
                                <label class="small mb-1">1. How do you see yourself in terms of physical attributes and personality? </label><br>
                                <textarea cols="100" rows="1" name="self" readonly><?= $row['self'] ?? '' ?></textarea><br>
                                <label class="small mb-1">2. Beliefs and principles you live by? </label><br>
                                <textarea cols="100" rows="1" name="belief" readonly><?= $row['belief'] ?? '' ?></textarea><br>
                                <label class="small mb-1">3. Significant experiences in life?</label><br>
                                <textarea cols="100" rows="1" name="exp" readonly><?= $row['exp'] ?? '' ?></textarea><br>
                                <label class="small mb-1">4. Other interests,skills,leisure activities? </label><br>
                                <textarea cols="100" rows="1" name="skills" readonly><?= $row['skills'] ?? '' ?></textarea><br>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->
                <script>
        document.getElementById('goToPage').addEventListener('click', function() {
            var stid = "<?php echo $stid; ?>"; // Get the PHP variable value
            window.open("print_routine.php?viewstid=" + stid, '_blank');
        });
    </script>
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