<?php
include('../dbc.php');
session_start();
if (!isset($_SESSION['uname'])) {
    header("Location:coun_login.php");
    die();
}
// $stid = $_GET['viewstid'];
// $campus = "SELECT * FROM campus WHERE stid = '$stid'";
// $campus_run = mysqli_query($link, $campus);
// $crow = mysqli_fetch_assoc($campus_run);

?>

<!DOCTYPE html>
<html>

<head>
    <title> </title>
    <style>
        .bodyone {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 3px solid black;
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
    </style>
</head>

<body>
    <!-- page 1 -->
    <div class="bodyone">
        <div class="template" id="one">
            <div class="header">
                <strong>Republic of the Philippines</strong><br>
                <strong>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</strong><br>
                <br>
                <strong>OFFICE OF STUDENT AFFAIRS</strong><br>
                <strong>GUIDANCE AND COUNSELING OFFICE</strong><br>
                <br>
                NEUST PEER ORGANIZATION
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
            ?>

            <table>
                <tr>
                    <td colspan="2">Campus: <input type="text" class="inpt" value="<?php echo htmlspecialchars($crow['campus'] ?? ''); ?>"></td>
                    <td>Year Level: <input type="text" class="inpt" value="<?php echo htmlspecialchars($srow['year'] ?? ''); ?>"></td>
                    <td>College: <input type="text" class="inpt" value="<?php echo htmlspecialchars($crow['college'] ?? ''); ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">Course: <input type="text" class="inpt" value="<?php echo htmlspecialchars($acronym ?? ''); ?>"  style="width: 200px"></td>
                    <td>Major: <input type="text" class="inpt" value="<?php echo htmlspecialchars($crow['major'] ?? ''); ?>"></td>
                    <td>Student Type: <input type="text" class="inpt" value="<?php echo htmlspecialchars($crow['stutype'] ?? ''); ?>"></td>
                </tr>
                <!-- <tr>
                <td colspan="4">Student Type: New <input type="checkbox"> Continuing <input type="checkbox"> Returning <input type="checkbox"></td>
            </tr> -->
                <tr>
                    <th colspan="4">PERSONAL INFORMATION</th>
                </tr>
                <tr>
                    <td colspan="2">Name (Last, First, Middle): <input type="text" class="inpt" style="width: 75%;" value="<?php echo htmlspecialchars($srow['fname'] ?? ''); ?> <?php echo htmlspecialchars($srow['lname'] ?? ''); ?>"></td>
                    <td colspan="2">Home Address: <input type="text" class="inpt" style="width: 80%;" value="<?php echo htmlspecialchars($prow['address'] ?? ''); ?>"></td>
                </tr>
                <tr>

                    <td colspan="2">Civil Status: <input type="text" class="inpt" value="<?php echo htmlspecialchars($prow['civil'] ?? ''); ?>"></td>
                    <td>Contact #: <input type="text" class="inpt" value="<?php echo htmlspecialchars($prow['contact'] ?? ''); ?>"></td>
                    <td>Date of Birth: <input type="text" class="inpt" value="<?php echo htmlspecialchars($prow['birth'] ?? ''); ?>"></td>
                </tr>
                <tr>
    <td colspan="2">Sex: Female <input type="checkbox" value="Female" <?php echo htmlspecialchars(($prow['sex'] ?? '') === 'Female') ? 'checked' : ''; ?>> Male <input type="checkbox" value="Male" <?php echo htmlspecialchars(($prow['sex'] ?? '') === 'Male') ? 'checked' : ''; ?>> Other <input type="checkbox" value="Others" <?php echo htmlspecialchars(($prow['sex'] ?? '') === 'Others') ? 'checked' : ''; ?>></td>
    <td colspan="2">Religion: <input type="text" class="inpt" value="<?php echo htmlspecialchars($prow['religion'] ?? ''); ?>"></td>
</tr>
<tr>
    <td colspan="2">Are you a solo parent?<br>Yes <input type="checkbox" <?php echo htmlspecialchars(($ssrow['solo'] ?? '') === 'Yes - ID Number: ') ? 'checked' : ''; ?>> No <input type="checkbox" value="" <?php echo htmlspecialchars(($ssrow['solo'] ?? '') === 'No') ? 'checked' : ''; ?>></td>
    <td colspan="2">If Yes, specify: <input type="text" class="inpt" value="<?php echo htmlspecialchars($ssrow['soloID'] ?? ''); ?>"></td>
</tr>
<tr>
    <td colspan="2">Are you a person with disability? Yes <input type="checkbox" <?php echo htmlspecialchars(($ssrow['pwd'] ?? '') === 'Yes - ID Number: ') ? 'checked' : ''; ?>> No <input type="checkbox" <?php echo htmlspecialchars(($ssrow['pwd'] ?? '') === 'No') ? 'checked' : ''; ?>></td>
    <td colspan="2">If Yes, specify: <input type="text" class="inpt" value="<?php echo htmlspecialchars($ssrow['pwdID'] ?? ''); ?>"></td>
</tr>
<tr>
    <td colspan="2">Are you a member of any Indigenous people?<br> Yes <input type="checkbox" <?php echo htmlspecialchars(($ssrow['indeg'] ?? '') === 'Yes - Group name: ') ? 'checked' : ''; ?>> No <input type="checkbox" <?php echo htmlspecialchars(($ssrow['indeg'] ?? '') === 'No') ? 'checked' : ''; ?>></td>
    <td colspan="2">If Yes, specify: <input type="text" class="inpt" value="<?php echo htmlspecialchars($ssrow['indID'] ?? ''); ?>"></td>
</tr>

                <!-- ... continue with other rows ... -->
            </table>

            <p>List trainings attended related to leadership and social responsibility:</p>
            <textarea><?php echo htmlspecialchars($pprow['training'] ?? ''); ?></textarea>
            <br>
            <p>Essay on "What it means to be a Peer Facilitator":</p>
            <textarea><?php echo htmlspecialchars($pprow['faci'] ?? ''); ?></textarea>

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