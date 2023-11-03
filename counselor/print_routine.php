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
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 3px solid black;
        }
        .bodytwo {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 3px solid black;
        }
        .bodythree {
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
                ROUTINE INTERVIEW FORM
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

            $sql14 = "SELECT * FROM routine WHERE stid = '$stid'";
            $result14 = mysqli_query($link, $sql14);
            if ($rrow = mysqli_fetch_assoc($result14)) {
            } else {
            }
            ?>

            <table>
                <tr>
                    <th colspan="4">PERSONAL INFORMATION</th>
                </tr>
                <tr>
                    <td colspan="2">Name (Last, First, Middle): <input type="text" class="inpt" style="width: 75%;" value="<?php echo htmlspecialchars($srow['fname'] ?? ''); ?> <?php echo htmlspecialchars($srow['lname'] ?? ''); ?>"></td>
                    <td colspan="2">Campus:<br> <input type="text" class="inpt" style="width: 80%;" value="<?php echo htmlspecialchars($crow['campus'] ?? ''); ?>"></td>
                </tr>
                <tr>

                    <td colspan="2">Course: <input type="text" class="inpt" value="<?php echo htmlspecialchars($acronym ?? ''); ?>"></td>
                   
                    <td colspan="2">College: <br><input type="text" style="width: 80%;" class="inpt" value="<?php echo htmlspecialchars($crow['college'] ?? ''); ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">Sex: Female <input type="checkbox" value="Female" <?php echo htmlspecialchars(($prow['sex'] ?? '') === 'Female') ? 'checked' : ''; ?>> Male <input type="checkbox" value="Male" <?php echo htmlspecialchars(($prow['sex'] ?? '') === 'Male') ? 'checked' : ''; ?>> Other <input type="checkbox" value="Others" <?php echo htmlspecialchars(($prow['sex'] ?? '') === 'Others') ? 'checked' : ''; ?>></td>
                    <td>Year Level: <input type="text" class="inpt" value="<?php echo htmlspecialchars($srow['year'] ?? ''); ?>"></td>
                    <td>Major: <input type="text" class="inpt" value="<?php echo htmlspecialchars($crow['major'] ?? ''); ?>"></td>
                </tr>
                
            </table>
            
            <h4>FAMILY BACKGROUNDS</h4>
            <p>Relationship with Parents</p>
            <textarea><?php echo htmlspecialchars($rrow['parents'] ?? ''); ?></textarea>
            <br>
            <p>Relationship with Siblings</p>
            <textarea><?php echo htmlspecialchars($rrow['siblings'] ?? ''); ?></textarea>
            <p>Relationship with Relatives</p>
            <textarea><?php echo htmlspecialchars($rrow['relatives'] ?? ''); ?></textarea>
            <br>
            <p>Present concerns in the family</p>
            <textarea><?php echo htmlspecialchars($rrow['family'] ?? ''); ?></textarea>
            <br>
            
        </div>



    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="bodytwo">
        <div class="template" id="one">
       
            
            <h4>SCHOOL EXPERIENCE</h4>
            <p>Class Performance</p>
            <textarea><?php echo htmlspecialchars($rrow['perf'] ?? ''); ?></textarea>
            <br>
            <p>Concerns towards classmates</p>
            <textarea><?php echo htmlspecialchars($rrow['classmates'] ?? ''); ?></textarea>
            <p>Concerns towards teachers</p>
            <textarea><?php echo htmlspecialchars($rrow['teachers'] ?? ''); ?></textarea>
            <br>
            <p>Concerns towards school staff</p>
            <textarea><?php echo htmlspecialchars($rrow['staff'] ?? ''); ?></textarea>
            <br>
            <p>Concerns towards students activities and organizations</p>
            <textarea><?php echo htmlspecialchars($rrow['org'] ?? ''); ?></textarea>
            <br>
            <p>Concerns towards facilities and services</p>
            <textarea><?php echo htmlspecialchars($rrow['services'] ?? ''); ?></textarea>
            <br>
            <h4>INTERPERSONAL RELATIONS</h4>
            <p>Friends</p>
            <textarea><?php echo htmlspecialchars($rrow['friends'] ?? ''); ?></textarea>
        
        </div>



    </div>
    <br>
            <br><br>
    <div class="bodythree">
        <div class="template" id="one">
       
            <p>Romantic Relationships</p>
            <textarea><?php echo htmlspecialchars($rrow['romantic'] ?? ''); ?></textarea>
            <br>
            <h4>OTHER CONCERNS</h4>
            <textarea rows="5"><?php echo htmlspecialchars($rrow['other'] ?? ''); ?></textarea>
            <br>
            <h4>OTHER GUIDE QUESTIONS</h4>
            <p>How do you see yourself in terms of physical attributes and personality?</p>
            <textarea><?php echo htmlspecialchars($rrow['self'] ?? ''); ?></textarea>
            <br>
            <p>Beliefs and principles you live by?</p>
            <textarea><?php echo htmlspecialchars($rrow['belief'] ?? ''); ?></textarea>
            <p>Significant experiences in life</p>
            <textarea><?php echo htmlspecialchars($rrow['exp'] ?? ''); ?></textarea>
            <br>
            <p>Other interests, skills, leisure activities?</p>
            <textarea><?php echo htmlspecialchars($rrow['skills'] ?? ''); ?></textarea>
            <br>
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