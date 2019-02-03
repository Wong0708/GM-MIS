<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];


if(isset($_POST['receive'])){
    require_once('mysql_connect.php');
    $query="UPDATE purchase_order SET p_orderstatus = 'Received' WHERE p_orderNumber = '{$_POST['orderNumber']}'";
    $result=mysqli_query($dbc,$query);
    
    $query = "SELECT * FROM purchase_order_details WHERE orderNumber = ".$_POST['orderNumber'];
    $result=mysqli_query($dbc,$query);

    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $queryUpdate="UPDATE inventory SET quantity = quantity + ".$row['qtyOrdered']." WHERE inventoryID = '{$row['inventoryID']}'";
        $resultUpdate=mysqli_query($dbc,$queryUpdate);
    }
}

if(isset($_POST['cancel'])){
    require_once('mysql_connect.php');
    $query="UPDATE purchase_order SET p_orderstatus = 'Cancelled' WHERE p_orderNumber = '{$_POST['orderNumber']}'";
    $result=mysqli_query($dbc,$query);
}
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sugarhouse</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
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

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Receive Purchase Orders</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
              
            <div class="col-md-12 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>On-going Purchase Orders</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>User</th>
                            <th>Supplier</th>
                            <th>Order Date</th>
                            <th>Delivery Date</th>
                            <th>Total Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                            require_once('mysql_connect.php');
                            $query = "SELECT * FROM purchase_order WHERE p_orderstatus = 'On-going'";
                            $result=mysqli_query($dbc,$query);

                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                            {       
                                    $queryUser = 'SELECT * FROM user WHERE userID ='.$row['userID'].';';
                                    $resultUser = mysqli_query($dbc, $queryUser);
                                    $rowUser = mysqli_fetch_array($resultUser,MYSQLI_ASSOC);
                                    $name = $rowUser['first_name'].' '.$rowUser['last_name'];
                                
                                    $querySupplier = 'SELECT * FROM supplier WHERE supplierID ='.$row['supplierID'].';';
                                    $resultSupplier = mysqli_query($dbc, $querySupplier);
                                    $rowSupplier = mysqli_fetch_array($resultSupplier,MYSQLI_ASSOC);
                                    $supplier = $rowSupplier['supplierName'];
                                    
                                    $orderNumber = $row['p_orderNumber'];
                                    $orderDate = $row['p_orderDate'];
                                    $deliveryDate = $row['deliveryDate'];
                                    $totalPayment = $row['p_totalPayment'];
                                    $status = $row['p_orderstatus'];
                                
                                    echo '<tr><form method="post" action=""><input type="hidden" name="orderNumber" value="'.$orderNumber.'">';
                                    echo '<td>';
                                    echo $orderNumber;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $name;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $supplier;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $orderDate;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $deliveryDate;
                                    echo '</td>';
                                    echo '<td>P';
                                    echo number_format($totalPayment, 2);
                                    echo '</td>';
                                    echo '<td>';
                                    echo $status;
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<button type="button" name ="view" class="btn btn-info" onclick="viewPurchaseOrderInventory('.$orderNumber.');" data-toggle="modal" data-target=".bs-example-modal-lg3">Order Details</button><button type="submit" name ="receive" class="btn btn-primary">Receive</button><button type="submit" name ="cancel" class="btn btn-danger">Cancel</button></form>';
                                    echo '</td>';
                                    echo '</tr>';
                                    
                            }

                        ?>      
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>  
              
            
              </div>  
          </div>
          
          <div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">View Ingredients</h4>
                </div>
                <div class="modal-body">
                    <div id="materialModal">
                        
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
          
          <div class="modal fade bs-example-modal-lg3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Order Details</h4>
                </div>
                <div class="modal-body">
                    <div id="purchaseOrderDetailsModal">
                        
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
        <!-- /page content -->

        <!-- footer content -->
       
        <!-- /footer content -->
      </div>
    </div>


    <script>
          function viewPurchaseOrderInventory(purchaseOrderIndex){
              
            $.ajax({
                type: 'POST',
                url: "ajax/viewPurchaseOrderInventory.php",
                data:{
                    purchaseOrderIndex: purchaseOrderIndex,
                },
                success: function(result){
                    document.getElementById("purchaseOrderDetailsModal").innerHTML = result;
                  //  alert(result);
            }});
          }
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
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
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
  </body>
</html>