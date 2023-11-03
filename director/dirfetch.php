<?php
include('../dbc.php');
$uname = $_POST['uname'];
    $old_pass = $_POST['old'];
    $new_pass = $_POST['new'];
    $conf_pass = $_POST['conf'];

    $stmt = mysqli_prepare($link, "SELECT `password` FROM director WHERE uname = ?");
    mysqli_stmt_bind_param($stmt, "s", $uname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

if ($row && password_verify($old_pass, $row['password'])) {
    if ($new_pass == $conf_pass) {
        $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($link, "UPDATE director SET `password` = ? WHERE uname = ?");
        mysqli_stmt_bind_param($stmt, "ss", $hashed_pass, $uname);
        mysqli_stmt_execute($stmt);
        echo 'success'; 
    } else {
        echo 'New passwords do not match.'; 
    }
} else {
    echo 'Incorrect current password.'; 
}
