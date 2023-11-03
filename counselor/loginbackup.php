<?php
include('utilities/head.php');
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
                                        <h1 class="h4 text-gray-900 mb-4">Guidance Counselor</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>

                                        <a href="index.html" class="btn btn-success btn-user btn-block">
                                            Login
                                        </a>
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
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
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

<? echo $jan ?>, <?echo $feb ?>, <?echo $mar ?>, <?echo $apr ?>, <?echo $may ?>, <?echo $jun ?>, <?echo $jul ?>, <?echo $aug ?>, <?echo $sep ?>, <?echo $oct ?>,<?echo $nov ?>,<?echo $dec ?>

<?php

$jan = "SELECT COUNT(*) AS jan FROM appointment WHERE EXTRACT(MONTH FROM added) = 1";
$run = mysqli_query($link, $jan);
$row = mysqli_fetch_assoc($run);
$jan_count = $row['jan'];

$feb = "SELECT COUNT(*) AS feb FROM appointment WHERE EXTRACT(MONTH FROM added) = 2";
$run = mysqli_query($link, $feb);
$row = mysqli_fetch_assoc($run);
$feb_count = $row['feb'];

$mar = "SELECT COUNT(*) AS mar FROM appointment WHERE EXTRACT(MONTH FROM added) = 3";
$run = mysqli_query($link, $mar);
$row = mysqli_fetch_assoc($run);
$mar_count = $row['mar'];

$apr = "SELECT COUNT(*) AS apr FROM appointment WHERE EXTRACT(MONTH FROM added) = 4";
$run = mysqli_query($link, $apr);
$row = mysqli_fetch_assoc($run);
$apr_count = $row['apr'];

$may = "SELECT COUNT(*) AS may FROM appointment WHERE EXTRACT(MONTH FROM added) = 5";
$run = mysqli_query($link, $may);
$row = mysqli_fetch_assoc($run);
$may_count = $row['may'];

$jun = "SELECT COUNT(*) AS jun FROM appointment WHERE EXTRACT(MONTH FROM added) = 6";
$run = mysqli_query($link, $jun);
$row = mysqli_fetch_assoc($run);
$jun_count = $row['jun'];

$jul = "SELECT COUNT(*) AS jul FROM appointment WHERE EXTRACT(MONTH FROM added) = 7";
$run = mysqli_query($link, $jul);
$row = mysqli_fetch_assoc($run);
$jul_count = $row['jul'];

$aug = "SELECT COUNT(*) AS aug FROM appointment WHERE EXTRACT(MONTH FROM added) = 8";
$run = mysqli_query($link, $aug);
$row = mysqli_fetch_assoc($run);
$aug_count = $row['aug'];

$sep = "SELECT COUNT(*) AS sep FROM appointment WHERE EXTRACT(MONTH FROM added) = 9";
$run = mysqli_query($link, $sep);
$row = mysqli_fetch_assoc($run);
$sep_count = $row['sep'];

$oct = "SELECT COUNT(*) AS oct FROM appointment WHERE EXTRACT(MONTH FROM added) = 10";
$run = mysqli_query($link, $oct);
$row = mysqli_fetch_assoc($run);
$oct_count = $row['oct'];

$nov = "SELECT COUNT(*) AS nov FROM appointment WHERE EXTRACT(MONTH FROM added) = 11";
$run = mysqli_query($link, $nov);
$row = mysqli_fetch_assoc($run);
$nov_count = $row['nov'];

$dec = "SELECT COUNT(*) AS dec FROM appointment WHERE EXTRACT(MONTH FROM added) = 12";
$run = mysqli_query($link, $dec);
$row = mysqli_fetch_assoc($run);
$dec_count = $row['dec'];

?>