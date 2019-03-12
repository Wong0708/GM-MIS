<!DOCTYPE html>

<?php
      require_once('DataFetchers/mysql_connect.php');
    
?> <!-- PHP END -->




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
        <?php
          require_once('DataFetchers/mysql_connect.php');

          $query = "SELECT SUM(item_qty) FROM order_details"; //Query for getting the Total Sales from Order Details
          $resultOrderDetail = mysqli_query($dbc,$query);
          $qtyfromOrderDeatils = mysqli_fetch_array($resultOrderDetail,MYSQLI_ASSOC);
          $itemQty = $qtyfromOrderDeatils['SUM(item_qty)'];

          echo'<div class="row tile_count">';
          echo'<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">';  //HTML to display the Target Sales and Actual Total Sales
          echo'<span class="count_top"> Target Sales: </span>';
          echo'<div class="count">2500</div>';
              
          echo'</div>';
          echo'<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">';
          echo'<span class="count_top"> Total Sales: </span>';
            echo'<div class="count">'; 
            echo $itemQty;
            echo'</div>';
          echo'</div>';
          
          $query = "SELECT * FROM items_trading"; //Query for getting the Total Profit of All Sales
          $result=mysqli_query($dbc,$query);

          $totalPrice = 0;

          while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
          { 
            $length = count($row);
            $i = $row['item_id'];
            foreach((array) $row['item_id'] as $count)
            {
              $query = "SELECT *,SUM(item_qty) as total_amount FROM order_details where item_id = $count GROUP BY item_id";
              $resultOrderDetail = mysqli_query($dbc,$query);
              $qtyfromOrderDeatils = mysqli_fetch_array($resultOrderDetail,MYSQLI_ASSOC);
              $itemQty = $qtyfromOrderDeatils['total_amount'];
             
              
            }   
            $totalPrice += $row['price'] * $itemQty; 
                                 
          }
          echo'<div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">'; //HTML to display TOTAL PROFIT and Cost
          echo'<span class="count_top">Total Profit: </span>';
            echo'<div class="count green"> ₱';
            echo number_format($totalPrice, 2, '.', ',');
            echo'</div>';
          echo'</div>';
          echo'<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">';
          // echo'<span class="count_top"><i class="fa fa-user"></i> Total Incurred Cost: </span>';
          // echo'<div class="count">764,567</div>'; //COST: Needs to be clarified
          echo'</div>';          
          echo'</div>';
          ?> <!-- PHP END -->
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                
                  <div class="col-md-6">
                    <h3>Trading Assets: <large> <b>Top Selling Items </b>[2019] </large></h3>
                    <br>
                    
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2010 - January 28, 2020</span> <b class="caret"></b>
                    </div>
                  </div>
                

                  <!-- <div class="x_content">
                    <canvas id="lineChart"></canvas>
                  </div> -->

                  <div class="x_content; col-md-12 col-sm-9 col-xs-12 bg-white" id ="topSellingChart">
                    <canvas id="lineChart1" height = "100"></canvas>
                    
                  </div>
                  


                 <!-- <div class="col-md-3 col-sm-3 col-xs-12 bg-white"> 
                      <div class="x_panel tile fixed_height_320">
                        <div class="x_title">
                          <h2>Top Selling This Month: </h2>                          
                          <div class="clearfix"></div>
                        </div>
                
                <?php
                  // require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
                

                  // $query = "SELECT *, SUM(item_qty) as total_amount 
                  // FROM order_details 
                  // GROUP BY item_id 
                  // ORDER by total_amount 
                  // DESC LIMIT 5 "; //Query to get the 5 most sold items in current month.

                  // $resultOrderDetail = mysqli_query($dbc,$query);
                  
                  
                  // while($qtyfromOrderDetails = mysqli_fetch_array($resultOrderDetail,MYSQLI_ASSOC))
                  // { 
                   
                  //   $itemName =  $qtyfromOrderDetails['item_name'];
                  //   $itemQty = $qtyfromOrderDetails['total_amount'];


                  //   echo'     <div class="x_content">'; //Html to show the top 5 most sold assets in trading
                  //   echo'         <h4></h4>';
                  //   echo'   <div class="widget_summary">';
                  //   echo'       <div class="w_right w_45">';
                  //   echo'         <span>';
                  //   echo '<b><font size="3" color="black">',$itemName,':</b></font>';
                  //   echo'        </span>';
                  //   echo'      </div>';
                  //   echo'      ';
                  //   echo'      <div class="w_right w_20">';
                  //   echo'        <span>';
                  //   echo '<b><font size="3" color="green">',$itemQty,'</b></font>'  ;
                  //   echo'        </span>';
                  //   echo'      </div>';
                  //   echo'      <div class="clearfix"></div>';
                  //   echo'     </div>';
                  //   echo'  </div>';
                   
                  // }                                 
                  ?>    
                    
                    </div>
                  </div>        
          </div>        -->
          <br />

          <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Asset List <small></small></h2>
                   
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" >
                            </th>
                            <th class="column-title">SKU </th>
                            <th class="column-title">Item Name </th>
                            <th class="column-title">Price </th>
                            <th class="column-title" width ="50px">Quantity Sold </th>
                            <th class="column-title">Total Price Sold </th>
                            
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                            require_once('DataFetchers/mysql_connect.php');
                          
                            $query = "SELECT * FROM items_trading";
                            $result=mysqli_query($dbc,$query);

                           while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                            { 
                              $length = count($row);
                              $i = $row['item_id'];
                              foreach((array) $row['item_id'] as $count)
                              {
                                $query = "SELECT *,SUM(item_qty) as total_amount FROM order_details where item_id = $count GROUP BY item_id";
                                $resultOrderDetail = mysqli_query($dbc,$query);
                                $qtyfromOrderDeatils = mysqli_fetch_array($resultOrderDetail,MYSQLI_ASSOC);
                                $itemQty = $qtyfromOrderDeatils['total_amount'];
                               
                              }                                  

                              echo '<tr class="even pointer">';
                                echo '<td class="a-center">';
                                echo    '<input type="checkbox">';
                                echo  '</td>';
                                echo '<td align ="right">';
                                echo $row['sku_id'];
                                echo '</td>';  
                                echo '<td align ="right">';
                                echo $row['item_name'];
                                echo '</td>'; 
                                echo '<td align ="right"> ₱ ';
                                echo $row['price'];
                                echo '</td>';  
                                echo '<td align ="right">';
                                echo $itemQty;
                                echo '</td>';  
                                echo '<td align ="right"> ₱ ';
                                echo number_format((float)($row['price'] * $itemQty), 2, '.', ',');
                                echo '</td>';  
                                echo '<td align = "center" class="last" ><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">View Details</a></td>';                          
                              echo '</tr>';
                            }
                          ;    
                         ?>                                              
   
                            
                             
                          
                        </tbody>
                      </table>
                    </div>
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


    <?php
      $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    ?>
    <script>
    // Line chart

    var expected = <?php echo json_encode($months); ?>;
			 
			if ($('#topSellingChart').length ){	
			
      var ctx = document.getElementById("lineChart1");
      var lineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: expected,
        datasets: [{
        label: "Item 1",
        backgroundColor: "rgba(38, 185, 154, 0.31)",
        borderColor: "rgba(38, 185, 154, 0.7)",
        pointBorderColor: "rgba(38, 185, 154, 0.7)",
        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        pointBorderWidth: 1,
        data: [31, 74, 6, 39, 20, 85, 7,69,100,88,89]
        }, {
        label: "Item 2",
        backgroundColor: "rgba(3, 88, 106, 0.3)",
        borderColor: "rgba(3, 88, 106, 0.70)",
        pointBorderColor: "rgba(3, 88, 106, 0.70)",
        pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgba(151,187,205,1)",
        pointBorderWidth: 1,
        data: [82, 23, 66, 9, 99, 4, 2]
        }, {
        label: "Item 3",
        backgroundColor: "rgba(3, 90, 106, 0.3)",
        borderColor: "rgba(3, 88, 106, 0.70)",
        pointBorderColor: "rgba(3, 88, 106, 0.70)",
        pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgba(151,187,205,1)",
        pointBorderWidth: 1,
        data: [81, 33, 96, 12, 59, 1, 122]
        }]
        
      },
      });
    
    }

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

    $(document).ready(function() {

      init_daterangepicker();
      init_daterangepicker_right();
      init_daterangepicker_single_call();
      init_daterangepicker_reservation();

    });	
    </script>             
  </body>
</html>
