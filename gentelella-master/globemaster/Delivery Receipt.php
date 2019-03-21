<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>GM MIS | Delivery Receipt</title>

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
                <!-- page content -->
                <div class="right_col" role="main">
                    <!-- top tiles -->
                    
                    

                    <!-- /top tiles -->

                    

                    <!--TABLE OF DETAILS FOR DELIVERY RECEIPT-->
                    <div class="col-md-12 col-sm-12 col-xs-12" >
                        <div class="x_panel" id="printDR">
                            <div class="x_title">
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <font color = "black"><h1>Delivery Receipt - [
                                    <?php
                                        if(isset($_GET['deliver_number']))
                                        {
                                            $_SESSION['get_dr_number_from_deliveries'] = $_GET['deliver_number'];
                                            $_SESSION['get_or_number_from_deliveries'] = $_GET['order_number'];
                                            echo $_SESSION['get_dr_number_from_deliveries'];
                                        }
                                        else
                                        {
                                            echo $_SESSION['get_dr_number_from_deliveries'];
                                        }
                                        
                                    ?>

                                    ]</h1></font> 
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12" align="right">
                                    <?php
                                        include("print.php");
                                    ?>                                       
                                        <button type="" class="btn btn-primary btn-lg" onclick="printW()"><i class="fa fa-print"></i> Print</button>                                    
                                </div>                              
                                <div class="clearfix"></div>

                                
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12" >
                            <?php
                                    $GET_ID_DELIVERY = $_SESSION['get_dr_number_from_deliveries'];
                                    $deliveryexpected = array();
                                    $deliverydate = array();
                                    $datetoday = date("Y-m-d");
                                    $queryDeliveryDate = "SELECT * FROM orders o
                                    JOIN scheduledelivery sd 
                                    ON o.ordernumber = sd.ordernumber 
                                    WHERE delivery_Receipt = '$GET_ID_DELIVERY';"; 
                                    $resultDeliveryDate = mysqli_query($dbc,$queryDeliveryDate);
                                  
                                    while($rowDeliveryDate = mysqli_fetch_array($resultDeliveryDate,MYSQLI_ASSOC))
                                    {
                                        $deliveryexpected[] = $rowDeliveryDate['expected_date'];
                                        $deliverydate[] = $rowDeliveryDate['delivery_Date'];
                                    }
                                   
                                  
                                    for($i = 0; $i < sizeof($deliveryexpected); $i++)
                                    {
                                        // to check countdown till delivery
                                        $queryDeliveryDateDiffNow = "SELECT DATEDIFF(CURDATE(),sd.delivery_Date) 
                                        AS datedifferenceNow
                                        FROM orders o
                                        JOIN scheduledelivery sd 
                                        ON o.ordernumber = sd.ordernumber 
                                        WHERE delivery_Receipt = '$GET_ID_DELIVERY';"; 
                                        $resultDeliveryDateDiffNow = mysqli_query($dbc,$queryDeliveryDateDiffNow);
                                        $rowDeliveryDateDiffNow = mysqli_fetch_array($resultDeliveryDateDiffNow,MYSQLI_ASSOC);
                                        if($rowDeliveryDateDiffNow['datedifferenceNow'] > -4 && $rowDeliveryDateDiffNow['datedifferenceNow'] < 1)
                                        {
                                            $datedifferenceNow =  abs($rowDeliveryDateDiffNow['datedifferenceNow']);
                                            $orders = "order's";
                                            echo '<p><font color = "blue">This '.$orders.' delivery date is due in '.$datedifferenceNow.' days.</font></p>';
                                        }
                                        else if($rowDeliveryDateDiffNow['datedifferenceNow'] > 0)
                                        {
                                            $datedifferenceNow =  abs($rowDeliveryDateDiffNow['datedifferenceNow']);
                                            $orders = "order's";
                                            echo '<p><font color = "red">This order is late by '.$datedifferenceNow.' Days.</font></p>';
                                        }

                                        // to check date difference from expected date
                                        $queryDeliveryDateDiff = "SELECT DATEDIFF(sd.delivery_Date,o.expected_date) 
                                        AS datedifference
                                        FROM orders o
                                        JOIN scheduledelivery sd 
                                        ON o.ordernumber = sd.ordernumber 
                                        WHERE delivery_Receipt = '$GET_ID_DELIVERY';"; 
                                        $resultDeliveryDateDiff = mysqli_query($dbc,$queryDeliveryDateDiff);
                                        $rowDeliveryDateDiff = mysqli_fetch_array($resultDeliveryDateDiff,MYSQLI_ASSOC);

                                        if($rowDeliveryDateDiff['datedifference'] > 0)
                                        {
                                            $datedifference =  $rowDeliveryDateDiff['datedifference'];
                                            echo '<p><font color = "#ffc430">This order will be '.$datedifference.' day(s) late from the Expected Delivery Date.</font></p>';
                                        }
                                    }
                                    
                                ?>
                                </div>
                            <form class="form-horizontal form-label-center" method="GET">                              
                                <div class="col-md-6 col-sm-6 col-xs-12 " >
                                    <div class="x_panel" >
                                    <center><font color = "#2a5eb2"><h3>Delivery Receipt Details </h1>
                                                </h3></font></center>
                                    <div class="ln_solid"></div>

                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Delivery Receipt Number </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id = "drNumber" class="form-control" readonly="readonly" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Expected Date</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id = "drexpectedDate" class="form-control" readonly="readonly" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Delivery Date</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id = "drDate" class="form-control" readonly="readonly" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Destination</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id = "drDestination" class="form-control" readonly="readonly" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Customer Name</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id = "drCusName" class="form-control" readonly="readonly" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Current Status</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id = "drStatus" class="form-control" readonly="readonly">
                                        </div>
                                    </div>

                                    
                                    <br><br>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Total Amount</label>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <input   type="text" id = "drTotal" class="form-control" readonly="readonly" placeholder="Read-Only Input" style="text-align:right;">
                                        </div>
                                    </div>

                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12" >
                                    <div class="x_panel" >

                                    <center><h3>Items in This Order</h1>
                                    
                                    </h3></center>
                                    <div class="ln_solid"></div>

                                            <div class="row" >
                                                <div class="col-md-12 col-sm-12 col-xs-12"  >
                                                    <table  id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 263px;">Product</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Pieces</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Price per piece</th>
                                                            </tr>
                                                        </thead>
                                                        <tr role='row' class='odd'>
                                                                                                                                            
                                                            </tr>

                                                        <tbody>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                    </div> <!--END XPanel-->
                                </div> <!--END Class Colmd-->

                                <div class = "clearfix"></div>  
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12" align = "right ">
                                            <button type="button" class="btn btn-default"><a href = Deliveries.php>Go Back</a></button>
                                            <button type="button" class="btn btn-success" onclick = "finishDeliver()">Finish Delivery</button>
                                        </div>
                                    </div>

                                    
                            </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
