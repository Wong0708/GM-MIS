<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];
$_SESSION['branchID'] = $row['branchID'];


if(isset($_POST['edit'])){
    $_SESSION['editID'] = $_POST['id'];
    header("Location: http://".$_SERVER['HTTP_HOST'].
                dirname($_SERVER['PHP_SELF'])."/EditSelectOrder.php");
}

if(isset($_POST['fulfill'])){
    $_SESSION['editID'] = $_POST['id'];
    
    
    header("Location: http://".$_SERVER['HTTP_HOST'].
                dirname($_SERVER['PHP_SELF'])."/EditSelectOrder.php");
}

if(isset($_POST['cancel'])){
    $_SESSION['editID'] = $_POST['id'];
    header("Location: http://".$_SERVER['HTTP_HOST'].
                dirname($_SERVER['PHP_SELF'])."/EditSelectOrder.php");
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
                <h3>Edit Order</h3>
              </div>
            </div>

              <div class="col-md-12 col-sm-6 col-xs-12">

                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Edit Orders</a>
                        </li>
                        <li role="presentation" class=""><a href="#pending" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Receive/Cancel Orders</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                      <thead>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Client</th>
                                            <th>Order Date</th>
                                            <th>Delivery Date</th>
                                            <th>Total Payment</th>
                                            <th>Status</th>
                                            <th>Order Details</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php

                                            require_once('mysql_connect.php');
                                            $query = "SELECT * FROM orders";
                                            $result=mysqli_query($dbc,$query);

                                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                            {
                                                require_once('mysql_connect.php');
                                                    $queryClient = 'SELECT * FROM client WHERE clientID ='.$row['clientID'].';';
                                                    $resultClient = mysqli_query($dbc, $queryClient);
                                                    $rowClient = mysqli_fetch_array($resultClient,MYSQLI_ASSOC);
                                                    $client = $rowClient['clientName'];

                                                    $queryPayment = 'SELECT * FROM ref_payment WHERE paymentID ='.$row['paymentID'].';';
                                                    $resultPayment = mysqli_query($dbc, $queryPayment);
                                                    $rowPayment = mysqli_fetch_array($resultPayment,MYSQLI_ASSOC);
                                                    $payment = $rowPayment['paymentmethod'];

                                                    echo '<tr><form method="post" action=""><input type="hidden" name="id" value="'.$row['orderNumber'].'">';
                                                    echo '<td>';
                                                    echo $row['orderNumber'];
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $client;
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $row['orderDate'];
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $row['deliveryDate'];
                                                    echo '</td>';
                                                    echo '<td>P';
                                                    echo number_format($row['totalPayment'], 2);
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $row['orderstatus'];
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo '<button type="button" name ="view" class="btn btn-info" onclick="viewOrderDetails('.$row['orderNumber'].');" data-toggle="modal" data-target=".bs-example-modal-lg3">Order Details</button>';
                                                    if($row['orderstatus'] == "On-going")
                                                    {
                                                        echo '<button type="submit" name ="edit" class="btn btn-info">Edit</button>';
                                                    }
                                                    echo '</form></td>';
                                                    echo '</tr>';
                                            }

                                        ?>      
                                    </tbody>
                                  </table>

                                  </div>
                </div>
              </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="pending" aria-labelledby="profile-tab">
                            <div class="col-md-12 col-sm-8 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2>On-going Orders</h2>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content" id="tablePendingOrders">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                      <thead>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Client</th>
                                            <th>Order Date</th>
                                            <th>Delivery Date</th>
                                            <th>Comments</th>
                                            <th>Total Payment</th>
                                            <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php

                                            require_once('mysql_connect.php');
                                            $query = "SELECT * FROM orders WHERE orderstatus = 'On-going'";
                                            $result=mysqli_query($dbc,$query);

                                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                            {
                                                require_once('mysql_connect.php');
                                                    $queryClient = 'SELECT * FROM client WHERE clientID ='.$row['clientID'].';';
                                                    $resultClient = mysqli_query($dbc, $queryClient);
                                                    $rowClient = mysqli_fetch_array($resultClient,MYSQLI_ASSOC);
                                                    $client = $rowClient['clientName'];

                                                    $queryPayment = 'SELECT * FROM ref_payment WHERE paymentID ='.$row['paymentID'].';';
                                                    $resultPayment = mysqli_query($dbc, $queryPayment);
                                                    $rowPayment = mysqli_fetch_array($resultPayment,MYSQLI_ASSOC);
                                                    $payment = $rowPayment['paymentmethod'];

                                                    echo '<input type="hidden" name="id" value="'.$row['orderNumber'].'">';
                                                    echo '<td>';
                                                    echo $row['orderNumber'];
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $client;
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $row['orderDate'];
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $row['deliveryDate'];
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $row['comments'];
                                                    echo '</td>';
                                                    echo '<td>P';
                                                    echo number_format($row['totalPayment'], 2);
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo '<button type="button" name ="fulfill" class="btn btn-success" onclick="endOrder('.$row['orderNumber'].', 1);">Fulfill</button>';
                                                    echo '<button type="button" name ="cancel" class="btn btn-danger" onclick="endOrder('.$row['orderNumber'].', 0);">Cancel</button>';
                                                    echo '<button type="button" name ="view" class="btn btn-info" onclick="viewOrderDetails('.$row['orderNumber'].');" data-toggle="modal" data-target=".bs-example-modal-lg3">Order Details</button>';
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
                    </div>

                  </div>
                </div>
            </div>
              
              
              
              
            
              </div>  
          </div>
        <!-- /page content -->
<div class="modal fade bs-example-modal-lg3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Order Details</h4>
                </div>
                <div class="modal-body">
                    <div id="orderDetailsModal">
                        
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
        <!-- footer content -->
        <!-- /footer content -->
      </div>
    </div>
<script>
          function viewOrderDetails(orderDetailsIndex){
              
            $.ajax({
                type: 'POST',
                url: "ajax/viewOrderDetails.php",
                data:{
                    orderDetailsIndex: orderDetailsIndex,
                },
                success: function(result){
                    document.getElementById("orderDetailsModal").innerHTML = result;
                  //  alert(result);
            }});
          }
    
          function endOrder(orderNumberIndex, status){
              
            $.ajax({
                type: 'POST',
                url: "ajax/endOrder.php",
                data:{
                    orderNumberIndex: orderNumberIndex,
                    status: status,
                },
                success: function(result){
                    document.getElementById("tablePendingOrders").innerHTML = result;
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