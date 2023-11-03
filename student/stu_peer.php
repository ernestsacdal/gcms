<?php
include('utilities/head.php');
session_start();
include('../dbc.php');
if (!isset($_SESSION['stidd'])) {
    header("Location:stu_login.php");
    die();
}
?>
<style>
    @media screen and (max-width: 600px) {

        /* Reduce width of textareas to fit on screen */
        textarea {
            width: 100%;
        }

        /* Adjust label font size for smaller screens */
        label.xl {
            font-size: 1.2rem;
        }
    }

    <?php
    $stid = $_SESSION['stidd'];
    $stud = "SELECT * FROM student WHERE stid = $stid";
    $stud_run = mysqli_query($link, $stud);
    $row = mysqli_fetch_assoc($stud_run);
    $statusL = $row['statusL'];
    if ($statusL == 1) {
        echo '.blur-form {
        filter: blur(5px);
        pointer-events: none;
        z-index: 0;
      }
      .overlay-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 1.2em;
        color: #04cc82;
        text-align: center;
        z-index: 1;
      }';
    }

    ?>
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
                    <?php
                    if (isset($_SESSION['peerSave']) && $_SESSION['peerSave'] != '') {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>' . $_SESSION['peerSave'] . '</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                        unset($_SESSION['peerSave']);
                    }
                    ?>
                    <?php
                    $dis = "SELECT * FROM peer WHERE stid = " . $_SESSION['stidd'];
                    $dis_run = mysqli_query($link, $dis);
                    $row = mysqli_fetch_assoc($dis_run);
                    ?>
                    <?php
                    $stid = $_SESSION['stidd'];
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">Peer Application Form</div>
                        <div class="card-body">
                            <?php
                            if ($statusL == 1) {
                                echo ' <div class="overlay-text">You are now a member of the organization.</div>';
                            }
                            ?>

                            <form method="POST" action="stucode.php" class="blur-form">
                                <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                                <div class="mb-3">
                                    <label class="xl mb-1">List trainings attended related to leadership and social responsibility</label><br>

                                    <textarea cols="100" rows="5" name="training"><?= $row['training'] ?? '' ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="xl mb-1">Essay on "What it means to be a Peer facilitator</label><br>
                                    <textarea cols="100" rows="5" name="faci"><?= $row['faci'] ?? '' ?></textarea>
                                </div>
                             
                                <button type="submit" class="btn btn-primary btn-icon-split mb-3" name="btnPeer" value="1">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-right-long"></i>
                                    </span>
                                    <span class="text">SUBMIT</span>
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