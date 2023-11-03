<?php
include('../dbc.php');
session_start();
if (isset($_POST['btnLogout'])) {
    $stid = $_SESSION['stidd'];
    $name = "SELECT * FROM student WHERE stid = '$stid'";
    $name_run = mysqli_query($link, $name);
    $row = mysqli_fetch_assoc($name_run);
    $f = $row['fname'];
    $l = $row['lname'];
    date_default_timezone_set('Asia/Manila');
    $currentTime = date("g:i a");
    $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Logged out', '$f $l', '$stid')";
    $his_run = mysqli_query($link, $his);
    unset($_SESSION['stidd']);
    session_destroy();
    header('Location: stu_login.php');
    die();
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  

if (isset($_POST['btnCampus'])) {
    $stid = $_POST['stid'];
    $campus = $_POST['campus'];
    $college = $_POST['college'];

    $major = $_POST['major'];
    $type = $_POST['type'];


    $query = "INSERT INTO campus (stid, campus, college, major, stutype)
              VALUES (?, ?, ?, ?, ?)
              ON DUPLICATE KEY UPDATE
                campus = ?,
                college = ?,
                major = ?,
                stutype = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssssssss", $stid, $campus, $college, $major, $type, $campus, $college, $major, $type);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $student = "UPDATE student SET statusA = 1 WHERE stid=?";
        $student_stmt = mysqli_prepare($link, $student);
        mysqli_stmt_bind_param($student_stmt, "s", $stid);
        mysqli_stmt_execute($student_stmt);
        if ($student_stmt) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
            VALUES ('$currentTime', 'Filled out the College form', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnFamily'])) {
    $stid = $_POST['stid'];
    $father = $_POST['father'];
    $feduc = $_POST['feduc'];
    $foccu = $_POST['foccu'];
    $fincome = $_POST['fincome'];
    $fbusiness = $_POST['fbusiness'];
    $fwork = $_POST['fwork'];
    $fcontact = $_POST['fcontact'];
    $mother = $_POST['mother'];
    $meduc = $_POST['meduc'];
    $moccu = $_POST['moccu'];
    $mincome = $_POST['mincome'];
    $mbusiness = $_POST['mbusiness'];
    $mwork = $_POST['mwork'];
    $mcontact = $_POST['mcontact'];
    $sibling = $_POST['sibling'];
    $order = $_POST['order'];
    $cond = $_POST['cond'];

    $stmt_father = $link->prepare("INSERT INTO father (stid, father, educ, occu, income, emp, workadd, contact)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)
              ON DUPLICATE KEY UPDATE
              father = ?,
              educ = ?,
              occu = ?,
              income = ?,
              emp = ?,
              workadd = ?,
              contact = ?");
    $stmt_father->bind_param("sssssssssssssss", $stid, $father, $feduc, $foccu, $fincome, $fbusiness, $fwork, $fcontact, $father, $feduc, $foccu, $fincome, $fbusiness, $fwork, $fcontact);
    $father_run = $stmt_father->execute();
    $stmt_father->close();
    if ($father_run) {
        $stmt_mother = $link->prepare("INSERT INTO mother (stid, mother, educ, occu, income, emp, workadd, contact)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)
              ON DUPLICATE KEY UPDATE
              mother = ?,
              educ = ?,
              occu = ?,
              income = ?,
              emp = ?,
              workadd = ?,
              contact = ?");
        $stmt_mother->bind_param("sssssssssssssss", $stid, $mother, $meduc, $moccu, $mincome, $mbusiness, $mwork, $mcontact, $mother, $meduc, $moccu, $mincome, $mbusiness, $mwork, $mcontact);
        $mother_run = $stmt_mother->execute();
        $stmt_mother->close();
        if ($mother_run) {
            $stmt_fam = $link->prepare("INSERT INTO fam (stid, sibling, `order`, cond)
                VALUES (?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
              sibling = ?,
              `order` = ?,
              cond = ?");
            $stmt_fam->bind_param("sssssss", $stid, $sibling, $order, $cond, $sibling, $order, $cond);
            $fam_run = $stmt_fam->execute();
            $stmt_fam->close();
            if ($fam_run) {
                $stmt_student = $link->prepare("UPDATE student SET statusC = 1 WHERE stid=?");
                $stmt_student->bind_param("s", $stid);
                $student_run = $stmt_student->execute();
                $stmt_student->close();
                if ($student_run) {
                    $name = "SELECT * FROM student WHERE stid = '$stid'";
                    $name_run = mysqli_query($link, $name);
                    $row = mysqli_fetch_assoc($name_run);
                    $f = $row['fname'];
                    $l = $row['lname'];
                    date_default_timezone_set('Asia/Manila');
                    $currentTime = date("g:i a");
                    $his = "INSERT INTO history (`time`, activity, user, stid)
            VALUES ('$currentTime', 'Filled out the Family Background form', '$f $l', '$stid')";
                    $his_run = mysqli_query($link, $his);
                    header('Location: stu_info.php');
                    exit();
                }
            }
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnPersonal'])) {
    $stid = $_POST['stid'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $sex = $_POST['sex'];
    $civil = $_POST['civil'];
    $citizen = $_POST['citizen'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $religion = $_POST['religion'];
    $blood = $_POST['blood'];

    $query = "INSERT INTO personal (stid, address, contact, sex, civil, citizen, height, weight, religion, blood)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
              ON DUPLICATE KEY UPDATE
                address = ?,
                contact = ?,
                sex = ?,
                civil = ?,
                citizen = ?,
                height = ?,
                weight = ?,
                religion = ?,
                blood = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $stid, $address, $contact, $sex, $civil, $citizen, $height, $weight, $religion, $blood, $address, $contact, $sex, $civil, $citizen, $height, $weight, $religion, $blood);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $student = "UPDATE student SET statusB = 1 WHERE stid=?";
        $stmt_student = mysqli_prepare($link, $student);
        mysqli_stmt_bind_param($stmt_student, "s", $stid);
        mysqli_stmt_execute($stmt_student);
        if ($stmt_student) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
            VALUES ('$currentTime', 'Filled out the Personal Background form', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnScholarship'])) {
    $stid = $_POST['stid'];
    $assist = $_POST['assist'];
    $grantee = $_POST['grantee'];
    $working = $_POST['working'];
    $other = $_POST['other'];
    $dependent = $_POST['dependent'];
    $solo = $_POST['solo'];
    $pwd = $_POST['pwd'];
    $indi = $_POST['indi'];
    $dependent_id = $_POST['dependent_id'];
    $solo_id = $_POST['solo_id'];
    $pwd_id = $_POST['pwd_id'];
    $indi_specify = $_POST['indi_specify'];

    $query = "INSERT INTO scholarship (stid, assist, grantee, working, other, dependent, solo, pwd, indeg, depID, soloID, pwdID, indID)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
          ON DUPLICATE KEY UPDATE
          assist = ?,
          grantee = ?,
          working = ?,
          other = ?,
          dependent = ?,
          solo = ?,
          pwd = ?,
          indeg = ?,
          depID = ?,
          soloID = ?,
          pwdID = ?,
          indID = ?";

    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssss", $stid, $assist, $grantee, $working, $other, $dependent, $solo, $pwd, $indi, $dependent_id, $solo_id, $pwd_id, $indi_specify, $assist, $grantee, $working, $other, $dependent, $solo, $pwd, $indi, $dependent_id, $solo_id, $pwd_id, $indi_specify);

    if (mysqli_stmt_execute($stmt)) {
        $student = "UPDATE student SET statusD = 1 WHERE stid=?";
        $stmt2 = mysqli_prepare($link, $student);
        mysqli_stmt_bind_param($stmt2, "s", $stid);
        mysqli_stmt_execute($stmt2);
        if ($stmt2) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
            VALUES ('$currentTime', 'Filled out the Scholarship/Financial Assistance form', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnEduc'])) {
    $stid = $_POST['stid'];
    $shs = $_POST['shs'];
    $strand = $_POST['strand'];
    $shsGrad = $_POST['shsGrad'];
    $shsHnr = $_POST['shsHnr'];
    $jhs = $_POST['jhs'];
    $jhsGrad = $_POST['jhsGrad'];
    $jhsHnr = $_POST['jhsHnr'];
    $elem = $_POST['elem'];
    $elemGrad = $_POST['elemGrad'];
    $elemHnr = $_POST['elemHnr'];

    if ($strand === "Other") {
        $strand = $_POST['other_strand'];
    }

    $query = "INSERT INTO education (stid, shs, strand, shsGrad, shsHnr, jhs, jhsGrad, jhsHnr, elem, elemGrad, elemHnr)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
              ON DUPLICATE KEY UPDATE
              shs = ?,
              strand = ?,
              shsGrad = ?,
              shsHnr = ?,
              jhs = ?,
              jhsGrad = ?,
              jhsHnr = ?,
              elem = ?,
              elemGrad = ?,
              elemHnr = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssssss", $stid, $shs, $strand, $shsGrad, $shsHnr, $jhs, $jhsGrad, $jhsHnr, $elem, $elemGrad, $elemHnr, $shs, $strand, $shsGrad, $shsHnr, $jhs, $jhsGrad, $jhsHnr, $elem, $elemGrad, $elemHnr);
    mysqli_stmt_execute($stmt);

    $student = "UPDATE student SET statusE = 1 WHERE stid = ?";
    $stmt2 = mysqli_prepare($link, $student);
    mysqli_stmt_bind_param($stmt2, "s", $stid);
    mysqli_stmt_execute($stmt2);
    if ($stmt2) {
        $name = "SELECT * FROM student WHERE stid = '$stid'";
        $name_run = mysqli_query($link, $name);
        $row = mysqli_fetch_assoc($name_run);
        $f = $row['fname'];
        $l = $row['lname'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO history (`time`, activity, user, stid)
VALUES ('$currentTime', 'Filled out the Educational Background form', '$f $l', '$stid')";
        $his_run = mysqli_query($link, $his);
        header('Location: stu_info.php');
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['btnSkill'])) {
    $stid = $_POST['stid'];
    $skill = $_POST['skill'];
    $hob = $_POST['hob'];
    $recog = $_POST['recog'];

    $query = "INSERT INTO skills (stid, skill, hob, recog) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE skill = ?, hob = ?, recog = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssssss", $stid, $skill, $hob, $recog, $skill, $hob, $recog);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $student = "UPDATE student SET statusF = 1 WHERE stid=?";
        $stmt2 = mysqli_prepare($link, $student);
        mysqli_stmt_bind_param($stmt2, "s", $stid);
        mysqli_stmt_execute($stmt2);
        if ($stmt2) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Filled out the Involvement in Arts and Sports form', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info.php');
        }
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnTrain'])) {
    $stid = $_POST['stid'];
    $seminar = $_POST['seminar'];
    $date = $_POST['date'];
    $agency = $_POST['agency'];

    $query = "INSERT INTO training (stid, seminar, date, agency)
              VALUES ('$stid', '$seminar', '$date', '$agency')";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $student = "UPDATE student SET statusG = 1 WHERE stid='$stid'";
        $student_run = mysqli_query($link, $student);
        if ($student_run) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Filled out the Training Programs Attended form', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnExtra'])) {
    $stid = $_POST['stid'];
    $aff = $_POST['aff'];
    $pos = $_POST['pos'];
    $period = $_POST['period'];

    $query = "INSERT INTO extra (stid, aff, pos, period)
              VALUES ('$stid', '$aff', '$pos', '$period')";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $student = "UPDATE student SET statusH = 1 WHERE stid='$stid'";
        $student_run = mysqli_query($link, $student);
        if ($student_run) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Filled out the Social and Extracurricular Activites form', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnSocial'])) {
    $stid = $_POST['stid'];
    $fb = $_POST['fb'];
    $twt = $_POST['twt'];
    $ig = $_POST['ig'];
    $yt = $_POST['yt'];

    $query = "INSERT INTO social (stid, fb, twt, ig, yt)
              VALUES ('$stid', '$fb', '$twt', '$ig', '$yt')
              ON DUPLICATE KEY UPDATE
               fb = '$fb',
               twt = '$twt',
                ig = '$ig',
               yt = '$yt'";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $student = "UPDATE student SET statusI = 1 WHERE stid='$stid'";
        $student_run = mysqli_query($link, $student);
        if ($student_run) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Filled out the Social Media Presence form', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnProceed'])) {
    $stid = $_POST['stid'];

    $student = "SELECT * FROM student WHERE stid = '$stid'";
    $result = mysqli_query($link, $student);
    $row = mysqli_fetch_assoc($result);

    $statusA = $row['statusA'];
    $statusB = $row['statusB'];
    $statusC = $row['statusC'];
    $statusD = $row['statusD'];
    $statusE = $row['statusE'];
    $statusF = $row['statusF'];
    $statusG = $row['statusG'];
    $statusH = $row['statusH'];
    $statusI = $row['statusI'];

    if ($statusA && $statusB && $statusC && $statusD && $statusE && $statusF && $statusG && $statusH && $statusI == 1) {
        $name = "SELECT * FROM student WHERE stid = '$stid'";
        $name_run = mysqli_query($link, $name);
        $row = mysqli_fetch_assoc($name_run);
        $f = $row['fname'];
        $l = $row['lname'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Provided all necessary information on the Student Profiling form', '$f $l', '$stid')";
        $his_run = mysqli_query($link, $his);
        header('Location: stu_index.php');
    } else {
        header('Location: stu_info.php');
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnEdit'])) {
    $stid = $_POST['stid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $bdate = $_POST['bdate'];
    $section = $_POST['section'];

    $student = "UPDATE student SET fname = '$fname', lname = '$lname', course = '$course', year = '$level', email = '$email', section = '$section', bdate = '$bdate' WHERE stid='$stid'";
    $result = mysqli_query($link, $student);
    if ($result) {
        $sql = "UPDATE personal SET contact = '$phone' WHERE stid= '$stid'";
        $res = mysqli_query($link, $sql);
        if ($res) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Updated account user information', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_accInfo.php');
        }
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['btnDocu'])) {
    $stid = htmlentities($_POST['stid']);
    $fname = htmlentities($_POST['fname']);
    $course = htmlentities($_POST['course']);
    $year = htmlentities($_POST['year']);
    $email = htmlentities($_POST['email']);
    $section = htmlentities($_POST['section']);
    $docu = htmlentities($_POST['docu']);
    $grad = htmlentities($_POST['grad']);
    $purpose = htmlentities($_POST['purpose']);
    if ($docu === "Other") {
        $docu = htmlentities($_POST['specify']);
    }

    $stid = mysqli_real_escape_string($link, $stid);
    $fname = mysqli_real_escape_string($link, $fname);
    $course = mysqli_real_escape_string($link, $course);
    $year = mysqli_real_escape_string($link, $year);
    $email = mysqli_real_escape_string($link, $email);
    $section = mysqli_real_escape_string($link, $section);
    $docu = mysqli_real_escape_string($link, $docu);
    $purpose = mysqli_real_escape_string($link, $purpose);
    $grad = mysqli_real_escape_string($link, $grad);

    $student = "INSERT INTO document (stid, fname, course, year, email, section, docu, purpose, grad)
    VALUES ('$stid', '$fname', '$course', '$year', '$email', '$section', '$docu', '$purpose', '$grad')";
    $result = mysqli_query($link, $student);

    if ($result) {
        $name = "SELECT * FROM student WHERE stid = '$stid'";
        $name_run = mysqli_query($link, $name);
        $row = mysqli_fetch_assoc($name_run);
        $f = $row['fname'];
        $l = $row['lname'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Requested a document($docu)', '$f $l', '$stid')";
        $his_run = mysqli_query($link, $his);
        header('Location: stu_index.php');
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnEditt'])) {
    $stid = $_POST['stid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $bdate = $_POST['bdate'];
    $address = $_POST['address'];
    $section = $_POST['section'];

    $student = "UPDATE student SET fname = '$fname', lname = '$lname', course = '$course', year = '$level', email = '$email', section = '$section', bdate = '$bdate'  WHERE stid='$stid'";
    $result = mysqli_query($link, $student);
    if ($result) {
        $sql = "UPDATE personal SET contact = '$phone' WHERE stid= '$stid'";
        $res = mysqli_query($link, $sql);
        if ($res) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Updated account user information', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_profile.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnCampuss'])) {
    $stid = $_POST['stid'];
    $campus = $_POST['campus'];
    $college = $_POST['college'];
    $course = $_POST['course'];
    $major = $_POST['major'];
    $type = $_POST['type'];
    $year = $_POST['year'];

    $query = "INSERT INTO campus (stid, campus, college, course, major, stutype, level)
              VALUES (?, ?, ?, ?, ?, ?, ?)
              ON DUPLICATE KEY UPDATE
                campus = ?,
                college = ?,
                course = ?,
                major = ?,
                stutype = ?,
                level = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssssssssssssi", $stid, $campus, $college, $course, $major, $type, $year, $campus, $college, $course, $major, $type, $year);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $student = "UPDATE student SET statusA = 1 WHERE stid=?";
        $student_stmt = mysqli_prepare($link, $student);
        mysqli_stmt_bind_param($student_stmt, "s", $stid);
        mysqli_stmt_execute($student_stmt);
        if ($student_stmt) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
            VALUES ('$currentTime', 'Updated college information in student profile', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info2.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnFamilyy'])) {
    $stid = $_POST['stid'];
    $father = $_POST['father'];
    $feduc = $_POST['feduc'];
    $foccu = $_POST['foccu'];
    $fincome = $_POST['fincome'];
    $fbusiness = $_POST['fbusiness'];
    $fwork = $_POST['fwork'];
    $fcontact = $_POST['fcontact'];
    $mother = $_POST['mother'];
    $meduc = $_POST['meduc'];
    $moccu = $_POST['moccu'];
    $mincome = $_POST['mincome'];
    $mbusiness = $_POST['mbusiness'];
    $mwork = $_POST['mwork'];
    $mcontact = $_POST['mcontact'];
    $sibling = $_POST['sibling'];
    $order = $_POST['order'];
    $cond = $_POST['cond'];

    $stmt_father = $link->prepare("INSERT INTO father (stid, father, educ, occu, income, emp, workadd, contact)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)
              ON DUPLICATE KEY UPDATE
              father = ?,
              educ = ?,
              occu = ?,
              income = ?,
              emp = ?,
              workadd = ?,
              contact = ?");
    $stmt_father->bind_param("sssssssssssssss", $stid, $father, $feduc, $foccu, $fincome, $fbusiness, $fwork, $fcontact, $father, $feduc, $foccu, $fincome, $fbusiness, $fwork, $fcontact);
    $father_run = $stmt_father->execute();
    $stmt_father->close();
    if ($father_run) {
        $stmt_mother = $link->prepare("INSERT INTO mother (stid, mother, educ, occu, income, emp, workadd, contact)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)
              ON DUPLICATE KEY UPDATE
              mother = ?,
              educ = ?,
              occu = ?,
              income = ?,
              emp = ?,
              workadd = ?,
              contact = ?");
        $stmt_mother->bind_param("sssssssssssssss", $stid, $mother, $meduc, $moccu, $mincome, $mbusiness, $mwork, $mcontact, $mother, $meduc, $moccu, $mincome, $mbusiness, $mwork, $mcontact);
        $mother_run = $stmt_mother->execute();
        $stmt_mother->close();
        if ($mother_run) {
            $stmt_fam = $link->prepare("INSERT INTO fam (stid, sibling, `order`, cond)
                VALUES (?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
              sibling = ?,
              `order` = ?,
              cond = ?");
            $stmt_fam->bind_param("sssssss", $stid, $sibling, $order, $cond, $sibling, $order, $cond);
            $fam_run = $stmt_fam->execute();
            $stmt_fam->close();
            if ($fam_run) {
                $stmt_student = $link->prepare("UPDATE student SET statusC = 1 WHERE stid=?");
                $stmt_student->bind_param("s", $stid);
                $student_run = $stmt_student->execute();
                $stmt_student->close();
                if ($student_run) {
                    $name = "SELECT * FROM student WHERE stid = '$stid'";
                    $name_run = mysqli_query($link, $name);
                    $row = mysqli_fetch_assoc($name_run);
                    $f = $row['fname'];
                    $l = $row['lname'];
                    date_default_timezone_set('Asia/Manila');
                    $currentTime = date("g:i a");
                    $his = "INSERT INTO history (`time`, activity, user, stid)
            VALUES ('$currentTime', 'Updated Family Background information in student profile', '$f $l', '$stid')";
                    $his_run = mysqli_query($link, $his);
                    header('Location: stu_info2.php');
                    exit();
                }
            }
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnPersonall'])) {
    $stid = $_POST['stid'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $sex = $_POST['sex'];
    $civil = $_POST['civil'];
    $citizen = $_POST['citizen'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $religion = $_POST['religion'];
    $blood = $_POST['blood'];

    $query = "INSERT INTO personal (stid, address, contact, sex, civil, citizen, height, weight, religion, blood)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
              ON DUPLICATE KEY UPDATE
                address = ?,
                contact = ?,
                sex = ?,
                civil = ?,
                citizen = ?,
                height = ?,
                weight = ?,
                religion = ?,
                blood = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $stid, $address, $contact, $sex, $civil, $citizen, $height, $weight, $religion, $blood, $address, $contact, $sex, $civil, $citizen, $height, $weight, $religion, $blood);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $student = "UPDATE student SET statusB = 1 WHERE stid=?";
        $stmt_student = mysqli_prepare($link, $student);
        mysqli_stmt_bind_param($stmt_student, "s", $stid);
        mysqli_stmt_execute($stmt_student);
        if ($stmt_student) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
            VALUES ('$currentTime', 'Updated Personal Background information in student profile', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info2.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnScholarshipp'])) {
    $stid = $_POST['stid'];
    $assist = $_POST['assist'];
    $grantee = $_POST['grantee'];
    $working = $_POST['working'];
    $other = $_POST['other'];
    $dependent = $_POST['dependent'];
    $solo = $_POST['solo'];
    $pwd = $_POST['pwd'];
    $indi = $_POST['indi'];
    $dependent_id = $_POST['dependent_id'];
    $solo_id = $_POST['solo_id'];
    $pwd_id = $_POST['pwd_id'];
    $indi_specify = $_POST['indi_specify'];

    $query = "INSERT INTO scholarship (stid, assist, grantee, working, other, dependent, solo, pwd, indeg, depID, soloID, pwdID, indID)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
          ON DUPLICATE KEY UPDATE
          assist = ?,
          grantee = ?,
          working = ?,
          other = ?,
          dependent = ?,
          solo = ?,
          pwd = ?,
          indeg = ?,
          depID = ?,
          soloID = ?,
          pwdID = ?,
          indID = ?";

    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssss", $stid, $assist, $grantee, $working, $other, $dependent, $solo, $pwd, $indi, $dependent_id, $solo_id, $pwd_id, $indi_specify, $assist, $grantee, $working, $other, $dependent, $solo, $pwd, $indi, $dependent_id, $solo_id, $pwd_id, $indi_specify);

    if (mysqli_stmt_execute($stmt)) {
        $student = "UPDATE student SET statusD = 1 WHERE stid=?";
        $stmt2 = mysqli_prepare($link, $student);
        mysqli_stmt_bind_param($stmt2, "s", $stid);
        mysqli_stmt_execute($stmt2);
        if ($stmt2) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
            VALUES ('$currentTime', 'Updated Scholarship/Financial information in student profile', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info2.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnEducc'])) {
    $stid = $_POST['stid'];
    $shs = $_POST['shs'];
    $strand = $_POST['strand'];
    $shsGrad = $_POST['shsGrad'];
    $shsHnr = $_POST['shsHnr'];
    $jhs = $_POST['jhs'];
    $jhsGrad = $_POST['jhsGrad'];
    $jhsHnr = $_POST['jhsHnr'];
    $elem = $_POST['elem'];
    $elemGrad = $_POST['elemGrad'];
    $elemHnr = $_POST['elemHnr'];

    if ($strand === "Other") {
        $strand = $_POST['other_strand'];
    }

    $query = "INSERT INTO education (stid, shs, strand, shsGrad, shsHnr, jhs, jhsGrad, jhsHnr, elem, elemGrad, elemHnr)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
              ON DUPLICATE KEY UPDATE
              shs = ?,
              strand = ?,
              shsGrad = ?,
              shsHnr = ?,
              jhs = ?,
              jhsGrad = ?,
              jhsHnr = ?,
              elem = ?,
              elemGrad = ?,
              elemHnr = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssssss", $stid, $shs, $strand, $shsGrad, $shsHnr, $jhs, $jhsGrad, $jhsHnr, $elem, $elemGrad, $elemHnr, $shs, $strand, $shsGrad, $shsHnr, $jhs, $jhsGrad, $jhsHnr, $elem, $elemGrad, $elemHnr);
    mysqli_stmt_execute($stmt);

    $student = "UPDATE student SET statusE = 1 WHERE stid = ?";
    $stmt2 = mysqli_prepare($link, $student);
    mysqli_stmt_bind_param($stmt2, "s", $stid);
    mysqli_stmt_execute($stmt2);
    if ($stmt2) {
        $name = "SELECT * FROM student WHERE stid = '$stid'";
        $name_run = mysqli_query($link, $name);
        $row = mysqli_fetch_assoc($name_run);
        $f = $row['fname'];
        $l = $row['lname'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO history (`time`, activity, user, stid)
VALUES ('$currentTime', 'Updated Educational information in student profile', '$f $l', '$stid')";
        $his_run = mysqli_query($link, $his);
        header('Location: stu_info2.php');
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['btnSkilll'])) {
    $stid = $_POST['stid'];
    $skill = $_POST['skill'];
    $hob = $_POST['hob'];
    $recog = $_POST['recog'];

    $query = "INSERT INTO skills (stid, skill, hob, recog) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE skill = ?, hob = ?, recog = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssssss", $stid, $skill, $hob, $recog, $skill, $hob, $recog);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $student = "UPDATE student SET statusF = 1 WHERE stid=?";
        $stmt2 = mysqli_prepare($link, $student);
        mysqli_stmt_bind_param($stmt2, "s", $stid);
        mysqli_stmt_execute($stmt2);
        if ($stmt2) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Updated Arts and Sports information in student profile', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info2.php');
        }
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnTrainn'])) {
    $stid = $_POST['stid'];
    $seminar = $_POST['seminar'];
    $date = $_POST['date'];
    $agency = $_POST['agency'];

    $query = "INSERT INTO training (stid, seminar, date, agency)
              VALUES ('$stid', '$seminar', '$date', '$agency')";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $student = "UPDATE student SET statusG = 1 WHERE stid='$stid'";
        $student_run = mysqli_query($link, $student);
        if ($student_run) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Updated Programs attended information in student profile', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info2.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnExtraa'])) {
    $stid = $_POST['stid'];
    $aff = $_POST['aff'];
    $pos = $_POST['pos'];
    $period = $_POST['period'];

    $query = "INSERT INTO extra (stid, aff, pos, period)
              VALUES ('$stid', '$aff', '$pos', '$period')";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $student = "UPDATE student SET statusH = 1 WHERE stid='$stid'";
        $student_run = mysqli_query($link, $student);
        if ($student_run) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Updated Extracurricicular activities information in student profile', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info2.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnSociall'])) {
    $stid = $_POST['stid'];
    $fb = $_POST['fb'];
    $twt = $_POST['twt'];
    $ig = $_POST['ig'];
    $yt = $_POST['yt'];

    $query = "INSERT INTO social (stid, fb, twt, ig, yt)
              VALUES ('$stid', '$fb', '$twt', '$ig', '$yt')
              ON DUPLICATE KEY UPDATE
               fb = '$fb',
               twt = '$twt',
                ig = '$ig',
               yt = '$yt'";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        $student = "UPDATE student SET statusI = 1 WHERE stid='$stid'";
        $student_run = mysqli_query($link, $student);
        if ($student_run) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Updated Social Media information in student profile', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_info2.php');
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnApp'])) {
    $id = $_POST['id'];
    $stid = $_POST['stid'];
    $fname = $_POST['fname'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $email = $_POST['email'];
    // $section = $_POST['section'];
    $purpose = $_POST['purpose'];
    $inputTimeslot = $_POST['inputTimeslot'];
    $inputSlot = $_POST['inputSlot'];
    $date = $_POST['date'];
    
    
    // $mode = $_POST['mode'];
    // if ($counseling === "Other") {
    //     $counseling = $_POST['specify'];
    // }

    $student = "INSERT INTO appointment (stid, fname, course, year, email, purpose, timeslot, avid, date)
    VALUES ('$stid', '$fname', '$course', '$year', '$email', '$purpose', '$inputTimeslot', '$id', '$date')";
    $result = mysqli_query($link, $student);

    if ($result) {
        $name = "SELECT * FROM student WHERE stid = '$stid'";
        $name_run = mysqli_query($link, $name);
        $row = mysqli_fetch_assoc($name_run);
        $f = $row['fname'];
        $l = $row['lname'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Requested an Appointment', '$f $l', '$stid')";
        $his_run = mysqli_query($link, $his);
        header('Location: stu_index.php');
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnEi'])) {
    $stid = $_POST['stid'];
    $reason = $_POST['reason'];
    $strat = $_POST['strat'];
    $quality = $_POST['quality'];
    $instruction = $_POST['instruction'];
    $response = $_POST['response'];
    $acad = $_POST['acad'];
    $sched = $_POST['sched'];
    $lecture = $_POST['lecture'];
    $comp = $_POST['comp'];
    $multi = $_POST['multi'];
    $emp = $_POST['emp'];
    $adm = $_POST['adm'];
    $medical = $_POST['medical'];
    $rules = $_POST['rules'];
    $safety = $_POST['safety'];
    $scho = $_POST['scho'];
    $registrar = $_POST['registrar'];
    $gc = $_POST['gc'];
    $arts = $_POST['arts'];
    $gs = $_POST['gs'];
    $career = $_POST['career'];
    $faith = $_POST['faith'];
    $lib = $_POST['lib'];
    $stud = $_POST['stud'];
    $sports = $_POST['sports'];
    $org = $_POST['org'];
    $pub = $_POST['pub'];
    $sci = $_POST['sci'];
    $canteen = $_POST['canteen'];
    $campus = $_POST['campus'];
    $cr = $_POST['cr'];
    $overall = $_POST['overall'];
    $exp = $_POST['exp'];
    $abi = $_POST['abi'];
    $suggest = $_POST['suggest'];
    $admit = $_POST['admit'];
    $admitSem = $_POST['admitSem'];
    $last = $_POST['last'];
    $lastSem = $_POST['lastSem'];

    if ($reason === "Other") {
        $reason = $_POST['other_leave'];
    }

    $ei = "INSERT INTO ei (stid, `reason`, strat, quality, instruction, response, acad, sched, lecture, comp, multi, emp, adm, medical, rules, safety, scho, registrar, gc, arts, gs, career, faith, lib, sports, org, pub, sci, canteen, campus, cr, overall, exp, abi, suggest, stud, admit, admitSem, `last`, lastSem)
    VALUES ('$stid', '$reason', '$strat', '$quality', '$instruction', '$response', '$acad', '$sched', '$lecture', '$comp', '$multi', '$emp', '$adm', '$medical', '$rules', '$safety', '$scho', '$registrar', '$gc', '$arts', '$gs', '$career', '$faith', '$lib', '$sports', '$org', '$pub', '$sci', '$canteen', '$campus', '$cr', '$overall', '$exp', '$abi', '$suggest', '$stud', '$admit', '$admitSem', '$last', '$lastSem')
    ON DUPLICATE KEY UPDATE
    `reason` = '$reason',
    strat = '$strat',
    quality = '$quality',
    instruction = '$instruction',
    response = '$response',
    acad = '$acad',
    sched = '$sched',
    lecture = '$lecture',
    comp = '$comp',
    multi = '$multi',
    emp = '$emp',
    adm = '$adm',
    medical = '$medical',
    rules = '$rules',
    safety = '$safety',
    scho = '$scho',
    registrar = '$registrar',
    gc = '$gc',
    arts = '$arts',
    gs = '$gs',
    career = '$career',
    faith = '$faith',
    lib = '$lib',
    sports = '$sports',
    org = '$org',
    pub = '$pub',
    sci = '$sci',
    canteen = '$canteen',
    campus = '$campus',
    cr = '$cr',
    overall = '$overall',
    exp = '$exp',
    abi = '$abi',
    suggest = '$suggest',
    stud = '$stud',
    admit = '$admit',
    admitSem = '$admitSem',
    `last` = '$last',
    lastSem = '$lastSem'
    ";
    $result = mysqli_query($link, $ei);

    if ($result) {
        $name = "SELECT * FROM student WHERE stid = '$stid'";
        $name_run = mysqli_query($link, $name);
        $row = mysqli_fetch_assoc($name_run);
        $f = $row['fname'];
        $l = $row['lname'];
        $alum = $row['alum'];
        $alumni = "UPDATE student SET alum = 1 WHERE stid = '$stid'";
        $alumni_run = mysqli_query($link, $alumni);
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Filled out the Exit Interview form', '$f $l', '$stid')";
        $his_run = mysqli_query($link, $his);
        $_SESSION['eiSave'] = "Exit interview successfully saved.";
        header('Location: stu_ei.php');
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnPeer'])) {
    $stid = $_POST['stid'];
    $training = $_POST['training'];
    $faci = $_POST['faci'];

    $peer = "INSERT INTO peer (stid, training, faci)
    VALUES ('$stid', '$training', '$faci') 
    ON DUPLICATE KEY UPDATE
    training = '$training',
    faci = '$faci',
    `status` = 0";
    $result = mysqli_query($link, $peer);

    if ($result) {
        $name = "SELECT * FROM student WHERE stid = '$stid'";
        $name_run = mysqli_query($link, $name);
        $row = mysqli_fetch_assoc($name_run);
        $f = $row['fname'];
        $l = $row['lname'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Filled out the Peer Application form', '$f $l', '$stid')";
        $his_run = mysqli_query($link, $his);
        $_SESSION['peerSave'] = "Peer Organization Form successfully saved.";
        header('Location: stu_peer.php');
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnRoutine'])) {
    $stid = $_POST['stid'];
    $parents = $_POST['parents'];
    $siblings = $_POST['siblings'];
    $relatives = $_POST['relatives'];
    $family = $_POST['family'];
    $perf = $_POST['perf'];
    $classmates = $_POST['classmates'];
    $teachers = $_POST['teachers'];
    $staff = $_POST['staff'];
    $org = $_POST['org'];
    $services = $_POST['services'];
    $friends = $_POST['friends'];
    $romantic = $_POST['romantic'];
    $self = $_POST['self'];
    $belief = $_POST['belief'];
    $exp = $_POST['exp'];
    $skills = $_POST['skills'];
    $other = $_POST['other'];

    $routine = "INSERT INTO routine (stid, parents, siblings, relatives, family, perf, classmates, teachers, staff, org, services, friends, romantic, `self`, belief, exp, skills, other) 
    VALUES ('$stid', '$parents', '$siblings', '$relatives', '$family', '$perf', '$classmates', '$teachers', '$staff', '$org', '$services', '$friends', '$romantic', '$self', '$belief', '$exp', '$skills', '$other')";
    $result = mysqli_query($link, $routine);

    if ($result) {
        $name = "SELECT * FROM student WHERE stid = '$stid'";
        $name_run = mysqli_query($link, $name);
        $row = mysqli_fetch_assoc($name_run);
        $f = $row['fname'];
        $l = $row['lname'];
        date_default_timezone_set('Asia/Manila');
        $currentTime = date("g:i a");
        $his = "INSERT INTO history (`time`, activity, user, stid)
    VALUES ('$currentTime', 'Filled out the Routine Interview form', '$f $l', '$stid')";
        $his_run = mysqli_query($link, $his);
        if ($his_run) {
            $stat = "UPDATE student set statusK = 0 WHERE stid = '$stid'";
            $stat_run = mysqli_query($link, $stat);
            if ($stat_run) {
                $statusJ = "UPDATE student SET statusJ = 0";
                $statusJ_run = mysqli_query($link, $statusJ);
                $_SESSION['routine'] = "Your routine interview form has been submitted successfully.";
                header('Location: stu_routine.php');
            }
        }
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnYes'])) {
    $stid = $_POST['stid'];

    $routine = "INSERT INTO routine_req (stid)
    VALUES ('$stid')";
    $result = mysqli_query($link, $routine);
    if ($result) {
        $stat = "UPDATE student SET statusK = 1";
        $result2 = mysqli_query($link, $stat);
        if ($result2) {
            $name = "SELECT * FROM student WHERE stid = '$stid'";
            $name_run = mysqli_query($link, $name);
            $row = mysqli_fetch_assoc($name_run);
            $f = $row['fname'];
            $l = $row['lname'];
            date_default_timezone_set('Asia/Manila');
            $currentTime = date("g:i a");
            $his = "INSERT INTO history (`time`, activity, user, stid)
        VALUES ('$currentTime', 'Submitted a request for the routine form', '$f $l', '$stid')";
            $his_run = mysqli_query($link, $his);
            header('Location: stu_routine.php');
        }
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['upload'])) {
    $stid = $_POST['stid'];
    $file_name = $_FILES['img']['name'];
    $file_tmp = $_FILES['img']['tmp_name'];
    $file_type = $_FILES['img']['type'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    $extensions = array("jpeg","jpg","png");
    
    if(!in_array($file_ext,$extensions)){
        echo "Extension not allowed, please choose a JPEG or PNG file.";
        exit();
    }
    
    $upload_folder = "profile/";
    $path = $upload_folder.$file_name;
    move_uploaded_file($file_tmp,$path);

   
    $link = mysqli_connect("localhost", "root", "", "gcms");
    $query = "UPDATE student SET profile_path='$path' WHERE stid='$stid'";
    mysqli_query($link, $query);

    mysqli_close($link);

    // Redirect to student profile page
    header("Location: stu_profile.php");
    exit();
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnSig'])) {
    $stid = $_POST['stid'];
    $type = $_POST['type'];
    $filename = $_FILES['myfile']['name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $newFilename = uniqid() . '.' . $extension; // generate a unique filename
    $destination = 'uploads/' . $newFilename;
    $purpose = $_POST['purpose'];

    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'doc', 'jpeg', 'xlsx', 'jpg', 'png'])) {
        echo "HI";
    } elseif ($_FILES['myfile']['size'] > 5000000) {
        echo "hr;;o";
    } else {
        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $destination)) {
            $sql = "INSERT INTO signature (stid,`type`,`file`,size,purpose)
            VALUES ('$stid', '$type', '$newFilename','$size','$purpose')";

            if (mysqli_query($link, $sql)) {
                header("Location: stu_index.php");
            } else {
                echo "hrfailedo";
            }
        }
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if(isset($_POST['uploadd'])) {
    $stid = $_POST['stid'];
    $file_name = $_FILES['img']['name'];
    $file_tmp = $_FILES['img']['tmp_name'];
    $file_type = $_FILES['img']['type'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    $extensions = array("jpeg","jpg","png");
    
    if(!in_array($file_ext,$extensions)){
        echo "Extension not allowed, please choose a JPEG or PNG file.";
        exit();
    }
    
    $upload_folder = "profile/";
    $path = $upload_folder.$file_name;
    move_uploaded_file($file_tmp,$path);

   
    $link = mysqli_connect("localhost", "root", "", "gcms");
    $query = "UPDATE student SET profile_path='$path' WHERE stid='$stid'";
    mysqli_query($link, $query);

    mysqli_close($link);

    // Redirect to student profile page
    header("Location: stu_accInfo.php");
    exit();
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>









































<!-- // if(isset($_POST['btnPersonal']))
// {
//     $stid = $_POST['stid'];
//     $address = $_POST['address'];
//     $contact = $_POST['contact'];
//     $birth = $_POST['birth'];
//     $sex = $_POST['sex'];
//     $civil = $_POST['civil'];
//     $citizen = $_POST['citizen'];
//     $weight = $_POST['weight'];
//     $height = $_POST['height'];
//     $religion = $_POST['religion'];
//     $blood = $_POST['blood'];

//     $query = "INSERT INTO personal (stid, address, contact, birth, sex, civil, citizen, height, weight, religion, blood)
//               VALUES ('$stid', '$address', '$contact', '$birth', '$sex', '$civil', '$citizen', '$height', '$weight', '$religion', '$blood')
//               ON DUPLICATE KEY UPDATE
//                 address = '$address',
//                 contact = '$contact',
//                 birth = '$birth',
//                 sex = '$sex',
//                 civil = '$civil',
//                 citizen = '$citizen',
//                 height = '$height',
//                 weight = '$weight',
//                 religion = '$religion',
//                 blood = '$blood'";
//     $query_run = mysqli_query($link, $query);

//     if ($query_run)
//     {
//         $student = "UPDATE student SET statusB = 1 WHERE stid='$stid'";
//         $student_run = mysqli_query($link, $student);
//         header('Location: stu_info.php');
//     }
// } -->