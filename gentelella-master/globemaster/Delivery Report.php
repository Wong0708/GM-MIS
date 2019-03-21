<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>GM MIS | Delivery Report</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	
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
            <?php
              require_once("nav.php");    
            ?>
      </div>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <h1><b>Delivery Report:  </b>
                      <select id="selectLocation" name = "selectLocation" style=" width:250px";>
                            <option value="">Choose... </option>
                                <?php
                                    require_once('DataFetchers/mysql_connect.php');
                                    $query = "SELECT * FROM scheduledelivery 
                                    GROUP BY Destination";                      
                                    $resultofQuery =  mysqli_query($dbc, $query);
                                    while($row=mysqli_fetch_array($resultofQuery,MYSQLI_ASSOC))
                                    {
                                      echo '<option value="'.$row['Destination'].'"> '.$row['Destination'].'</option> ';
                                    }

                                               
                                ?> <!-- PHP END [ Getting the Warehouses from DB ]-->    
                                <option value="All">All </option>                                               
                        </select>
                      </h1>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <div class="well" style="overflow: auto">
                            <div class="col-md-4">
                              <div id="reportrange_right" class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <p>Please pick a date range for the respective report</p>
                            </div>
                            <div class="col-md-4">
                              <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                              </div>
                            </div>
                          </div>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width ="50px">DR - Number</th>
                          <th>Client</th>
                          <th>Date</th>
                          <th>Truck Plate</th>
                          <th>Driver</th>
                          <th>Location</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                          require_once('DataFetchers/mysql_connect.php');
                          $query = "SELECT * FROM scheduledelivery WHERE delivery_status = 'Delivered' OR delivery_status = 'Order Cancelled'";                      
                          $resultofQuery =  mysqli_query($dbc, $query);
                          while($row=mysqli_fetch_array($resultofQuery,MYSQLI_ASSOC))
                          {
                            echo '<tr>';
                              echo ' <td> '.$row['delivery_Receipt']. '</td>';
                              echo ' <td>'.$row['customer_Name'].' </td>';
                              echo ' <td>'.$row['delivery_Date'].' </td>';
                              echo ' <td align="center">'.$row['truck_Number'].' </td>';
                              echo ' <td align="left">'.$row['driver'].' </td>';
                              echo ' <td align="left">'.$row['Destination'].' </td>';
                            echo '</tr>';
                          }
                        ?>
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          <!-- top tiles -->
          <div class="row tile_count">          
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
    <?php
    require_once('DataFetchers/mysql_connect.php');

      echo 'var dropdown = document.getElementById("selectLocation");'; 

      $DRNumberArray = array();
      $ClientArray = array();
      $DateArray = array();
      $TruckPlateArray = array();
      $DriverArray = array();
      $LocationArray = array();

      $query = "SELECT * FROM scheduledelivery";                      
      $resultofQuery =  mysqli_query($dbc, $query);
      while($row=mysqli_fetch_array($resultofQuery,MYSQLI_ASSOC))
      {
        $DRNumberArray[] = $row['delivery_Receipt'];
        $ClientArray[] = $row['customer_Name'];
        $DateArray[] = $row['delivery_Date'];
        $TruckPlateArray[] = $row['truck_Number'];
        $DriverArray[] = $row['driver'];
        $LocationArray[] = $row['Destination'];
      }

      echo "var DrNumberFromPHP = ".json_encode($DRNumberArray).";";
      echo "var ClientFromPHP = ".json_encode($ClientArray).";"; 
      echo "var DateFromPHP = ".json_encode($DateArray).";"; 
      echo "var TruckplateFromPHP = ".json_encode($TruckPlateArray).";"; 
      echo "var DriverFromPHP = ".json_encode($DriverArray).";";
      echo "var LocationFromPHP = ".json_encode($LocationArray).";";  //Store PHP array to JS Array

      echo  " dropdown.onchange = function(){";

        echo 'var table = document.getElementById("datatable-buttons");';        //Deletes All Rows of Table except Header before Inserting new Rows   
            echo 'for(var i = table.rows.length - 1; i > 0; i--){';     
               echo 'table.deleteRow(i);';
            echo'}'; //END FOR
         
          echo 'var compare = dropdown.value;'; //gets the value of Dropdown

          echo 'for(var i = 0; i < LocationFromPHP.length; i++){';
            echo 'if(LocationFromPHP[i] == compare){';             
              echo  "var newRow = document.getElementById('datatable-buttons').insertRow();";
              echo  'newRow.innerHTML = "<tr> <td>" +DrNumberFromPHP[i]+ "</td> <td>" +ClientFromPHP[i]+ "</td>  <td>" +DateFromPHP[i]+"</td><td>" +TruckplateFromPHP[i]+ "</td><td>" +DriverFromPHP[i]+ "</td><td>" +LocationFromPHP[i]+ "</td></tr>";';
            echo '}'; //END IF 1

            echo 'if(compare == "All"){';
              echo 'window.location.reload();'; //Refreshes the page to return to Normal            
            echo '}'; //END IF 2        
          echo '}';//END FOR
        echo '}'; //End Function
        ?>
                    
    </script>
	
  </body>
</html>
