<?php
session_start();
include('../dbc.php');
$msg = "";
if (isset($_POST['btnLogin'])) {
    $stid_login = $_POST['stid'];
    $passw_login = $_POST['passw'];

    $stmt = mysqli_prepare($link, "SELECT * FROM student WHERE stid = ?");
    mysqli_stmt_bind_param($stmt, "s", $stid_login);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($passw_login, $row['passw'])) {
        $statusA = $row['statusA'];
        $statusB = $row['statusB'];
        $statusC = $row['statusC'];
        $statusD = $row['statusD'];
        $statusE = $row['statusE'];
        $statusF = $row['statusF'];
        $statusG = $row['statusG'];
        $statusH = $row['statusH'];
        $statusI = $row['statusI'];
        if ($statusA && $statusB && $statusC && $statusD && $statusE == 1) {
            $name = "SELECT * FROM student WHERE stid = '$stid_login'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Logged in', '$f $l', '$stid_login')";
            $his_run = mysqli_query($link, $his);
            $_SESSION['stidd'] = $row['stid'];
            $_SESSION['fname'] = $row['fname'];
            header('Location: stu_index.php');
        } else {
            $_SESSION['stidd'] = $row['stid'];
            $_SESSION['fname'] = $row['fname'];
            header('Location: stu_info.php');
        }
    } else {
        $msg = 1;
    }
}
include('utilities/head.php');
?>

<body class="bg-gradient-warning">
<?php
    if ($msg) {
        echo '<div class="alert alert-danger alert-dismissible fade show center-block" role="alert">
        <h5 class="text-center">
        Invalid Credentials!</h5>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>

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
                                        <h1 class="h4 text-gray-900 mb-4">Student Login</h1>
                                    </div>
                                    
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="stid" placeholder="Enter Student ID" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="passw" placeholder="Password" required>
                                        </div>
                                        <button name="btnLogin" class="btn btn-success btn-user btn-block" type="submit">Login</button>
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
                                        <a class="small" href="stu_fpassword.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="stu_register.php">Create an Account!</a>
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