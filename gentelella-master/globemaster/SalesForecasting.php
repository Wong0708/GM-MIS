<!DOCTYPE html>

<?php
require_once('DataFetchers/mysql_connect.php');

?> <!-- PHP END -->
<?php
    require_once("salesForecastingController.php");
?>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>GM MIS | Assets Trading</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- sidebar menu -->
        <?php
        require_once("nav.php");
        ?>
    </div>
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="title_left">
            <h1>Sales Forecasting Participation for:[ <b> <?php 
            $CURRENT_ITEM_ID = $_GET['item_id'];

            $SELECT_ITEM_NAME = "SELECT * FROM items_trading WHERE item_id ='$CURRENT_ITEM_ID'";
            $RESULT_SELECT_ITEM_NAME = mysqli_query($dbc,$SELECT_ITEM_NAME);
            $ROW_CHECK_STATUS = mysqli_fetch_assoc($RESULT_SELECT_ITEM_NAME);
            $CURRENT_ITEM_NAME = $ROW_CHECK_STATUS['item_name']; 

            echo $CURRENT_ITEM_NAME;?> </b></h1><br>
        </div><!-- PHP END -->
        <!-- /top tiles -->

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">

                    <div class="row x_title">

                        <div class="col-md-6">
                            <h3>For Dates: <b><?php echo $_GET['sd'];?> to <?php echo $_GET['ed'];?></b></h3>
                            <br>

                        </div>


                        <div class="x_content; col-md-12 col-sm-9 col-xs-12 bg-white" id ="topSellingChart">
                            <canvas id="lineChart1" height = "100"></canvas>
                        </div>
                        <br />

                        <div class="clearfix"></div>

                       
                                    <!-- <div id="echart_line" style="height:350px;"></div> -->
                                    <!-- /page content -->

                                </div>
                            </div>

                            <!-- jQuery -->
                            <script src="../vendors/jquery/dist/jquery.min.js"></script>
                            <!-- Bootstrap -->
                            <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <!-- FastClick -->
                            <script src="../vendors/fastclick/lib/fastclick.js"></script>
                            <!-- NProgress -->
                            <script src="../vendors/nprogress/nprogress.js"></script>
                            <!-- Chart.js -->
                            <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
                            <!-- gauge.js -->
                            <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
                            <!-- bootstrap-progressbar -->
                            <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
                            <!-- iCheck -->
                            <script src="../vendors/iCheck/icheck.min.js"></script>
                            <!-- Skycons -->
                            <script src="../vendors/skycons/skycons.js"></script>
                            <!-- Flot -->
                            <script src="../vendors/Flot/jquery.flot.js"></script>
                            <script src="../vendors/Flot/jquery.flot.pie.js"></script>
                            <script src="../vendors/Flot/jquery.flot.time.js"></script>
                            <script src="../vendors/Flot/jquery.flot.stack.js"></script>
                            <script src="../vendors/Flot/jquery.flot.resize.js"></script>
                            <!-- FastClick -->
                            <script src="../vendors/fastclick/lib/fastclick.js"></script>
                            <!-- Flot plugins -->
                            <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
                            <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
                            <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
                            <!-- DateJS -->
                            <script src="../vendors/DateJS/build/date.js"></script>
                            <!-- JQVMap -->
                            <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
                            <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
                            <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
                            <!-- bootstrap-daterangepicker -->
                            <script src="../vendors/moment/min/moment.min.js"></script>
                            <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
                            <!-- Datatables -->
                            <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
                            <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
                            <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
                            <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
                            <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
                            <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
                            <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
                            <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
                            <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                            <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
                            <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
                            <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
                            <script src="../vendors/jszip/dist/jszip.min.js"></script>
                            <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
                            <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

                            <!-- ECharts -->
                            <script src="../vendors/echarts/dist/echarts.min.js"></script>
                            <script src="../vendors/echarts/map/js/world.js"></script>

                            <!-- Custom Theme Scripts -->
                            <script src="../build/js/custom.min.js"></script>

                            <!-- <a href="/gentelella-master/globemaster/SalesForecasting.php?sd=2018-05-15&ed=2018-08-15&item_id=5&type=long"> -->
                            <?php

                            // put if here ser.
                        
                            // $_GET['type']; 
                            $data = time_series($_GET['sd'],$_GET['ed'],$_GET['item_id']);
                            $dates = $data[0];
                            ?>
                            <script>
                                // Line chart
                                var chartColors = {
                                    red: 'rgb(255, 99, 132)',
                                    orange: 'rgb(255, 159, 64)',
                                    yellow: 'rgb(255, 205, 86)',
                                    green: 'rgb(75, 192, 192)',
                                    blue: 'rgb(54, 162, 235)',
                                    purple: 'rgb(153, 102, 255)',
                                    grey: 'rgb(231,233,237)',
                                    black: 'rgb(0,0,0)',
                                };

                                var color = Chart.helpers.color;
                                var colorNames = Object.keys(window.chartColors);
                                var colorName = colorNames[1 % colorNames.length];
                                var newColor = window.chartColors[colorName];
                                var expected = <?php echo json_encode($dates); ?>;
                                var config = {
                                    type: 'line',
                                    data: {
                                        labels: expected,
                                        datasets: [{
                                            label: <?php echo $_GET['item_id']?>,
                                            fill: false,
                                            borderDash: [10,5],
                                            pointStyle: 'rectRot',
                                            pointRadius: 0,
                                            backgroundColor: newColor,
                                            borderColor: newColor,
                                            borderWidth: 0,
                                            data: <?php echo json_encode($data[1]); ?>
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        title: {
                                            display: true,
                                            text: 'Chart.js Line Chart'
                                        },
                                        tooltips: {
                                            mode: 'label',
                                        },
                                        hover: {
                                            mode: 'dataset'
                                        },
                                        scales: {
                                            xAxes: [{
                                                ticks: {
                                                    beginAtZero:true
                                                },
                                                display: true,
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Month'
                                                }
                                            }],
                                            yAxes: [{
                                                display: true,
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Value'
                                                }
                                            }]
                                        }
                                    }
                                };

                                var ctx = document.getElementById("lineChart1").getContext('2d');
                                window.lineChart = new Chart(ctx,config);


                                /* DATERANGEPICKER */

                                function init_daterangepicker() {

                                    if( typeof ($.fn.daterangepicker) === 'undefined'){ return; }
                                    console.log('init_daterangepicker');

                                    var cb = function(start, end, label) {
                                        console.log(start.toISOString(), end.toISOString(), label);
                                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

                                    };

                                    var optionSet1 = {
                                        startDate: moment().subtract(29, 'days'),
                                        endDate: moment(),
                                        minDate: '01/01/2012',
                                        maxDate: moment(),
                                        dateLimit: {
                                            days: 60
                                        },
                                        showDropdowns: true,
                                        showWeekNumbers: true,
                                        timePicker: false,
                                        timePickerIncrement: 1,
                                        timePicker12Hour: true,
                                        ranges: {
                                            'Today': [moment(), moment()],
                                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                        },
                                        opens: 'left',
                                        buttonClasses: ['btn btn-default'],
                                        applyClass: 'btn-small btn-primary',
                                        cancelClass: 'btn-small',
                                        format: 'MM/DD/YYYY',
                                        separator: ' to ',
                                        locale: {
                                            applyLabel: 'Submit',
                                            cancelLabel: 'Clear',
                                            fromLabel: 'From',
                                            toLabel: 'To',
                                            customRangeLabel: 'Custom',
                                            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                                            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                            firstDay: 1
                                        }
                                    };

                                    $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
                                    $('#reportrange').daterangepicker(optionSet1, cb);
                                    $('#reportrange').on('show.daterangepicker', function() {
                                        console.log("show event fired");
                                    });
                                    $('#reportrange').on('hide.daterangepicker', function() {
                                        console.log("hide event fired");
                                    });
                                    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
                                        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
                                    });
                                    $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
                                        console.log("cancel event fired");
                                    });
                                    $('#options1').click(function() {
                                        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
                                    });
                                    $('#options2').click(function() {
                                        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
                                    });
                                    $('#destroy').click(function() {
                                        $('#reportrange').data('daterangepicker').remove();
                                    });

                                }

                                function init_daterangepicker_right() {

                                    if( typeof ($.fn.daterangepicker) === 'undefined'){ return; }
                                    console.log('init_daterangepicker_right');

                                    var cb = function(start, end, label) {
                                        console.log(start.toISOString(), end.toISOString(), label);
                                        $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                                    };

                                    var optionSet1 = {
                                        startDate: moment().subtract(29, 'days'),
                                        endDate: moment(),
                                        minDate: '01/01/2012',
                                        maxDate: '12/31/2020',
                                        dateLimit: {
                                            days: 60
                                        },
                                        showDropdowns: true,
                                        showWeekNumbers: true,
                                        timePicker: false,
                                        timePickerIncrement: 1,
                                        timePicker12Hour: true,
                                        ranges: {
                                            'Today': [moment(), moment()],
                                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                        },
                                        opens: 'right',
                                        buttonClasses: ['btn btn-default'],
                                        applyClass: 'btn-small btn-primary',
                                        cancelClass: 'btn-small',
                                        format: 'MM/DD/YYYY',
                                        separator: ' to ',
                                        locale: {
                                            applyLabel: 'Submit',
                                            cancelLabel: 'Clear',
                                            fromLabel: 'From',
                                            toLabel: 'To',
                                            customRangeLabel: 'Custom',
                                            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                                            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                            firstDay: 1
                                        }
                                    };

                                    $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

                                    $('#reportrange_right').daterangepicker(optionSet1, cb);

                                    $('#reportrange_right').on('show.daterangepicker', function() {
                                        console.log("show event fired");
                                    });
                                    $('#reportrange_right').on('hide.daterangepicker', function() {
                                        console.log("hide event fired");
                                    });
                                    $('#reportrange_right').on('apply.daterangepicker', function(ev, picker) {
                                        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
                                    });
                                    $('#reportrange_right').on('cancel.daterangepicker', function(ev, picker) {
                                        console.log("cancel event fired");
                                    });

                                    $('#options1').click(function() {
                                        $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
                                    });

                                    $('#options2').click(function() {
                                        $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
                                    });

                                    $('#destroy').click(function() {
                                        $('#reportrange_right').data('daterangepicker').remove();
                                    });

                                }

                                function init_daterangepicker_single_call() {

                                    if( typeof ($.fn.daterangepicker) === 'undefined'){ return; }
                                    console.log('init_daterangepicker_single_call');

                                    $('#single_cal1').daterangepicker({
                                        singleDatePicker: true,
                                        singleClasses: "picker_1"
                                    }, function(start, end, label) {
                                        console.log(start.toISOString(), end.toISOString(), label);
                                    });
                                    $('#single_cal2').daterangepicker({
                                        singleDatePicker: true,
                                        singleClasses: "picker_2"
                                    }, function(start, end, label) {
                                        console.log(start.toISOString(), end.toISOString(), label);
                                    });
                                    $('#single_cal3').daterangepicker({
                                        singleDatePicker: true,
                                        singleClasses: "picker_3"
                                    }, function(start, end, label) {
                                        console.log(start.toISOString(), end.toISOString(), label);
                                    });
                                    $('#single_cal4').daterangepicker({
                                        singleDatePicker: true,
                                        singleClasses: "picker_4"
                                    }, function(start, end, label) {
                                        console.log(start.toISOString(), end.toISOString(), label);
                                    });


                                }


                                function init_daterangepicker_reservation() {

                                    if( typeof ($.fn.daterangepicker) === 'undefined'){ return; }
                                    console.log('init_daterangepicker_reservation');

                                    $('#reservation').daterangepicker(null, function(start, end, label) {
                                        console.log(start.toISOString(), end.toISOString(), label);
                                    });

                                    $('#reservation-time').daterangepicker({
                                        timePicker: true,
                                        timePickerIncrement: 30,
                                        locale: {
                                            format: 'MM/DD/YYYY h:mm A'
                                        }
                                    });

                                }
                                function add_new_chart(obj){
                                    if($(obj).is(":checked")){
                                        populateChart($(obj).attr("item_id"), $(obj).attr("item_name"));
                                    }
                                    else{
                                        removeDataSet($(obj).attr("item_name"));
                                    }
                                }
                                function removeDataSet(item_name){
                                    for(i in window.lineChart.config.data.datasets){
                                        if (window.lineChart.config.data.datasets[i].label === item_name){
                                            window.lineChart.config.data.datasets.splice(i, 1);
                                            window.lineChart.update();
                                        }
                                    }
                                }
                                $(document).ready(function() {

                                    init_daterangepicker();
                                    init_daterangepicker_right();
                                    init_daterangepicker_single_call();
                                    init_daterangepicker_reservation();
                                });
                            </script>
</body>
</html>
