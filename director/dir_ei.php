<?php
session_start();
include('../dbc.php');
include('utilities/head.php');
if (!isset($_SESSION['unamee'])) {
    header("Location:dir_login.php");
    die();
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">EXIT INTERVIEW FILLERS</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 0, "desc" ]]'>
                                    <thead>
                                        <tr>
                                            <th style="width:3%">#</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Year</th>
                                            <th>Section</th>
                                            <th>Date Submitted</th>
                                            <th style="width:5%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //SELECT query
                                        $sql = "SELECT * FROM `ei` ORDER BY `date` DESC";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {

                                                $stid = $unit['stid'];
                                                $student = "SELECT * FROM student WHERE stid = '$stid'";
                                                $student_run = mysqli_query($link, $student);
                                                $row2 = mysqli_fetch_assoc($student_run);

                                                $course = $row2['course'];
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
                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= ($row + 1) ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['stid']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row2['fname']; ?> <?= $row2['lname']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $acronym; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row2['year']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row2['section']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $output_date ?>
                                                    </td>


                                                    <td style="text-align: center;">
                                                        <?php
                                                        echo '<a href="dir_viewEi.php?viewstid=' . $unit['stid'] . '"
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
    <script src="js/demo/datatables-demo.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>