<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];
$orderNumber = $_SESSION['editID'];     

$query = "SELECT * FROM orders WHERE orderNumber = '{$_SESSION['editID']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$clientID = $row['clientID'];
$deliveryDate = $row['deliveryDate'];
$orderDate = $row['orderDate'];
$comments = $row['comments'];
$paymentID = $row['paymentID'];

$queryPayment = 'SELECT * FROM ref_payment WHERE paymentID ='.$row['paymentID'].';';
$resultPayment = mysqli_query($dbc, $queryPayment);
$rowPayment = mysqli_fetch_array($resultPayment,MYSQLI_ASSOC);
$payment = $rowPayment['paymentmethod'];

$queryClient = 'SELECT * FROM client WHERE clientID ='.$clientID.';';
$resultClient = mysqli_query($dbc, $queryClient);
$rowClient = mysqli_fetch_array($resultClient,MYSQLI_ASSOC);
$client = $rowClient['clientName'];

if(isset($_POST['save']))
{
    $deliveryDate = $_POST['deliveryDate'];
    $comments = $_POST['comments'];
    $paymentID = $_POST['paymentID'];   
    $branchID = $_POST['branchID'];
    $paymentTotal = $_SESSION['paymentTotal'];
    
    require_once('mysql_connect.php');
    $query="UPDATE orders SET deliveryDate = '{$deliveryDate}' WHERE orderNumber = '{$orderNumber}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE orders SET comments = '{$comments}' WHERE orderNumber = '{$orderNumber}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE orders SET paymentID = '{$paymentID}' WHERE orderNumber = '{$orderNumber}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE orders SET totalPayment = '{$_POST['totalPayment']}' WHERE orderNumber = '{$orderNumber}'";
    $result=mysqli_query($dbc,$query);
    
    $query="DELETE FROM order_details WHERE orderNumber = ".$orderNumber;
    $result=mysqli_query($dbc,$query);
    
    
    $ctr = 0;
    if(isset($_SESSION['productArray'])) {
        while ($ctr < count($_SESSION['productArray'])) {
            $query="INSERT INTO order_details(orderNumber, productID, branchID, qtyOrdered, productionDate)
                    VALUES('$orderNumber', ".$_SESSION['productArray'][$ctr].",'$branchID',".$_SESSION['quantityArray'][$ctr].", NOW());";
            $result=mysqli_query($dbc, $query);

            $ctr++;
        }
    }
    unset($_SESSION['productArray']);
    unset($_SESSION['quantityArray']);
    
    header("Location: http://".$_SERVER['HTTP_HOST'].
                dirname($_SERVER['PHP_SELF'])."/EditOrders.php");
}

if(isset($_SESSION['productArray']))
    unset($_SESSION['productArray']);

if(isset($_SESSION['quantityArray']))
    unset($_SESSION['quantityArray']);

if(!isset($_SESSION['productArray'])){
    $_SESSION['productArray'] = array();
}

if(!isset($_SESSION['quantityArray'])){
    $_SESSION['quantityArray'] = array();
}

