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
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                    </div>

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Registered Students</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql = "SELECT * FROM student";
                                                $result = mysqli_query($link, $sql);
                                                $res = mysqli_num_rows($result);
                                                echo $res;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Complete Profile</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql = "SELECT COUNT(*) AS total FROM student WHERE statusA = 1 AND statusB = 1 AND statusC = 1 AND statusD = 1 AND statusE = 1 AND statusH = 1 AND statusI = 1";
                                                $result = mysqli_query($link, $sql);
                                                $row = mysqli_fetch_assoc($result);
                                                echo $row['total'];
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Appointment Request
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php
                                                        $sql = "SELECT * FROM appointment WHERE status= 0";
                                                        $result = mysqli_query($link, $sql);
                                                        $res = mysqli_num_rows($result);
                                                        echo $res;
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Document Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql = "SELECT * FROM document WHERE status= 0";
                                                $result = mysqli_query($link, $sql);
                                                $res = mysqli_num_rows($result);
                                                echo $res;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-folder  fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Appointment/Counseling Request</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Scholarship/Financial Assistance</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> 4Ps
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Listahan 2.0
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> StuFAP
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color: #DAF7A6;"></i> ESGP-PA
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color: #808080;"></i> Others
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color: #FF0000;"></i> N/A
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row">

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Scholarship/Financial Assistance</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart2"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Working Student
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Dependent of Solo Parent
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Solo Parent 
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color: #DAF7A6;"></i> Person With Disability
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color: #808080;"></i> Indigenous Group
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Area Chart -->
                         <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Document Request</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart2"></canvas>
                                    </div>
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

    $query = "SELECT COUNT(*) AS 4ps FROM scholarship WHERE assist = '4Ps'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['4ps'];

    $query2 = "SELECT COUNT(*) AS listahan FROM scholarship WHERE assist = 'Listahan 2.0'";
    $result2 = mysqli_query($link, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $count2 = $row2['listahan'];


    $query3 = "SELECT COUNT(*) AS stufap FROM scholarship WHERE grantee = 'StuFAP'";
    $result3 = mysqli_query($link, $query3);
    $row3 = mysqli_fetch_assoc($result3);
    $count3 = $row3['stufap'];

    $query4 = "SELECT COUNT(*) AS esgp FROM scholarship WHERE grantee = 'ESGP-PA'";
    $result4 = mysqli_query($link, $query4);
    $row4 = mysqli_fetch_assoc($result4);
    $count4 = $row4['esgp'];

    $query5 = "SELECT COUNT(*) AS others FROM scholarship WHERE grantee = 'Others'";
    $result5 = mysqli_query($link, $query5);
    $row5 = mysqli_fetch_assoc($result5);
    $count5 = $row5['others'];

    $query6 = "SELECT COUNT(*) AS na FROM scholarship WHERE assist = 'N/A'";
    $result6 = mysqli_query($link, $query6);
    $row6 = mysqli_fetch_assoc($result6);
    $count6 = $row6['na'];


    ?>
</body>

<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["4Ps", "Listahan 2.0", "StuFAP", "ESGP-PA", "Others", "N/A"],
            datasets: [{
                data: [<?php echo $count ?>, <?php echo $count2 ?>, <?php echo $count3 ?>, <?php echo $count4 ?>, <?php echo $count5 ?>, <?php echo $count6 ?>],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#DAF7A6', '#808080', '#FF0000'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#D4AC0D', '#3b444b', '#FFC0CB'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>




<?php
$jan = "SELECT COUNT(*) AS jan FROM appointment WHERE EXTRACT(MONTH FROM added) = 1";
$run = mysqli_query($link, $jan);
$row = mysqli_fetch_assoc($run);
$jan_count = $row['jan'];

$feb = "SELECT COUNT(*) AS feb FROM appointment WHERE EXTRACT(MONTH FROM added) = 2";
$run = mysqli_query($link, $feb);
$row = mysqli_fetch_assoc($run);
$feb_count = $row['feb'];

$mar = "SELECT COUNT(*) AS mar FROM appointment WHERE EXTRACT(MONTH FROM added) = 3";
$run = mysqli_query($link, $mar);
$row = mysqli_fetch_assoc($run);
$mar_count = $row['mar'];

$apr = "SELECT COUNT(*) AS apr FROM appointment WHERE EXTRACT(MONTH FROM added) = 4";
$run = mysqli_query($link, $apr);
$row = mysqli_fetch_assoc($run);
$apr_count = $row['apr'];

$may = "SELECT COUNT(*) AS may FROM appointment WHERE EXTRACT(MONTH FROM added) = 5";
$run = mysqli_query($link, $may);
$row = mysqli_fetch_assoc($run);
$may_count = $row['may'];

$jun = "SELECT COUNT(*) AS jun FROM appointment WHERE EXTRACT(MONTH FROM added) = 6";
$run = mysqli_query($link, $jun);
$row = mysqli_fetch_assoc($run);
$jun_count = $row['jun'];

$jul = "SELECT COUNT(*) AS jul FROM appointment WHERE EXTRACT(MONTH FROM added) = 7";
$run = mysqli_query($link, $jul);
$row = mysqli_fetch_assoc($run);
$jul_count = $row['jul'];

$aug = "SELECT COUNT(*) AS aug FROM appointment WHERE EXTRACT(MONTH FROM added) = 8";
$run = mysqli_query($link, $aug);
$row = mysqli_fetch_assoc($run);
$aug_count = $row['aug'];

$sep = "SELECT COUNT(*) AS sep FROM appointment WHERE EXTRACT(MONTH FROM added) = 9";
$run = mysqli_query($link, $sep);
$row = mysqli_fetch_assoc($run);
$sep_count = $row['sep'];

$oct = "SELECT COUNT(*) AS oct FROM appointment WHERE EXTRACT(MONTH FROM added) = 10";
$run = mysqli_query($link, $oct);
$row = mysqli_fetch_assoc($run);
$oct_count = $row['oct'];

$nov = "SELECT COUNT(*) AS nov FROM appointment WHERE EXTRACT(MONTH FROM added) = 11";
$run = mysqli_query($link, $nov);
$row = mysqli_fetch_assoc($run);
$nov_count = $row['nov'];

$dec = "SELECT COUNT(*) AS `dec` FROM appointment WHERE EXTRACT(MONTH FROM added) = 12";
$run = mysqli_query($link, $dec);
$row = mysqli_fetch_assoc($run);
$dec_count = $row['dec'];
?>




<script>
    
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
    
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
   
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

   
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Count",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [<?= $jan_count ?>, <?= $feb_count ?>, <?= $mar_count ?>, <?= $apr_count ?>, <?= $may_count ?>, <?= $jun_count ?>, <?= $jul_count ?>, <?= $aug_count ?>, <?= $sep_count ?>, <?= $oct_count ?>,<?= $nov_count ?>,<?= $dec_count ?>],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 12 
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return  + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>



<?php
$jan = "SELECT COUNT(*) AS jan FROM document WHERE EXTRACT(MONTH FROM added) = 1";
$run2 = mysqli_query($link, $jan);
$row2 = mysqli_fetch_assoc($run2);
$jan_count2 = $row2['jan'];

$feb = "SELECT COUNT(*) AS feb FROM document WHERE EXTRACT(MONTH FROM added) = 2";
$run2 = mysqli_query($link, $feb);
$row2 = mysqli_fetch_assoc($run2);
$feb_count2 = $row2['feb'];

$mar = "SELECT COUNT(*) AS mar FROM document WHERE EXTRACT(MONTH FROM added) = 3";
$run2 = mysqli_query($link, $mar);
$row2 = mysqli_fetch_assoc($run2);
$mar_count2 = $row2['mar'];

$apr = "SELECT COUNT(*) AS apr FROM document WHERE EXTRACT(MONTH FROM added) = 4";
$run2 = mysqli_query($link, $apr);
$row2 = mysqli_fetch_assoc($run2);
$apr_count2 = $row2['apr'];

$may = "SELECT COUNT(*) AS may FROM document WHERE EXTRACT(MONTH FROM added) = 5";
$run2 = mysqli_query($link, $may);
$row2 = mysqli_fetch_assoc($run2);
$may_count2 = $row2['may'];

$jun = "SELECT COUNT(*) AS jun FROM document WHERE EXTRACT(MONTH FROM added) = 6";
$run2 = mysqli_query($link, $jun);
$row2 = mysqli_fetch_assoc($run2);
$jun_count2 = $row2['jun'];

$jul = "SELECT COUNT(*) AS jul FROM document WHERE EXTRACT(MONTH FROM added) = 7";
$run2 = mysqli_query($link, $jul);
$row2 = mysqli_fetch_assoc($run2);
$jul_count2 = $row2['jul'];

$aug = "SELECT COUNT(*) AS aug FROM document WHERE EXTRACT(MONTH FROM added) = 8";
$run2 = mysqli_query($link, $aug);
$row2 = mysqli_fetch_assoc($run2);
$aug_count2 = $row2['aug'];

$sep = "SELECT COUNT(*) AS sep FROM document WHERE EXTRACT(MONTH FROM added) = 9";
$run2 = mysqli_query($link, $sep);
$row2 = mysqli_fetch_assoc($run2);
$sep_count2 = $row2['sep'];

$oct = "SELECT COUNT(*) AS oct FROM document WHERE EXTRACT(MONTH FROM added) = 10";
$run2 = mysqli_query($link, $oct);
$row2 = mysqli_fetch_assoc($run2);
$oct_count2 = $row2['oct'];

$nov = "SELECT COUNT(*) AS nov FROM document WHERE EXTRACT(MONTH FROM added) = 11";
$run2 = mysqli_query($link, $nov);
$row2 = mysqli_fetch_assoc($run2);
$nov_count2 = $row2['nov'];

$dec = "SELECT COUNT(*) AS `dec` FROM document WHERE EXTRACT(MONTH FROM added) = 12";
$run2 = mysqli_query($link, $dec);
$row2 = mysqli_fetch_assoc($run2);
$dec_count2 = $row2['dec'];

?>



<script>

    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {

        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
 
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

   
    var ctx = document.getElementById("myAreaChart2");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Count",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [<?= $jan_count2 ?>, <?= $feb_count2 ?>, <?= $mar_count2 ?>, <?= $apr_count2 ?>, <?= $may_count2 ?>, <?= $jun_count2 ?>, <?= $jul_count2 ?>, <?= $aug_count2 ?>, <?= $sep_count2 ?>, <?= $oct_count2 ?>,<?= $nov_count2 ?>,<?= $dec_count2 ?>],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 12 
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return  + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>



<?php

    $query = "SELECT COUNT(*) AS working FROM scholarship WHERE working = 'Yes'";
    $res = mysqli_query($link, $query);
    $roww = mysqli_fetch_assoc($res);
    $countt = $roww['working'];

    $query2 = "SELECT COUNT(*) AS `dependent` FROM scholarship WHERE `dependent` = 'Yes - ID Number:'";
    $res2 = mysqli_query($link, $query2);
    $roww2 = mysqli_fetch_assoc($res2);
    $countt2 = $roww2['dependent'];


    $query3 = "SELECT COUNT(*) AS solo FROM scholarship WHERE solo = 'Yes - ID Number:'";
    $res3 = mysqli_query($link, $query3);
    $roww3 = mysqli_fetch_assoc($res3);
    $countt3 = $roww3['solo'];

    $query4 = "SELECT COUNT(*) AS pwd FROM scholarship WHERE pwd = 'Yes - ID Number:'";
    $res4 = mysqli_query($link, $query4);
    $roww4 = mysqli_fetch_assoc($res4);
    $countt4 = $roww4['pwd'];

    $query5 = "SELECT COUNT(*) AS indeg FROM scholarship WHERE indeg = 'Yes - Group name:'";
    $res5 = mysqli_query($link, $query5);
    $roww5 = mysqli_fetch_assoc($res5);
    $countt5 = $roww5['indeg'];



    ?>



<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    var ctx = document.getElementById("myPieChart2");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Working Student", "Dependent of Solo Parent", "Solo Parent", "Person With Disability", "Indigenous Group"],
            datasets: [{
                data: [<?php echo $countt ?>, <?php echo $countt2 ?>, <?php echo $countt3 ?>, <?php echo $countt4 ?>, <?php echo $countt5 ?>],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#DAF7A6', '#808080'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#D4AC0D', '#3b444b'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>
</html>