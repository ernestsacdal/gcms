<?php
session_start();
include('../dbc.php');
include('utilities/head.php');
if (!isset($_SESSION['uname'])) {
    header("Location:coun_login.php");
    die();
}
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include('utilities/sidebar.php');
        ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <?php
                include('utilities/topbar.php');
                ?>
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Alumni</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 0, "desc" ]]'>
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Course</th>
                                            <th>Year</th>
                                            <th>Profile</th>
                                            <th style="width:5%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `student` WHERE alum = 1 ORDER BY date DESC";
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
                                                $date_string = $unit['date'];
                                                $timestamp = strtotime($date_string);
                                                $output_date = date("F d, Y", $timestamp);
                                                $statusA = $unit['statusA'];
                                                $statusB = $unit['statusB'];
                                                $statusC = $unit['statusC'];
                                                $statusD = $unit['statusD'];
                                                $statusE = $unit['statusE'];
                                                $statusF = $unit['statusF'];
                                                $statusG = $unit['statusG'];
                                                $statusH = $unit['statusH'];
                                                $statusI = $unit['statusI'];
                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['stid']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['fname']; ?> <?= $unit['lname']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['email']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $acronym;  ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['year']; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($statusA && $statusB && $statusC && $statusD && $statusE == 1) {
                                                            echo ' <span class="badge badge-pill badge-success">Complete</span>';
                                                        } else {
                                                            echo ' <span class="badge badge-pill badge-warning">Incomplete</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <?php
                                                        echo '<a href="coun_view.php?viewstid=' . $unit['stid'] . '"
                                                class="btn btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </a>';
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
            </div>
            <?php
            include('utilities/footer.php');
            ?>
        </div>
    </div>
    
    <?php
    include('utilities/logout.php');
    include('utilities/script.php');
    ?>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>