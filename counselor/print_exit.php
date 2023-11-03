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
      font-size: 14px;

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
      justify-content: center;
    }
  </style>
</head>

<body>
  <!-- page 1 -->
  <br>
  <br>
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
          <div>EXIT INTERVIEW FOR COLLEGE</div>
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
      ?>

      <table>

        <tr>
          <td>Course</td>
          <td>
            <input class="inpt" type="text" value="<?php echo htmlspecialchars($acronym ?? ''); ?>" />
          </td>
          <td>Year</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($srow['year'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td colspan="1">Major</td>
          <td colspan="3"><input class="inpt" type="text" value="<?php echo htmlspecialchars($crow['major'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Year Admitted in NEUST</td>
          <td colspan="2">
            School Year: <input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['admit'] ?? ''); ?>" />
          </td>
          <td>
            <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars($erow['admitSem'] ?? '') === '1st Sem' ? 'checked' : ''; ?> />1st Sem
            <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars($erow['admitSem'] ?? '') === '2nd Sem' ? 'checked' : ''; ?> />2nd Sem

          </td>
        </tr>
        <tr>
          <td>Last Year of Enrollment in NEUST</td>
          <td colspan="2">
            School Year: <input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['admit'] ?? ''); ?>" />
          </td>
          <td>
            <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars($erow['lastSem'] ?? '') === '1st Sem' ? 'checked' : ''; ?> />1st Sem
            <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars($erow['lastSem'] ?? '') === '2nd Sem' ? 'checked' : ''; ?> />2nd Sem

          </td>
        </tr>
        <tr>
          <th colspan="4">PERSONAL INFORMATION</th>
        </tr>
        <tr>
          <td>Full Name</td>
          <td colspan="3"><input class="inpt" type="text" value="<?php echo htmlspecialchars($srow['fname'] ?? ''); ?> <?php echo htmlspecialchars($srow['lname'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Address</td>
          <td colspan="3"><input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['address'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Contact No.</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['contact'] ?? ''); ?>" /></td>
          <td>Email:</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($srow['email'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Date of Birth</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['birth'] ?? ''); ?>" /></td>
          <td>Sex</td>
          <td>
    <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($prow['sex'] ?? '') === 'Female') ? 'checked' : ''; ?> />Female
    <input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($prow['sex'] ?? '') === 'Male') ? 'checked' : ''; ?> />Male
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
          <td>Height(in)</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($prow['height'] ?? ''); ?>" /></td>
          <td>Weight(kg)</td>
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
          <td></td>
          <td cols>Father</td>
          <td colspan="2">Mother</td>
        </tr>
        <tr>
          <td>Name</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['father'] ?? ''); ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['mother'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Education</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['educ'] ?? ''); ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['educ'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Occupation</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['occu'] ?? ''); ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['occu'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Monthly Income</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['income'] ?? ''); ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['income'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Employer/ Business</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['emp'] ?? ''); ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['emp'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Work Address</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['workadd'] ?? ''); ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['workadd'] ?? ''); ?>" /></td>
        </tr>
        <tr>
          <td>Contact No.</td>
          <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($frow['contact'] ?? ''); ?>" /></td>
          <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($mrow['contact'] ?? ''); ?>" /></td>
        </tr>
      </table>
      <!-- <div class="signature">
            <p>I certify that the information provided herein is true and correct.</p> -->
    </div>
  </div>
  <br />
  <br />
  <br>
  <br>
  <!-- <button id="printButton">Print</button>

  <script>
    // JavaScript function to print the page
    function printPage() {
      window.print();
    }

    // Attach the printPage function to the click event of the print button
    document
      .getElementById("printButton")
      .addEventListener("click", printPage);
  </script> -->
  <br>
  <br>
  <br>
  <br>


  <div class="bodytwo">


    <table>
      <tr>
        <th colspan="6">EVALUATION OF SCHOOL SERVICES AND FACILITIES</th>
      </tr>
      <tr>
        <td colspan="6"><Strong>Kindly rate your school experience using the scale:</Strong>
          <br>
          <br>
          <strong>5</strong> Outstanding <strong>4</strong> Very Satisfactory <strong>3</strong> Satisfactory <strong>3</strong> Fairly Satisfactory <strong>1</strong> Did not meeet Expectations
        </td>
      </tr>
      <tr>
        <th>ACADEMIC</th>
        <th>5</th>
        <th>4</th>
        <th>3</th>
        <th>2</th>
        <th>1</th>
      </tr>
      <tr>
        <td>Teaching Strategies</td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['strat'] ?? '') === '5') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['strat'] ?? '') === '4') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['strat'] ?? '') === '3') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['strat'] ?? '') === '2') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['strat'] ?? '') === '1') ? 'checked' : ''; ?> /></td>
      </tr>
      <tr>
        <td>Quality of Instruction</td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['quality'] ?? '') === '5') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['quality'] ?? '') === '4') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['quality'] ?? '') === '3') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['quality'] ?? '') === '2') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['quality'] ?? '') === '1') ? 'checked' : ''; ?> /></td>

      </tr>
      <tr>
        <td>Instructional Materials and Equipments</td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['instruction'] ?? '') === '5') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['instruction'] ?? '') === '4') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['instruction'] ?? '') === '3') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['instruction'] ?? '') === '2') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['instruction'] ?? '') === '1') ? 'checked' : ''; ?> /></td>

      </tr>
      <tr>
        <td>Responsiveness to Student's<br>Individual Concerns</td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['response'] ?? '') === '5') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['response'] ?? '') === '4') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['response'] ?? '') === '3') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['response'] ?? '') === '2') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['response'] ?? '') === '1') ? 'checked' : ''; ?> /></td>

      </tr>
      <tr>
        <td>Academic Requirements</td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['acad'] ?? '') === '5') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['acad'] ?? '') === '4') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['acad'] ?? '') === '3') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['acad'] ?? '') === '2') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['acad'] ?? '') === '1') ? 'checked' : ''; ?> /></td>

      </tr>
      <tr>
        <td>Schedule of Classes</td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['sched'] ?? '') === '5') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['sched'] ?? '') === '4') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['sched'] ?? '') === '3') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['sched'] ?? '') === '2') ? 'checked' : ''; ?> /></td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['sched'] ?? '') === '1') ? 'checked' : ''; ?> /></td>

      </tr>
      <tr>
        <td>Lecture Room/Classrooms and <br> Maintenance</td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['lecture'] ?? '') === '5') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['lecture'] ?? '') === '4') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['lecture'] ?? '') === '3') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['lecture'] ?? '') === '2') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['lecture'] ?? '') === '1') ? 'checked' : ''; ?> /></td>

      </tr>
      <tr>
        <td>Computer Laboratories</td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['comp'] ?? '') === '5') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['comp'] ?? '') === '4') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['comp'] ?? '') === '3') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['comp'] ?? '') === '2') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['comp'] ?? '') === '1') ? 'checked' : ''; ?> /></td>

      </tr>
      <tr>
        <td>Multimedia/Internet <br> Service</td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['multi'] ?? '') === '5') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['multi'] ?? '') === '4') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['multi'] ?? '') === '3') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['multi'] ?? '') === '2') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['multi'] ?? '') === '1') ? 'checked' : ''; ?> /></td>

      </tr>
      <tr>
        <td>Emphasis on NEUST<br>Core Values</td>
        <td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['emp'] ?? '') === '5') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['emp'] ?? '') === '4') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['emp'] ?? '') === '3') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['emp'] ?? '') === '2') ? 'checked' : ''; ?> /></td>
