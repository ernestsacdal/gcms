<?php
include('../dbc.php');
$user = 0;
$match = 0;
$minor = 0;
if (isset($_POST['btnReg'])) {
    $stid = $_POST['stid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $section = $_POST['section'];
    $passw = $_POST['passw'];
    $cpassw = $_POST['cpassw'];
    $bdate = $_POST['bdate'];

    $birthdate = strtotime($bdate);
    $currentDate = time();
    $age = date('Y', $currentDate) - date('Y', $birthdate);

    if ($age >= 15) {
        $sql = "SELECT * FROM student WHERE stid=?";

        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $stid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $user = 1;
            } else {
                if ($passw === $cpassw) {
                    $hashed_password = password_hash($passw, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO student(stid, fname, lname, year, course, passw, email, section, bdate)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($link, $sql);
                    mysqli_stmt_bind_param($stmt, "sssssssss", $stid, $fname, $lname, $year, $course, $hashed_password, $email, $section, $bdate);
                    $result = mysqli_stmt_execute($stmt);
                    if ($result) {
                        header('Location:stu_login.php');
                    }
                } else {
                    $match = 1;
                }
            }
        }
    }
    $minor = 1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GCMS</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-3.min.css" rel="stylesheet">

</head>


<body class="bg-gradient-warning">

    <div class="container">

        <!-- Outer Row src="img/profile-1.png" -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <?php
                        if ($user) {
                            echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                                <strong>User already EXISTS!</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
                        } else {
                            if ($match) {
                                echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                                    <strong>Password did not MATCH!</strong>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
                            } elseif ($minor) {
                                // Display the alert for minors
                                echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                                    <strong>You did not meet the age requirement!</strong>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
                            }
                        }
                        ?>
                        <!-- Nested Row within Card Body -->

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Student Registration</h1>
                                </div>
                                <form class="user" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="stid" placeholder="Student ID" required onblur="trimInputValue(this)">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control form-control-user" name="fname" placeholder="First Name" required onblur="trimInputValue(this)">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control form-control-user" name="lname" placeholder="Last Name" required onblur="trimInputValue(this)">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control form-control-user" name="bdate" id="customDateInput" placeholder="Birthdate" required onfocus="showDatePicker(this)" onblur="trimInputValue(this)">

                                        </div>
                                        <script>
                                            function showDatePicker(input) {
                                                input.type = "date";
                                                input.placeholder = "Birthdate (YYYY-MM-DD)";
                                            }
                                        </script>
                                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                            <select type="text" class="form-control form-control-user" name="course" id="course" required   >
                                                <option value="" selected disabled hidden>Course</option>
                                                <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                                                <option value="Bachelor of Physical Education">Bachelor of Physical Education</option>
                                                <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
                                                <option value="Bachelor of Technology and Livelihood Education">Bachelor of Technology and Livelihood Education</option>
                                                <option value="Bachelor of Science in Industrial Education">Bachelor of Science in Industrial Education</option>
                                                <option value="Bachelor of Science in Physical Education">Bachelor of Science in Physical Education</option>
                                                <option value="Bachelor of Special Needs Education with specialization in Early Childhood Education">Bachelor of Special Needs Education with specialization in Early Childhood Education</option>
                                                <option value="Certificate in Professional Teacher Education">Certificate in Professional Teacher Education</option>
                                                <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
                                                <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
                                                <option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
                                                <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                                                <option value="Bachelor of Science in Business Administration">Bachelor of Science in Business Administration</option>
                                                <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                                                <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                                                <option value="Bachelor of Science in Hotel and Restaurant Management">Bachelor of Science in Hotel and Restaurant Management</option>
                                                <option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option>
                                                <option value="Bachelor of Public Administration">Bachelor of Public Administration</option>
                                                <option value="Bachelor of Public Administration Major in Disaster Management">Bachelor of Public Administration Major in Disaster Management</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="email" placeholder="Email" required onblur="trimInputValue(this)">
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="section" id="section" placeholder="Section" required onblur="trimInputValue(this)">
                                        </div>
                                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                            <select type="text" class="form-control form-control-user" name="year" id="year" required onblur="trimInputValue(this)">
                                                <option value="" selected disabled hidden>Year Level</option>
                                                <option value="1st Year">1st Year</option>
                                                <option value="2nd Year">2nd Year</option>
                                                <option value="3rd Year">3rd Year</option>
                                                <option value="4th Year">4th Year</option>
                                                <option value="5th Year">5th Year</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="password" class="form-control form-control-user" name="passw" placeholder="Enter Password" required onblur="trimInputValue(this)">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="password" class="form-control form-control-user" name="cpassw" placeholder="Confirm Password" required onblur="trimInputValue(this)">
                                        </div>
                                    </div>
                                    <button name="btnReg" class="btn btn-success btn-user btn-block">Register</button>
                                    <div class="text-center">
                                        <br>
                                        <a class="small" href="stu_login.php">Have an account? Login!</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <?php
    include('utilities/js.php');
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>