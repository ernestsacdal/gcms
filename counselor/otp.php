<!-- <!DOCTYPE html>
<html>
<head>
    <title>OPT Verification</title>
</head>
<body>
    <h1 style="text-align: center; color: #0096FF;">OPT Verification</h1>
    <form style="width: 500px; margin: 0 auto; text-align: center;" action="verify.php" method="post">
        <label style="display: block; margin-bottom: 10px;">Enter OTP Code:</label>
        <input style="padding: 10px; width: 200px; font-size: 16px; border-radius: 5px;" type="number" name="otp" required>
        <button style="padding: 10px 20px; background-color: #0096FF; color: white; font-size: 16px; border-radius: 5px; margin-top: 20px;" type="submit" name="verify">Verify</button>
    </form>
</body>
</html> -->

<?php
include('utilities/head.php');
include('../dbc.php');
session_start();

?>
<style>
    body {
        background-color: skyblue;
        background-image: linear-gradient(to bottom, skyblue, white);
    }
</style>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                    
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                    <?php
                    if (isset($_SESSION['otp']) && $_SESSION['otp'] != '') {
                        echo '<div class="alert alert-success" role="alert">
                        <strong>' . $_SESSION['otp'] . '</strong>
                       </div>';
                        unset($_SESSION['otp']);
                    }

                    if (isset($_SESSION['otpp']) && $_SESSION['otpp'] != '') {
                        echo '<div class="alert alert-danger" role="alert">
                        <strong>' . $_SESSION['otpp'] . '</strong>
                       </div>';
                        unset($_SESSION['otpp']);
                    }
                    ?>
                                    </div>
                                    <form method="POST" class="user" action="verify.php">
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" name="otp"  placeholder="Enter OTP">
                                        </div>

                                        <input type="submit" name="verify" value="Verify" class="btn btn-success btn-user btn-block">
                                            
            
                                        <hr>
                                        <a href="../director/dir_login.php" class="btn btn-primary btn-user btn-block">
                                            <i class="fas fa-user-tie fa-fw"></i> School Director
                                        </a>
                                        <a href="../counselor/coun_login.php" class="btn btn-primary btn-user btn-block">
                                            <i class="fas fa-user-shield fa-fw"></i> Guidance Counselor
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="../student/stu_login.php">Login as Student</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>