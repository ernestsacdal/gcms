<?php
session_start();
include('../dbc.php');
include('utilities/head.php');

require('phpmailer/src/PHPMailer.php');
require('phpmailer/src/SMTP.php');
require('phpmailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['btnForgot'])) {
    $stid = $_POST['stid'];

    $stmt = mysqli_prepare($link, "SELECT email FROM student WHERE stid = ?");
    mysqli_stmt_bind_param($stmt, "s", $stid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $email = $row['email'];

        $verificationCode = rand(100000, 999999);
        $_SESSION['verificationCode'] = $verificationCode;
        $_SESSION['stid'] = $stid;


        $mailer = new PHPMailer();

        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'atategco2023@gmail.com';
        $mailer->Password = 'virejbzkyhytcjny';
        $mailer->SMTPSecure = 'tls';
        $mailer->Port = 587;
        $html_body = "<html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <title>Verification Code</title>
            <style>
                /* Add your custom CSS styles here */
                body {
                    font-family: Arial, sans-serif;
                    font-size: 16px;
                    color: #333;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                }
                .header {
                    background-color: #007bff;
                    padding: 10px;
                    color: #fff;
                    text-align: center;
                }
                .content {
                    padding: 20px;
                    background-color: #f5f5f5;
                    border: 1px solid #ddd;
                    border-radius: 10px;
                }
                .button {
                    background-color: #007bff;
                    color: #fff;
                    text-decoration: none;
                    padding: 10px;
                    border-radius: 5px;
                    display: inline-block;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>Verification Code</h1>
                </div>
                <div class='content'>
                    <p>Dear Student,</p>
                    <p>Your verification code is: <b>$verificationCode</b></p>
                    <p>Please enter this code in the verification page to reset your password.</p>
                </div>
            </div>
        </body>
        </html>";

        $mailer->setFrom('atategco2023@gmail.com', 'Guidance & Counseling');
        $mailer->addAddress($email);

        $mailer->isHTML(true);
        $mailer->Subject = 'Your Verification Code for Password Reset';
        $mailer->Body = $html_body;

        if ($mailer->send()) {
            $_SESSION['successVer'] = 'A verification code was sent to your email';
            header("Location: stu_vpassword.php");

        } else {
            $_SESSION['forgotError'] = 'An error occurred while sending the email. Please try again later.';
        }
    } else {
        $_SESSION['forgot'] = 'The student ID you entered does not exist in our database.';
    }
}

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
    </style>
<body class="bg-gradient-warning">


<div class="container">

<!-- Outer Row src="img/profile-1.png" -->
<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-block">
                    </div>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                            <?php
                                if (isset($_SESSION['forgot']) && $_SESSION['forgot'] != '') {
                                    echo '<div class="alert alert-danger" role="alert">
                                             <strong>' . $_SESSION['forgot'] . '</strong>
                                          </div>';
                                    unset($_SESSION['forgot']);
                                }
                                if (isset($_SESSION['forgotError']) && $_SESSION['forgotError'] != '') {
                                    echo '<div class="alert alert-danger" role="alert">
                                             <strong>' . $_SESSION['forgotError'] . '</strong>
                                          </div>';
                                    unset($_SESSION['forgotError']);
                                }
                                ?>
                                <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
                            </div>
                            <form class="user" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        id="exampleInputEmail" name="stid" placeholder="Enter Student ID">
                                </div>
                                <button name="btnForgot"
                                    class="btn btn-success btn-dark btn-dark-green btn-user btn-block">Send
                                    Verification Code</button>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="stu_login.php">Go back!</a>
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