<?php
include('../dbc.php');
session_start();
if (!isset($_SESSION['uname'])) {
  header("Location:coun_login.php");
  die();
}


?>


<!DOCTYPE html>
<html>

<head>
  <title> </title>
  <style>
    .bodyone {
      font-family: Arial, sans-serif;
      max-width: 700px;
      margin: 0 auto;
      padding: 20px;
      border: 3px solid black;
      font-size: 15px;
    }

    .bodytwo {
      font-family: Arial, sans-serif;
      max-width: 700px;
      margin: 0 auto;
      padding: 20px;
      border: 3px solid black;
      font-size: 15px;
    }

    .bodythree {
      font-family: Arial, sans-serif;
      max-width: 700px;
      margin: 0 auto;
      padding: 20px;
      border: 3px solid black;
      font-size: 15px;
    }

    .header {
      text-align: center;
      border-bottom: 1px solid black;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 5px;
      text-align: left;
      vertical-align: top;
    }

    textarea {
      width: 100%;
      height: 60px;
      border: 1px solid black;
    }

    .signature {
      margin-top: 20px;
      border-top: 1px solid black;
      padding-top: 10px;
    }

    @media print {
      @page {
        size: auto;
        /* auto is the initial value */
        margin: 3mm;
        /* this affects the margin in the printer settings */
      }

      /* Custom styles here */
      /* Example: */
      body {
        background-color: white;
        font-size: 12pt;
      }
    }

    .inpt {
      border-top: 0;
      border-left: 0;
      border-right: 0;
    }

    .inpt:active {
      border-width: 0;
    }

    .stdtype {
      border-right: 0;
    }

    .fbg {
      border-left: 0;
      border-right: 0;
      border-bottom: 0;
      text-align: center;
    }

    .rowings {
      display: flex;
      flex-direction: column;
    }

    .title {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
    }

    .sy {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }
  </style>
</head>