</body>

<!-- /page content -->

<!-- footer content -->

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

  <?php    

require_once('DataFetchers/mysql_connect.php');

$DR_NUM_FROM_VIEW = $_SESSION['get_dr_number_from_deliveries'];

$orderNumberArray = array();
$itemName = array();
$quantity = array();
$pricePerItem = array();
$totalPrice = array();
$expected_date = array();





$SchedDelivOrderNumber = array(); 
$SchedDelivDR = array();
$SchedDelivDate = array();
$SchedDelivDestination = array();
$SchedDelivCusName = array();
$SchedDelivStatus = array();


$sqlToGetTableValue = "SELECT * FROM scheduledelivery";
$resultofQuery2 = mysqli_query($dbc, $sqlToGetTableValue);
while($rowofResult2=mysqli_fetch_array($resultofQuery2,MYSQLI_ASSOC))
{
    $OR_FROM_SCHED_DELIV_TABLE =  $rowofResult2['ordernumber'];

    $queryToGetItemList = "SELECT * FROM orders
    JOIN order_details ON orders.ordernumber = order_details.ordernumber
    WHERE orders.ordernumber = '$OR_FROM_SCHED_DELIV_TABLE'";
    $resultofQuery1 = mysqli_query($dbc, $queryToGetItemList);
    while($rowofResult1=mysqli_fetch_array($resultofQuery1,MYSQLI_ASSOC))
    {
        $orderNumberArray[] = $rowofResult1['ordernumber']; //Compare this 
        $itemName[] = $rowofResult1['item_name'];
        $quantity[] = $rowofResult1['item_qty'];
        $pricePerItem[] = number_format(($rowofResult1['item_price']),2);
        $totalPrice[] = number_format(($rowofResult1['totalamt']),2);
        $FORMATTED_EXPECTED_DATE = date('F j, Y',strtotime($rowofResult1['expected_date'])); //Formats date 
        $expected_date[]= $FORMATTED_EXPECTED_DATE;
    }
    $FORMATTED_DELIV_DATE = date('F j, Y',strtotime($rowofResult2['delivery_Date'])); //Formats date 
   
    $SchedDelivOrderNumber[] = $rowofResult2['ordernumber']; //To this
    $SchedDelivDR[] = $rowofResult2['delivery_Receipt'];
    $SchedDelivDate[] = $FORMATTED_DELIV_DATE;
    $SchedDelivDestination[] = $rowofResult2['Destination'];
    $SchedDelivCusName[] = $rowofResult2['customer_Name'];
    $SchedDelivStatus[] =  $rowofResult2['delivery_status'];
}
    echo '<script text/javascript>';
    echo "var deliverNumberfromHTML = document.getElementById('drNumber');";
    echo "var expectedDatefromHTML = document.getElementById('drexpectedDate');";
    echo "var deliverDatefromHTML = document.getElementById('drDate');";
    echo "var deliverDestinationfromHTML = document.getElementById('drDestination');";
    echo "var deliverCusNamefromHTML = document.getElementById('drCusName');";
    echo "var deliverStatusfromHTML = document.getElementById('drStatus');";
    echo "var deliverTotalfromHTML = document.getElementById('drTotal');";  //Gets HTML elements (Textbox)

    echo "var DR_NUM_FROM_PHP = ".json_encode($DR_NUM_FROM_VIEW).";";
    
    echo "var drDateFromPHP = ".json_encode($SchedDelivDate).";";
    echo "var drDesFromPHP = ".json_encode($SchedDelivDestination).";";
    echo "var drCusFromPHP = ".json_encode($SchedDelivCusName).";";
    echo "var drStatFromPHP = ".json_encode($SchedDelivStatus).";";
    echo "var DRFromPHP = ".json_encode($SchedDelivDR).";"; 
    echo "var drExpectedDateFromPHP = ".json_encode($expected_date).";";
    echo "var OrderNumberFromSchedDeliver = ".json_encode($SchedDelivOrderNumber).";";//Values from Sched Delivery Table


    echo "var ItemNameFromPHP = ".json_encode($itemName).";"; 
    echo "var ItemQuantityFromPHP = ".json_encode($quantity).";"; 
    echo "var ItemPriceFromPHP = ".json_encode($pricePerItem).";"; 
    echo "var ItemTotalFromPHP = ".json_encode($totalPrice).";"; 
    echo "var OrderNumberFromOrderDetails = ".json_encode($orderNumberArray).";"; //Values from order_details table
   

    echo 'var GetDR = localStorage.getItem("DRfromDeliveriesPage");'; //Gets the text to compare fron Deliveries.php

        echo 'for(var i = 0; i < DRFromPHP.length ; i++){';   
            
           
            echo 'if(DR_NUM_FROM_PHP.trim() == DRFromPHP[i].trim()) {';
                // echo 'if(){';
                echo 'console.log("Value From Receipts.php = " + DRFromPHP[i]);';
                echo 'console.log("Value from Delvieries.php = " + GetDR);';
            
                echo 'deliverNumberfromHTML.value = DRFromPHP[i];';
                echo 'deliverDatefromHTML.value = drDateFromPHP[i];';
                echo 'deliverDestinationfromHTML.value = drDesFromPHP[i];';
                echo 'deliverCusNamefromHTML.value = drCusFromPHP[i];';
                echo 'deliverStatusfromHTML.value = drStatFromPHP[i];';
                echo 'deliverTotalfromHTML.value = "₱ "+ ItemTotalFromPHP[i];';
                echo 'expectedDatefromHTML.value = drExpectedDateFromPHP[i];';
                echo 'var count = OrderNumberFromOrderDetails.length -1;';

                echo 'while(count >= 0){';
                    
                    echo 'console.log("OR From Sched = " + OrderNumberFromSchedDeliver[i]);';
                    

                    echo 'if(OrderNumberFromSchedDeliver[i] == OrderNumberFromOrderDetails[count]) {';

                        echo  "var newRow = document.getElementById('datatable').insertRow();";
                        echo  'newRow.innerHTML = "<tr><td>" +ItemNameFromPHP[count]+ "</td> <td align = right>" +ItemQuantityFromPHP[count]+ "</td><td align = right> ₱ " +ItemPriceFromPHP[count]+ "</td></tr>";';
                        // echo 'localStorage.removeItem("DRfromDeliveriesPage");';
                        echo 'count--;';
                        echo 'continue;';

                    echo '  }'; // End 2nd IF     
                    echo 'count--;';        
                echo '}'; //End While
            echo '  }'; // End 1st IF  
        echo ' }';// END FOR
echo '</script>';
?> <!-- PHP END -->

<script>
// To Clear localstorage =temporary
    function clearLocalStorage()  
    {
        localStorage.clear();
    }
</script>

<script>
    function printW()
    {
        window.print();
    }
</script>
<script>
    function finishDeliver()
    {
        if(confirm("Do you want to finish this delivery?"))
        {
            if(confirm("Are you sure?"))
            {                              
                request = $.ajax({
                url: "ajax/finish_delivery.php",
                type: "POST",
                data: {
                    post_dr_number: "<?php echo $_SESSION['get_dr_number_from_deliveries'];?>",
                    post_or_number:  "<?php echo $_SESSION['get_or_number_from_deliveries'];?>"
                },
                    success: function(data)
                    {
                        alert("Delivery Complete!");
                        window.location.href = "Delivery Receipt.php";                         
                    }//End Scucess               
                }); // End ajax    
            }   
            else
            {
                alert("Action: Cancelled");
            }
        }
        else
        {
            alert("Action: Cancelled");
        }       
    }
</script>

 <script>
      $("#drTotal").change(function()
      {
      
        var $this = $(this);
        $this.val(parseFloat($this.val()).toFixed(2));
          
      }); //Sets the Decimal
    </script>

</body>

</html>
