<?php
session_start();
include('../dbc.php');
include('utilities/head.php');
if (!isset($_SESSION['unamee'])) {
    header("Location:coun_login.php");
    die();
}
if (isset($_GET['viewstid'])) {
    $stid = $_GET['viewstid'];
    $select = mysqli_query($link, "SELECT * FROM `student` WHERE stid='$stid'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
    }
    $per = mysqli_query($link, "SELECT * FROM `personal` WHERE stid='$stid'") or die('query failed');
    $row2 = mysqli_fetch_assoc($per);
}

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include('utilities/sidebar.php');
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include('utilities/topbar.php');
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <nav class="nav nav-borders">
                        <?php
                        $stid = $_GET['viewstid'];
                        $sql = "SELECT * FROM `student` WHERE stid='$stid'";
                        $result = mysqli_query($link, $sql);
                        while ($fetch = mysqli_fetch_assoc($result)) {
                            echo "
                <a class='nav-link active' href='dir_view.php?viewstid=" . $fetch['stid'] . " '>Account Information</a>
                <a class='nav-link' href='dir_viewProf.php?viewstid=" . $fetch['stid'] . "'>Profiling</a>
                <a class='nav-link' href='dir_viewReq.php?viewstid=" . $fetch['stid'] . "'>Request</a>
                <a class='nav-link' href='dir_viewRout.php?viewstid=" . $fetch['stid'] . "'>Routine</a>
                <a class='nav-link' href='dir_viewPeer.php?viewstid=" . $fetch['stid'] . "'>Peer</a>
                <a class='nav-link' href='dir_viewEi.php?viewstid=" . $fetch['stid'] . "'>Exit Interview</a>
                ";
                        }
                        ?>
                    </nav>
                    <hr class="mt-0 mb-4" />

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DOCUMENT REQUESTS</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 0, "desc" ]]'>
                                    <thead>
                                        <tr>
                                            <th style="width:6%">ID #</th>
                                            <th style="width:12%">Date</th>
                                            <th style="width:14%">Name</th>
                                            <th style="width:7%">Course</th>
                                            <th style="width:9%">Year Level</th>
                                            <th style="width:11%">Yr Graduated</th>
                                            <th>Purpose</th>
                                            <th style="width:9%">Status</th>
                                            <th style="display: none;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //SELECT query
                                        $sql = "SELECT * FROM `document` WHERE stid = '$stid    ' ORDER BY id DESC";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {
                                                $course = $unit['course'];
                                                $words = explode(' ', $course);
                                                $words = array_filter($words, function ($w) {
                                                    return strtolower($w) !== 'of' && strtolower($w) !== 'in';
                                                });
                                                $acronym = '';
                                                foreach ($words as $word) {
                                                    $acronym .= strtoupper(substr($word, 0, 1));
                                                }
                                                $date_string = $unit['added'];
                                                $timestamp = strtotime($date_string);
                                                $output_date = date("F d, Y", $timestamp);
                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['id'] ?>
                                                    </td>
                                                    <td style="display: none;">
                                                        <?= $unit['stid'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $output_date ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['fname'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $acronym ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['year'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['grad'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['purpose'] ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <?php

                                                        if ($unit['status'] == 0) {
                                                            echo ' <span class="badge badge-pill badge-warning">Pending</span>';
                                                        } else if ($unit['status'] == 1) {
                                                            echo ' <span class="badge badge-pill badge-success">Ready</span>';
                                                        } else {
                                                            echo ' <span class="badge badge-pill badge-danger">Rejected</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>

                                        <?php
                                            }
                                        } else {
                                            echo "No Record Found";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">APPOINTMENT REQUESTS</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 0, "desc" ]]'>
                                    <thead>
                                        <tr>
                                            <th style="width:6%">ID #</th>
                                            <th style="display: none;"></th>
                                            <th style="width:12%">Date</th>
                                            <th style="width:14%">Name</th>
                                            <th style="width:7%">Course</th>
                                            <th style="width:9%">Year Level</th>
                                            <th>Purpose</th>
                                            <th style="width:9%">Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //SELECT query
                                        $sql = "SELECT * FROM `appointment` WHERE stid= '$stid' ORDER BY id DESC";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {
                                                $course = $unit['course'];
                                                $words = explode(' ', $course);
                                                $words = array_filter($words, function ($w) {
                                                    return strtolower($w) !== 'of' && strtolower($w) !== 'in';
                                                });
                                                $acronym = '';
                                                foreach ($words as $word) {
                                                    $acronym .= strtoupper(substr($word, 0, 1));
                                                }
                                                $date_string = $unit['added'];
                                                $timestamp = strtotime($date_string);
                                                $output_date = date("F d, Y", $timestamp);
                                        ?>
                                                <tr>
                                                    <td>    <?= $unit['id'] ?>
                                                    </td>
                                                    <td style="display: none;"><?= $unit['stid'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $output_date ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['fname'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $acronym ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['year'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['purpose'] ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                    <?php
                                                                            if ($unit['status'] == 0) {
                                                                                echo ' <span class="badge badge-pill badge-warning">Pending</span>';
                                                                            } else if ($unit['status'] == 1) {
                                                                                echo ' <span class="badge badge-pill badge-success">Approved</span>';
                                                                            } else {
                                                                                echo ' <span class="badge badge-pill badge-danger">Rejected</span>';
                                                                            }
                                                                            ?>
                                                    </td>
                                                </tr>

                                        <?php
                                            }
                                        } else {
                                            echo "No Record Found";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php
            include('utilities/footer.php');
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <?php
    include('utilities/logout.php');
    include('utilities/script.php');
    ?>
</body>

</html>