<body>
  <!-- page 1 -->
  <div class="bodyone">
    <div class="template" id="one">
      <div class="header">
        <strong>Republic of the Philippines</strong><br />
        <strong>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</strong><br />
        <br />
        <strong>OFFICE OF STUDENT AFFAIRS</strong><br />
        <strong>GUIDANCE AND COUNSELING OFFICE</strong><br />
        <br />
        <div class="title">
          <div>STUDENT INFORMATION SHEET</div>
          <!-- <div class="sy">
              <div>School Year :</div>
              <div>
                <input type="checkbox" /> 1st Sem <input type="checkbox" /> 2nd
                Sem <input type="checkbox" /> Special Term
              </div>
            </div> -->
        </div>
      </div>
      <?php

      $stid = $_GET['viewstid'];
      $sql = "SELECT * FROM campus WHERE stid = '$stid'";
      $result = mysqli_query($link, $sql);
      if ($crow = mysqli_fetch_assoc($result)) {
      } else {
      }

      $sql1 = "SELECT * FROM student WHERE stid = '$stid'";
      $result1 = mysqli_query($link, $sql1);
      if ($srow = mysqli_fetch_assoc($result1)) {
        $course = $srow['course'];
        $words = explode(' ', $course);
        $words = array_filter($words, function ($w) {
          return strtolower($w) !== 'of' && strtolower($w) !== 'in';
        });
        $acronym = '';
        foreach ($words as $word) {
          $acronym .= strtoupper(substr($word, 0, 1));
        }
      } else {
      }

      $sql2 = "SELECT * FROM personal WHERE stid = '$stid'";
      $result2 = mysqli_query($link, $sql2);
      if ($prow = mysqli_fetch_assoc($result2)) {
      } else {
      }

      $sql3 = "SELECT * FROM scholarship WHERE stid = '$stid'";
      $result3 = mysqli_query($link, $sql3);
      if ($ssrow = mysqli_fetch_assoc($result3)) {
      } else {
      }

      $sql4 = "SELECT * FROM peer WHERE stid = '$stid'";
      $result4 = mysqli_query($link, $sql4);
      if ($pprow = mysqli_fetch_assoc($result4)) {
      } else {
      }
      $sql5 = "SELECT * FROM ei WHERE stid = '$stid'";
      $result5 = mysqli_query($link, $sql5);
      if ($erow = mysqli_fetch_assoc($result5)) {
      } else {
      }

      $sql6 = "SELECT * FROM father WHERE stid = '$stid'";
      $result6 = mysqli_query($link, $sql6);
      if ($frow = mysqli_fetch_assoc($result6)) {
      } else {
      }

      $sql7 = "SELECT * FROM mother WHERE stid = '$stid'";
      $result7 = mysqli_query($link, $sql7);
      if ($mrow = mysqli_fetch_assoc($result7)) {
      } else {
      }

      $sql8 = "SELECT * FROM fam WHERE stid = '$stid'";
      $result8 = mysqli_query($link, $sql8);
      if ($ffrow = mysqli_fetch_assoc($result8)) {
      } else {
      }

      $sql9 = "SELECT * FROM education WHERE stid = '$stid'";
      $result9 = mysqli_query($link, $sql9);
      if ($eerow = mysqli_fetch_assoc($result9)) {
      } else {
      }

      $sql10 = "SELECT * FROM skills WHERE stid = '$stid' LIMIT 3";
      $result10 = mysqli_query($link, $sql10);
      if ($result10) {
        $sssrow1 = mysqli_fetch_assoc($result10);
        $sssrow2 = mysqli_fetch_assoc($result10);
        $sssrow3 = mysqli_fetch_assoc($result10);
      } else {
      }

      $sql11 = "SELECT * FROM training WHERE stid = '$stid' LIMIT 3";
      $result11 = mysqli_query($link, $sql11);
      if ($result11) {
        $trow1 = mysqli_fetch_assoc($result11);
        $trow2 = mysqli_fetch_assoc($result11);
        $trow3 = mysqli_fetch_assoc($result11);
      } else {
      }
      $sql12 = "SELECT * FROM extra WHERE stid = '$stid' LIMIT 2";
      $result12 = mysqli_query($link, $sql12);
      if ($result12) {
        $eeerow1 = mysqli_fetch_assoc($result12);
        $eeerow2 = mysqli_fetch_assoc($result12);
      } else {
      }

      $sql13 = "SELECT * FROM social WHERE stid = '$stid'";
      $result13 = mysqli_query($link, $sql13);
      if ($ssssrow = mysqli_fetch_assoc($result13)) {
      } else {
      }
      ?>
      <table>
        <tr>
          <td>College</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($crow['college'] ?? ''); ?>" /></td>
          <td>Major</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($crow['major'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Campus</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($crow['campus'] ?? ''); ?>" /></td>
          <td>Course</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($acronym ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Student Type:</td>
          <td colspan="4" class="stdtype">
    New Student <input type="checkbox" <?php echo htmlspecialchars(($crow['stutype'] ?? '') === 'Continuing(Old)') ? 'checked' : ''; ?>/> Continuing (Old)
    <input type="checkbox" <?php echo htmlspecialchars(($crow['stutype'] ?? '') === 'Returning') ? 'checked' : ''; ?>/> Returning
    <input type="checkbox" <?php echo htmlspecialchars(($crow['stutype'] ?? '') === 'Transferee') ? 'checked' : ''; ?>/> Transferee
    <input type="checkbox" <?php echo htmlspecialchars(($crow['stutype'] ?? '') === 'Shifter') ? 'checked' : ''; ?>/> Shifter <input type="checkbox" />
</td>

        </tr>
        <tr>
          <td>Year Level :</td>
          <td colspan="4" class="stdtype">
          <input type="text" class="inpt" value="<?php echo htmlspecialchars($srow['year'] ?? ''); ?>"/>
          </td>
        </tr>
        <tr>
          <th colspan="4">PERSONAL INFORMATION</th>
        </tr>
        <tr>
          <td>Name (Last, First, MI)</td>
          <td colspan="4"><input class="inpt" type="text" value="<?php echo htmlspecialchars($srow['fname'] ?? ''); ?> <?php echo htmlspecialchars($srow['lname'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Address</td>
          <td colspan="4"><input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['address'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Contact No</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['contact'] ?? ''); ?>" /></td>
          <td>Email</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($srow['email'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Date of Birth</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['birth'] ?? ''); ?>" /></td>
          <td>Sex</td>
          <td>
    <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($prow['sex'] ?? '') === 'Male') ? 'checked' : ''; ?>/>Male
    <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($prow['sex'] ?? '') === 'Female') ? 'checked' : ''; ?>/>Female
</td>

        </tr>
        <tr>
          <td>Civil Status</td>
          <td>
            <input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['civil'] ?? ''); ?>" />
          </td>
          <td>Citizenship</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['citizen'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Height (in)</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['height'] ?? ''); ?>" /></td>
          <td>Weight (kg)</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['weight'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Religion</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['religion'] ?? ''); ?>" /></td>
          <td>Blood Type</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['blood'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <th colspan="4">FAMILY BACKGROUND</th>
        </tr>
        <tr>
          <td class="stdtype">Indicate if (+) deceased</td>
          <td>Father</td>
          <td colspan="2" class="stdtype">Mother</td>
        </tr>
        <tr>
          <td>Name</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['father'] ?? ''); ?>" /></td>
          <td colspan="2" class="stdtype">
            <input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['mother'] ?? ''); ?>" />
          </td>
        </tr>
        <tr>
          <td>Education</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['educ'] ?? ''); ?>" /></td>
          <td colspan="2" class="stdtype">
            <input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['educ'] ?? ''); ?>" />
          </td>
        </tr>
        <tr>
          <td>Occupation</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['occu'] ?? ''); ?>" /></td>
          <td colspan="2" class="stdtype">
            <input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['occu'] ?? ''); ?>" />
          </td>
        </tr>
        <tr>
          <td>Monthly Income</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['income'] ?? ''); ?>" /></td>
          <td colspan="2" class="stdtype">
            <input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['income'] ?? ''); ?>" />
          </td>
        </tr>
        <tr>
          <td>Employer/ Business</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['emp'] ?? ''); ?>" /></td>
          <td colspan="2" class="stdtype">
            <input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['emp'] ?? ''); ?>" />
          </td>
        </tr>
        <tr>
          <td>Work Address</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['workadd'] ?? ''); ?>" /></td>
          <td colspan="2" class="stdtype">
            <input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['workadd'] ?? ''); ?>" />
          </td>
        </tr>
        <tr>
          <td>Contact No</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['contact'] ?? ''); ?>" /></td>
          <td colspan="2" class="stdtype">
            <input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['contact'] ?? ''); ?>" />
          </td>
        </tr>
        <tr>
          <td>No. of Siblings</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($ffrow['sibling'] ?? ''); ?>" /></td>
          <td colspan="2">
            Birth Order: <br />
            <input class="inpt" type="text" value="<?php echo htmlspecialchars($ffrow['order'] ?? ''); ?>" />
          </td>
        </tr>
        <tr>
          <td>Living Condition</td>
          <td colspan="4">
            <input class="inpt" type="text" value="<?php echo htmlspecialchars($ffrow['cond'] ?? ''); ?>" />
            <table class="fbg">
              
            </table>
          </td>
        </tr>
      </table>
      <!-- <div class="signature">
            <p>I certify that the information provided herein is true and correct.</p> -->
    </div>
  </div>
  <br />
  <br />
 
  <br />
  <br />
  <div class="bodytwo">
    <div class="template" id="one">
      <table>
        <tr>
          <th colspan="4">SCHOLARSHIP / FINANCIAL ASSISTANCE</th>
        </tr>
        <tr>
        <td>
    Does your family belong to any of the following : <br /><br />4Ps
    <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['assist'] ?? '') === '4Ps') ? 'checked' : ''; ?>/>Listahan 2.0
    <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['assist'] ?? '') === 'Listahan 2.0') ? 'checked' : ''; ?>/>N/A
    <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['assist'] ?? '') === 'N/A') ? 'checked' : ''; ?>/>
