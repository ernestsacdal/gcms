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

    /* Overall Form Styling  */
    #timeslotForm {
        width: 80%;
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #e4e4e4;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #e4e4e4;
        border-radius: 4px;
        transition: border-color 0.2s;
    }

    .form-control:focus {
        border-color: #007bff;
        outline: none;
    }

    Label styling .form-group>label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
    }

    Textarea specific styling .form-control[id="inputPurpose"] {
        resize: vertical;
        min-height: 100px;
    }

    /* This is your default button style. Adjust as necessary */
    /* This is your default button style. Adjust as necessary */
    .responsive-btn {
        display: inline-block;
        padding: 0.5em 1em;
        /* Adjust this for your desired default button size */
        position: relative;
        width: auto;
        overflow: hidden;
        /* Added to prevent spill */
        text-align: center;
        /* or whatever color you've set for `.btn-success` */
    }

    .responsive-btn::after {
        content: attr(data-text);
        display: inline-block;
    }

    /* This hides the text and adjusts button size on screens smaller than 768px */
    @media (max-width: 767px) {
        .responsive-btn::after {
            display: none;
            /* hides the text */
        }

        .responsive-btn {
            width: 40px;
            /* or whatever fixed size you want */
            height: 40px;
            /* making it square, adjust to your liking */
            padding: 0;
            /* removing padding */
        }
    }

    .slot-display {
        color: red;
        text-align: center;
        font-size: 1.5em;
        /* Adjust the value as needed */
        padding: 10px;
        border: 1px solid transparent;
    }

    .timeslot-display {
        color: red;
        text-align: center;
        font-size: 1.5em;
        /* Adjust the value as needed */
        padding: 10px;
        border: 1px solid transparent;
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
                                <h6 class="m-0 font-weight-bold text-primary">APPOINTMENT CALENDAR</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <?php
                                $datesData = array();
                                $mysqli = new mysqli("localhost", "root", "", "gcms");
                                if ($mysqli->connect_error) {
                                    die("Connection failed: " . $mysqli->connect_error);
                                }

                                $query = "SELECT date, id, timeslot, slot FROM availability";
                                $result = $mysqli->query($query);

                                while ($row = $result->fetch_assoc()) {
                                    $datesData[$row['date']][] = [
                                        'id' => $row['id'],
                                        'timeslot' => $row['timeslot'],
                                        'slot' => $row['slot']
                                    ];
                                }

                                $datesJson = json_encode($datesData);
                                ?>
                                <?php
                                $data = [];
                                $mysqli = new mysqli("localhost", "root", "", "gcms");
                                if ($mysqli->connect_error) {
                                    die("Connection failed: " . $mysqli->connect_error);
                                }

                                $query = "SELECT id, timeslot, slot, date FROM availability ORDER BY date";
                                $result = $mysqli->query($query);

                                while ($row = $result->fetch_assoc()) {
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
                                                <form id="timeslotForm" style="margin-top: 20px;" action="stucode.php" method="POST">
                                                    <?php
                                                    $stid = $_SESSION['stidd'];
                                                    $sql = "SELECT * FROM student WHERE stid = '$stid'";
                                                    $result = mysqli_query($link, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <input type="text" value="<?php echo $stid ?>" name="stid" hidden>
                                                    <input name="fname" value="<?= $row['fname'] ?> <?= $row['lname'] ?>" hidden>
                                                    <input name="course" value="<?= $row['course'] ?>" hidden>
                                                    <input name="year" value="<?= $row['year'] ?>" hidden>
                                                    <input name="section" value="<?= $row['section'] ?>" hidden>
                                                    <input name="email" value="<?= $row['email'] ?>" hidden>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="inputId" name="id" readonly hidden>
                                                    </div>
                                                    <div class="form-group">
                                                        <!-- <label for="inputDate">Date</label> -->
                                                        <input type="text" class="form-control" id="inputDate" name="date" readonly hidden >
                                                    </div>

                                                    <input type="text" name="inputSlot" id="inputSlott" hidden>
                                                    <input type="text" name="inputTimeslot" id="inputTimeslott" hidden>
                                                    <div class="form-group">
                                                        <label for="slotDisplay">Available Slot</label>
                                                        <div class="slot-display" id="inputSlot"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputTimeslot">Time Slot</label>
                                                        <div class="timeslot-display" id="inputTimeslot"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPurpose">Concerns</label>
                                                        <textarea class="form-control" id="inputPurpose" name="purpose"></textarea>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="btnApp">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        // The PHP dates encoded to JSON
        var datesData = <?php echo $datesJson; ?>;

        // Current date, with time set to start of day for accurate comparison
        var currentDate = new Date();
        currentDate.setHours(0, 0, 0, 0);

        var events = Object.keys(datesData).reduce(function(accumulatedEvents, date) {
            var eventDate = new Date(date);

            // If eventDate is today or in the future, add the event to the array
            if (eventDate >= currentDate) {
                accumulatedEvents.push({
                    title: 'Marker',
                    start: date,
                    entries: datesData[date] // store the entries (ID and timeslot) with the event
                });
            }

            return accumulatedEvents;
        }, []);

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: events,
            eventDidMount: function(info) {
                info.el.innerHTML = '';
                var btn = document.createElement('button');
                var previouslyClickedButton = null;

                btn.innerText = 'Available';
                btn.className = 'btn btn-success responsive-btn';

                btn.onclick = function() {
                    var modalContent = document.getElementById('selectedDate');
                    modalContent.innerHTML = '';
                    var centerContainer = document.createElement('div');
                    centerContainer.style.display = 'flex';
                    centerContainer.style.justifyContent = 'center';
                    centerContainer.style.flexWrap = 'wrap';
                    centerContainer.style.gap = '10px';

                    info.event.extendedProps.entries.forEach(function(entry) {
                        var timeslotButton = document.createElement('button');

                        timeslotButton.className = 'btn btn-success btn-lg';
                        timeslotButton.textContent = entry.timeslot;
                        timeslotButton.setAttribute('data-id', entry.id);
                        timeslotButton.setAttribute('data-date', info.event.startStr);
                        timeslotButton.setAttribute('data-timeslot', entry.timeslot);
                        timeslotButton.setAttribute('data-slot', entry.slot);

                        if (entry.slot === '0') {
                            timeslotButton.disabled = true;
                            timeslotButton.className = 'btn btn-secondary btn-lg';
                        } else {

                            timeslotButton.onclick = function() {
                                document.getElementById('inputId').value = this.getAttribute('data-id');
                                document.getElementById('inputDate').value = this.getAttribute('data-date');
                                document.getElementById('inputTimeslot').innerText = this.getAttribute('data-timeslot');
                                document.getElementById('inputSlot').innerText = this.getAttribute('data-slot');
                                document.getElementById('inputPurpose').value = ''; // Reset the textarea
                                document.getElementById('inputTimeslott').value = this.getAttribute('data-timeslot');
                                document.getElementById('inputSlott').value = this.getAttribute('data-slot');
                                if (previouslyClickedButton) {
                                    previouslyClickedButton.className = 'btn btn-success btn-lg';
                                }
                                this.className = 'btn btn-primary btn-lg';
                                previouslyClickedButton = this;
                            };
                        }

                        centerContainer.appendChild(timeslotButton);
                    });

                    modalContent.appendChild(centerContainer);

                    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                    myModal.show();
                };
                info.el.appendChild(btn);
            }
        });
        calendar.render();
    });
</script>

                                <div class="card shadow mb-4 text-center">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Requested Appointment</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th style="width:24%">Date Requested</th>
                                                        <th style="width:24%">Appointment Date</th>
                                                        <th style="width:19%">Time Slot</th>
                                                        <th style="width:14%">Status</th>
                                                   
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $stid = $_SESSION['stidd'];
                                                    $sql = "SELECT * FROM appointment WHERE stid = '$stid' ORDER BY id DESC LIMIT 3";
                                                    $result = mysqli_query($link, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        foreach ($result as $row => $unit) {


                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $unit['added']; ?>
                                                                </td>
                                                                <td>
                                                                    <?= $unit['date']; ?>
                                                                </td>
                                                                <td>
                                                                    <?= $unit['timeslot']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($unit['status'] == 0) {
                                                                        echo ' <span class="badge badge-pill badge-warning">Pending</span>';
                                                                    } else if ($unit['status'] == 1) {
                                                                        echo ' <span class="badge badge-pill badge-success">Accepted</span>';
                                                                    } else {
                                                                        echo ' <span class="badge badge-pill badge-danger">Rejected</span>';
                                                                    }
                                                                    ?>
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

                                <!--  -->

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