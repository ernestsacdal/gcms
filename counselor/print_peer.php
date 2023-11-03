<?php

?>

<!DOCTYPE html>
<html>

<head>
    <title> </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid black;
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

        table, th, td {
            border: 1px solid black;
        }

        th, td {
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
      size: auto;   /* auto is the initial value */
      margin: 3mm;  /* this affects the margin in the printer settings */
   }

   /* Custom styles here */
   /* Example: */
   body {
      background-color: white;
      font-size: 12pt;
   }
}
    </style>
</head>

<body>
    <div class="template">
        <div class="header">
            <strong>Republic of the Philippines</strong><br>
            <strong>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</strong><br>
            <br>
            <strong>OFFICE OF STUDENT AFFAIRS</strong><br>
            <strong>GUIDANCE AND COUNSELING OFFICE</strong><br>
            <br>
            NEUST PEER ORGANIZATION
        </div>

        <table>
            <tr>
                <td colspan="2">Campus: <input type="text" value="GG"></td>
                <td>Year Level: <input type="text"></td>
                <td>College: <input type="text"></td>
            </tr>
            <tr>
                <td colspan="2">Course: <input type="text" value="GG"></td>
                <td>Major: <input type="text"></td>
                <td>Student Type: <input type="text"></td>
            </tr>
            <!-- <tr>
                <td colspan="4">Student Type: New <input type="checkbox"> Continuing <input type="checkbox"> Returning <input type="checkbox"></td>
            </tr> -->
            <tr>
                <th colspan="4">PERSONAL INFORMATION</th>
            </tr>
            <tr>
                <td colspan="2">Name (Last, First, Middle): <input type="text" style="width: 75%;"></td>
                <td colspan="2">Home Address: <input type="text" style="width: 80%;"></td>
            </tr>
            <tr>
                
                <td colspan="2">Civil Status: <input type="text"></td>
                <td>Contact #: <input type="text"></td>
                <td>Date of Birth: <input type="text"></td>
            </tr>
            <tr>
                <td colspan="2">Sex: Female <input type="checkbox"> Male <input type="checkbox"></td>
                <td colspan="2">Religion: <input type="text"></td>
            </tr>
            <tr>
                <td colspan="2">Are you a solo parent?<br>Yes <input type="checkbox"> No <input type="checkbox"></td>
                <td colspan="2">If Yes, specify: <input type="text"></td>
            </tr>
            <tr>
                <td colspan="2">Are you a person with disability? Yes <input type="checkbox"> No <input type="checkbox"></td>
                <td colspan="2">If Yes, specify: <input type="text"></td>
            </tr>
            <tr>
                <td colspan="2">Are you a working student? Yes <input type="checkbox"> No <input type="checkbox"></td>
                <td colspan="2">If Yes, specify: <input type="text"></td>
            </tr>
            <tr>
                <td colspan="2">Are you a member of any Indegenous people?<br> Yes <input type="checkbox"> No <input type="checkbox"></td>
                <td colspan="2">If Yes, specify: <input type="text"></td>
            </tr>
            <!-- ... continue with other rows ... -->
        </table>

        <p>List trainings attended related to leadership and social responsibility:</p>
        <textarea></textarea>
        <br>
                <p>Essay on "What it means to be a Peer Facilitator":</p>
        <textarea></textarea>

        <!-- <div class="signature">
            <p>I certify that the information provided herein is true and correct.</p> -->
           

        
    </div>
</body>
</html>
