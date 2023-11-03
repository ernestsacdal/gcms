<?php
session_start();
include('../dbc.php');
if (!isset($_SESSION['stidd'])) {
    header("Location:stu_login.php");
    die();
}
include('utilities/head.php');
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
                    <?php
                    if (isset($_SESSION['eiSave']) && $_SESSION['eiSave'] != '') {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>' . $_SESSION['eiSave'] . '</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                        unset($_SESSION['eiSave']);
                    }
                    ?>
                    <?php
                    $dis = "SELECT * FROM ei WHERE stid = " . $_SESSION['stidd'];
                    $dis_run = mysqli_query($link, $dis);
                    $row = mysqli_fetch_assoc($dis_run);
                    $select = isset($row['reason']) ? $row['reason'] : '';
                    $admit = isset($row['admitSem']) ? $row['admitSem'] : '';
                    $last = isset($row['lastSem']) ? $row['lastSem'] : '';
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">Exit Interview Form</div>
                        <div class="card-body">
                            <form method="POST" action="stucode.php">
                                <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Year Admitted in NEUST</h5>
                                        <div class="form-group ">
                                            <input type="number" min="1900" max="2050" step="1" name="admit" class="form-control col-md-3" value="<?= $row['admit']; ?>">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="admitSem" id="semester1" value="1st Sem" <?php if ($admit == "1st Sem") echo " checked"; ?>>
                                            <label class="form-check-label" for="semester1">
                                                1st Sem
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="admitSem" id="semester2" value="2nd Sem" <?php if ($admit == "2nd Sem") echo " checked"; ?>>
                                            <label class="form-check-label" for="semester2">
                                                2nd Sem
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5>Last Year of Enrollment in NEUST</h5>
                                        <div class="form-group ">
                                            <input type="number" min="1900" max="2050" step="1" name="last" class="form-control col-md-3" value="<?= $row['last']; ?>">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lastSem" id="semester1" value="1st Sem" <?php if ($last == "1st Sem") echo " checked"; ?>>
                                            <label class="form-check-label" for="semester1">
                                                1st Sem
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lastSem" id="semester2" value="2nd Sem" <?php if ($last == "2nd Sem") echo " checked"; ?>>
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
                                            <select class="form-control col-md-7" name="reason" onchange="toggleTextBoxxx()" required>
                                                <option value="" hidden disabled <?php if (empty($row['reason'])) echo "selected"; ?>>Select</option>
                                                <option value="College Graduate" <?php if ($select == "College Graduate") echo " selected"; ?>>College Graduate</option>
                                                <option value="Transfer" <?php if ($select == "Transfer") echo " selected"; ?>>Transfer</option>
                                                <option value="Employment" <?php if ($select == "Employment") echo " selected"; ?>>Employment</option>
                                                <option value="Leave of Absence" <?php if ($select == "Leave of Absence") echo " selected"; ?>>Leave of Absence</option>
                                                <option value="Other" <?php if ($select == "Other") echo " selected"; ?>>Other Reasons, Specify</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="other-leave" style="display:none;">
                                            <input type="text" name="other_leave" class="form-control col-md-7" placeholder="It may be institutional, academic or personal" value="<?= $row['reason']; ?>">
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
                                                <input type="number" name="strat" min="1" max="5" class="quantity-input" value="<?= $row['strat']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Quality of instruction</label>
                                                <input type="number" name="quality" min="1" max="5" class="quantity-input" value="<?= $row['quality']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Instructional Materials and Equipment</label>
                                                <input type="number" name="instruction" min="1" max="5" class="quantity-input" value="<?= $row['instruction']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Responsiveness to Student's Individual Concerns</label>
                                                <input type="number" name="response" min="1" max="5" class="quantity-input" value="<?= $row['response']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Academic requirements</label>
                                                <input type="number" name="acad" min="1" max="5" class="quantity-input" value="<?= $row['acad']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Schedule of Classes</label>
                                                <input type="number" name="sched" min="1" max="5" class="quantity-input" value="<?= $row['sched']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Lecture Room/Classrooms and Maintenance</label>
                                                <input type="number" name="lecture" min="1" max="5" class="quantity-input" value="<?= $row['lecture']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Computer Laboratories</label>
                                                <input type="number" name="comp" min="1" max="5" class="quantity-input" value="<?= $row['comp']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Multimedia/Internet Service</label>
                                                <input type="number" name="multi" min="1" max="5" class="quantity-input" value="<?= $row['multi']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Emphasis on NEUST Core Values</label>
                                                <input type="number" name="emp" min="1" max="5" class="quantity-input" value="<?= $row['emp']; ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <h5>ACADEMIC SUPPORT</h5>
                                            <div class="form-group">
                                                <label>Admission and Enrollment Procedures</label>
                                                <input type="number" name="adm" min="1" max="5" class="quantity-input" value="<?= $row['adm']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Medical and Dental Services</label>
                                                <input type="number" name="medical" min="1" max="5" class="quantity-input" value="<?= $row['medical']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>School Rules and Regulations</label>
                                                <input type="number" name="rules" min="1" max="5" class="quantity-input" value="<?= $row['rules']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Safety and Security</label>
                                                <input type="number" name="safety" min="1" max="5" class="quantity-input" value="<?= $row['safety']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Scholarship and Financial Assistance</label>
                                                <input type="number" name="scho" min="1" max="5" class="quantity-input" value="<?= $row['scho']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Registrar</label>
                                                <input type="number" name="registrar" min="1" max="5" class="quantity-input" value="<?= $row['registrar']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Guidance and Counseling</label>
                                                <input type="number" name="gc" min="1" max="5" class="quantity-input" value="<?= $row['gc']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Cultural and arts program</label>
                                                <input type="number" name="arts" min="1" max="5" class="quantity-input" value="<?= $row['arts']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Gender Sensitivity of Univ. Personnel</label>
                                                <input type="number" name="gs" min="1" max="5" class="quantity-input" value="<?= $row['gs']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Career Development Programs</label>
                                                <input type="number" name="career" min="1" max="5" class="quantity-input" value="<?= $row['career']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="opacity: 0;">G</h5>
                                            <div class="form-group">
                                                <label>Multi-faith Services</label>
                                                <input type="number" name="faith" min="1" max="5" class="quantity-input" value="<?= $row['faith']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Library and Learning Resource Materials</label>
                                                <input type="number" name="lib" min="1" max="5" class="quantity-input" value="<?= $row['lib']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Student Goverment</label>
                                                <input type="number" name="stud" min="1" max="5" class="quantity-input" value="<?= $row['stud']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Sports Program</label>
                                                <input type="number" name="sports" min="1" max="5" class="quantity-input" value="<?= $row['sports']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Student organizations and Activities</label>
                                                <input type="number" name="org" min="1" max="5" class="quantity-input" value="<?= $row['org']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Student Publication</label>
                                                <input type="number" name="pub" min="1" max="5" class="quantity-input" value="<?= $row['pub']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Social and Community Involvement</label>
                                                <input type="number" name="sci" min="1" max="5" class="quantity-input" value="<?= $row['sci']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Canteen and Food Services</label>
                                                <input type="number" name="canteen" min="1" max="5" class="quantity-input" value="<?= $row['canteen']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Campus Cleanliness</label>
                                                <input type="number" name="campus" min="1" max="5" class="quantity-input" value="<?= $row['campus']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Comfort rooms</label>
                                                <input type="number" name="cr" min="1" max="5" class="quantity-input" value="<?= $row['cr']; ?>">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <hr>
                                    <h5>Student Views</h5>
                                    <h8>Give us an overall impression of all your teachers</h8><br>
                                    <textarea cols="100" name="overall"><?= $row['overall'] ?? '' ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <h8>What was your most unforgettable experience during your time at NEUST?</h8><br>
                                    <textarea cols="100" name="exp"><?= $row['exp'] ?? '' ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <h8>What skills, abilities have you gained from your college experience which may help you in your future endeavours?</h8><br>
                                    <textarea cols="100" name="abi"><?= $row['abi'] ?? '' ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <h8>What can you suggest to further improve our programs?</h8><br>
                                    <textarea cols="100" name="suggest"><?= $row['suggest'] ?? '' ?></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary btn-icon-split btn-lg float-right mb-3" name="btnEi">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">SAVE</span>
                                </button>
                            </form>
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