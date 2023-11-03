<?php
include('utilities/head.php');
session_start();
include('../dbc.php');
if (!isset($_SESSION['stidd'])) {
    header("Location:stu_login.php");
    die();
}
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include('utilities/sidebar.php');
        include('stu_modal.php');
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

                    <div class="card mb-4">
                        <div class="card-header">Routine Interview</div>
                        <div class="card-body">
                        <form method="POST" action="stucode.php">
                            
                            <?php
                            $stid = $_SESSION['stidd'];
                            ?>
                            <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                                <h5>FAMILY BACKGROUND</h5>
                                <div class="mb-3">
                                    <label class="small mb-1">Relationship with Parents</label><br>
                                    <textarea cols="100" name="parents"></textarea><br>
                                    <label class="small mb-1">Relationship with siblings</label><br>
                                    <textarea cols="100" name="siblings"></textarea><br>
                                    <label class="small mb-1">Relationship with Relatives</label><br>
                                    <textarea cols="100" name="relatives"></textarea><br>
                                    <label class="small mb-1">Parent concerns in the family</label><br>
                                    <textarea cols="100" name="family"></textarea><br>

                                </div>

                                <h5>SCHOOL EXPERIENCE</h5>
                                <div class="mb-3">
                                    <label class="small mb-1">Class Performance</label><br>
                                    <textarea cols="100" name="perf"></textarea><br>
                                    <label class="small mb-1">Concerns towards classmates</label><br>
                                    <textarea cols="100" name="classmates"></textarea><br>
                                    <label class="small mb-1">Concerns towards teachers</label><br>
                                    <textarea cols="100" name="teachers"></textarea><br>
                                    <label class="small mb-1">Concern towards school staff</label><br>
                                    <textarea cols="100" name="staff"></textarea><br>
                                    <label class="small mb-1">Concerns toward students activities and organizations</label><br>
                                    <textarea cols="100" name="org"></textarea><br>
                                    <label class="small mb-1">Concern towards facilities and services</label><br>
                                    <textarea cols="100" name="services"></textarea><br>

                                </div>



                                <h5>INTERPERSONAL RELATIONS</h5>
                                <div class="mb-3">
                                    <label class="small mb-1">Friends</label><br>
                                    <textarea cols="100" name="friends"></textarea><br>
                                    <label class="small mb-1">Romantic relationships</label><br>
                                    <textarea cols="100" name="romantic"></textarea><br>

                                </div>

                                <h5>OTHER CONCERNS</h5>
                                <div class="mb-3">

                                    <textarea cols="100"></textarea>

                                </div>
                                <div class="mb-3">
                                    <label class="large mb-1">Other guide questions:</label><br>
                                    <label class="small mb-1">1. How do you see yourself in terms of physical attributes and personality? </label><br>
                                    <textarea cols="100" rows="1" name="self"></textarea><br>
                                    <label class="small mb-1">2. Beliefs and principles you live by? </label><br>
                                    <textarea cols="100" rows="1" name="belief"></textarea><br>
                                    <label class="small mb-1">3. Significant experiences in life?</label><br>
                                    <textarea cols="100" rows="1" name="exp"></textarea><br>
                                    <label class="small mb-1">4. Other interests,skills,leisure activities? </label><br>
                                    <textarea cols="100" rows="1" name="skills"></textarea><br>

                                </div>
                                <button type="submit" class="btn btn-primary btn-icon-split mb-3" name="btnRoutine">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-right-long"></i>
                                    </span>
                                    <span class="text">Submit</span>
                                </button>
                            </form>
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