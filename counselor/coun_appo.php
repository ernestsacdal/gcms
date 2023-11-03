<?php
session_start();
include('../dbc.php');
include('utilities/head.php');
if (!isset($_SESSION['uname'])) {
    header("Location:coun_login.php");
    die();
}
?>
<style>
    .beautiful-form {
        padding: 20px;
        background-color: #d9d9d9;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .custom-bg-color {
        background-color: #f9f9f9;
    }

    h5 {
        color: red;
        margin-right: 10px;
        /* Adjust the margin as needed */
    }

    /* Style the horizontal line */
    /* hr {
        border: none;
        height: 1px;
        background-color: #ddd;
        margin: 20px 0;
    } */

    /* Style the form fields */
    .beautiful-form .form-group {
        display: flex;
        align-items: center;
        margin: 0;
        /* Remove default margin */
    }

    /* Adjust the width of the slot text boxes */
    .beautiful-form .form-group input[type="number"] {
        width: 80px;
        /* You can adjust the width as needed */
    }

    /* Style the label for the slots input */
    .beautiful-form .slot-label {
        margin-right: 10px;
        /* Add space between the label and input */

    }

    /* Custom CSS for vertical alignment of checkbox */
    /* Custom CSS class for vertical alignment of checkbox */
    .checkbox-custom-align {
        display: flex;
    }

    .checkbox-custom-align .form-check-input {
        margin-top: 35px;
        /* Adjust the margin-top value as needed */
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
                <div class="modal fade" id="mdlAppo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="councode.php" method="POST">
                                <div class="modal-body"><input type="hidden" name="appoID" id="appoID">
                                    <h6>
                                        Are you sure you want to delete this time slot?
                                    </h6>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="btnAppo" class="btn btn-danger">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include('utilities/topbar.php');
            ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Time Slots Form</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="selectedDate">Select Date:</label>
                                    <input type="date" class="form-control" id="selectedDate" required>
                                </div>

                                <!-- <script>
                                        // Get the current date in the format YYYY-MM-DD
                                        const today = new Date().toISOString().split('T')[0];

                                        // Set the value of the date input to today's date
                                        document.getElementById('selectedDate').value = today;
                                    </script> -->
                                <div class="checkbox-custom-align">
                                    <div class="form-check">
                                        <input type="checkbox" id="enableForm1" class="form-check-input" onchange="toggleForm('form1', this)">
                                    </div>
                                    <form id="form1" class="beautiful-form">

                                        <h5>08:00 AM - 09:00 AM :</h5>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="date1" name="date1" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="timeslot1" value="08:00 AM - 09:00 AM" name="timeslot1" hidden disabled>

                                        </div>
                                        <div class="form-group">
                                            <label class="slot-label">Slots:</label>
                                            <input type="number" class="form-control" id="slot1" name="slot1" min="0" value="0" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="status1" name="status1" min="0" value="0" disabled hidden>
                                        </div>
                                    </form>
                                </div>

                                <div class="checkbox-custom-align">
                                    <div class="form-check">
                                        <input type="checkbox" id="enableForm2" class="form-check-input" onchange="toggleForm('form2', this)">
                                    </div>
                                    <form id="form2" class="beautiful-form">
                                        <h5>09:00 AM - 10:00 AM :</h5>
                                        <div class="form-group">

                                            <input type="text" class="form-control" id="date2" name="date2" hidden disabled>
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control" id="timeslot2" value="09:00 AM - 10:00 AM" name="timeslot2" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="slot-label">Slots: </label>
                                            <input type="number" class="form-control" id="slot2" name="slot2" min="0" value="0" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="status2" name="status2" min="0" value="0" disabled hidden>
                                        </div>
                                    </form>
                                </div>

                                <div class="checkbox-custom-align">
                                    <div class="form-check">
                                        <input type="checkbox" id="enableForm3" class="form-check-input" onchange="toggleForm('form3', this)">
                                    </div>
                                    <form id="form3" class="beautiful-form">
                                        <h5>10:00 AM - 11:00 AM :</h5>
                                        <div class="form-group">

                                            <input type="text" class="form-control" id="date3" name="date3" hidden disabled>
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control" id="timeslot3" value="10:00 AM - 11:00 AM" name="timeslot3" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="slot-label">Slots: </label>
                                            <input type="number" class="form-control" id="slot3" name="slot3" min="0" value="0" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="status3" name="status3" min="0" value="0" disabled hidden>
                                        </div>
                                    </form>
                                </div>

                                <div class="checkbox-custom-align">
                                    <div class="form-check">
                                        <input type="checkbox" id="enableForm4" class="form-check-input" onchange="toggleForm('form4', this)">
                                    </div>
                                    <form id="form4" class="beautiful-form">
                                        <h5>11:00 AM - 12:00 PM :</h5>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="date4" name="date4" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="timeslot4" value="11:00 AM - 12:00 PM" name="timeslot4" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="slot-label">Slots: </label>
                                            <input type="number" class="form-control" id="slot4" name="slot4" min="0" value="0" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="status4" name="status4" min="0" value="0" disabled hidden>
                                        </div>
                                    </form>
                                </div>

                                <div class="checkbox-custom-align">
                                    <div class="form-check">
                                        <input type="checkbox" id="enableForm5" class="form-check-input" onchange="toggleForm('form5', this)">
                                    </div>
                                    <form id="form5" class="beautiful-form">
                                        <h5>12:00 PM - 01:00 PM :</h5>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="date5" name="date5" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="timeslot5" value="12:00 PM - 01:00 PM" name="timeslot5" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="slot-label">Slots: </label>
                                            <input type="number" class="form-control" id="slot5" name="slot5" min="0" value="0" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="status5" name="status5" min="0" value="0" disabled hidden>
                                        </div>
                                    </form>
                                </div>

                                <div class="checkbox-custom-align">
                                    <div class="form-check">
                                        <input type="checkbox" id="enableForm6" class="form-check-input" onchange="toggleForm('form6', this)">
                                    </div>
                                    <form id="form6" class="beautiful-form">
                                        <h5>01:00 PM - 02:00 PM :</h5>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="date6" name="date6" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="timeslot6" value="01:00 PM - 02:00 PM" name="timeslot6" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="slot-label">Slots: </label>
                                            <input type="number" class="form-control" id="slot6" name="slot6" min="0" value="0" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="status6" name="status6" min="0" value="0" disabled hidden>
                                        </div>
                                    </form>
                                </div>


                                <div class="checkbox-custom-align">
                                    <div class="form-check">
                                        <input type="checkbox" id="enableForm7" class="form-check-input" onchange="toggleForm('form7', this)">
                                    </div>
                                    <form id="form7" class="beautiful-form">
                                        <h5>02:00 PM - 03:00 PM :</h5>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="date7" name="date7" disabled hidden>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="timeslot7" value="02:00 PM - 03:00 PM" name="timeslot7" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="slot-label">Slots: </label>
                                            <input type="number" class="form-control" id="slot7" name="slot7" min="0" value="0" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="status7" name="status7" min="0" value="0" disabled hidden>
                                        </div>
                                    </form>
                                </div>


                                <div class="checkbox-custom-align">
                                    <div class="form-check">
                                        <input type="checkbox" id="enableForm8" class="form-check-input" onchange="toggleForm('form8', this)">
                                    </div>
                                    <form id="form8" class="beautiful-form">
                                        <h5>03:00 PM - 04:00 PM :</h5>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="date8" name="date8" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="timeslot8" value="03:00 PM - 04:00 PM" name="timeslot8" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="slot-label">Slots: </label>
                                            <input type="number" class="form-control" id="slot8" name="slot8" min="0" value="0" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="status8" name="status8" min="0" value="0" disabled hidden>
                                        </div>
                                    </form>
                                </div>

                                <div class="checkbox-custom-align">
                                    <div class="form-check">
                                        <input type="checkbox" id="enableForm9" class="form-check-input" onchange="toggleForm('form9', this)">
                                    </div>
                                    <form id="form9" class="beautiful-form">
                                        <h5>04:00 PM - 05:00 PM :</h5>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="date9" name="date9" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="timeslot9" value="04:00 PM - 05:00 PM" name="timeslot9" hidden disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="slot-label">Slots: </label>
                                            <input type="number" class="form-control" id="slot9" name="slot9" min="0" value="0" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="status9" name="status9" min="0" value="0" disabled hidden>
                                        </div>
                                    </form>
                                </div>



                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="btnTl">Submit</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- <script>
                        $(document).ready(function() {
                            // When the Submit button is clicked
                            $("button[name='btnTl']").click(function() {
                                var formData1 = $("#form1").serialize();
                                var formData2 = $("#form2").serialize();
                                var formData3 = $("#form3").serialize();
                                var formData4 = $("#form4").serialize();
                                var formData5 = $("#form5").serialize();
                                var formData6 = $("#form6").serialize();
                                var formData7 = $("#form7").serialize();
                                var formData8 = $("#form8").serialize();
                                var formData9 = $("#form9").serialize();
                                $.ajax({
                                    type: "POST",
                                    url: "counappointment.php", // Replace with the actual URL to your PHP script
                                    data: formData1 + "&" + formData2 + "&" + formData3 + "&" + formData4 + "&" + formData5 + "&" + formData6 + "&" + formData7 + "&" + formData8 + "&" + formData9, // Combine data from both forms
                                    success: function(response) {
                                        window.location.href = "coun_appo.php";
                                    }
                                });
                            });
                        });
                    </script> -->
                <script>
                    // $(document).ready(function() {

                    //     $("#selectedDate").change(function() {
                    //         var selectedDate = $(this).val();


                    // $("#date1").val(selectedDate);
                    // $("#date2").val(selectedDate);
                    // $("#date3").val(selectedDate);
                    // $("#date4").val(selectedDate);
                    // $("#date5").val(selectedDate);
                    // $("#date6").val(selectedDate);
                    // $("#date7").val(selectedDate);
                    // $("#date8").val(selectedDate);
                    // $("#date9").val(selectedDate);
                    //     });


                    //     $("button[name='btnTl']").click(function() {

                    //     });
                    // });
                    $(document).ready(function() {
                        $("button[name='btnTl']").click(function() {
                            var selectedDate = $("#selectedDate").val();

                            // Check if a date is selected and is not "0000-00-00"
                            if (!selectedDate || selectedDate === "0000-00-00") {
                                alert("Please select a valid date.");
                                return false; // Prevent the form from submitting
                            }

                            // Continue with the AJAX request if a valid date is selected
                            var formData1 = $("#form1").serialize();
                            var formData2 = $("#form2").serialize();
                            var formData3 = $("#form3").serialize();
                            var formData4 = $("#form4").serialize();
                            var formData5 = $("#form5").serialize();
                            var formData6 = $("#form6").serialize();
                            var formData7 = $("#form7").serialize();
                            var formData8 = $("#form8").serialize();
                            var formData9 = $("#form9").serialize();

                            $.ajax({
                                type: "POST",
                                url: "counappointment.php",
                                data: formData1 + "&" + formData2 + "&" + formData3 + "&" + formData4 + "&" + formData5 + "&" + formData6 + "&" + formData7 + "&" + formData8 + "&" + formData9,
                                success: function(response) {
                                    window.location.href = "coun_appo.php";
                                }
                            });
                        });

                        $("#selectedDate").change(function() {
                            var selectedDate = $(this).val();

                            $("#date1").val(selectedDate);
                            $("#date2").val(selectedDate);
                            $("#date3").val(selectedDate);
                            $("#date4").val(selectedDate);
                            $("#date5").val(selectedDate);
                            $("#date6").val(selectedDate);
                            $("#date7").val(selectedDate);
                            $("#date8").val(selectedDate);
                            $("#date9").val(selectedDate);
                        });
                    });
                </script>

                <script>
                    // function toggleForm(formId, checkbox) {
                    //     var form = document.getElementById(formId);
                    //     var formElements = form.elements;
                    //     for (var i = 0; i < formElements.length; i++) {
                    //         formElements[i].disabled = !checkbox.checked;
                    //     }
                    // }
                    function toggleForm(formId, checkbox) {
                        var form = document.getElementById(formId);
                        var formElements = form.elements;
                        var customBgColorClass = 'custom-bg-color';
                        for (var i = 0; i < formElements.length; i++) {
                            var element = formElements[i];
                            if (element.type !== 'checkbox') {
                                element.disabled = !checkbox.checked;
                                if (element.id.startsWith('status')) {
                                    element.value = checkbox.checked ? 1 : 0;
                                }
                            }
                        }
                        if (checkbox.checked) {
                            form.classList.add(customBgColorClass); // Add the class for checked
                        } else {
                            form.classList.remove(customBgColorClass); // Remove the class for unchecked
                        }
                    }
                </script>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <!-- <h6 class="m-0 font-weight-bold text-primary">TIME SLOTS</h6> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            Add Time Slots
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 0, "desc" ]]'>
                                <thead>
                                    <tr>
                                        <th style="width:3%">#</th>
                                        <th>Date</th>
                                        <th>Time Slot</th>
                                        <th>Slot</th>
                                        <th style="width:5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // SELECT query
                                    $sql = "SELECT * FROM `availability` ORDER BY `date` DESC";
                                    $result = mysqli_query($link, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        foreach ($result as $row => $unit) {
                                            $date_string = $unit['date'];

                                            // Check if the date is "0000-00-00"
                                            if ($date_string != '0000-00-00') {
                                                $timestamp = strtotime($date_string);
                                                $output_date = date("F d, Y", $timestamp);
                                    ?>
                                                <tr>
                                                    <td><?= $unit['id']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $output_date; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['timeslot']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $unit['slot']; ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <button type="button" class="btn btn-danger delBtnn">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-circle-xmark"></i>
                                                            </span>
                                                        </button>
                                                    </td>
                                                </tr>
                                    <?php
                                            }
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

    <script>
        $(document).ready(function() {
            $('.delBtnn').on('click', function() {
                $('#mdlAppo').modal('show');

                $tr = $(this).closest('tr')

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#appoID').val(data[0]);
            });
        });
    </script>

    <?php
    include('utilities/logout.php');
    include('utilities/script.php');
    ?>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>