</td>
<td colspan="4" class="stdtype">
    Are you grantee of:<br /><br />
    StuFAP <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['grantee'] ?? '') === 'StuFAP') ? 'checked' : ''; ?>/>ESGP-PA
    <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['grantee'] ?? '') === 'ESGP-PA') ? 'checked' : ''; ?>/>N/A
    <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['grantee'] ?? '') === 'N/A') ? 'checked' : ''; ?>/>
</td>

        </tr>
        <!-- <tr>
          <td>
            Other Educational/<br />
            Financial Assistance
          </td>
          <td>
            <div class="rowings">
              <input class="inpt" type="text" value="" />
              <hr />
              <input class="inpt" type="text" value="" />
            </div>
          </td>
          <td>
            <div class="rowings">
              <div>Status</div>
              <hr />
              <div>Status</div>
            </div>
          </td>
          <td>
            <div class="rowings">
              <input class="inpt" type="text" value="" />
              <hr />
              <input class="inpt" type="text" value="" />
            </div>
          </td>
        </tr> -->
        <tr>
    <td>Are you a Working student?</td>
    <td colspan="4">
        <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['working'] ?? '') === 'No') ? 'checked' : ''; ?>/>No
        <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['working'] ?? '') === 'Yes') ? 'checked' : ''; ?>/>Yes
    </td>
