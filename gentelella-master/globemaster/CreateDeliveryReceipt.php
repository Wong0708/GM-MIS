<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>GM MIS | Create Delivery Receipt</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
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
            <!-- /sidebar menu -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <!-- top tiles -->
                    
                    

                    <!-- /top tiles -->
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                 
                    <h1><b>Create Delivery Receipt: </b> [ DR - 
                    <?php 
                    require_once('DataFetchers/mysql_connect.php');

                        $query = "SELECT count(delivery_Receipt) as Count FROM mydb.scheduledelivery;";
                        $resultofQuery = mysqli_query($dbc, $query);
                        while($rowofResult=mysqli_fetch_array($resultofQuery,MYSQLI_ASSOC))
                        {
                            echo $rowofResult['Count'] + 1;
                        };


                  ?> <!-- PHP END -->
                     ]
                   
                     </h1>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br>

                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-center"  method = "POST">
                    <div class="form-group" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Order Number: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="orderNumberDropdown" class="form-control col-md-12 col-md-7 col-xs-12" required="" name = "selectItemtype" style=" width:250px";>
                            <option value="">Choose..</option>
                                <?php
                                    require_once('DataFetchers/mysql_connect.php');

                                    $sql1 = "SELECT * FROM order_details 
                                    where item_status = 'Deliver' 
                                    group by ordernumber 
                                    order by orderdetailID";
                                    $result1=mysqli_query($dbc,$sql1);
                                    while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
                                    { 
                                        echo'<option value="';
                                        echo $row1['ordernumber'];
                                        echo'">';
                                        echo $row1['ordernumber'];
                                        echo'</option>';
                                    } 
                                                                   
                                ?> <!-- PHP END [ Getting the OR Number from DB ]-->                                                   
                        </select>
                        </div>
                      </div> <!-- END Div of TAble -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Expected Date: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style=" width:250px"; id="expectedDate" name = "expectedDate" class="date-picker form-control col-md-7 col-xs-12" type="text" readonly="readonly" required>
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Delivery Date:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="deliveryDate"  type="date"  style=" width:250px"id="deliveryDate" name="deliveryDate"  min="<?php echo date("Y-m-d", strtotime("+1days")); ?>" required/>
                            <style>
                                    .deliveryDate {
                                        -moz-appearance:textfield;
                                    }
                                    
                                    .deliveryDate::-webkit-outer-spin-button,
                                    .deliveryDate::-webkit-inner-spin-button {
                                        -webkit-appearance: none;
                                        margin: 0;
                                    }
                            </style> <!-- To Remove the Up/Down Arrows from Date Selection -->
                        </div>
                      </div>

                      <div class="form-group" >
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Customer Name: </label>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                          <input style=" width:250px"; id="customerName" name = "customerName" class="form-control col-md-7 col-xs-12" type="text" readonly="readonly" >                               
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Client Location: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style=" width:250px"; id="locationFromClient" name = "locationFromClient" class="date-picker form-control col-md-7 col-xs-12" type="text" readonly="readonly">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Truck: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style=" width:250px"; id="truckPlate" name = "truckPlate" class="date-picker form-control col-md-7 col-xs-12" type="text" readonly="readonly">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Driver: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style=" width:250px"; id="driverName" name = "driverName" class="date-picker form-control col-md-7 col-xs-12" type="text" readonly="readonly">
                        </div>
                      </div>

                         <div class="row" >
                            <div class="col-md-8 col-sm-9 col-xs-6"  >
                                <table  id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 263px;">Product</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Pieces</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Price per piece</th>
                                            
                                            </tr>
                                    </thead>


                                    <tbody>
                                    <tr role='row' class='odd'>
                                            <!-- <td id="itemNameRow" ></td>
                                            <td id="itemQuantityRow" ></td>
                                            <td id="itemPriceRow" ></td>                                                                                                       -->
                                    </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Price: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style=" width:250px"; id="totalfromOrders" class="date-picker form-control col-md-7 col-xs-12" type="text" readonly="readonly">
                        </div>
                      </div>                           

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="left">
                          <button class="btn btn-danger" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name = "submitDeliveryReceipt" class="btn btn-success" >Submit</button>

                           <?php
                            if(isset($_POST['submitDeliveryReceipt']))
                                {
                                        require_once('DataFetchers/mysql_connect.php');

                                        $deliveryReceipt;
                                        $dateFromHTML = $_POST['deliveryDate'];
                                        $driverFromHTML = $_POST['driverName'];
                                        $truckPlateFromHTML = $_POST['truckPlate'];
                                        $customerNameFromHTML = $_POST['customerName'];
                                        $destinationFromHTML = $_POST['locationFromClient'];
                                        $SelectOrderNumber = $_POST['selectItemtype'];

                                        $query = "SELECT count(delivery_Receipt) as Count FROM mydb.scheduledelivery;";
                                        $resultofQuery = mysqli_query($dbc, $query);
                                        while($rowofResult=mysqli_fetch_array($resultofQuery,MYSQLI_ASSOC))
                                        {
                                            $deliveryReceipt = "DR - ".($rowofResult['Count'] + 1); //Get The Delivery Receipt
                                        };

                                        $queryItemID = "SELECT count(SchedID)+1 as Count FROM mydb.scheduledelivery; ";
                                        $resultItemID = mysqli_query($dbc,$queryItemID);
                                        $rowResultItemID = mysqli_fetch_assoc($resultItemID);
                                        $SchedID = $rowResultItemID['Count']; // Get SchedID and Add 1 for DR - 



                                        $orderNumArray = array();
                                        $queryOrderDetails = "SELECT * FROM mydb.orders
                                        join order_details ON orders.ordernumber = order_details.ordernumber 
                                        WHERE item_status = 'Deliver'
                                        group By orders.ordernumber";
                                        $resultOrderDetails = mysqli_query($dbc,$queryOrderDetails);
                                        while($rowResult = mysqli_fetch_array($resultOrderDetails))
                                        {
                                            $orderNumArray[] = $rowResult['ordernumber'];
                                        };

                                        for($i = 0; $i < sizeof($orderNumArray); $i++)
                                        {
                                            echo $orderNumArray[$i];
                                            if($orderNumArray[$i] == $SelectOrderNumber) //Inserts Values based on Ordernumber to secure details 
                                            {
                                                
                                                $insertQuery = "INSERT INTO scheduledelivery(
                                                    SchedID,
                                                    delivery_Receipt,
                                                    ordernumber,
                                                    delivery_Date,
                                                    driver,
                                                    truck_Number,
                                                    customer_Name,
                                                    Destination,
                                                    delivery_status)
                                                    
                                                    VALUES('$SchedID',
                                                    '$deliveryReceipt',
                                                    '$SelectOrderNumber',
                                                    '$dateFromHTML',
                                                    '$driverFromHTML',
                                                    '$truckPlateFromHTML',
                                                    '$customerNameFromHTML',
                                                    '$destinationFromHTML',
                                                    'IP');"; //Insert Required Element from HTML to DB
            
                                                $result=mysqli_query($dbc,$insertQuery);
                                                $SchedID++; //Add +1 to Primary to Avoid Error on Duplicate key
                                                $deliveryReceipt++;
                                            }                                        
                                        };
                                       
                                        

                                        
                                        $OrderNumArray = array();
                                        $OrderDetailID = array();

                                        $queryToReplace = "SELECT orderdetailID, ordernumber, item_status FROM mydb.order_details";
                                        $resulttoReplace = mysqli_query($dbc,$queryToReplace);
                                        while($rowOfResult = mysqli_fetch_assoc($resulttoReplace))
                                        {
                                            $OrderNumArray[] = $rowOfResult['ordernumber'];
                                            $OrderDetailID[] = $rowOfResult['orderdetailID'];
                                        }

                                        for ($i = 0; $i < sizeof($OrderNumArray); $i++)
                                        {
                                            if($OrderNumArray[$i] == $SelectOrderNumber)
                                            {
                                               $TEMP = $OrderDetailID[$i];
                                              
                                                $replaceQuery = "UPDATE order_details 
                                                set item_status = 'IP'
                                                where orderdetailID = '$TEMP' AND item_status = 'Deliver';";
                                                $replaceResult =  mysqli_query($dbc,$replaceQuery); //Update Order_details table to replace 'Delvier' with 'IP'
                                            }
                                        }                                        
                                    }    

                            ?>
                        </div>
                      </div>

                    </form>

                    
                  </div>
                </div>
              