<td><input class="inpt" type="checkbox" value="" <?php echo htmlspecialchars(($erow['emp'] ?? '') === '1') ? 'checked' : ''; ?> /></td>

      </tr>
      <tr>
        <th>ACADEMIC SUPPORT</th>
        <th style="border-right: 0;" colspan="4">Score </th>

        <th style="border-left: 0;" colspan="">Score</th>
      </tr>
      <tr>
        <td>Admission and Enrollment Procedures</td>
        <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['adm'] ?? ''); ?>" /></td>
        <td colspan="2">Multi-faith Services</td>
        <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['faith'] ?? ''); ?>" /></td>
      </tr>
      <tr>
        <td>Medical and Dental Services</td>
        <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['medical'] ?? ''); ?>" /></td>
        <td colspan="2">Library and Learning <br> Resource Materials</td>
        <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['lib'] ?? ''); ?>" /></td>
      </tr>
      <tr>
        <td>School Rules and Regulations</td>
        <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['rules'] ?? ''); ?>" /></td>
        <td colspan="2">Student Government</td>
        <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['stud'] ?? ''); ?>" /></td>
      </tr>
      <tr>
        <td>Safety and Security</td>
        <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['safety'] ?? ''); ?>" /></td>
        <td colspan="2">Sports Program</td>
        <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['sports'] ?? ''); ?>" /></td>
      </tr>
      <tr>
        <td>Scholarship and Financial<br>Assistance</td>
        <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['scho'] ?? ''); ?>" /></td>
        <td colspan="2">Student Organization and <br> Activities</td>
        <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['org'] ?? ''); ?>" /></td>
      </tr>
      <tr>
        <td>Registrar</td>
        <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['registrar'] ?? ''); ?>" /></td>
        <td colspan="2">Student Publication</td>
        <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['pub'] ?? ''); ?>" /></td>
      </tr>
      <tr>
        <td>Guidance and Counseling</td>
        <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['gc'] ?? ''); ?>" /></td>
        <td colspan="2">Social and Community <br>Involvement</td>
        <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['sci'] ?? ''); ?>" /></td>
      </tr>
      <tr>
        <td>Cultural and Arts Program</td>
        <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['arts'] ?? ''); ?>" /></td>
        <td colspan="2">Canteen and Food Services</td>
        <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['canteen'] ?? ''); ?>" /></td>
      </tr>
      <tr>
        <td>Gender Sensitivity of<br>Univ. Personel</td>
        <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['gs'] ?? ''); ?>" /></td>
        <td colspan="2">Campus Cleanliness</td>
        <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['campus'] ?? ''); ?>" /></td>
      </tr>
      <tr>
        <td>Career Development Programs</td>
        <td colspan="2"><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['career'] ?? ''); ?>" /></td>
        <td colspan="2">Comfort Room</td>
        <td><input class="inpt" type="text" value="<?php echo htmlspecialchars($erow['cr'] ?? ''); ?>" /></td>
      </tr>
    </table>
    <!-- <div class="signature">
              <p>I certify that the information provided herein is true and correct.</p> -->
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