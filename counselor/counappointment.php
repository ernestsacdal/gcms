<?php
// include('../dbc.php');

// // Retrieve data from the forms
// $date1 = $_POST['date1'];
// $timeslot1 = $_POST['timeslot1'];
// $slot1 = $_POST['slot1'];
// $status1 = $_POST['status1'];

// $date2 = $_POST['date2'];
// $timeslot2 = $_POST['timeslot2'];
// $slot2 = $_POST['slot2'];
// $status1 = $_POST['status2'];

// $date3 = $_POST['date3'];
// $timeslot3 = $_POST['timeslot3'];
// $slot3 = $_POST['slot3'];
// $status1 = $_POST['status3'];

// $date4 = $_POST['date4'];
// $timeslot4 = $_POST['timeslot4'];
// $slot4 = $_POST['slot4'];
// $status1 = $_POST['status4'];

// $date5 = $_POST['date5'];
// $timeslot5 = $_POST['timeslot5'];
// $slot5 = $_POST['slot5'];
// $status1 = $_POST['status5'];

// $date6 = $_POST['date6'];
// $timeslot6 = $_POST['timeslot6'];
// $slot6 = $_POST['slot6'];
// $status1 = $_POST['status6'];

// $date7 = $_POST['date7'];
// $timeslot7 = $_POST['timeslot7'];
// $slot7 = $_POST['slot7'];
// $status1 = $_POST['status7'];

// $date8 = $_POST['date8'];
// $timeslot8 = $_POST['timeslot8'];
// $slot8 = $_POST['slot8'];
// $status1 = $_POST['status8'];

// $date9 = $_POST['date9'];
// $timeslot9 = $_POST['timeslot9'];
// $slot9 = $_POST['slot9'];
// $status1 = $_POST['status9'];

// // Insert data into the availability table
// $sql1 = "INSERT INTO availability (date, timeslot, slot, status) VALUES ('$date1', '$timeslot1', '$slot1', '$status1')";
// $sql2 = "INSERT INTO availability (date, timeslot, slot) VALUES ('$date2', '$timeslot2', '$slot2')";
// $sql3 = "INSERT INTO availability (date, timeslot, slot) VALUES ('$date3', '$timeslot3', '$slot3')";
// $sql4 = "INSERT INTO availability (date, timeslot, slot) VALUES ('$date4', '$timeslot4', '$slot4')";
// $sql5 = "INSERT INTO availability (date, timeslot, slot) VALUES ('$date5', '$timeslot5', '$slot5')";
// $sql6 = "INSERT INTO availability (date, timeslot, slot) VALUES ('$date6', '$timeslot6', '$slot6')";
// $sql7 = "INSERT INTO availability (date, timeslot, slot) VALUES ('$date7', '$timeslot7', '$slot7')";
// $sql8 = "INSERT INTO availability (date, timeslot, slot) VALUES ('$date8', '$timeslot8', '$slot8')";
// $sql9 = "INSERT INTO availability (date, timeslot, slot) VALUES ('$date9', '$timeslot9', '$slot9')";


// if ($link->query($sql1) && $link->query($sql2) && $link->query($sql3) && $link->query($sql4)&& $link->query($sql5) && $link->query($sql6) && $link->query($sql7)&& $link->query($sql8) && $link->query($sql9)) {
//     // echo "Data inserted successfully!";
// } else {
//     echo "Error: " . $link->error;
// }

// // Close the database connection
// $link->close();

include('../dbc.php');

$data = array();

for ($i = 1; $i <= 9; $i++) {
    $date = $_POST["date$i"];
    $timeslot = $_POST["timeslot$i"];
    $slot = $_POST["slot$i"];
    $status = $_POST["status$i"];

    if ($status != 0) {
        $data[] = array('date' => $date, 'timeslot' => $timeslot, 'slot' => $slot, 'status' => $status);
    }
}

foreach ($data as $row) {
    $date = $row['date'];
    $timeslot = $row['timeslot'];
    $slot = $row['slot'];
    $status = $row['status'];

    // Check if a row with the same date and timeslot exists
    $check_sql = "SELECT * FROM availability WHERE date = '$date' AND timeslot = '$timeslot'";
    $result = $link->query($check_sql);

    if ($result->num_rows > 0) {
        // Row with the same date and timeslot exists, update it
        $update_sql = "UPDATE availability SET slot = slot + '$slot', status = 1 WHERE date = '$date' AND timeslot = '$timeslot'";
        if (!$link->query($update_sql)) {
            echo "Error updating: " . $link->error;
        }
    } else {
        // No row with the same date and timeslot, insert a new row
        $insert_sql = "INSERT INTO availability (date, timeslot, slot, status) VALUES ('$date', '$timeslot', '$slot', '$status')";
        if (!$link->query($insert_sql)) {
            echo "Error inserting: " . $link->error;
        }
    }
}

$link->close();

?>
