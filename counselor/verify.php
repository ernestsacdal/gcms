<?php
require_once '../dbc.php';
session_start();

if (isset($_POST['verify'])) {
    $otp = $_POST['otp'];
    $query = $link->query("SELECT * FROM `counselor` WHERE `otp` = '$otp'");
    $row = $query->fetch_array();
    if ($row) {
        ?>
            <script type="text/javascript">
            window.location = 'coun_index.php';
            </script>
        <?php
        session_start();
        $_SESSION['uname'] = $row['uname'];
    } else {
        $_SESSION['otpp'] = "Invalid OTP";
                    header('Location: otp.php');
        ?>
            <!-- <script type="text/javascript">
            alert('Invalid OTP');
            window.location = 'otp.php'; -->
            </script>
        <?php
    }
}

