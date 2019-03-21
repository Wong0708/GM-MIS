<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Inventory</title>

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

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
            <?php
                require_once("nav.php");    
            ?>
        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div>
                  <center><h1><img src="images/GM%20LOGO.png" width = "80px" height = "80px">GLOBEMASTER INVENTORY</h1><br>
              </div>
            </div>
            <br><br><br><br>

              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  
                    <div>
                        <form action="AddInventory.php" method="POST">
                          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> New Inventory Item</button>
                          <br><br>
                        </form>
                    </div>
					
                     <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>SKU</th>
                          <th>Item Name</th>                       
                          <th>Item Count</th>
                          <th>Supplier</th>
                          <th>Price</th>
                          <th>Warehouse Location</th>                         
                          <th>Last Update</th>
                          <th> Action </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            
                            require_once('DataFetchers/mysql_connect.php');
                            $query = "SELECT * FROM items_trading;";
                            $result=mysqli_query($dbc,$query);
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                            {
                                    $queryItemType = "SELECT itemtype FROM ref_itemtype WHERE itemtype_id =" . $row['itemtype_id'] . ";";
                                    $resultItemType = mysqli_query($dbc,$queryItemType);
                                    $rowItemType=mysqli_fetch_array($resultItemType,MYSQLI_ASSOC);
                                    $itemType = $rowItemType['itemtype'];
                                
                                    $queryWarehouse = "SELECT warehouse FROM warehouses WHERE warehouse_id =" . $row['warehouse_id'] . ";";
                                    $resultWarehouse = mysqli_query($dbc,$queryWarehouse);
                                    $rowWarehouse=mysqli_fetch_array($resultWarehouse,MYSQLI_ASSOC);
                                    $warehouse = $rowWarehouse['warehouse'];

                                    $querySupplierName = "SELECT supplier_name FROM suppliers WHERE supplier_id =" . $row['supplier_id'] . ";";
                                    $resultSupplierName = mysqli_query($dbc,$querySupplierName);
                                    $rowSupplierName=mysqli_fetch_array($resultSupplierName,MYSQLI_ASSOC);
                                    $supplierName = $rowSupplierName['supplier_name'];
                                    
                                
                                    echo '<tr>';
                                    echo '<td><b>';
                                    echo $row['sku_id'];
                                    echo '</td>';
                                    echo '<td><b>';
                                    echo $row['item_name'];
                                    echo '</td>';                                  
                                    echo '<td>';
                                    echo $row['item_count'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $supplierName;
                                    echo '</td>';
                                    echo '<td>';
                                    echo  'Php'." ".number_format($row['price'], 2);
                                    echo '</td>';
                                    echo '<td>';
                                    echo $warehouse;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['last_restock'];
                                    echo '</td>';
                                    echo '<td align = "center">';
                                    echo '<a href ="EditInventory.php?sku_id='.$row['sku_id'].' & item_id='.$row['item_id'].'"><i onclick = "teit()"class="fa fa-wrench" > </a>'; 
                                    // 
                                    echo '</td>';
                                    
                                    echo '</tr>';
                                    
                            }
                        ?>  
                      </tbody>
                    </table><br>
                  </div>
                </div>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
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
      
      
    <!-- Custom Fonts -->
    <style>
        
        @font-face {
        font-family: "Couture Bold";
        src: url("css/fonts/couture-bld.otf");
        }
        
        h1 {
            font-family: 'COUTURE Bold', Arial, sans-serif;
            font-weight:normal;
            font-style:normal;
            font-size: 50px;
            color: #1D2B51;
            }

    </style>    

  </body>
</html>