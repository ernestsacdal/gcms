<?php
session_start();
include('../dbc.php');
include('utilities/head.php');
if (!isset($_SESSION['uname'])) {
    header("Location:coun_login.php");
    die();
}
include('counmodal.php');
?>
<style>
    /* #repAcc {
  height: 100px; Change this value to adjust the height */
</style>

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

                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-bottom-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pendings</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql = "SELECT * FROM peer WHERE status= 0";
                                                $result = mysqli_query($link, $sql);
                                                $res = mysqli_num_rows($result);
                                                echo $res;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-arrow-left fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-bottom-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Approved</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql = "SELECT * FROM peer WHERE status= 1";
                                                $result = mysqli_query($link, $sql);
                                                $res = mysqli_num_rows($result);
                                                echo $res;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-circle-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-bottom-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Rejected</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql = "SELECT * FROM peer WHERE status= 2";
                                                $result = mysqli_query($link, $sql);
                                                $res = mysqli_num_rows($result);
                                                echo $res;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-circle-xmark fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PEER ORGANIZATION REQUESTS</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 0, "desc" ]]'>
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Year Level</th>
                                            <th>Section</th>
                                            <th>Form</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //SELECT query
                                        $uname = $_SESSION['uname'];
                                        $sql = "SELECT * FROM `peer` WHERE status = 0  ORDER BY date DESC";
                                        $result = mysqli_query($link, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row => $unit) {
                                                $stid = $unit['stid'];
                                                $st = "SELECT * FROM student WHERE stid = '$stid'";
                                                $res = mysqli_query($link, $st);
                                                $row2 = mysqli_fetch_assoc($res);
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

                                                $dis = "SELECT * FROM peer WHERE stid = '$stid'";
                                                $dis_run = mysqli_query($link, $dis);
                                                $row3 = mysqli_fetch_assoc($dis_run);
                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $unit['stid'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $output_date ?>
                                                    </td>
                                                    <td>
                                                        <?= $row2['fname']; ?> <?= $row2['lname']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $acronym ?>
                                                    </td>
                                                    <td>
                                                        <?= $row2['year']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row2['section']; ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#mdlVpeer">
                                                            View
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="mdlVpeer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Peer Organization <Form></Form>
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group col-md-12 mx-auto">
                                                                            <label class="form-label">List trainings attended related to leadership and social responsibility </label>
                                                                            <textarea type="text" class="form-control" readonly><?= $row3['training'] ?? '' ?></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-12 mx-auto">
                                                                            <label class="form-label">Essay on "What it means to be a Peer facilitator </label>
                                                                            <textarea type="text" class="form-control" readonly><?= $row3['faci'] ?? '' ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a href="councode.php?accPeer=<?= $unit['stid'] ?>&uname=<?= $uname ?>" class="btn btn-success">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-circle-check"></i>
                                                            </span>
                                                        </a>

                                                        <a href="councode.php?delPeer=<?= $unit['stid'] ?>&uname=<?= $uname ?>" class="btn btn-danger">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-circle-xmark"></i>
                                                            </span>
                                                        </a>
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
</body>
<script src="js/demo/datatables-demo.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

</html>