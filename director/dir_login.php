<?php
include('utilities/head.php');
include('../dbc.php');

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../dbc.php'; // The mysql database connection script
require 'mailer/autoload.php';


$error = '';
$incorrect = '';
$un = '';
if (isset($_POST['login'])) {

    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $query = $link->prepare("SELECT * FROM director WHERE uname = ?");
    $query->bind_param("s", $uname);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $fetch = $result->fetch_assoc();
        if (password_verify($password, $fetch['password'])) {
            try {
                $otp = rand(100000, 999999);
                $query = "UPDATE `director` SET `otp` = '$otp' WHERE `uname` = '$uname'";
                $result = $link->query($query);
                if ($result) {
                    //Send the OTP to the user's email using phpmailer
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'atategco2023@gmail.com';
                    $mail->Password = 'virejbzkyhytcjny';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                    $mail->setFrom('atategco2023@gmail.com', 'Guidance & Counseling');
                    $mail->addAddress($fetch['email']);
                    $mail->isHTML(true);
                    $mail->Subject = 'OTP VERIFICATION';
                    $mail->Body = "<html>
                    <head>
                        <title>OTP Email</title>
                        <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Added to center-align the content */
        }
        
        h1 {
            color: #333;
        }
        
        p {
            margin-bottom: 20px;
            color: #555;
            text-align: center; /* Added to center-align the paragraph */
        }
        
        .otp {
            font-size: 28px;
            font-weight: bold;
            color: #007bff;
        }
        
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 30px;
        }
        
        .button:hover {
            background-color: #0056b3;
        }
    </style>
                    </head>
                    <body>
                        <div class='container'>
                            <h1>OTP Verification</h1>
                            <p>Please use the following OTP to verify your account:</p>
                            <p class='otp'>$otp</p>
                            <a href='http://localhost/gcms/director/dir_login.php' class='button' style='color: #fff;'>Visit our website</a>
                        </div>
                    </body>
                    </html>";
                    $mail->send();
                    $_SESSION['otp'] = "The OTP has been sent to your email. Kindly check your email.";
                    header('Location: otp.php');
                } else {
                    echo "Error: " . $query . "<br>" . $link->error;
                }
            } catch (Exception $e) {
                $error = 1;
                // $_SESSION['error'] = "Error sending OTP!'";
                // header('Location: coun_login.php');

                // <!-- <script type="text/javascript">
                //         alert('Error sending OTP! The message failed with status: p echo $e->getMessage(); ');
                //         window.location = 'coun_login.php';
                //      -->

            }
        } else {
            $incorrect = 1;
            // // $_SESSION['incorrect'] = "Incorrect password!'";
            // // header('Location: coun_login.php');

            // <!-- <script type="text/javascript">
            //         alert('Incorrect password!');
            //         window.location = 'coun_login.php';
            //     </script> -->

        }
    } else {
        $un = 1;
        // $_SESSION['un'] = "Username not found!'";
        // header('Location: coun_login.php');

        // <!-- <script type="text/javascript">
        //         alert('Username not found!');
        //         window.location = 'coun_login.php';
        //     </script> -->

    }
}
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
                                        if ($incorrect == 1) {
                                            echo '<div class="alert alert-danger alert-dismissible fade show center-block" role="alert">
                                            <h5 class="text-center">
                                            Wrong Password</h5>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>';
                                        }

                                        if ($un == 1) {
                                            echo '<div class="alert alert-danger alert-dismissible fade show center-block" role="alert">
                                            <h5 class="text-center">
                                            Username not found!</h5>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>';
                                        }

                                        if ($error == 1) {
                                            echo '<div class="alert alert-danger alert-dismissible fade show center-block" role="alert">
                                            <h5 class="text-center">
                                            Error sending OTP!</h5>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>';
                                        }
                                        ?>
                                        <h1 class="h4 text-gray-900 mb-4">School Director</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Enter Username" name="uname">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>

                                        <input type="submit" name="login" value="Login" class="btn btn-success btn-user btn-block">
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
                                        <a class="small" href="dir_fpassword.php">Forgot Password?</a>
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