</body>

<!-- /page content -->

<!-- footer content -->

<!-- /footer content -->

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
<script type="text/javascript">
                                    
                                    
                                    <?php
                                    
                                    require_once('DataFetchers/mysql_connect.php');
                                    
                                    echo  'var textBox = document.getElementById("customerName");';
                                    echo  'var dropdown = document.getElementById("orderNumberDropdown");';
                                    echo  'var itemBox = document.getElementById("itemfromOrders");';
                                    echo  'var quantityBox = document.getElementById("quantityfromOrders");';
                                    echo  'var totalPriceBox = document.getElementById("totalfromOrders");';

                                    echo  'var ExpectedDateBox = document.getElementById("expectedDate");';
                                    echo  'var locationBox = document.getElementById("locationFromClient");';
                                    echo  'var truckPlateBox = document.getElementById("truckPlate");';
                                    echo  'var driverBox = document.getElementById("driverName");';
                                    

                                    $sql = "SELECT * FROM order_details 
                                    join clients ON order_details.client_id = clients.client_id
                                    join items_trading ON order_details.item_id = items_trading.item_id
                                    join orders ON orders.ordernumber = order_details.ordernumber
                                    where item_status = 'Deliver'
                                    group by orderdetailID;";
                                // and ordernumber = '$valueFromHtmlDropdown'
                                    $result=mysqli_query($dbc,$sql);                                      

                                    $orderNumber = array();
                                    $customerName = array();
                                    $itemName = array();
                                    $quantity = array();
                                    $pricePerItem = array();
                                    $totalPrice = array();
                                    
                                    $fabricationStatus = array();
                                    $paymentStatus = array();

                                    $ExpectedDateFromHTML = array();
                                    $locationFromHTML = array();

                                    $driverFirstNameFromHTML = array();
                                    $driverLastNameFromHTML = array();
                                         
                                    // echo  "var getORNum = {$row['ordernumber']};";                                         
                                    // echo "var customerName = '{$row['client_name']}';";                                            
                                        
                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                    {                                                                                     
                                        $orderNumber[] = $row['ordernumber'];
                                        $customerName[] = $row['client_name'];  
                                        $itemName[] = $row['item_name'];
                                        $quantity[] = $row['item_qty'];
                                        $pricePerItem[] = $row['item_price'];
                                        // $totalPrice[] = $row['item_qty'] * $row['item_price'];
                                        $totalPrice[] = $row['totalamt'];

                                        $fabricationStatus[] = $row['fabrication_status'];
                                        $paymentStatus[] = $row['payment_status'];

                                        $ExpectedDateFromHTML[] = $row['expected_date'];
                                        $locationFromHTML[] = $row['client_city'];
                                                                                        
                                    }
                                    $truckID = array();
                                    $destinationID = array();
                                    $sql1 = "SELECT * FROM destination
                                    JOIN trucktable ON trucktable.truckID = destination.truckID
                                    join driver ON driver.truckID = trucktable.truckID;";
                                    $result1=mysqli_query($dbc,$sql1);
                                    while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
                                    { // W I P
                                        $truckID[] = $row1['truckplate'];
                                        $destinationID[] = $row1['DestinationName'];
                                        $driverFirstNameFromHTML[]  = $row1['driverFirstName'];
                                        $driverLastNameFromHTML[]  = $row1['driverLastName'];
                                    }
                                    
                                    echo "var itemNameFromPHP = ".json_encode($itemName).";"; 
                                    echo "var cusNameFromPHP = ".json_encode($customerName).";"; 
                                    echo "var orderNumFromPHP = ".json_encode($orderNumber).";";
                                    echo "var quantityNumFromPHP = ".json_encode($quantity).";";
                                    echo "var PriceNumFromPHP = ".json_encode($pricePerItem).";";
                                    echo "var totalNumFromPHP = ".json_encode($totalPrice).";";

                                    echo "var fabricationStatusFromPHP = ".json_encode($fabricationStatus).";";
                                    echo "var paymentStatusFromPHP = ".json_encode($paymentStatus).";";

                                    echo "var expectedDateFromPHP = ".json_encode($ExpectedDateFromHTML).";";
                                    echo "var locationFromPHP = ".json_encode($locationFromHTML).";";

                                    echo "var truckPlateFromPHP = ".json_encode($truckID).";";
                                    echo "var DestinationFromPHP = ".json_encode($destinationID).";";

                                    echo "var driverFirstNameFromPHP = ".json_encode($driverFirstNameFromHTML).";";
                                    echo "var driverLastNameFromPHP = ".json_encode($driverLastNameFromHTML).";";

                                    echo 'var table = document.getElementById("datatable");'; 
                                    echo 'table.oldHTML=table.innerHTML;';
                                
                                    echo  " dropdown.onchange = function(){";
                                        echo 'table.innerHTML=table.oldHTML;'; //returns to the first state of the Table;
                                        
                                    echo  " for (var i = 0; i < ".sizeof($orderNumber)."; i++) {  ";                                                                               
                                        echo  "  if(dropdown.value == orderNumFromPHP[i])";
                                            echo  "  {";                                 
                                             echo  " textBox.value = cusNameFromPHP[i];";               
                                             echo  " totalPriceBox.value = totalNumFromPHP[i];";
                                             echo  " ExpectedDateBox.value = expectedDateFromPHP[i];";
                                             echo  " locationBox.value = locationFromPHP[i];"; 
                                           
                                             echo  " for (var j = 0; j < ".sizeof($truckID)."; j++) {  "; 
                                                echo  "  if(locationFromPHP[i] == DestinationFromPHP[j])"; //checks if location is same as TruckDestinatrion
                                                echo  "  {";
                                                    echo  " truckPlateBox.value = truckPlateFromPHP[j];";
                                                    echo  " driverBox.value = driverFirstNameFromPHP[j] + ' ' +driverLastNameFromPHP[j];";
                                                echo  "  }"; 
                                            echo  "  }"; // end 2nd forloop
                                           
                                            echo  "var newRow = document.getElementById('datatable').insertRow();";
                                            echo  'newRow.innerHTML = "<tr><td>" +itemNameFromPHP[i]+ "</td> <td>" +quantityNumFromPHP[i]+ "</td> <td>"+PriceNumFromPHP[i]+"</td></tr>";';
                                                                         
                                            echo  "  }"; //End IF
                                          
                                            
                                        echo  "  };"; //END 1st Forloop
                                        
                                    echo  " };";  //End function                                                        
                                ?> //PHP END                        
</script> <!-- Script to add Order Details from DB with PHP inside --> 
                                      



</body>

</html>
