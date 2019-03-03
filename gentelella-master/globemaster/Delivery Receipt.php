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
                    <div class="col-md-12 col-sm-9 col-xs-12" >
                        <div class="x_panel" >
                            <div class="x_title">
                                <h1 align = "center">Delivery Receipt Details</h1>
                                
                                <div class="clearfix"></div>
                            </div>
                           
                            <div class="x_content">
                                <br>
                                <form class="form-horizontal form-label-center">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Delivery Receipt Number </label>
                                        <div class="col-md-3 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Delivery Date</label>
                                        <div class="col-md-3 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Destination</label>
                                        <div class="col-md-3 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Name</label>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <input type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Status</label>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <input type="text" class="form-control" readonly="readonly">
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
                                                   <?php    

                                                    require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');

                                                    $orderNumberArray = array();
                                                    $itemName = array();
                                                    $quantity = array();
                                                    $pricePerItem = array();
                                                    
                                                    $queryToGetItemList = "SELECT * FROM order_details WHERE item_status ='IP'";
                                                    $resultofQuery1 = mysqli_query($dbc, $queryToGetItemList);
                                                    while($rowofResult1=mysqli_fetch_array($resultofQuery1,MYSQLI_ASSOC))
                                                    {
                                                        $orderNumberArray[] = $rowofResult1['ordernumber']; 
                                                        $itemName[] = $rowofResult1['item_name'];
                                                        $quantity[] = $rowofResult1['item_qty'];
                                                        $pricePerItem[] = $rowofResult1['item_price'];

                                                    //    echo "Result of RowResult = ", $rowofResult1['ordernumber'] ,"<br>";
                                                    //    echo "Result of OrderNumArray = ", $orderNumberArray[0] ,"<br>";
                                                    }
                                                    


                                                    $SchedDelivOrderNumber = array(); 

                                                    $sqlToGetTableValue = "SELECT * FROM scheduledelivery";
                                                    $resultofQuery2 = mysqli_query($dbc, $sqlToGetTableValue);
                                                    while($rowofResult2=mysqli_fetch_array($resultofQuery2,MYSQLI_ASSOC))
                                                    {
                                                        $SchedDelivOrderNumber[] = $rowofResult2['ordernumber'];
                                                        // echo $rowofResult2['ordernumber'];
                                                    }
                                                    for($i = 0; $i < sizeof($orderNumberArray); $i++)
                                                    {
                                                        if($orderNumberArray[$i] == $SchedDelivOrderNumber[$i])
                                                        {
                                                            echo '<tr>';                                                                 
                                                                echo '<td>';
                                                                echo $itemName[$i];
                                                                echo '</td>';  
                                                                echo '<td>';
                                                                echo $quantity[$i];
                                                                echo '</td>'; 
                                                                echo '<td>';
                                                                echo $pricePerItem[$i];
                                                                echo '</td>';                                                                   
                                                            echo '</tr>';
                                                        }
                                                        echo "SchedNUM = ", $SchedDelivOrderNumber[$i] ,"<br>";

                                                       echo $orderNumberArray[$i], "<br>";
                                                    }
                                               
                                                   

                                                    
                                                    

                                                   ?> <!-- PHP END -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total</label>
                                        <div class="col-md-3 col-sm-9 col-xs-6">
                                            <input   type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                            <button type="button" class="btn btn-primary">Edit</button>
                                            <button type="reset" class="btn btn-warning">Archive</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-6 col-sm-9 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Delivery Receipt List </h2>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                   <div class="row">
                                        <div class="col-sm-12">
                                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 263px;">Delivery Receipt Number</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Delivery date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Origin</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">Airi Satou</td>
                                                        <td>2008/11/28</td>
                                                        <td>Trading</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">Angelica Ramos</td>
                                                        <td>2009/10/09</td>
                                                        <td>Depot</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">Ashton Cox</td>
                                                        <td>2009/01/12</td>
                                                        <td>Trading</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">Bradley Greer</td>
                                                        <td>2012/10/13</td>
                                                        <td>Trading</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">Brenden Wagner</td>
                                                        <td>2011/06/07</td>
                                                        <td>Trading</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">Brielle Williamson</td>
                                                        <td>2012/12/02</td>
                                                        <td>Depot</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">Bruno Nash</td>
                                                        <td>2011/05/03</td>
                                                        <td>Depot</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">Caesar Vance</td>
                                                        <td>2011/12/12</td>
                                                        <td>Depot</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">Cara Stevens</td>
                                                        <td>2011/12/06</td>
                                                        <td>Depot</td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">Cedric Kelly</td>
                                                        <td>2012/03/29</td>
                                                        <td>Trading</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> -->

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

<script>

</script>

</body>

</html>
