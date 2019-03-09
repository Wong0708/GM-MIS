<?php

if(isset($_POST['add']))
{
   if(!isset($_SESSION['itemArray']) || count($_SESSION['itemArray']) == 0){
        echo '<script>alert("No product added");</script>';
    }
    else{
        require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
        $query="SELECT COUNT(*) from orders AS 'numorders';";
        $result=mysqli_query($dbc,$query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $ordernumber = $row['numorders'] + 1;
        
        $clientID = $_POST['clientID'];
        $orderDate = $_POST['orderDate'];
        $expectedDelivery = $_POST['expectedDelivery'];
        $paymentID = $_POST['payment'];
        
        
        $query="INSERT INTO orders(orderNumber, clientID, paymentID, orderDate, comments, totalPayment, orderstatus)
                VALUES('$orderID', '$clientID', '$paymentID', '$orderDate', '$comments', '$totalPayment', 'Pending');";
        $result=mysqli_query($dbc,$query);

        $ctr = 0;
        if(isset($_SESSION['itemArray'])) {
            while ($ctr < count($_SESSION['itemArray'])) {
                $query="INSERT INTO order_details(orderNumber, productID, branchID, qtyOrdered)
                        VALUES('$orderID', ".$_SESSION['itemArray'][$ctr].",'$branchID',".$_SESSION['quantityArray'][$ctr].");";
                $result=mysqli_query($dbc, $query);

                $ctr++;
            }
        }
        unset($_SESSION['itemArray']);
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
                                <h3>Create Order</h3>
                            </div>
                        </div>

                        <div class="clearfix"></div>


                        <div class="col-md-12 col-sm-6 col-xs-12">

                            <div class="x_content">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2> Create Order </h2>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">
                                                        <form class="form-horizontal form-label-left" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Client</label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <select onchange="updateOrdersTable();" class="form-control col-md-7 col-xs-12" id="clients" name="clientID">
                                                                <?php

                                                                    require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
                                                                    $query="SELECT client_id, client_name FROM clients";
                                                                    $result=mysqli_query($dbc,$query);
                                                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                                    ?> <option value="<?php echo $row['client_id']?>"><?php echo $row["client_name"]; ?> </option> <?php
                                                                    }
                                                                 ?>
                                                                </select>
                                                                </div>
                                                                <button type="button" class="btn btn-primary" align="center" data-toggle="modal" data-target=".bs-example-modal-lg4">Add New Client</button>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group">
                                                                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                                                                      <thead>
                                                                        <tr>
                                                                          <th>Item Name</th>
                                                                          <th>Item Type</th>
                                                                          <th>Supplier</th>
                                                                          <th>Price</th>
                                                                          
                                                                          <th></th>
                                                                          <th class="col-md-1 col-sm-12 col-xs-12">Quantity</th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        <?php

                                                                            require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
                                                                            $query = "SELECT * FROM items_trading;";
                                                                            $result1=mysqli_query($dbc,$query);

                                                                           
                                                                            while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC) )
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
                                                                                        echo '<td id = ',$row['item_id'],' >';
                                                                                        echo $row['item_name'];
                                                                                        echo '</td>';
                                                                                        echo '<td>';
                                                                                        echo $itemType;
                                                                                        echo '</td>';
                                                                                        echo '<td>';
                                                                                        echo $supplierName;
                                                                                        echo '</td>';
                                                                                        echo '<td>';
                                                                                        echo  'Php'." ".number_format($row['price'], 2);
                                                                                        echo '</td>';
                                                                                        
                                                                                        echo '<td>';
                                                                                        echo '<button class="btn btn-success" type="button" onclick="addProductToOrder name ="add" value ="',$row['item_id'],'" > + </button>';
                                                                                        echo '</td>';
                                                                                        
                                                                                        echo '<td>';
                                                                                        echo '<input type="number" id="quantity" name="quantity',$row['item_id'],'"  required= "required" class="form-control col-md-5 col-xs-12" onkeyup="checkEnoughQuantity();" value="0"></input>';
                                                                                        echo '</td>';
                                                                                    echo '</tr>';                                                                                  
                                                                            }
                                                                        ?>  
                                                                      </tbody>
                                                                    </table>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <label class="red" id="quantityAlert"></label>
                                                                </div>
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
                                                                        <h2>Order Cart</h2>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div class="x_content">
                        <div id="productTable">
                            <?php
                            if(isset($_SESSION['itemArray']) AND isset($_SESSION['quantityArray'])){
                                $table ='
                                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                                  <thead>
                                    <tr>
                                         <th>Item Name</th>
                                         <th>Item Type</th>
                                         <th>Price</th>
                                         <th>Quantity</th>
                                         <th>Action</th>
                                    </tr>   
                                  </thead>
                                  <tbody>';
                                $totalPayment = 0;
                                $ctr = 0;
                                if(isset($_SESSION['itemArray'])) {
                                    while ($ctr < count($_SESSION['itemArray'])) {
                                        $queryProduct = 'SELECT * FROM items_trading WHERE item_id ='.$_SESSION['itemArray'][$ctr].';';
                                        $resultProduct = mysqli_query($dbc, $queryProduct);
                                        $rowProduct = mysqli_fetch_array($resultProduct,MYSQLI_ASSOC);
                                        $productName = $rowProduct['item_name'];
                                        $price = $rowProduct['price'];
                                        
                                        $queryItemType = "SELECT itemtype FROM ref_itemtype WHERE itemtype_id =" . $row['itemtype_id'] . ";";
                                        $resultItemType = mysqli_query($dbc,$queryItemType);
                                        $rowItemType=mysqli_fetch_array($resultItemType,MYSQLI_ASSOC);
                                        $itemType = $rowItemType['itemtype'];
                                     

                                        $table = $table.'<tr>';
                                        $table = $table.'<td>'.$productName.'</td>
                                                         <td>'.$itemType.'</td>
                                                         <td>'.$_SESSION['quantityArray'][$ctr].'</td>
                                                         <td>'.$_SESSION['quantityArray'][$ctr]*$price.'</td>;
                                                         
                                                         <td><button type="button" onclick="removeProductFromOrder('.$ctr.');" class="btn btn-danger">Delete</button></td>';
                                        $table = $table.'</tr>';
                                        $totalPayment = $totalPayment + $_SESSION['quantityArray'][$ctr]*$price;
                                        $ctr++;
                                    }
                                }

                                $table = $table.'
                                  </tbody>
                                </table>
                                <input type="hidden" name="totalPayment" value="'.$totalPayment.'"><h4>Total Payment: Php'.$totalPayment.'</h4>
                                ';
                                echo $table;
                            }
                            else{
                                echo '
                                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                                  <thead>
                                    <tr>
                                        <th>Item Name</th>
                                         <th>Item Type</th>
                                         <th>Price</th>
                                         <th>Quantity</th>
                                         <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td>
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
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Type</label>
                                                                <div class='input-group col-md-14'>
                                                                    <select class="form-control col-md-7 col-xs-12" name="paymentID">
                                                                    <?php
                                                                        require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
                                                                        $query="SELECT * FROM ref_payment";
                                                                        $result=mysqli_query($dbc,$query);
                                                                        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                                        ?> <option value="<?php echo $row['payment_id']?>"><?php echo $row["paymenttype"]; ?> </option> <?php
                                                                        }
                                                                     ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                                    <button type="submit" class="btn btn-primary" align="center" name="add">Create Order Form</button>
                                                                    <button type="Reset" class="btn btn-danger" onclick="updateOrdersTable();">Reset</button>
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

           <div class="modal fade bs-example-modal-lg4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">New Client</h4>
                </div>
                <div class="modal-body">
                    <form data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="clientName" required="required" class="form-control col-md-7 col-xs-12" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Client Type</label>
                                            <div class="col-md-4 col-sm-3 col-xs-12">
                                                <select class="form-control" name="clientType" id="clientType">
                                                <?php

                                                    require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
                                                    $query="SELECT clientTypeID, clientType FROM ref_clienttype";
                                                    $result=mysqli_query($dbc,$query);
                                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                    ?> <option value="<?php echo $row['clientTypeID']?>"><?php echo $row["clientType"]; ?> </option> <?php
                                                    }
                                                    ?>     
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email Address<span class="required">*</span>
                        </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="emailAddress" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mobile Number <span class="required">*</span>
                        </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="mobileNo" name="mobileNo" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telephone Number <span class="required">*</span>
                        </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="telephoneNo" name="telephoneNo" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button class="btn btn-primary" type="reset">Reset</button>
                                                <button type="button" class="btn btn-primary" name="add" onclick="addNewClient();" data-dismiss="modal">Add Client</button>
                                            </div>
                                        </div>

                                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
            <!-- /page content -->
        </div>


        <script>
            function addNewClient(){
                var clientTypeID = document.getElementById("clientType").valueOf().value;
                var clientName = document.getElementById("clientName").valueOf().value;
                var emailAddress = document.getElementById("emailAddress").valueOf().value;
                var mobileNo = document.getElementById("mobileNo").valueOf().value;
                var telephoneNo = document.getElementById("telephoneNo").valueOf().value;

                $.ajax({
                    type: 'POST',
                    url: "ajax/addNewClient.php",
                    data:{
                        clientTypeID: clientTypeID,
                        clientName: clientName,
                        emailAddress: emailAddress,
                        mobileNo: mobileNo,
                        telephoneNo: telephoneNo
                    },
                    success: function(result){
                        document.getElementById("clients").innerHTML = result;
                       // alert(result);
                    }
                });
            }
            function addProductToOrder(){
                var product = document.getElementById("20").valueOf().value;
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
                      console.log(result);
              }
              })
          }
          function updateOrdersTable(){

              $.ajax({
                  type: 'POST',
                  url: "ajax/updateOrdersTable.php",
                  data:{
                  },
                  success: function(result){
                      document.getElementById("productTable").innerHTML = result;
              }
              })
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
        <!-- bootstrap-daterangepicker -->
        <script src="../vendors/moment/min/moment.min.js"></script>
        <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


        
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
        <!-- bootstrap-datetimepicker -->
        <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

        <script>
            $('#myDatepicker').datetimepicker();

            $('#myDatepicker2').datetimepicker({
                format: 'YYYY-MM-DD HH:MM:SS'
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
    </body>

    </html>