</tr>
<tr>
    <td>Are you a Dependent of Solo Parent?</td>
    <td colspan="4">
        <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['dependent'] ?? '') === 'No') ? 'checked' : ''; ?>/>No
        <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['dependent'] ?? '') === 'Yes - ID Number: ') ? 'checked' : ''; ?>/>Yes,<br />
        specify ID No. of parent:
        <input class="inpt" type="text" value="<?php echo htmlspecialchars($ssrow['depID'] ?? ''); ?>" />
    </td>
</tr>
<tr>
    <td>Are you a Solo Parent?</td>
    <td colspan="4">
        <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['solo'] ?? '') === 'No') ? 'checked' : ''; ?>/>No
        <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['solo'] ?? '') === 'Yes - ID Number: ') ? 'checked' : ''; ?>/>Yes, specify ID
        No.: <input class="inpt" type="text" value="<?php echo htmlspecialchars($ssrow['soloID'] ?? ''); ?>" />
    </td>
</tr>
<tr>
    <td>Are you a Person With Disability?</td>
    <td colspan="4">
        <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['pwd'] ?? '') === 'No') ? 'checked' : ''; ?>/>No
        <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['pwd'] ?? '') === 'Yes - ID Number: ') ? 'checked' : ''; ?>/>Yes, specify ID
        No.: <input class="inpt" type="text" value="<?php echo htmlspecialchars($ssrow['pwdID'] ?? ''); ?>" />
    </td>
</tr>
<tr>
    <td>Are you a member of any Indigenous Group?</td>
    <td colspan="4">
        <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['indeg'] ?? '') === 'No') ? 'checked' : ''; ?>/>No
        <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['indeg'] ?? '') === 'Yes - Group name: ') ? 'checked' : ''; ?>/>Yes, specify.:
        <input class="inpt" type="text" value="<?php echo htmlspecialchars($ssrow['indID'] ?? ''); ?>" />
    </td>
