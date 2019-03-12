<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>GM MIS | Inventory Report</title>

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
                    <h1><b>Inventory Report:  </b>
                      <select id="selectWarehouse" name = "selectWarehouse" style=" width:250px";>
                            <option value="">Choose... </option>
                                <?php
                                require_once("print.php"); 
                                    require_once('DataFetchers/mysql_connect.php');
                                    $query = "SELECT * FROM items_trading
                                    join warehouses ON items_trading.warehouse_id = warehouses.warehouse_id
                                    GROUP BY warehouse";                      
                                    $resultofQuery =  mysqli_query($dbc, $query);
                                    while($row=mysqli_fetch_array($resultofQuery,MYSQLI_ASSOC))
                                    {
                                      echo '<option value="'.$row['warehouse'].'">'.$row['warehouse'].'</option> ';
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
                          <th width ="50px">SKU</th>
                          <th width ="100px">Item Name</th>
                          <th width ="100px">Last Restock</th>
                          <th width ="50px">Total Item Count</th>
                          <th width ="100px">Warehouse</th>
                          <th width ="50px">Total Procured/Restock</th>
                        </tr>
                      </thead>
                      <tbody id = "DaBodi">
                       
                        <?php
                           require_once('DataFetchers/mysql_connect.php');
                          $query = "SELECT * FROM items_trading
                          join warehouses ON items_trading.warehouse_id = warehouses.warehouse_id
                          ORDER BY warehouse";                      
                          $resultofQuery =  mysqli_query($dbc, $query);
                          while($row=mysqli_fetch_array($resultofQuery,MYSQLI_ASSOC))
                          {
                            $id = $row['item_id'];
                            $totalProcuredquery = "SELECT sum(quantity) as TotalProcured, item_id FROM restock_detail WHERE item_id = '$id' ;";
                            $resultforTotal =  mysqli_query($dbc, $totalProcuredquery);
                            $row2 = mysqli_fetch_array($resultforTotal,MYSQLI_ASSOC);
                            echo '<tr>';
                              echo ' <td> '.$row['sku_id']. '</td>';
                              echo ' <td>'.$row['item_name'].' </td>';
                              echo ' <td>'.$row['last_restock'].' </td>';
                              echo ' <td align="center">'.$row['item_count'].' </td>';
                              echo ' <td align="left">'.$row['warehouse'].' </td>';
                              echo ' <td align="right">'.$row2['TotalProcured'].' </td>';
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
    <script>
         <?php
          require_once('DataFetchers/mysql_connect.php');

          echo 'var dropdown = document.getElementById("selectWarehouse");'; 

          $warehouseNameArray = array();
          $SKUArray = array();
          $itemNameArray = array();
          $itemCountArray = array();
          $lastRestockArray = array();
          $TotalProcuredArray = array();
        
          $query = "SELECT * FROM items_trading
          join warehouses ON items_trading.warehouse_id = warehouses.warehouse_id
          ORDER BY item_id";                      
          $resultofQuery =  mysqli_query($dbc, $query);

          while($row=mysqli_fetch_array($resultofQuery,MYSQLI_ASSOC))
          {
            $id = $row['item_id'];
            $totalProcuredquery = "SELECT sum(quantity) as TotalProcured, item_id FROM restock_detail WHERE item_id = '$id' ;";
            $resultforTotal =  mysqli_query($dbc, $totalProcuredquery);
            $row2 = mysqli_fetch_array($resultforTotal,MYSQLI_ASSOC);

            $warehouseNameArray[] = $row['warehouse'];
            $SKUArray[] = $row['sku_id'];
            $itemNameArray[] = $row['item_name'];
            $itemCountArray[] = $row['item_count'];
            $lastRestockArray[] = $row['last_restock'];
            $TotalProcuredArray[] = $row2['TotalProcured'];
          }
          

          echo "var warehouseNameFromPHP = ".json_encode($warehouseNameArray).";";
          echo "var SKUFromPHP = ".json_encode($SKUArray).";"; 
          echo "var itemNameFromPHP = ".json_encode($itemNameArray).";"; 
          echo "var itemCountFromPHP = ".json_encode($itemCountArray).";"; 
          echo "var lastRestockFromPHP = ".json_encode($lastRestockArray).";";
          echo "var TotalProcuredFromPHP = ".json_encode($TotalProcuredArray).";"; //Store PHP array to JS Array

          echo  " dropdown.onchange = function(){";

           echo 'var table = document.getElementById("datatable-buttons");';        //Deletes All Rows of Table except Header before Inserting new Rows   
            echo 'for(var i = table.rows.length - 1; i > 0; i--){';     
               echo 'table.deleteRow(i);';
            echo'}'; //END FOR
         
          echo 'var compare = dropdown.value;'; //gets the value of Dropdown

          echo 'for(var i = 0; i < warehouseNameFromPHP.length; i++){';
            echo 'if(warehouseNameFromPHP[i] == compare){';             
              echo  "var newRow = document.getElementById('datatable-buttons').insertRow();";
              echo  'newRow.innerHTML = "<tr> <td>" +SKUFromPHP[i]+ "</td> <td>" +itemNameFromPHP[i]+ "</td>  <td>" +lastRestockFromPHP[i]+"</td><td>" +itemCountFromPHP[i]+ "</td><td>" +warehouseNameFromPHP[i]+ "</td><td>" +TotalProcuredFromPHP[i]+ "</td></tr>";';
            echo '}'; //END IF 1

            echo 'if(compare == "All"){';
              echo 'window.location.reload();'; //Refreshes the page to return to Normal            
            echo '}'; //END IF 2        
          echo '}';//END FOR
        echo '}'; //End Function
        ?>

   
    </script>

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
      
    </script>
	
  </body>

</html>
