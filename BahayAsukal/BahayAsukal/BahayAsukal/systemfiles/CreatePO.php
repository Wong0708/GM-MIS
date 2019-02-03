<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];
$_SESSION['userID'] = $row['userID'];

if(isset($_POST['add']))
{
    if(!isset($_SESSION['inventoryArray']) || count($_SESSION['inventoryArray']) == 0){
        echo '<script>alert("No inventory added");</script>';
    }
    else{
        require_once('mysql_connect.php');
        $query="SELECT mydb.nextPurchaseOrderID() AS 'p_orderNumber';";
        $result=mysqli_query($dbc,$query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $purchaseOrderID = $row['p_orderNumber'];
        
        $supplierID = $_POST['supplierID'];
        $orderDate = $_POST['deliveryDate'];
        $deliveryDate = $_POST['deliveryDate'];
        $totalPayment = $_POST['totalPayment'];
        $userID = $_SESSION['userID'];
        
        $query="INSERT INTO purchase_order(p_orderNumber, userID, supplierID, p_orderDate, p_orderstatus, deliveryDate, p_totalPayment)
                VALUES('$purchaseOrderID', '$userID', '$supplierID', '$orderDate', 'On-going', '$deliveryDate', '$totalPayment');";
        $result=mysqli_query($dbc,$query);

        $ctr = 0;
        if(isset($_SESSION['inventoryArray'])) {
            while ($ctr < count($_SESSION['inventoryArray'])) {
                $query="INSERT INTO purchase_order_details(orderNumber, inventoryID, qtyOrdered)
                        VALUES('$purchaseOrderID', ".$_SESSION['inventoryArray'][$ctr].",".$_SESSION['quantityArray'][$ctr].");";
                $result=mysqli_query($dbc, $query);

                $ctr++;
            }
        }
        unset($_SESSION['inventoryArray']);
        unset($_SESSION['quantityArray']);
    }
}


?>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sugarhouse </title>

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
        <!-- bootstrap-daterangepicker -->
        <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->
        <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

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
                                <h1 align="center">Create Purchase Order</h1>
                            </div>
                        </div>

                        <div class="clearfix"></div>


                        <div class="col-md-12 col-sm-6 col-xs-12">

                            <div class="x_content">
                                    <div id="myTabContent" class="tab-content">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2> Create Purchase Order </h2>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">
                                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal form-label-left">
                                                            <div class="form-group">
                                                                <label class="control-label col-md- col-sm-3 col-xs-12">Select Supplier</label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <select onchange="getSupplierInventory();" class="form-control" name="supplierID" id="supplierID">
                                                <?php

                                                    require_once('mysql_connect.php');
                                                    $query="SELECT supplierID, supplierName FROM supplier WHERE status = 'Active'";
                                                    $result=mysqli_query($dbc,$query);
                                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                    ?> <option value="<?php echo $row['supplierID']?>"><?php echo $row["supplierName"]; ?> </option> <?php
                                                    }
                                                    ?>     
                                                </select>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                <div id="inventory" style="display: none;">
                                                <div  class="form-group" >
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Inventory</label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div id="inventoryDropdown">
                                                                        <select id="inventoryID" class="form-control" name="inventoryID">
                                                                            <?php
                                                                            $query = "SELECT * FROM inventory WHERE supplierID = '1'";
                                                                            $result=mysqli_query($dbc,$query);

                                                                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                                                $dropdown = $dropdown.'<option value="'.$row['inventoryID'].'">'.$row['inventoryName'].'</option>';
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Quantity <span class="required">*</span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="quantity" name="quantity" required="required" class="form-control col-md-7 col-xs-12">
                                                                </div>                                                                                                            <button type="button" class="btn btn-primary" align="center" onclick="addInventory();">Add</button>

                                                            </div>
                                                </div>