</tr>

        <tr>
          <th colspan="4">EDUCATIONAL BACKGROUND</th>
        </tr>
        <tr>
          <td>Senior Highschool</td>
        </tr>
        <tr>
          <td>Academic Strand</td>
          <td colspan="4">
            <input class="inpt" type="text" value="<?php echo htmlspecialchars($eerow['strand'] ?? ''); ?>" />
          </td>
        </tr>
        <tr>
          <td>Year Graduated</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($eerow['shsGrad'] ?? ''); ?>" /></td>
          <td>Honored Received:</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($eerow['shsHnr'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <th colspan="4">JUNIOR HIGHSCHOOL</th>
        </tr>
        <tr>
          <td>Year Graduated</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($eerow['jhsGrad'] ?? ''); ?>" /></td>
          <td>Honored Received:</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($eerow['jhsHnr'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <th colspan="4">ELEMENTARY</th>
        </tr>
        <tr>
          <td>Year Graduated</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($eerow['elemGrad'] ?? ''); ?>" /></td>
          <td>Honored Received:</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($eerow['elemHnr'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <th colspan="4">INVOLVEMENT IN ARTS AND SPORTS</th>
        </tr>
        <tr>
          <td colspan="2">Special Skills</td>
          <td colspan="1">Hobbies</td>
          <td colspan="2">Non-Academic Agency</td>
        </tr>
        <tr>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo isset($sssrow1['skill']) ? htmlspecialchars($sssrow1['skill']) : ''; ?>" /></td>
          <td colspan="1"><input class="inpt" type="text" value="<?php echo isset($sssrow1['hob']) ? htmlspecialchars($sssrow1['hob']) : ''; ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo isset($sssrow1['recog']) ? htmlspecialchars($sssrow1['recog']) : ''; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo isset($sssrow2['skill']) ? htmlspecialchars($sssrow2['skill']) : ''; ?>" /></td>
          <td colspan="1"><input class="inpt" type="text" value="<?php echo isset($sssrow2['hob']) ? htmlspecialchars($sssrow2['hob']) : ''; ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo isset($sssrow2['recog']) ? htmlspecialchars($sssrow2['recog']) : ''; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo isset($sssrow3['skill']) ? htmlspecialchars($sssrow3['skill']) : ''; ?>" /></td>
          <td colspan="1"><input class="inpt" type="text" value="<?php echo isset($sssrow3['hob']) ? htmlspecialchars($sssrow3['hob']) : ''; ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo isset($sssrow3['recog']) ? htmlspecialchars($sssrow3['recog']) : ''; ?>" /></td>
        </tr>
      </table>
    </div>
  </div>
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <div class="bodythree">
    <div class="template" id="one">
      <table>
        <tr>
          <th colspan="4">TRAINING PROGRAMS ATTENDED</th>
        </tr>
        <tr>
          <td colspan="2">Title of Seminar/ Workshop / Short Course</td>
          <td colspan="">Inclusive Date</td>
          <td colspan="2">Sponsoring Agency</td>
        </tr>
        <tr>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo isset($trow1['seminar']) ? htmlspecialchars($trow1['seminar']) : ''; ?>" /></td>
          <td colspan="1"><input class="inpt" type="text" value="<?php echo isset($trow1['date']) ? htmlspecialchars($trow1['date']) : ''; ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo isset($trow1['agency']) ? htmlspecialchars($trow1['agency']) : ''; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo isset($trow2['seminar']) ? htmlspecialchars($trow2['seminar']) : ''; ?>" /></td>
          <td colspan="1"><input class="inpt" type="text" value="<?php echo isset($trow2['date']) ? htmlspecialchars($trow2['date']) : ''; ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo isset($trow2['agency']) ? htmlspecialchars($trow2['agency']) : ''; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo isset($trow3['seminar']) ? htmlspecialchars($trow3['seminar']) : ''; ?>" /></td>
          <td colspan="1"><input class="inpt" type="text" value="<?php echo isset($trow3['date']) ? htmlspecialchars($trow3['date']) : ''; ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo isset($trow3['agency']) ? htmlspecialchars($trow3['agency']) : ''; ?>" /></td>
        </tr>
        <tr>
          <th colspan="4">SOCIAL AND EXTRACURRICULAR ACTIVIES</th>
        </tr>
        <tr>
          <td>Affliation</td>
          <td><input class="inpt" type="text" value="<?php echo isset($eeerow1['aff']) ? htmlspecialchars($eeerow1['aff']) : ''; ?>" /></td>
          <td>Affliation</td>
          <td><input class="inpt" type="text" value="<?php echo isset($eeerow2['aff']) ? htmlspecialchars($eeerow2['aff']) : ''; ?>" /></td>
        </tr>
        <tr>
          <td>Position Held</td>
          <td><input class="inpt" type="text" value="<?php echo isset($eeerow1['pos']) ? htmlspecialchars($eeerow1['pos']) : ''; ?>" /></td>
          <td>Position Held</td>
          <td><input class="inpt" type="text" value="<?php echo isset($eeerow2['pos']) ? htmlspecialchars($eeerow2['pos']) : ''; ?>" /></td>
        </tr>
        <tr>
          <td>Period Covered</td>
          <td><input class="inpt" type="text" value="<?php echo isset($eeerow1['period']) ? htmlspecialchars($eeerow1['period']) : ''; ?>" /></td>
          <td>Period Covered</td>
          <td><input class="inpt" type="text" value="<?php echo isset($eeerow2['period']) ? htmlspecialchars($eeerow2['period']) : ''; ?>" /></td>
        </tr>
        <tr>
          <th colspan="4">SOCIAL MEDIA PRESENCE</th>
        </tr>
        <tr>
          <td>Facebook</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($ssssrow['fb'] ?? ''); ?>" /></td>
          <td>Instagram</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($ssssrow['ig'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Twitter</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($ssssrow['twt'] ?? ''); ?>" /></td>
          <td>YouTube</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($ssssrow['yt'] ?? ''); ?>" /></td>
        </tr>


      </table>
    </div>
  </div>
  <script>
    window.onload = function() {
      window.print();
    };

    window.onafterprint = function() {
      window.close();
    };
  </script>
</body>

</html>