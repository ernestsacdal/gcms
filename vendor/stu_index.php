<?php
session_start();
include('../dbc.php');
if (!isset($_SESSION['stidd'])) {
    header("Location:stu_login.php");
    die();
}
include('utilities/head.php');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
</head>

<style>
    /* Override table background color */
    #dataTable {
        background-color: #fff;

    }

    body {
        font-family: Arial, sans-serif;
        text-align: center;
    }

    h1 {
        font-size: 24px;
        margin-top: 20px;
    }

    #calendar {
        height: 700px;
    }

    .fc-event {
        background: none !important;
        border: none !important;
        text-align: center;
    }
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

                    <!-- Here -->
                    <div class="col-xl-12 col-lg-8">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">YOUR NEW CARD TITLE</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <?php
                               $dates = array();
                               $mysqli = new mysqli("localhost", "root", "", "gcms");
                               if ($mysqli->connect_error) {
                                   die("Connection failed: " . $mysqli->connect_error);
                               }
                               
                               $query = "SELECT date, GROUP_CONCAT(id) as ids FROM availability GROUP BY date";
                               $result = $mysqli->query($query);
                               
                               while ($row = $result->fetch_assoc()) {
                                   $dates[$row['date']] = explode(',', $row['ids']);
                               }
                               
                               $datesJson = json_encode($dates);
                                ?>
                                <?php
                            $data = [];
                            $mysqli = new mysqli("localhost", "root", "", "gcms");
                            if ($mysqli->connect_error) {
                                die("Connection failed: " . $mysqli->connect_error);
                            }
                            
                            $query = "SELECT id, timeslot, status, slot, date FROM availability ORDER BY date";
                            $result = $mysqli->query($query);
                            
                            while($row = $result->fetch_assoc()) {
                                // Grouping data by 'date'
                                $data[$row['date']][] = $row;
                            }
                            
                            $dataJson = json_encode($data);
                            
                                ?>
                                <div id="calendar"></div>
                          
                                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Selected Date</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p id="selectedDate">No date selected.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                        document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    // The PHP dates encoded to JSON
    var dates = <?php echo $datesJson; ?>;

    var events = Object.keys(dates).map(function(date) {
        return {
            title: 'Marker',
            start: date,
            ids: dates[date]  // store the ids with the event
        };
    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: events,
        eventDidMount: function(info) {
            info.el.innerHTML = '';
            var btn = document.createElement('button');
            btn.innerText = 'Available';
            btn.className = 'btn btn-success';
            btn.onclick = function() {
                
                // Get the modal body content
                var modalContent = document.getElementById('selectedDate');
                
                // Clear the previous content
                modalContent.innerHTML = '';

                // Create an input for each ID
                info.event.extendedProps.ids.forEach(function(id) {
                    var inputElement = document.createElement('input');
                    inputElement.type = 'text';
                    inputElement.value = id;
                    inputElement.className = 'form-control my-2'; // added some margin for spacing

                    modalContent.appendChild(inputElement);
                });

                var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                myModal.show();
            };
            info.el.appendChild(btn);
        }
    });
    calendar.render();
});


                                </script>




                            </div>
                        </div>
                    </div>
                    <!-- end here -->

                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">DOCUMENT REQUEST FORM</h6>
                                </div>
                                <!-- Card Body -->
                                <?php
                                $stid = $_SESSION['stidd'];
                                $sql = "SELECT * FROM student WHERE stid = '$stid'";
                                $result = mysqli_query($link, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <div class="card-body">
                                    <form action="stucode.php" method="POST">
                                        <input name="stid" value="<?= $stid ?>" hidden>
                                        <input name="fname" value="<?= $row['fname'] ?> <?= $row['lname'] ?>" hidden>
                                        <input name="course" value="<?= $row['course'] ?>" hidden>
                                        <input name="year" value="<?= $row['year'] ?>" hidden>
                                        <input name="section" value="<?= $row['section'] ?>" hidden>
                                        <input name="email" value="<?= $row['email'] ?>" hidden>
                                        <div class="card mb-4 ">
                                            <div class="col-md-11 mx-auto mt-3">
                                                <select class="form-control" type="text" name="docu" required onchange="showTextbox()">
                                                    <option value="Good Moral" selected>Good Moral</option>
                                                    <option value="Other">Other, Specify</option>
                                                </select>

                                                <div id="other-docu" style="display:none;">
                                                    <input type="text" name="specify" class="form-control mt-3" placeholder="Please Specify">
                                                </div>
                                            </div>
                                            <div class="col-md-11 mx-auto mt-3">
                                                <input type="text" name="grad" class="form-control" placeholder="Year Graduated (If Applicable). N/A if None">
                                            </div>
                                            <br>
                                            <div class="col-md-11 mx-auto mb-3">
                                                <textarea rows="3" class="form-control" type="text" name="purpose" placeholder="Purpose" required></textarea>
                                            </div>
                                            <div class="col-md-11 mx-auto text-center">
                                                <button class="btn btn-primary btn-icon-split btn-lit mb-3" type="submit" name="btnDocu">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-paper-plane"></i>
                                                    </span>
                                                    <span class="text">Submit</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card shadow mb-4 text-center">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Requested Documents</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th style="width:24%">Date Requested</th>
                                                                <th style="width:19%">Document</th>
                                                                <th style="width:14%">Status</th>
                                                                <th>Report</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $stid = $_SESSION['stidd'];
                                                            $sql = "SELECT * FROM document WHERE stid = '$stid' ORDER BY id DESC LIMIT 3";
                                                            $result = mysqli_query($link, $sql);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                foreach ($result as $row => $unit) {


                                                            ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?= $unit['added']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?= $unit['docu']; ?>
                                                                        </td>
                                                                        <td>
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
                                                                        <td>
                                                                            <?= $unit['pickup']; ?>
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="qwe" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                            <h6>Do you really want to remove this member?</h6>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="btnRem" class="btn btn-danger">Remove</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- 
                        <div class="col-xl-6 col-lg-6 justify-content-center mt-auto">
                            <div class="card shadow mb-4">
                                Card Header - Dropdown
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">APPOINTMENT REQUEST FORM</h6>
                                </div>
                                Card Body
                                <php
                                $stid = $_SESSION['stidd'];
                                $sql = "SELECT * FROM student WHERE stid = '$stid'";
                                $result = mysqli_query($link, $sql);
                                $row = mysqli_fetch_assoc($result);

                                ?> -->
                        <!-- <div class="card-body">
                                    <form action="stucode.php" method="POST">
                                        <input name="stid" value="<= $stid ?>" hidden>
                                        <input name="fname" value="<= $row['fname'] ?> <= $row['lname'] ?>" hidden>
                                        <input name="course" value="<= $row['course'] ?>" hidden>
                                        <input name="year" value="<= $row['year'] ?>" hidden>
                                        <input name="section" value="<= $row['section'] ?>" hidden>
                                        <input name="email" value="<= $row['email'] ?>" hidden>
                                        <div class="card mb-4 ">
                                            <div class="col-md-11 mx-auto mt-3">
                                                <select class="form-control" type="text" name="counseling" required onchange="showTextboxx()">
                                                    <option value="Counseling" selected>Counseling</option>
                                                    <option value="Other">Other, Specify</option>
                                                </select>
                                                <div id="other-counseling" style="display:none;">
                                                    <input type="text" name="specify" class="form-control mt-3" placeholder="Please Specify">
                                                </div>
                                            </div>
                                            <div class="col-md-11 mx-auto mt-3">
                                                <select class="form-control" type="text" name="mode" required>
                                                    <option value="Face to face" selected>Face to face</option>
                                                    <option value="Online">Online</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-md-11 mx-auto">
                                                <textarea rows="3" class="form-control mb-3" type="text" name="purpose" placeholder="Purpose" required></textarea>
                                            </div>
                                            <div class="col-md-11 mx-auto text-center">
                                                <button class="btn btn-primary btn-icon-split btn-lit mb-3" type="submit" name="btnApp">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-paper-plane"></i>
                                                    </span>
                                                    <span class="text">Submit</span>
                                                </button>


                                            </div>
                                        </div>
                                        <div class="card shadow mb-4 text-center">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Requested Appointments</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th style="width:24%">Date Requested</th>
                                                                <th style="width:19%">Appointment</th>
                                                                <th style="width:14%">Status</th>
                                                                <th>Report</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <php
                                                            $stid = $_SESSION['stidd'];
                                                            $sql = "SELECT * FROM appointment WHERE stid = '$stid' ORDER BY id DESC LIMIT 3";
                                                            $result = mysqli_query($link, $sql);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                foreach ($result as $row => $unit) {

                                                            ?>
                                                                    <tr>
                                                                        <td>
                                                                            <= $unit['added']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <= $unit['counseling']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <php
                                                                            if ($unit['status'] == 0) {
                                                                                echo ' <span class="badge badge-pill badge-warning">Pending</span>';
                                                                            } else if ($unit['status'] == 1) {
                                                                                echo ' <span class="badge badge-pill badge-success">Approved</span>';
                                                                            } else {
                                                                                echo ' <span class="badge badge-pill badge-danger">Rejected</span>';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <= $unit['sched']; ?>
                                                                        </td>
                                                                    </tr>
                                                            <hp
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-6 justify-content-center ">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">SIGNATURE REQUEST FORM</h6>
                                </div>
                                <!-- Card Body -->
                                <?php
                                $stid = $_SESSION['stidd'];
                                $sql = "SELECT * FROM student WHERE stid = '$stid'";
                                $result = mysqli_query($link, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <div class="card-body">
                                    <form action="stucode.php" method="POST" enctype="multipart/form-data">
                                        <input name="stid" value="<?= $stid ?>" hidden>
                                        <input name="fname" value="<?= $row['fname'] ?> <?= $row['lname'] ?>" hidden>
                                        <input name="course" value="<?= $row['course'] ?>" hidden>
                                        <input name="year" value="<?= $row['year'] ?>" hidden>
                                        <input name="section" value="<?= $row['section'] ?>" hidden>
                                        <input name="email" value="<?= $row['email'] ?>" hidden>
                                        <div class="card mb-4 ">

                                            <div class="col-md-11 mx-auto mt-3">
                                                <input type="file" name="myfile" class="form-control">
                                            </div>

                                            <div class="col-md-11 mx-auto mt-3">
                                                <input type="text" name="type" class="form-control" placeholder="Document type">
                                            </div>
                                            <br>
                                            <div class="col-md-11 mx-auto mb-3">
                                                <textarea rows="3" class="form-control" type="text" name="purpose" placeholder="Purpose" required></textarea>
                                            </div>
                                            <div class="col-md-11 mx-auto text-center">
                                                <button class="btn btn-primary btn-icon-split btn-lit mb-3" type="submit" name="btnSig">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-paper-plane"></i>
                                                    </span>
                                                    <span class="text">Submit</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card shadow mb-4 text-center">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Requested Documents</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th style="display: none;"></th>
                                                                <th style="width:24%">Date Requested</th>
                                                                <th style="width:19%">Document</th>
                                                                <th style="width:14%">Status</th>
                                                                <th>Report</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $stid = $_SESSION['stidd'];
                                                            $sql = "SELECT * FROM `signature` WHERE stid = '$stid' ORDER BY id DESC LIMIT 3";
                                                            $result = mysqli_query($link, $sql);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                foreach ($result as $row => $unit) {


                                                            ?>
                                                                    <tr>
                                                                        <td style="display: none;">
                                                                            <?= $unit['id']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?= $unit['added']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?= $unit['file']; ?>
                                                                        </td>
                                                                        <td>
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
                                                                        <td style="text-align: center;">
                                                                            <?= $unit['report']; ?>
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>

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

</html>