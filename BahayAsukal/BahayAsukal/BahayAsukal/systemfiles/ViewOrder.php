<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];

if(isset($_POST['activate'])){
    $id = $_POST['id'];
    $query = "UPDATE user SET user_status = 'Active' WHERE userID = '{$id}'";
    $result=mysqli_query($dbc,$query);
}

if(isset($_GET['userID']))


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
              <div class="title_left">
                <h1>View Orders</h1>
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

              
            <div class="col-md-12 col-sm-6 col-xs-12">

                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">All Orders</a>
                        </li>
                        <li role="presentation" class=""><a href="#pending" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pending Orders</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="ordersTable">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Client</th>
                            <th>Branch</th>
                            <th>Order Date</th>
                            <th>Delivery Date</th>
                            <th>Total Payment</th>
                            <th>Status</th>
                            <th>Order Details</th>
                            <th>Comments: </th>
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

                                    $queryBranch = 'SELECT branchID FROM order_details WHERE orderNumber ='.$row['orderNumber'].';';
                                    $resultBranch = mysqli_query($dbc, $queryBranch);
                                    $rowBranch = mysqli_fetch_array($resultBranch,MYSQLI_ASSOC);
                                    $branchID = $rowBranch['branchID'];
                                
                                    $queryBranchname = 'SELECT branchName FROM branch WHERE branchID ='.$branchID.';';
                                    $resultBranchname = mysqli_query($dbc, $queryBranchname);
                                    $rowBranchname = mysqli_fetch_array($resultBranchname,MYSQLI_ASSOC);
                                    $branchName = $rowBranchname['branchName'];
                                
                                
                                    echo '<tr>';
                                    echo '<td>';
                                    echo $row['orderNumber'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $client;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $branchName;
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
                                    echo '<button type="submit" name ="view" class="btn btn-info" onclick="viewOrderDetails('.$row['orderNumber'].');" data-toggle="modal" data-target=".bs-example-modal-lg3">View Order Details</button>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['comments'];
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
                        <div role="tabpanel" class="tab-pane fade" id="pending" aria-labelledby="profile-tab">
                            <div class="col-md-12 col-sm-8 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2>Pending Orders</h2>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content" id="tablePendingOrders">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                      <thead>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Client</th>
                                            <th>Order Date</th>
                                            <th>Comments</th>
                                            <th>Total Payment</th>
                                            <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php

                                            require_once('mysql_connect.php');
                                            $query = "SELECT * FROM orders WHERE orderstatus = 'Pending'";
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

                                                    echo '<tr>';
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
                                                    echo $row['comments'];
                                                    echo '</td>';
                                                    echo '<td>P';
                                                    echo number_format($row['totalPayment'],2);
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo '<button type="submit" name ="view" class="btn btn-info" onclick="setHidden('.$row['orderNumber'].');" data-toggle="modal" data-target=".bs-example-modal-lg4">Set Delivery Date</button>';
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
        
        <div class="modal fade bs-example-modal-lg4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Set Delivery Date</h4>
                </div>
                <div class="modal-body">
                    <div id="setDateDeliveryModel">
                        <div class="form-group">
                            <div class='input-group date col-md-12' id='myDatepicker3'>
                                <input type='date' class="form-control" id="deliveryDate" />
                                <input type='hidden' class="form-control" id="orderNumberForSetDate" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" 
                          onclick="var date = document.getElementById('deliveryDate').valueOf().value;
                                   var orderID = document.getElementById('orderNumberForSetDate').valueOf().value;
                                   setDeliveryDate(orderID, date);">
                      Set</button>
                </div>

              </div>
            </div>
          </div>
        
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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
          function setDeliveryDate(orderNumberIndex, deliveryDate){
            $.ajax({
                type: 'POST',
                url: "ajax/setDeliveryDate.php",
                data:{
                    orderNumberIndex: orderNumberIndex,
                    deliveryDate: deliveryDate,
                },
                success: function(result){
                    document.getElementById("tablePendingOrders").innerHTML = result;
                    alert(result);
            }});
          }
          function setHidden(orderNumber){
                document.getElementById('orderNumberForSetDate').value = orderNumber;
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
