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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include('utilities/topbar.php');
                include('counmodal.php');
                ?>
                <!-- Modal for Delete -->
                <div class="modal fade" id="mdlRem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="councode.php" method="POST">
                                <div class="modal-body">

                                    <input type="text" name="delstid" id="delstid">
<?php
$uname = $_SESSION['uname']
?>
<input type="hidden" name="uname" value="<?= $uname  ?>">
                                    <h6>Do you really want to remove this member?</h6>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="btnRem" class="btn btn-danger">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">PEER ORGANIZATION MEMBERS</h6>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Year</th>
                                        <th>Section</th>
                                        <th>Member Since</th>
                                        <th style="width:9%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //SELECT query
                                    $sql = "SELECT * FROM `peer` WHERE `status` = 1 ORDER BY `date` DESC ";
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
                                                <?= ($row +1) ?>
                                                </td>
                                                <td><?= $unit['stid']; ?>
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
                                                    echo '<a href="coun_viewPeer.php?viewstid=' . $unit['stid'] . '"
                                                class="btn btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </a>';
                                                    ?>
                                                    <button type="button" class="btn btn-danger btn-icon-split delBtn">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
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

    ?>
    <script>
        $(document).ready(function() {
            $('.delBtn').on('click', function() {
                $('#mdlRem').modal('show');

                $tr = $(this).closest('tr')

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delstid').val(data[1]);
            });
        });
    </script>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>