require_once('mysql_connect.php');
$query = "SELECT * FROM order_details WHERE orderNumber = ".$orderNumber.";";
$result=mysqli_query($dbc,$query);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    array_push($_SESSION['productArray'], $row['productID']);
    array_push($_SESSION['quantityArray'], $row['qtyOrdered']);
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
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Order : <?php echo $orderNumber; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                                                        <form class="form-horizontal form-label-left" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                                            <div class="form-group">
                                                                <h2>Client: <?php echo $client;?></h2>
                                                                <br>
                                                                <h2>Order date: <?php echo $orderDate;?></h2>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Branch</label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <select class="form-control col-md-7 col-xs-12" id="branch" name="branchID">
                                                                <?php

                                                                    require_once('mysql_connect.php');
                                                                    $query="SELECT branchID, branchName FROM branch";
                                                                    $result=mysqli_query($dbc,$query);
                                                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                                    ?> <option value="<?php echo $row['branchID']?>"><?php echo $row["branchName"]; ?> </option> <?php
                                                                    }
                                                                 ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Product</label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <select class="form-control col-md-7 col-xs-12" id="productID">
                                                                <?php

                                                                    require_once('mysql_connect.php');
                                                                    $query="SELECT productID, productName FROM product";
                                                                    $result=mysqli_query($dbc,$query);
                                                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                                    ?> <option value="<?php echo $row['productID']?>"><?php echo $row["productName"]; ?> </option> <?php
                                                                    }
                                                                 ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Quantity <span class="required">*</span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="quantity" name="quantity" class="form-control col-md-7 col-xs-12" onkeyup="checkEnoughQuantity();">
                                                                </div>
                                                                <button type="button" class="btn btn-primary" align="center" onclick="addProductToOrder();">Add to Order</button>
                                                            </div>

                                                            <!--div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Product</label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <select class="form-control col-md-7 col-xs-12">
                                                                <option>Choose option</option>
                                                                <option>Option one</option>
                                                                <option>Option two</option>
                                                                <option>Option three</option>
                                                                <option>Option four</option>
                                                                </select>
                                                                </div>
                                                            </div-->

                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="x_panel">
                                                                    <div class="x_title">
                                                                        <h2>Orders</h2>
                                                                        
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div class="x_content">
                        <div id="productTable">
                            <?php
                            if(isset($_SESSION['productArray']) AND isset($_SESSION['quantityArray'])){
                                $table ='
                                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                                  <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>';
                                $totalPayment = 0;
                                $ctr = 0;
                                if(isset($_SESSION['productArray'])) {
                                    while ($ctr < count($_SESSION['productArray'])) {
                                        $queryProduct = 'SELECT * FROM product WHERE productID ='.$_SESSION['productArray'][$ctr].';';
                                        $resultProduct = mysqli_query($dbc, $queryProduct);
                                        $rowProduct = mysqli_fetch_array($resultProduct,MYSQLI_ASSOC);
                                        $productName = $rowProduct['productName'];
                                        $price = $rowProduct['productCost'];

                                        $table = $table.'<tr>';
                                        $table = $table.'<td>'.$productName.'</td>
                                                         <td>P'.number_format($price, 2).'</td>
                                                         <td>'.$_SESSION['quantityArray'][$ctr].'</td>
                                                         <td>'.number_format($_SESSION['quantityArray'][$ctr]*$price, 2).'</td>
                                                         <td><button type="button" onclick="removeProductFromOrder('.$ctr.');" class="btn btn-danger">Delete</button></td>';
                                        $table = $table.'</tr>';
                                        $totalPayment = $totalPayment + $_SESSION['quantityArray'][$ctr]*$price;
                                        $ctr++;
                                    }
                                }
                                $table = $table.'
                                  </tbody>
                                </table>
                                <input type="hidden" name="totalPayment" value="'.$totalPayment.'"><h4>Total Payment: P'.number_format($totalPayment, 2).'</h4>
                                ';
                                echo $table;
                            }
                            else{
                                echo '
                                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                                  <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                        <td></td><td></td><td></td><td></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <input type="hidden" name="totalPayment" value="0"><h4>Total Payment: 0</h4>
                                ';
                            }
                            ?>
                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Amount</label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div-->

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                <label class="control-label col-md-4" for="first-name">Delivery Date</label>
                                                                <div class='input-group date' id='myDatepicker3'>
                                                                    <input type='text' class="form-control" name="deliveryDate" value="<?php echo $deliveryDate; ?>" />
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                        </div>
                                                                </div>
                                                                </div>    
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                <label class="control-label col-md-4" for="first-name">Comments : </label>
                                                                <div class='input-group col-md-8'>
                                                                    <input type='text' class="form-control" name="comments" value="<?php echo $comments; ?>" />
                                                                </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                <label class="control-label col-md-4">Payment Type : </label>
                                                                <div class='input-group col-md-8'>
                                                                    <select class="form-control" name="paymentID">
                                                                    <?php
                                                                        require_once('mysql_connect.php');
                                                                        $query="SELECT paymentID, paymentMethod FROM ref_payment";
                                                                        $result=mysqli_query($dbc,$query);
                                                                        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                                        ?> <option value="<?php echo $row['paymentID']?>"><?php echo $row["paymentMethod"]; ?> </option> <?php
                                                                        }
                                                                     ?>
                                                                    </select>
                                                                </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                                    <button type="submit" class="btn btn-primary" align="center" name="save">Update Order</button>
                                                                    <a href="EditOrders.php"><button type="button" class="btn btn-danger">Cancel Update</button></a>
                                                                </div>
                                                            </div>



                                                        </form>
                                                    </div>
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
          function addProductToOrder(){
                var product = document.getElementById("productID").valueOf().value;
                var quantity = document.getElementById("quantity").valueOf().value;

                $.ajax({
                    type: 'POST',
                    url: "ajax/addProductToOrder.php",
                    data:{
                        product: product,
                        quantity: quantity
                    },
                    success: function(result){
                        document.getElementById("productTable").innerHTML = result;
                        //alert(result);
                    }
                });
          }
          function removeProductFromOrder(productIndex){

              $.ajax({
                  type: 'POST',
                  url: "ajax/removeProductFromOrder.php",
                  data:{
                      productIndex: productIndex
                  },
                  success: function(result){
                      document.getElementById("productTable").innerHTML = result;
              }
              })
          }
          
          function checkEnoughQuantity(){
                var quantity = document.getElementById("quantity").value;
                var productID = document.getElementById("productID").value;
                
                $.ajax({
                    type: 'POST',
                    url: "ajax/checkEnoughQuantity.php",
                    data:{
                        productID: productID,
                        quantity: quantity
                    },
                    success: function(result){
                        document.getElementById("quantityAlert").innerHTML = result;
                        if(result == ""){
                            document.getElementById("addProductButton").disabled = false;
                        }
                        else{
                            document.getElementById("addProductButton").disabled = true;
                        }
                    }
                });
                
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
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
      
      
            <script>
            $('#myDatepicker').datetimepicker();

            $('#myDatepicker2').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('#myDatepicker3').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('#myDatepicker4').datetimepicker({
                ignoreReadonly: true,
                allowInputToggle: true
            });

            $('#datetimepicker6').datetimepicker();

            $('#datetimepicker7').datetimepicker({
                useCurrent: false
            });

            $("#datetimepicker6").on("dp.change", function(e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });

            $("#datetimepicker7").on("dp.change", function(e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });

        </script>
  </body>
</html>