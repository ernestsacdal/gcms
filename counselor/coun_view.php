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

                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">

                                <?php
$pp = "SELECT * FROM student WHERE stid = '$stid'";
$pp_run = mysqli_query($link, $pp);
$row3 = mysqli_fetch_assoc($pp_run);
$profile_path = $row3['profile_path'];

if (!empty($profile_path)) {
    $image_path = $profile_path;
    
} else {
    $image_path = "img/undraw_profile_1.svg";
}
?>
                                
                                    <!-- Profile picture image-->
                                    <img class="img-account-profile img-fluid rounded-circle mb-2" src="../student/<?=$image_path?>" alt="" height="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputUsername">Student ID</label>
                                            <input class="form-control" id="inputUsername" type="text" placeholder="" value="<?php echo $row['stid']; ?>" readonly />
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputFirstName">First Name</label>
                                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo $row['fname']; ?>" readonly />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Last Name</label>
                                                <input class="form-control" id="inputLastName" type="text" placeholder="" value="<?php echo $row['lname']; ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="" value="<?php echo $row['email']; ?>" readonly />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLocation">Course</label>
                                                <input class="form-control" id="inputLocation" type="text" placeholder="" value="<?php echo $row['course']; ?>" readonly />
                                            </div>

                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Year Level</label>
                                                <input class="form-control" id="inputOrgName" type="text" placeholder="" value="<?php echo $row['year']; ?>" readonly />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputEmailAddress">Section</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="" value="<?php echo $row['section']; ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputPhone">Birth Date</label>
                                                <input class="form-control" id="inputPhone" type="tel" placeholder="" value="<?php if (!empty($row['bdate'])) {
                                                                                                                                    echo $row['bdate'];
                                                                                                                                } ?>" readonly />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputBirthday">Phone</label>
                                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="" value="<?php if (!empty($row2['contact'])) {
                                                                                                                                                        echo $row2['contact'];
                                                                                                                                                    } ?>" readonly />
                                            </div>
                                        </div>
                                    </form>
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