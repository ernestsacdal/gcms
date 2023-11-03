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
    .form-group {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .form-group label {
        flex: 1;
        margin-right: 10px;
    }

    @media only screen and (max-width: 768px) {

        /* Reduce container width */
        .mb-3 {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        /* Reduce textarea width and font size */
        textarea {
            width: 100%;
            font-size: 14px;
        }
    }
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
                        <div class="card-header">Exit Interview Form
                        <div class="button-container">
                            <button class="right-side-button btn btn-primary" id="goToPage">Print</button>
                        </div>
                        </div>
                        
                        <div class="card-body">
                            <?php
                            $dis = "SELECT * FROM ei WHERE stid = '$stid'";
                            $dis_run = mysqli_query($link, $dis);
                            $row = mysqli_fetch_assoc($dis_run);
                            $select = isset($row['reason']) ? $row['reason'] : '';
                            $admit = isset($row['admitSem']) ? $row['admitSem'] : '';
                            $last = isset($row['lastSem']) ? $row['lastSem'] : '';
                            ?>
                            <div class="row">
                                <div class="col-6">
                                    <h5>Year Admitted in NEUST</h5>
                                    <div class="form-group ">
                                        <input type="number" min="1900" max="2050" step="1" name="admit" class="form-control col-md-3" value="<?= $row['admit']; ?>" readonly>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="admitSem" id="semester1" value="1st Sem" <?php if ($admit == "1st Sem") echo " checked"; ?> readonly>
                                        <label class="form-check-label" for="semester1">
                                            1st Sem
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="admitSem" id="semester2" value="2nd Sem" <?php if ($admit == "2nd Sem") echo " checked"; ?> readonly>
                                        <label class="form-check-label" for="semester2">
                                            2nd Sem
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5>Last Year of Enrollment in NEUST</h5>
                                    <div class="form-group ">
                                        <input type="number" min="1900" max="2050" step="1" name="last" class="form-control col-md-3" value="<?= $row['last']; ?>" readonly>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="lastSem" id="semester1" value="1st Sem" <?php if ($last == "1st Sem") echo " checked"; ?> readonly>
                                        <label class="form-check-label" for="semester1">
                                            1st Sem
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="lastSem" id="semester2" value="2nd Sem" <?php if ($last == "2nd Sem") echo " checked"; ?> readonly>
                                        <label class="form-check-label" for="semester2">
                                            2nd Sem
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <h5>REASONS FOR LEAVING NEUST</h5>
                                    <div class="form-group">
                                        <select class="form-control col-md-7" name="reason" onchange="toggleTextBoxxx()" required readonly>
                                            <option value="" hidden disabled <?php if (empty($row['reason'])) echo "selected"; ?>>Select</option>
                                            <option value="College Graduate" <?php if ($select == "College Graduate") echo " selected"; ?>>College Graduate</option>
                                            <option value="Transfer" <?php if ($select == "Transfer") echo " selected"; ?>>Transfer</option>
                                            <option value="Employment" <?php if ($select == "Employment") echo " selected"; ?>>Employment</option>
                                            <option value="Leave of Absence" <?php if ($select == "Leave of Absence") echo " selected"; ?>>Leave of Absence</option>
                                            <option value="Other" <?php if ($select == "Other") echo " selected"; ?>>Other Reasons, Specify</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="other-leave" style="display:none;">
                                        <input type="text" name="other_leave" class="form-control col-md-7" placeholder="It may be institutional, academic or personal" value="<?= $row['reason']; ?>" readonly>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <hr>
                                <h5>EVALUATION OF SCHOOL SERVICES AND FACILITIES</h5>
                                <h6>Kindly rate your school experience using the scale</h6>
                                <h7>5 = Outstanding 4 = Very satisfactory 3 = Satisfactory 2 = Fairly Satisfactory 1 = Did Not Meet Expectations</h7>
                                <h5>ACADEMIC</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Teaching strategies</label>
                                            <input type="number" name="strat" min="1" max="5" class="quantity-input" value="<?= $row['strat']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Quality of instruction</label>
                                            <input type="number" name="quality" min="1" max="5" class="quantity-input" value="<?= $row['quality']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Instructional Materials and Equipment</label>
                                            <input type="number" name="instruction" min="1" max="5" class="quantity-input" value="<?= $row['instruction']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Responsiveness to Student's Individual Concerns</label>
                                            <input type="number" name="response" min="1" max="5" class="quantity-input" value="<?= $row['response']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Academic requirements</label>
                                            <input type="number" name="acad" min="1" max="5" class="quantity-input" value="<?= $row['acad']; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Schedule of Classes</label>
                                            <input type="number" name="sched" min="1" max="5" class="quantity-input" value="<?= $row['sched']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Lecture Room/Classrooms and Maintenance</label>
                                            <input type="number" name="lecture" min="1" max="5" class="quantity-input" value="<?= $row['lecture']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Computer Laboratories</label>
                                            <input type="number" name="comp" min="1" max="5" class="quantity-input" value="<?= $row['comp']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Multimedia/Internet Service</label>
                                            <input type="number" name="multi" min="1" max="5" class="quantity-input" value="<?= $row['multi']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Emphasis on NEUST Core Values</label>
                                            <input type="number" name="emp" min="1" max="5" class="quantity-input" value="<?= $row['emp']; ?>" readonly>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <h5>ACADEMIC SUPPORT</h5>
                                        <div class="form-group">
                                            <label>Admission and Enrollment Procedures</label>
                                            <input type="number" name="adm" min="1" max="5" class="quantity-input" value="<?= $row['adm']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Medical and Dental Services</label>
                                            <input type="number" name="medical" min="1" max="5" class="quantity-input" value="<?= $row['medical']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>School Rules and Regulations</label>
                                            <input type="number" name="rules" min="1" max="5" class="quantity-input" value="<?= $row['rules']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Safety and Security</label>
                                            <input type="number" name="safety" min="1" max="5" class="quantity-input" value="<?= $row['safety']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Scholarship and Financial Assistance</label>
                                            <input type="number" name="scho" min="1" max="5" class="quantity-input" value="<?= $row['scho']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Registrar</label>
                                            <input type="number" name="registrar" min="1" max="5" class="quantity-input" value="<?= $row['registrar']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Guidance and Counseling</label>
                                            <input type="number" name="gc" min="1" max="5" class="quantity-input" value="<?= $row['gc']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Cultural and arts program</label>
                                            <input type="number" name="arts" min="1" max="5" class="quantity-input" value="<?= $row['arts']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender Sensitivity of Univ. Personnel</label>
                                            <input type="number" name="gs" min="1" max="5" class="quantity-input" value="<?= $row['gs']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Career Development Programs</label>
                                            <input type="number" name="career" min="1" max="5" class="quantity-input" value="<?= $row['career']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 style="opacity: 0;">G</h5>
                                        <div class="form-group">
                                            <label>Multi-faith Services</label>
                                            <input type="number" name="faith" min="1" max="5" class="quantity-input" value="<?= $row['faith']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Library and Learning Resource Materials</label>
                                            <input type="number" name="lib" min="1" max="5" class="quantity-input" value="<?= $row['lib']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Student Goverment</label>
                                            <input type="number" name="stud" min="1" max="5" class="quantity-input" value="<?= $row['stud']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Sports Program</label>
                                            <input type="number" name="sports" min="1" max="5" class="quantity-input" value="<?= $row['sports']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Student organizations and Activities</label>
                                            <input type="number" name="org" min="1" max="5" class="quantity-input" value="<?= $row['org']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Student Publication</label>
                                            <input type="number" name="pub" min="1" max="5" class="quantity-input" value="<?= $row['pub']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Social and Community Involvement</label>
                                            <input type="number" name="sci" min="1" max="5" class="quantity-input" value="<?= $row['sci']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Canteen and Food Services</label>
                                            <input type="number" name="canteen" min="1" max="5" class="quantity-input" value="<?= $row['canteen']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Campus Cleanliness</label>
                                            <input type="number" name="campus" min="1" max="5" class="quantity-input" value="<?= $row['campus']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Comfort rooms</label>
                                            <input type="number" name="cr" min="1" max="5" class="quantity-input" value="<?= $row['cr']; ?>" readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="mb-3">
                                <hr>
                                <h5>Student Views</h5>
                                <h8>Give us an overall impression of all your teachers</h8><br>
                                <textarea cols="100" name="overall" readonly><?= $row['overall'] ?? '' ?></textarea>
                            </div>
                            <div class="mb-3">
                                <h8>What was your most unforgettable experience during your time at NEUST?</h8><br>
                                <textarea cols="100" name="exp" readonly><?= $row['exp'] ?? '' ?></textarea>
                            </div>
                            <div class="mb-3">
                                <h8>What skills, abilities have you gained from your college experience which may help you in your future endeavours?</h8><br>
                                <textarea cols="100" name="abi" readonly><?= $row['abi'] ?? '' ?></textarea>
                            </div>
                            <div class="mb-3">
                                <h8>What can you suggest to further improve our programs?</h8><br>
                                <textarea cols="100" name="suggest" readonly><?= $row['suggest'] ?? '' ?></textarea>
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
    <script>
        document.getElementById('goToPage').addEventListener('click', function() {
            var stid = "<?php echo $stid; ?>"; // Get the PHP variable value
            window.open("print_exit.php?viewstid=" + stid, '_blank');
        });
    </script>
</body>

</html>