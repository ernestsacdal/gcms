<?php
include('../dbc.php');
session_start();

require('phpmailer/src/PHPMailer.php');
require('phpmailer/src/SMTP.php');
require('phpmailer/src/Exception.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['btnLogout'])) {
    unset($_SESSION['unamee']);
    session_destroy();
    header('Location: dir_login.php');
    die();
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['btnEdit'])) {
    $uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $bdate = $_POST['bdate'];


    $student = "UPDATE director SET uname = '$uname', fname = '$fname', lname = '$lname', contact = '$contact', position = '$position', email = '$email', bdate = '$bdate' WHERE uname='$uname'";
    $result = mysqli_query($link, $student);
    if ($result) {
        header('Location: dir_profile.php');
    }
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['upload'])) {
    $uname = $_POST['uname'];
    $file_name = $_FILES['img']['name'];
    $file_tmp = $_FILES['img']['tmp_name'];
    $file_type = $_FILES['img']['type'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $extensions = array("jpeg", "jpg", "png");

    if (!in_array($file_ext, $extensions)) {
        echo "Extension not allowed, please choose a JPEG or PNG file.";
        exit();
    }

    $upload_folder = "profile/";
    $path = $upload_folder . $file_name;
    move_uploaded_file($file_tmp, $path);


    $link = mysqli_connect("localhost", "root", "", "gcms");
    $query = "UPDATE director SET profile_path='$path' WHERE uname='$uname'";
    mysqli_query($link, $query);

    mysqli_close($link);

    // Redirect to student profile page
    header("Location: dir_profile.php");
    exit();
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_GET['file_id'])) {
    $file_id = $_GET['file_id'];

    $sql = mysqli_query($link, "SELECT * FROM `signature` WHERE `id` = '$file_id'") or die("Error");
    $fetch = mysqli_fetch_array($sql);
    $filename = $fetch['file'];
    header("Content-Disposition: attachment; filename=" . $filename);
    header("Content-Type: application/octet-stream");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Transfer-Encoding: Binary");
    header('Content-Description: File Transfer');
    header("Pragma:public");
    header("Expires: 0");
    readfile("../student/uploads/" . $filename);

    // $sql = "SELECT * FROM records WHERE id = '$file_id'";
    // $result = mysqli_query($link, $sql);
    // $row = mysqli_fetch_assoc($result);
    // $count = $row['download'] + 1;

    // $sqlu = "UPDATE records SET download = '$count' WHERE id = '$file_id' ";
    // $result = mysqli_query($link, $sqlu);

    exit;

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['btnRej'])) {
    $id = $_POST['IDrej'];
    $reject = $_POST['reject'];
    $stid = $_POST['STIDrej'];
    $rej = "UPDATE `signature` SET report ='$reject' WHERE id = '$id'";
    $rej_run = mysqli_query($link, $rej);

    if ($rej_run)
        $status = "UPDATE `signature` SET `status` = 2 WHERE id = '$id'";
    $status_run = mysqli_query($link, $status);
    $em = "SELECT * FROM student WHERE stid = '$stid'";
    $em_run = mysqli_query($link, $em);
    $row2 = mysqli_fetch_assoc($em_run);
    $fname = $row2['fname'];
    $email = $row2['email'];
    $html_body = "
        <html>
        <head>
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
                    background-color: #FF0000;
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
                    background-color: #f0ad4e;
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
                    <h1>Guidance & Counseling</h1>
                </div>
                <div class='content'>
                <p>Dear<b> $fname<b/>,</p>
                <p>We regret to inform you that your recent signature request has been rejected.</p>
                <p>We understand that this may cause inconvenience, and we apologize for any inconvenience caused. If you have any further questions or require additional assistance, please feel free to contact our office.</p>
                <p>Thank you for your understanding!</p>
                <a href='http://localhost/gcms/student/stu_login.php' class='button' style='color: #fff;'>Visit our website</a>
                </div>
            </div>
        </body>
        </html>
    ";
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->Username = 'atategco2023@gmail.com';
    $mail->Password = 'virejbzkyhytcjny';
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->setFrom('atategco2023@gmail.com', 'Guidance & Counseling');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Signature Request";
    $mail->Body = "$html_body";
    $mail->send();
    if ($status_run) {
        header('Location: dir_sig.php');
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['btnAcc'])) {
    $accept = $_POST['accept'];
    $uname = $_POST['uname'];
    $IDacc = $_POST['IDacc'];
    $report = $_POST['repAcc'];
    $stid = $_POST['STIDacc'];

    if (!empty($report)) {
        $pickup_text = "Pickup date: $accept \n \n Report: $report";
    } else {
        $pickup_text = "Pickup date: $accept";
    }


    $acc = "UPDATE `signature` SET report = '$pickup_text' WHERE id = '$IDacc'";
    $acc_run = mysqli_query($link, $acc);
    if ($acc_run)
        $status = "UPDATE `signature` SET `status` = 1 WHERE id = '$IDacc'";
    $status_run = mysqli_query($link, $status);
    $em = "SELECT * FROM student WHERE stid = '$stid'";
    $em_run = mysqli_query($link, $em);
    $row2 = mysqli_fetch_assoc($em_run);
    $fname = $row2['fname'];
    $email = $row2['email'];
    $html_body = "
        <html>
        <head>
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
                    background-color: #228B22;
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
                    background-color: #f0ad4e;
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
                    <h1>Guidance & Counseling</h1>
                </div>
                <div class='content'>
                    <p>Dear<b> $fname<b/>,</p>
                    <p>We are pleased to inform you that your recent signature request has been approved.</p>
                    <p> We have processed your request, and the requested document(s) are now available in our office.</p>
                    <p>If you have any further inquiries or need assistance, please don't hesitate to contact our office. We are here to help.</p>
                    <p>Thank you for your patience and cooperation throughout this process.</p>
                    <a href='http://localhost/gcms/student/stu_login.php' class='button' style='color: #fff;'>Visit our website</a>
                </div>
            </div>
        </body>
        </html>
    ";
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->Username = 'atategco2023@gmail.com';
    $mail->Password = 'virejbzkyhytcjny';
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->setFrom('atategco2023@gmail.com', 'Guidance & Counseling');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Signature Request";
    $mail->Body = "$html_body";
    $mail->send();
    if ($status_run) {
        header('Location: dir_sig.php');
    }
}
?>