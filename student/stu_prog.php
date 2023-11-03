<?php
session_start();
include('../dbc.php');
if (!isset($_SESSION['stidd'])) {
    header("Location:stu_login.php");
    die();
}

$stid = $_SESSION['stidd'];
$sql = "SELECT statusA, statusB, statusC, statusD, statusE, statusF, statusG, statusH, statusI FROM student WHERE stid = '$stid'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    $rowCount = $result->num_rows;
    $progress = 0;

    // Calculate the progress based on the number of rows with a value of 1
    while ($row = $result->fetch_assoc()) {
        foreach ($row as $value) {
            if ($value == 1) {
                $progress += 11.12;
            }
        }
    }

    // Close the database connection
    $link->close();

    // Echo the progress as a JSON response
    echo json_encode(['progress' => $progress]);
} else {
    echo json_encode(['progress' => 0]); // Default progress if no rows are found
}

?>