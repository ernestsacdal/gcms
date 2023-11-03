<?php
session_start();
include('../dbc.php');
if (!isset($_SESSION['stidd'])) {
    header("Location:stu_login.php");
    die();
}
include('utilities/head.php');
?>
</head>
<style>
    .modal-dialog {
        overflow-y: initial !important;
    }

    .modal-body {
        overflow-y: auto;
    }
</style>

<body id="page-top">
    <?php
    include('stu_modal.php');
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- include('utilities/sidebar.php'); -->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
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

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="stu_info.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include('utilities/topbar.php');
                ?>
                <div class="container-fluid">
                    <nav class="nav nav-borders">
                        <a class="nav-link active ms-0" href="stu_info.php">Profiling</a>
                        <a class="nav-link" href="stu_accInfo.php">Account Information</a>
                    </nav>
                    <hr class="mt-0 mb-4" />
                    <!-- Project Card Example -->
                    <h4 class="h4 mb-3 text-danger">Please complete all the required information to proceed to your dashboard.</h4>
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <h4 class="small font-weight-bold">Profiling Progress Bar <span class="progress-percent float-right">0%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <script>
                                function updateProgressBar(progress) {
                                    progress = progress.toFixed(0);
                                    const progressBar = $(".progress-bar");
                                    progressBar.css("width", progress + "%");
                                    progressBar.attr("aria-valuenow", progress);
                                    $(".progress-percent").text(progress + "%");
                                }

                                function fetchProgress() {
                                    // Use AJAX or fetch to request progress data from the PHP script
                                    $.ajax({
                                        url: 'stu_prog.php',
                                        method: 'GET',
                                        dataType: 'json',
                                        success: function(data) {
                                            // Update the progress bar with the received progress value
                                            updateProgressBar(data.progress);
                                        },
                                        error: function() {
                                            console.error('Error fetching progress data.');
                                        }
                                    });
                                }

                                // Periodically fetch and update the progress
                                setInterval(fetchProgress, 1000); // Update every second
                            </script>

                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">CAMPUS </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Campus</th>
                                            <th>College</th>
                                            <th>Major</th>
                                            <th>Student Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM campus WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['campus']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['college']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['major']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['stutype']; ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlCampus">
                                    Fill up
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PERSONAL INFORMATION</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Address</th>
                                            <th>Contact #</th>
                                            <th>Sex</th>
                                            <th>Civil Status</th>
                                            <th>Citizenship</th>
                                            <th>Height</th>
                                            <th>Weight</th>
                                            <th>Religion</th>
                                            <th>Blood Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM personal WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['address']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['contact']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['sex']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['civil']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['citizen']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['height']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['weight']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['religion']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['blood']; ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlPersonalInformation">
                                    Fill up
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">FAMILY BACKGROUND</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Father's Name</th>
                                            <th>Education</th>
                                            <th>Occupation</th>
                                            <th>Monthly Income</th>
                                            <th>Employer/Business</th>
                                            <th>Work Address</th>
                                            <th>Contact #</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM father WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['father']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['educ']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['occu']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['income']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['emp']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['workadd']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['contact']; ?>
                                                    </td>

                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Mother's Name</th>
                                            <th>Education</th>
                                            <th>Occupation</th>
                                            <th>Monthly Income</th>
                                            <th>Employer/Business</th>
                                            <th>Work Address</th>
                                            <th>Contact #</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM mother WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['mother']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['educ']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['occu']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['income']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['emp']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['workadd']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['contact']; ?>
                                                    </td>

                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th># of Siblings</th>
                                            <th>Birth Order</th>
                                            <th>Living Condition</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM fam WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['sibling']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['order']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['cond']; ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlFam">
                                    Fill up
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">SCHOLARSHIP/FINANCIAL ASSISTANCE</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Assistance</th>
                                            <th>Grantee</th>

                                            <th>Working Student</th>
                                            <th>Dependent of Solo Parent</th>
                                            <th>Solo Parent</th>
                                            <th>PWD</th>
                                            <th>Indigenous Group</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM scholarship WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['assist']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['grantee']; ?>
                                                    </td>

                                                    <td>
                                                        <?= $unit['working']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['dependent']; ?> <?= $unit['depID']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['solo']; ?> <?= $unit['soloID']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['pwd']; ?> <?= $unit['pwdID']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['indeg']; ?> <?= $unit['indID']; ?>
                                                    </td>

                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlscholarship">
                                    Fill up
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">EDUCATIONAL BACKGROUND</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Senior High School</th>
                                            <th>Strand</th>
                                            <th>Year Graduated</th>
                                            <th>Honors Received</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM education WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['shs']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['strand']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['shsGrad']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['shsHnr']; ?>
                                                    </td>


                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Junior High School</th>
                                            <th>Year Graduated</th>
                                            <th>Honors Received</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM education WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['jhs']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['jhsGrad']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['jhsHnr']; ?>
                                                    </td>


                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Elementary</th>
                                            <th>Year Graduated</th>
                                            <th>Honors Received</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM education WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['elem']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['elemGrad']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['elemHnr']; ?>
                                                    </td>


                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlEduc">
                                    Fill up
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">INVOLVEMENT IN ARTS AND SPORTS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Special Skills</th>
                                            <th>Hobbies</th>
                                            <th>Non-Academic Recognition</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM skills WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['skill']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['hob']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['recog']; ?>
                                                    </td>


                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlInvolvementInArtsAndSports">
                                    Fill up
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">TRAINING PROGRAMS ATTENDED</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title of Seminar/Workshop/Short Course</th>
                                            <th>Inclusive Date</th>
                                            <th>Sponsoring Agency</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM training WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['seminar']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['date']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['agency']; ?>
                                                    </td>


                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlTrainingProgramsAttended">
                                    Fill up
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">SOCIAL AND EXTRACURRICULAR ACTIVITIES</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Affiliation</th>
                                            <th>Position Held</th>
                                            <th>Period Covered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM extra WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['aff']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['pos']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['period']; ?>
                                                    </td>


                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlSocailandExtracurricularActivities">
                                    Fill up
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">SOCIAL MEDIA PRESENCE</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Facebook</th>
                                            <th>Twitter</th>
                                            <th>Instagram</th>
                                            <th>Youtube</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stid = $_SESSION['stidd'];
                                        $sql = "SELECT * FROM social WHERE stid = '$stid'";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['fb']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['twt']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['ig']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['yt']; ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlSocailMediaPresence">
                                    Fill up
                                </button>
                            </div>
                        </div>

                    </div>
                    <form method="POST" action="stucode.php">
                        <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                        <button type="submit" class="btn btn-primary btn-icon-split btn-lg float-right mb-3" name="btnProceed">
                            <span class="icon text-white-50">
                                <i class="fas fa-right-long"></i>
                            </span>
                            <span class="text">PROCEED</span>
                        </button>
                    </form>
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
    include('utilities/js.php');
    ?>
</body>

</html>


<!-- Project Card Example
<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div> -->