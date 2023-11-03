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
                include('dirmodal.php');
                ?>
                
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">SIGNATURE REQUEST</h6>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 0, "desc" ]]'>
                                <thead>
                                    <tr>
                                        <th style="width:3%">#</th>
                                        <th style="display: none;"></th>
                                        <th style="width:9%">File Name</th>
                                        <th style="width:12%">Type of Document</th>
                                        <th style="width:7%">Size(KB)</th>
                                        <th>Purpose</th>
                                        <th style="width:8%">Uploaded</th>
                                        <th style="width:5%">Uploader</th>
                                        <th style="width:5%">Download</th>
                                        <th style="width:9%">Report</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //SELECT query
                                    $sql = "SELECT * FROM `signature` WHERE `status` = 0 ORDER BY `id` DESC";
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
                                            $date_string = $unit['added'];
                                            $timestamp = strtotime($date_string);
                                            $output_date = date("F d, Y", $timestamp);
                                    ?>
                                            <tr>
                                                <td><?= $unit['id']; ?>
                                                </td>
                                                <td style="display: none;"><?= $unit['stid']; ?>
                                                </td>
                                                <td>
                                                    <?= $unit['file']; ?>
                                                </td>
                                                <td>
                                                    <?= $unit['type']; ?>
                                                </td>
                                                <td>
                                                    <?= $unit['size'] / 100 . 'KB' ?>
                                                </td>
                                                <td>
                                                    <?= $unit['purpose']; ?>
                                                </td>
                                                <td>
                                                    <?= $output_date ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php
                                                    echo '<a href="dir_view.php?viewstid=' . $unit['stid'] . '"
                                                     class="btn btn-info btn-icon-split">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-eye"></i>
                                                    </span>
                                                    </a>';
                                                    ?>

                                                </td>


                                                <td style="text-align: center;">
                                                    <a href="dircode.php?file_id=<?php echo $unit['id'] ?>" class="btn btn-dark btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-download"></i>
                                                        </span></a>
                                                </td>

                                                <td style="text-align: center;">
                                                    <button type="button" class="btn btn-success accBtnn">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-circle-check"></i>
                                                        </span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger delBtn">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-circle-xmark"></i>
                                                        </span>
                                                    </button>
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
    include('utilities/js.php');
    ?>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>