<?php
session_start();
include('../dbc.php');
include('utilities/head.php');
if (!isset($_SESSION['unamee'])) {
    header("Location:coun_login.php");
    die();
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
                include('dirmodal.php');
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
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
                                <form method="POST" action="dirfetch.php" id="password-form">
                                    <input type="hidden" name="uname" value="<?php echo $_SESSION['unamee']; ?>">
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
                                url: 'dirfetch.php',
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

                <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">
                                    <?php
                                    $uname = $_SESSION['unamee'];
                                    $sql = "SELECT * FROM director WHERE uname = '$uname'";
                                    $result = mysqli_query($link, $sql);
                                    $row = mysqli_fetch_assoc($result);


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
                                            <label class="small mb-1" for="inputUsername">Username</label>
                                            <input class="form-control" id="inputUsername" type="text" placeholder="" value="<?php echo $row['uname']; ?>" readonly />
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputFirstName">First Name</label>
                                                <input class="form-control" id="inputFirstName" type="text" placeholder="" value="<?php echo $row['fname']; ?>" readonly />
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
                                                <label class="small mb-1" for="inputLocation">Position</label>
                                                <input class="form-control" id="inputLocation" type="text" placeholder="" value="<?php echo $row['position']; ?>" readonly />
                                            </div>

                                        </div>
                                        
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputPhone">Birth Date</label>
                                                <input class="form-control" id="inputPhone" type="tel" placeholder="" value="<?php echo $row['bdate']; ?>" readonly />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputBirthday">Phone</label>
                                                <input class="form-control" id="inputBirthday" type="text" placeholder="" value="<?php echo $row['contact']; ?>" readonly />
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btnEdit">
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
    include('utilities/script.php');
    include('utilities/js.php');
    ?>
</body>

</html>