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
        $orderDate = $_POST['orderDate'];
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
                                <h3>Sales Report</h3>
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
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2> Sales Report </h2>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">

                                                        <div class="form-group">
                                                            <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Start Date</label>
                                                            <div class='input-group date' id='startDate'>
                                                                <input type='text' class="form-control" onkeyup="updateReportTable();" onchange="updateReportTable();" id="startDateVal" name="startDate" />
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">End Date</label>
                                                            <div class='input-group date' id='endDate'>
                                                                <input type='text' class="form-control" onkeyup="updateReportTable();" onchange="updateReportTable();" id="endDateVal" name="endDate" />
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-1 col-sm-1 col-xs-12">Branch</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="selectedBranchName" type="hidden" />
                                                                <select class="form-control" id="branch" name ="branch" onchange="document.getElementById('selectedBranchName').value = this.options[this.selectedIndex].text; updateReportTable(3, '');">
                                                                    <option value="0">All Branches</option>
                                                                <?php
                                                                require_once('mysql_connect.php');
                                                                $query="SELECT branchID, branchName FROM branch";
                                                                $result=mysqli_query($dbc,$query);
                                                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                                ?> <option value="<?php echo $row['branchID']; ?>"><?php echo $row["branchName"]; ?> </option> <?php
                                                                }
                                                                ?>     
                                                                </select><br>
                                                            </div> 
                                                        </div>
                                                        
                                                        <input type=hidden id="titleStartDate" value="0" />
                                                        <input type=hidden id="titleEndDate" value="0" />
                                                        <input type=hidden id="branchReport" value="0" />
                                                        <div class="col-md-12 col-sm-12 col-xs-12" id="reportTable" style="visibility:hidden">
                                                                <div class="x_panel">
                                                                    <div class="x_content">
                                                                        <div id="reportTitle">
                                                                         </div>
                                                                        <div id="reportTableData">
                                                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                                                          <thead>
                                                                            <tr>
                                                                                <th>Prouct ID</th>
                                                                                <th>Product Name</th>
                                                                                <th>Amount Sold</th>
                                                                                <th>Unit Price</th>
                                                                                <th>Total Sales</th>
                                                                            </tr>
                                                                          </thead>
                                                                          <tbody>  
                                                                        </tbody>
                                                                      </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <div class="form-group"><center>
                                                        <div class="control-label col-mid-1 col-sm-1 col-xs-12 page-title">
                                                            <div class="title_center">
                                                                <h4>----- END OF REPORT -----</h4>
                                                            </div>
                                                        </div>
                                                        </center>
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
            
      </script>

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
        <!-- bootstrap-datetimepicker -->
        <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

        <script>

            $(function () {
                $('#startDate').datetimepicker({
                    format: 'L',
                    viewMode: 'years'
                });

                $('#endDate').datetimepicker({
                    format: 'L',
                    viewMode: 'years'
                });
            });
            
            $("#startDate").on("dp.change", function(e) {
                $('#endDate').data("DateTimePicker").minDate(e.date);
                updateReportTable(1, e.date);
            });
            
            $("#endDate").on("dp.change", function(e) {
                updateReportTable(2, e.date);
            });
            
            function updateReportTable(input, date){
                //alert($('#startDate').data("DateTimePicker").viewDate());

                if(input == 1 || input == 2){
                    var year = (date.get('year'));
                    var month = (date.get('month') + 1);
                    var day = (date.get('date'));
                }
                
                if(input == 1){
                    document.getElementById("titleStartDate").value = month + "/" + day + "/" + year;
                }
                else if(input == 2){
                    document.getElementById("titleEndDate").value = month + "/" + day + "/" + year;
                }
                
                if(document.getElementById("selectedBranchName").value == "0" || document.getElementById("titleStartDate").value == "0" || document.getElementById("titleEndDate").value == "0"){
                    document.getElementById("reportTitle").innerHTML = "";
                    document.getElementById("reportTable").style.visibility = "hidden";
                }
                else{
                    document.getElementById("reportTitle").innerHTML = "<h2>Sales Report of "+document.getElementById('selectedBranchName').value+" for " + document.getElementById("titleStartDate").value + " - " + document.getElementById("titleEndDate").value + "</h2>";
                    document.getElementById("reportTable").style.visibility = "visible";
                    queryReport(document.getElementById('branch').value, document.getElementById("titleStartDate").value, document.getElementById("titleEndDate").value)
                }
            }
            
            $("#branch").trigger("change");
            
            function queryReport(branch, startDate, endDate){
                $.ajax({
                type: 'POST',
                url: "ajax/generateSalesReport.php",
                data:{
                    branch: branch,
                    startDate: startDate,
                    endDate: endDate
                },
                success: function(result){
                    document.getElementById("reportTableData").innerHTML = result;
                    $('#datatable-buttons').dataTable();
                }
            });
            }
            
            
        </script>
    </body>

    </html>
