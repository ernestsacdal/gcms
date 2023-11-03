<?php
session_start();
include('../dbc.php');
if (!isset($_SESSION['verificationCode']) || !isset($_SESSION['uname'])) {
    header("Location: dir_fpassword.php");
    exit();
}

if (isset($_POST['btnReset'])) {
    $password = $_POST['passw'];
    $confirm = $_POST['cpassw'];

    if ($password == $confirm) {
  
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $uname = $_SESSION['uname'];

        $stmt = mysqli_prepare($link, "UPDATE director SET `password` = ? WHERE uname = ?");
        mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $uname);
        mysqli_stmt_execute($stmt);

        $_SESSION['uname'] = $_SESSION['verificationCode'] = null;
        header("Location: dir_login.php");
        exit();
    } else {
        $_SESSION['error'] = 'The passwords you entered do not match. Please try again.';
    }
}
include('utilities/head.php');
?>
<style>
        .btn-dark-green {
            background-color: #006400;
            border-color: #006400;
        }

        .btn-dark-green:hover {
            background-color: #005000;
            border-color: #005000;
        }
        body {
        background-color: skyblue;
        background-image: linear-gradient(to bottom, skyblue, white);
    }
    </style>
<body>


<div class="container">


<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
          
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-block">
                    </div>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <?php
                            if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
                                    echo '<div class="alert alert-danger" role="alert">
                                             <strong>' . $_SESSION['error'] . '</strong>
                                          </div>';
                                    unset($_SESSION['error']);
                                }
                                ?>
                                <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                            </div>
                            <form class="user" method="POST">
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="" name="passw" placeholder="Enter New Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="" name="cpassw" placeholder="Confirm Password">
                                </div>
                                <button name="btnReset"
                                    class="btn btn-success btn-dark btn-dark-green btn-user btn-block">Reset</button>

                            </form>

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