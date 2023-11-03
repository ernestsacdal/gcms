<?php
include('../dbc.php');
session_start();
require('phpmailer/src/PHPMailer.php');
require('phpmailer/src/SMTP.php');
require('phpmailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['btnRejDoc'])) {
    $uname = $_POST['uname'];
    $id = $_POST['docuID'];
    $stid = $_POST['docstID'];
    $reject = $_POST['reject'];
    $rej = "UPDATE document SET pickup ='$reject' WHERE id = '$id'";
    $rej_run = mysqli_query($link, $rej);

    if ($rej_run)
        $status = "UPDATE document SET status = 2 WHERE id = '$id'";
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
                    <p>We regret to inform you that your recent document request has been rejected.</p>
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
    $mail->Subject = "Document Request";
    $mail->Body = "$html_body";
    $mail->send();
    if ($status_run) {
        $name = "SELECT * FROM counselor WHERE uname = '$uname'";
        $name_run = mysqli_query($link, $name);
        $row = mysqli_fetch_assoc($name_run);
        $f = $row['fname'];
        $l = $row['lname'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO counhistory (`time`, activity, user, uname)
    VALUES ('$currentTime', 'Rejects document request of student(Student ID: $stid)', '$f $l', '$uname')";
        $his_run = mysqli_query($link, $his);
        header('Location: coun_docu.php');
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnAccDoc'])) {
    $accept = $_POST['accept'];
    $uname = $_POST['uname'];
    $docuIDAcc = $_POST['docuIDAcc'];
    $report = $_POST['repAcc'];
    $stid = $_POST['docAstID'];

    if (!empty($report)) {
        $pickup_text = "Pickup date: $accept \n \n Report: $report";
    } else {
        $pickup_text = "Pickup date: $accept";
    }


    $acc = "UPDATE document SET pickup = '$pickup_text' WHERE id = '$docuIDAcc'";
    $acc_run = mysqli_query($link, $acc);
    if ($acc_run)
        $status = "UPDATE document SET status = 1 WHERE id = '$docuIDAcc'";
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
                    <p>We are pleased to inform you that your recent document request has been approved.</p>
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
    $mail->Subject = "Document Request";
    $mail->Body = "$html_body";
    $mail->send();
    if ($status_run) {
        $name = "SELECT * FROM counselor WHERE uname = '$uname'";
        $name_run = mysqli_query($link, $name);
        $row = mysqli_fetch_assoc($name_run);
        $f = $row['fname'];
        $l = $row['lname'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO counhistory (`time`, activity, user, uname)
    VALUES ('$currentTime', 'Accepts document request of student(Student ID: $stid)', '$f $l', '$uname')";
        $his_run = mysqli_query($link, $his);
        header('Location: coun_docu.php');
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnAccApp'])) {
    $reject = $_POST['reject'];
    $uname = $_POST['uname'];
    $id = $_POST['appIDAcc'];
    $avid = $_POST['avid'];
    $report = $_POST['repAcc'];
    $stid = $_POST['appstIDA'];

    // if (!empty($report)) {
    //     $pickup_text = "Appointment date: $accept \n \n Report: $report";
    // } else {
    //     $pickup_text = "Appointment date: $accept";
    // }


    // $acc = "UPDATE appointment SET sched = '$pickup_text' WHERE id = '$id'";
    // $acc_run = mysqli_query($link, $acc);

    $status = "UPDATE appointment SET status = 1 WHERE id = '$id'";
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
                    <p>We are pleased to inform you that your appointment request has been approved.</p>
                    <p>Please make sure to arrive on the given date and bring any necessary documentation or materials required for the appointment. If you have any questions or need to reschedule, please contact our office as soon as possible.</p>
                    <p>We look forward to meeting with you and addressing your needs. If there are any updates or changes to the appointment, we will notify you promptly.</p>
                    <p>Thank you for your cooperation.</p>
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
    $mail->Subject = "Appointment Request";
    $mail->Body = "$html_body";
    $mail->send();
    if ($status_run) {
        $av = "SELECT * FROM availability WHERE id = '$avid'";
        $av_run = mysqli_query($link, $av);
        $row2 = mysqli_fetch_assoc($av_run);
        $slot = $row2['slot'] - 1;

        $upd = "UPDATE availability SET slot = '$slot' WHERE id = '$avid'";
        $upd_run = mysqli_query($link, $upd);
        if ($upd_run) {



            $name = "SELECT * FROM counselor WHERE uname = '$uname'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO counhistory (`time`, activity, user, uname)
    VALUES ('$currentTime', 'Accepts appointment request of student(Student ID: $stid)', '$f $l', '$uname')";
            $his_run = mysqli_query($link, $his);
            header('Location: coun_app.php');
        }
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['btnRejApp'])) {
    $id = $_POST['appID'];
    $uname = $_POST['uname'];
    $stid = $_POST['appstIDR'];
    $status = "UPDATE appointment SET status = 2 WHERE id = '$id'";
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
                    <p>We regret to inform you that your recent appointment request has been rejected.</p>
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
    $mail->Subject = "Appointment Request";
    $mail->Body = "$html_body";
    $mail->send();
    if ($status_run) {
        $name = "SELECT * FROM counselor WHERE uname = '$uname'";
        $name_run = mysqli_query($link, $name);
        $row = mysqli_fetch_assoc($name_run);
        $f = $row['fname'];
        $l = $row['lname'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO counhistory (`time`, activity, user, uname)
    VALUES ('$currentTime', 'Rejects appointment request of student(Student ID: $stid)', '$f $l', '$uname')";
        $his_run = mysqli_query($link, $his);
        header('Location: coun_app.php');
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_GET['accRtn'])) {
    $id = $_GET['accRtn'];
    $stid = $_GET['stid'];
    $uname = $_GET['uname'];
    $acc = "UPDATE routine_req SET `status` = 1 WHERE id = '$id'";
    $acc_run = mysqli_query($link, $acc);

    if ($acc_run) {
        $status = "UPDATE student SET statusK = 2 WHERE stid = '$stid'";
        $status_run = mysqli_query($link, $status);
        if ($status_run) {
            $name = "SELECT * FROM counselor WHERE uname = '$uname'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO counhistory (`time`, activity, user, uname)
    VALUES ('$currentTime', 'Accepts routine form request of student(Student ID: $stid)', '$f $l', '$uname')";
            $his_run = mysqli_query($link, $his);
            header('Location: coun_routine.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_GET['delRtn'])) {
    $id = $_GET['delRtn'];
    $uname = $_GET['uname'];
    $stid = $_GET['stid'];
    $acc = "UPDATE routine_req SET `status` = 2 WHERE id = '$id'";
    $acc_run = mysqli_query($link, $acc);

    if ($acc_run) {
        $status = "UPDATE student SET statusK = 0 WHERE stid = '$stid'";
        $status_run = mysqli_query($link, $status);
        if ($status_run) {
            $name = "SELECT * FROM counselor WHERE uname = '$uname'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO counhistory (`time`, activity, user, uname)
    VALUES ('$currentTime', 'Rejects routine form request of student(Student ID: $stid)', '$f $l', '$uname')";
            $his_run = mysqli_query($link, $his);
            header('Location: coun_routine.php');
        }
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_GET['accPeer'])) {
    $stid = $_GET['accPeer'];
    $peer = "UPDATE peer SET `status` = 1 WHERE stid = '$stid'";
    $peer_run = mysqli_query($link, $peer);

    if ($peer_run) {
        $status = "UPDATE student SET statusL = 1 WHERE stid = '$stid'";
        $status_run = mysqli_query($link, $status);
        if ($status_run) {
            $name = "SELECT * FROM counselor WHERE uname = '$uname'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO counhistory (`time`, activity, user, uname)
    VALUES ('$currentTime', 'Accepts a new member for peer organization(Student ID: $stid)', '$f $l', '$uname')";
            $his_run = mysqli_query($link, $his);
            header('Location: coun_peer.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_GET['delPeer'])) {
    $stid = $_GET['delPeer'];
    $uname = $_GET['uname'];
    $peer = "UPDATE peer SET `status` = 2 WHERE stid = '$stid'";
    $peer_run = mysqli_query($link, $peer);

    if ($peer_run) {
        $status = "UPDATE student SET statusL = 0 WHERE stid = '$stid'";
        $status_run = mysqli_query($link, $status);
        if ($status_run) {
            $del = "UPDATE peer SET training = NULL, faci = NULL WHERE stid = '$stid'";
            $del_run = mysqli_query($link, $del);
            if ($del_run) {
                $name = "SELECT * FROM counselor WHERE uname = '$uname'";
                $name_run = mysqli_query($link, $name);
                $row = mysqli_fetch_assoc($name_run);
                $f = $row['fname'];
                $l = $row['lname'];
                date_default_timezone_set('Asia/Manila');
                $currentTime = date("g:i a");
                $his = "INSERT INTO counhistory (`time`, activity, user, uname)
        VALUES ('$currentTime', 'Rejects Peer membership form of a student (Student ID: $stid)', '$f $l', '$uname')";
                $his_run = mysqli_query($link, $his);
                header('Location: coun_peer.php');
            }
        }
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnRem'])) {
    $uname = $_POST['uname'];
    $stid = $_POST['delstid'];
    $stat = "UPDATE student SET statusL = 0 WHERE stid = '$stid'";
    $stat_run = mysqli_query($link, $stat);

    if ($stat_run) {
        $rem = "DELETE FROM `peer` WHERE stid = '$stid'";
        $rem_run = mysqli_query($link, $rem);
        if ($rem_run) {
            $name = "SELECT * FROM counselor WHERE uname = '$uname'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO counhistory (`time`, activity, user, uname)
        VALUES ('$currentTime', 'Removes a member of Peer Organization (Student ID: $stid)', '$f $l', '$uname')";
            $his_run = mysqli_query($link, $his);
            header('Location: coun_peerMem.php');
        }
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnLogout'])) {
    $uname = $_SESSION['uname'];
    $name = "SELECT * FROM counselor WHERE uname = '$uname'";
    $name_run = mysqli_query($link, $name);
    $row = mysqli_fetch_assoc($name_run);
    $f = $row['fname'];
    $l = $row['lname'];
    date_default_timezone_set('Asia/Manila');
    $currentTime = date("g:i a");
    $his = "INSERT INTO counhistory (`time`, activity, user, uname)
    VALUES ('$currentTime', 'Logged out', '$f $l', '$uname')";
    $his_run = mysqli_query($link, $his);
    unset($_SESSION['uname']);
    session_destroy();
    header('Location: coun_login.php');
    die();
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
    $query = "UPDATE counselor SET profile_path='$path' WHERE uname='$uname'";
    mysqli_query($link, $query);

    mysqli_close($link);

    // Redirect to student profile page
    header("Location: coun_profile.php");
    exit();
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



if (isset($_POST['btnEdit'])) {
    $uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $bdate = $_POST['bdate'];


    $student = "UPDATE counselor SET uname = '$uname', fname = '$fname', lname = '$lname', contact = '$contact', position = '$position', email = '$email', bdate = '$bdate' WHERE uname='$uname'";
    $result = mysqli_query($link, $student);
    if ($result) {
        $name = "SELECT * FROM counselor WHERE uname = '$uname'";
        $name_run = mysqli_query($link, $name);
        $row = mysqli_fetch_assoc($name_run);
        $f = $row['fname'];
        $l = $row['lname'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO counhistory (`time`, activity, user, uname)
    VALUES ('$currentTime', 'Updated account user information', '$f $l', '$uname')";
        $his_run = mysqli_query($link, $his);
        header('Location: coun_profile.php');
    }
}
// }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// if (isset($_POST['btnTl'])) {
//     for ($i = 1; $i <= 2; $i++) {
//         $checkboxName = "enableTextboxes{$i}";

//         // Check if the checkbox is checked for the current form
//         if (isset($_POST[$checkboxName]) && $_POST[$checkboxName] == "on") {
//             // Get data from the form
//             $date = $_POST["date"];
//             $timeslot = $_POST["timeslot"];
//             $slot = $_POST["slot"];

//             // Perform the MySQL INSERT query (customize as needed)
//             $sql = "INSERT INTO availability (date, timeslot, slot) VALUES (?, ?, ?)";
//             $stmt = $link->prepare($sql);
//             $stmt->bind_param("sss", $date, $timeslot, $slot);

//             if ($stmt->execute()) {
//                 header('Location: coun_appo.php');
//             } else {
//                 echo "Error inserting data for Form {$i}: " . $stmt->error . "<br>";
//             }
//         }
//     }
// }




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['btnAppo'])) {
    $uname = $_POST['uname'];
    $appoID = $_POST['appoID'];
    $appo = "DELETE FROM availability WHERE id = '$appoID'";
    $appo_run = mysqli_query($link, $appo);

    if ($appo_run) {
        //     $name = "SELECT * FROM counselor WHERE uname = '$uname'";
        //     $name_run = mysqli_query($link, $name);
        //     $row = mysqli_fetch_assoc($name_run);
        //     $f = $row['fname'];
        //     $l = $row['lname'];
        //     date_default_timezone_set('Asia/Manila');
        //     $currentTime = date("g:i a");
        //     $his = "INSERT INTO counhistory (`time`, activity, user, uname)
        // VALUES ('$currentTime', 'Removes a member of Peer Organization (Student ID: $stid)', '$f $l', '$uname')";
        //     $his_run = mysqli_query($link, $his);
        header('Location: coun_appo.php');
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
