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
                <div class="container-fluid">
                    <nav class="nav nav-borders">
                        
                    <a class="nav-link" href="stu_profile.php">Account Information</a>
                        <a class="nav-link active ms-0" href="stu_info2.php">Profiling</a>
                    </nav>
                    <hr class="mt-0 mb-4" />
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlCampuss">
                                UPDATE
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlPersonalInformationn">
                                UPDATE
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlFamm">
                                UPDATE
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlscholarshipp">
                                UPDATE
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlEducc">
                                UPDATE
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlInvolvementInArtsAndSportss">
                                UPDATE
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlTrainingProgramsAttendedd">
                                UPDATE
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlSocailandExtracurricularActivitiess">
                                UPDATE
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlSocailMediaPresencee">
                                    UPDATE
                                </button>
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
    include('utilities/js.php');
    ?>
</body>

</html>