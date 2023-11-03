<?php
session_start();
include('../dbc.php');
if (!isset($_SESSION['stidd'])) {
    header("Location:stu_login.php");
    die();
}
include('utilities/head.php');
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
                include('stu_modal.php');
                ?>
                <!-- Modal -->
                <div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Password Form</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="alert-message"></div>
                                <form method="POST" action="stu_fetch.php" id="password-form">
                                    <input type="hidden" name="stid" value="<?php echo $_SESSION['stidd']; ?>">
                                    <div class="col-md-12 mx-auto">
                                        <label for="old_pass">Current Password:</label>
                                        <input type="password" name="old" id="old_pass" class="form-control" required>
                                    </div>
                                    <hr>
                                    <div class="col-md-12 mx-auto">
                                        <label for="new_pass">New Password:</label>
                                        <input type="password" name="new" id="new_pass" class="form-control" required>
                                    </div>
                                    <div class="col-md-12 mx-auto">
                                        <label for="conf_pass">Confirm New Password:</label>
                                        <input type="password" name="conf" id="conf_pass" class="form-control" required>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="btnChange" id="btnSubmit">Save changes</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#password-form').submit(function(event) {
                            event.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: 'stu_fetch.php',
                                data: $(this).serialize(),
                                success: function(response) {
                                    if (response == 'success') {
                                        $('#alert-message').html('<div class="alert alert-success" role="alert">Password changed successfully.</div>').show();
                                        $('#password-form').hide();
                                    } else {
                                        $('#alert-message').html('<div class="alert alert-danger" role="alert">' + response + '</div>').show();
                                    }
                                }
                            });
                        });
                    });
                </script>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav class="nav nav-borders">
                        <a class="nav-link" href="stu_profile.php">Account Information</a>
                        <a class="nav-link active ms-0" href="stu_info2.php">Profiling</a>

                    </nav>
                    <hr class="mt-0 mb-4" />

                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">
                                    <?php
                                    $stid = $_SESSION['stidd'];
                                    $sql = "SELECT * FROM student WHERE stid = '$stid'";
                                    $result = mysqli_query($link, $sql);
                                    $row = mysqli_fetch_assoc($result);

                                    $sqls = "SELECT * FROM personal WHERE stid = '$stid'";
                                    $results = mysqli_query($link, $sqls);
                                    $rows = mysqli_fetch_assoc($results);

                                    $profile_path = $row['profile_path'];
                                    ?>

                                    <!-- Profile picture image-->
                                    <?php if ($profile_path) : ?>
                                        <img class="img-account-profile img-fluid rounded-circle mb-2" src="<?php echo $profile_path ?>" alt="" height="" />
                                    <?php else : ?>
                                        <img class="img-account-profile img-fluid rounded-circle mb-2" src="img/undraw_profile_1.svg" alt="" height="" />
                                    <?php endif; ?>

                                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>

                                    <!-- Profile picture upload button-->


                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlPp">
                                        Upload
                                    </button>

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
                                                <input class="form-control" id="inputPhone" type="tel" placeholder="" value="<?php echo $row['bdate']; ?>" readonly />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputBirthday">Phone</label>
                                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="" value="<?php if (!empty($rows['contact'])) {
                                                                                                                                                        echo $rows['contact'];
                                                                                                                                                    } ?>" readonly />
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btnEditt">
                                            Edit Info
                                        </button>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#pass">
                                            Change Password
                                        </button>
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

    include('utilities/js.php');
    ?>
</body>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery/jquery.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>


</html>