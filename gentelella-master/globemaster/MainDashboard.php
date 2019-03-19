
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>GM MIS | Dashboard</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
                

            
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        
        

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-plus"></i> Recently Added Items</span>
              <div class="count">10</div>
              <span class="count_bottom"><i class="green"></i><a href = "#" class = "blue">Click for more!</a></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-thumbs-o-down"></i> Returned Items</span>
              <div class="count">2</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>2 </i> Added From Last Week</span>
            </div><br>
            <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count"> 
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green">2,500</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div> -->
          </div> 
          <!-- /top tiles -->
            
             <div class="row">
                 <?php
            
                    if($user == 'SALES')
                    {
                        //INVENTORY BELOW THRESHOLD
                        
                        echo '<div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="x_panel">
                                    <h2><center><i class="fa fa-level-down"></i><b>  ITEMS BELOW THRESHOLD</b></h2>  
                                    <div class="clearfix"></div>
                                  <div class="x_content">

                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th>SKU</th>
                                          <th>Item Name</th>
                                          <th>Amount In Stock</th>
                                          <th>Threshold Status</th>
                                        </tr>
                                      </thead>
                                      <tbody>';
                        
                            require_once('DataFetchers/mysql_connect.php');
                            $query = "SELECT sku_id, item_name, item_count from items_trading WHERE item_count > threshold_amt + 50";
                            $result=mysqli_query($dbc,$query);
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                            {
                                
                                    echo '<tr>';
                                    echo '<td>';
                                    echo $row['sku_id'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['item_name'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['item_count'];
                                    echo '</td>';
                                    echo '<td>';
                                    
                                    echo '</td>';
                                    echo '</tr>';
                                    
                            } 
                     echo '</tbody>';
                    echo '</table>';
                        
                             echo '</div>
                        </div>
                      </div>';

                         //ORDERS NEARING DELIVERY
                 
                        echo '<div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="x_panel">
                                      <h2><center><i class="fa fa-car"></i><b>  ORDERS NEARING DELIVERY</b></h2>
                                    <div class="clearfix"></div>
                                  <div class="x_content">

                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th>Order Number</th>
                                          <th>Client Name</th>
                                          <th>Delivery Date</th>
                                          <th>Remaining Date</th>
                                        </tr>
                                      </thead>
                                      <tbody>';
                        
                        require_once('DataFetchers/mysql_connect.php');
                            $query = "SELECT ordernumber, client_id, delivery_date, DATEDIFF(NOW(), delivery_date) AS 'remain_date' FROM orders WHERE DATEDIFF(NOW(), delivery_date) < 7";
                            $result=mysqli_query($dbc,$query);
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                            {

                                    $queryClientName = "SELECT client_name FROM clients WHERE client_id =" . $row['client_id'] . ";";
                                    $resultClientName = mysqli_query($dbc,$queryClientName);
                                    $rowClientName=mysqli_fetch_array($resultClientName,MYSQLI_ASSOC);
                                    $clientName = $rowClientName['client_name'];
                                    
                                
                                    echo '<tr>';
                                    echo '<td>';
                                    echo $row['ordernumber'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $clientName;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['delivery_date'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['remain_date'];
                                    echo ' days left!';
                                    echo '</td>';
                                    echo '</tr>';
                                    
                            } 
                     echo '</tbody>';
                    echo '</table>';
                        
                             echo '</div>
                        </div>
                      </div>';

                     

                    }
            ?>

              

              <div class="clearfix"></div>


            </div>
        
           </div>
          </div>
    
          <br>
          <div class="row">
            
   

           
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->
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
    <!-- FullCalendar -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/fullcalendar/dist/fullcalendar.min.js"></script>
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Custom Fonts -->
    <style>
        
        @font-face {
        font-family: "Couture Bold";
        src: url("css/fonts/couture-bld.otf");
        }
        
        h2 {
            font-family: 'COUTURE Bold', Arial, sans-serif;
            font-weight:normal;
            font-style:normal;
            font-size: 25px;
            color: #1D2B51;
            }

    </style>    
	
  </body>
</html>
