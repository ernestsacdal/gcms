<?php
include('utilities/head.php');
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
        <div class="row">
            <div class="col-xl-5 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Good Moral Request</h6>
                    </div>
                    <!-- Card Body -->
                    

                    
                    <div class="card-body">
                        <form action="stu_updatecode.php" method="POST">
                            <div class="col-md-10 mx-auto">
                                <input name="cnumber" value="" hidden>
                                <input name="year" value="" hidden>
                                <input name="guardian" value="" hidden>
                                <input name="gcnumber" value="" hidden>
                                <input name="department" value="" hidden>
                                <input name="gender" value="" hidden>
                                <input name="address" value="" hidden>
                                <input name="image" value="" hidden>
                                <input name="qty" value="1" hidden>
                                <label class="form-label">Student ID</label>
                                <input class="form-control" type="text" value="" name="stid"
                                    >
                            </div>
                            <div class="col-md-10 mx-auto">
                                <label class="form-label">Full Name</label>
                                <input class="form-control" type="text"
                                    value="" name="fullname" >
                            </div>
                            <div class="col-md-10 mx-auto">
                                <label class="form-label">Course</label>
                                <input value="" name="course" hidden>
                                <input class="form-control" type="text" value="" name="course">
                            </div>
                            
                            <div class="col-md-10 mx-auto">
                                <label class="form-label">Chief complaint</label>
                                <textarea rows="5" class="form-control" type="text" name="reason" placeholder="Reason"
                                    required></textarea>
                            </div>
                            <br>
                            <div class="col-md-10 mx-auto">
                                <button class="btn btn-success btn-icon-split btn-lit" type="submit" name="btnQuickLogs">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-paper-plane"></i>
                                    </span>
                                    <span class="text">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="col-xl-7 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Guidance Counselor Schedule for Appointment</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        

                                <div class="card mb-4 ">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">
                                        <strong></strong>
                                        </h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            
                                        </h6>
                                        <hr>
                                        <p class="card-text">
                                            <strong>Date:</strong>
                                            <br>
                                            <strong>Time:</strong>
                                            
                                        </p>
                                        <button type="button" class="btn btn-success btn-block btn-small" data-toggle="modal"
                                            data-target="#bookapp">
                                            Book Appointment
                                        </button>
                                    </div>
                                </div>

                                <div class="modal fade" id="bookapp" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Appointment Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="stu_updatecode.php" method="POST">
                                                    <input value="" name="email" hidden>
                                                    <input value="" name="stid" hidden>
                                                    <input value="" name="aumail" hidden>
                                                    <input value="" name="fname" hidden>
                                                    <div class="form-group col-md-12 mx-auto">
                                                    <label class="form-label"> Guidance Counselor </label>
                                                        <input type="text" name="dname" id="dname"
                                                            value="" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12 mx-auto">
                                                        <label class="form-label"> Available Date </label>
                                                        
                                                    </div>
                                                    <div class="form-group col-md-12 mx-auto">
                                                        <label class="form-label"> Day </label>
                                                        <input type="date" id="" name="weekday"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12 mx-auto">
                                                        <label class="form-label"> Available Time </label>
                                                        <input type="time" id="" name="weekday"
                                                            class="form-control">
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12 mx-auto">
                                                        <label class="form-label"> Reason </label>
                                                        <textarea type="text" name="reason" id="reason"
                                                            class="form-control" required></textarea>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" name="btnBook" class="btn btn-success">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                
                        

                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row -->



    </div>
    <!-- /.container-fluid -->
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