<br>
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
                        <div id="inventoryTable">
                            <?php
                            if(isset($_SESSION['inventoryArray']) AND isset($_SESSION['quantityArray'])){
                                $table ='
                                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                                  <thead>
                                    <tr>
                                        <th>Inventory Name</th>
                                        <th>Unit Amount</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total Amount</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>';
                                $totalPayment = 0;
                                $ctr = 0;
                                if(isset($_SESSION['inventoryArray'])) {
                                    while ($ctr < count($_SESSION['inventoryArray'])) {
                                        $queryInventory = 'SELECT * FROM inventory WHERE inventoryID ='.$_SESSION['inventoryArray'][$ctr].';';
                                        $resultInventory = mysqli_query($dbc, $queryInventory);
                                        $rowInventory = mysqli_fetch_array($resultInventory,MYSQLI_ASSOC);
                                        $materialID = $rowInventory['materialID'];
                                        $inventoryName = $rowInventory['inventoryName'];
                                        $inventoryPrice = $rowInventory['price'];
                                        $measurementAmountPerStock = $rowInventory['measurementAmountPerStock'];

                                        $queryMaterial = 'SELECT materialName, uom FROM raw_material WHERE materialID ='.$materialID.';';
                                        $resultMaterial = mysqli_query($dbc, $queryMaterial);
                                        $rowMaterial = mysqli_fetch_array($resultMaterial,MYSQLI_ASSOC);
                                        $materialName = $rowMaterial['materialName'];
                                        $uom = $rowMaterial['uom'];




                                        $table = $table.'<tr>';
                                        $table = $table.'<td>'.$inventoryName.'</td>
                                                         <td>'.$measurementAmountPerStock.$uom.'</td>
                                                         <td>P'.number_format($inventoryPrice, 2).'</td>
                                                         <td>'.$_SESSION['quantityArray'][$ctr].'</td>
                                                         <td>'.$_SESSION['quantityArray'][$ctr]*$measurementAmountPerStock.$uom.'</td>
                                                         <td>P'.number_format($_SESSION['quantityArray'][$ctr]*$inventoryPrice, 2).'</td>
                                                         <td><button type="button" onclick="removeInventoryFromPO('.$ctr.');" class="btn btn-danger">Delete</button></td>';
                                        $table = $table.'</tr>';
                                        $totalPayment = $totalPayment + $_SESSION['quantityArray'][$ctr]*$inventoryPrice;
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
                                        <th>Inventory Name</th>
                                        <th>Unit Amount</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total Amount</th>
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
                                                        <div class="row">  
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3" for="first-name">Delivery Date</label>
                                                                    <div class='input-group date' id='myDatepicker3'>
                                                                        <input type='text' class="form-control" name="deliveryDate" />
                                                                        <span class="input-group-addon">
                                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                        </div><br><br>
                                                            <div class="form-group">
                                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                                    <button type="submit" class="btn btn-primary" align="center" name="add">Create Purchase Order</button>
                                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                                </div>
                                                            </div>



                                                        </form>
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

            
            <!-- /footer content -->
        </div>


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
        <!-- bootstrap-daterangepicker -->
        <script src="../vendors/moment/min/moment.min.js"></script>
        <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script>
          function getSupplierInventory(){
            document.getElementById("inventory").style.display = "inline";

            var supplierID = document.getElementById("supplierID").valueOf().value;
              
            $.ajax({
                type: 'POST',
                url: "ajax/getSupplierInventory.php",
                data:{
                    supplierID: supplierID
                },
                success: function(result){
                    document.getElementById("inventoryDropdown").innerHTML = result;
                    // alert(result);
                    updatePOTable();
            }});
          }
          function addInventory(){
            var inventory = document.getElementById("inventoryID").valueOf().value;
            var quantity = document.getElementById("quantity").valueOf().value;

            $.ajax({
                type: 'POST',
                url: "ajax/addInventoryToPO.php",
                data:{
                    inventory: inventory,
                    quantity: quantity
                },
                success: function(result){
                    document.getElementById("inventoryTable").innerHTML = result;
                    //alert(result);
            }});
          }
          function removeInventoryFromPO(inventoryIndex){

              $.ajax({
                  type: 'POST',
                  url: "ajax/removeInventoryFromPO.php",
                  data:{
                      inventoryIndex: inventoryIndex
                  },
                  success: function(result){
                      document.getElementById("inventoryTable").innerHTML = result;
              }
              })
          }
          function updatePOTable(){

              $.ajax({
                  type: 'POST',
                  url: "ajax/updatePOTable.php",
                  data:{
                  },
                  success: function(result){
                      document.getElementById("inventoryTable").innerHTML = result;
              }
              })
          }
      </script>

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
        <!-- bootstrap-datetimepicker -->
        <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

        <script>
            
            $('#supplierID').trigger("onchange");
            
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
