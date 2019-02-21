<!DOCTYPE html>
<?php
      require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
    
?> <!-- PHP END -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>GM MIS | Add Inventory</title>

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
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="MainDashboard.html" class="site_title"><i class="fa fa-paw"></i><!-- replace with GM Logo --> <span>Globe Master</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>John Doe</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />
					
					<?php
                    require_once("nav.php");    
                    ?>

            </div>
            <!-- /sidebar menu -->

                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="images/img.jpg" alt="">John Doe
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;"> Profile</a></li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="badge bg-red pull-right">50%</span>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li><a href="javascript:;">Help</a></li>
                                        <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>
                                </li>

                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">6</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <!-- top tiles -->
                    
                    

                    <!-- /top tiles -->
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <h2 >Add Inventory Items: <b>TRADING</b></h2>
                    <!--<ul class="nav navbar-right panel_toolbox">
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
                    </ul> -->
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method = "POST">

                     <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Store</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="depot" value="Depot" onclick="toggleTradingtoDepot()"> &nbsp; Depot &nbsp;

                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="trading" value="Trading"  onclick="toggleTradingtoDepot()"> Trading
                            </label>
                          </div>
                        </div>
                      </div> Toggle Trading/Depot Button --> 
                  
                      <script>
                        function toggleTradingtoDepot()
                        {
                            var depot = document.getElementById("depotConcessionaire");
                            var trade = document.getElementById("tradingSuppliers");
                                trade.style.display = "none" 
                               
                        }
                    </script> <!-- Script to Change Trading to Depot vice versa -->

                    <div class="form-group" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Reference  <span class="required">*</span>
                        </label>
                        <select id="heard" class="form-control col-md-3 col-md-7 col-xs-12" required="" name = "selectItemtype" style=" width:250px";>
                            <option value="">Choose..</option>
                                <?php
                                    require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');

                                    $sql = "SELECT * FROM ref_itemtype";
                                    $result=mysqli_query($dbc,$sql);
                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                    { 
                                        echo'<option value="';
                                        echo $row['itemtype'];
                                        echo'">';
                                        echo $row['itemtype'];
                                        echo'</option>';
                                    }                                   
                                ?> <!-- PHP END -->                                                   
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Item Name <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="item_name" required class="form-control col-md-7 col-xs-12" required style=" width:250px">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Quantity*</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="number" name="amount" required style=" width:250px">
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Price*</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="number" name="price" style=" width:250px">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Threshold*</label>
                        <div class="col-md-2 col-sm-6 col-xs-12" >
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="number" name="threshold" style=" width:250px">
                        </div>
                      </div>

                      

                      
                      <div class="form-group" id = "tradingSuppliers">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Warehouse<span class="required">*</span>
                        </label>
                        <select id="heard" class="form-control col-md-3 col-md-7 col-xs-12" required="" name = " selectWarehouse" style=" width:250px";>
                            <option value="">Choose..</option>
                                <?php
                                    require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');

                                    $sql = "SELECT * FROM warehouses";
                                    $result=mysqli_query($dbc,$sql);
                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                    { 
                                        echo'<option value="';
                                        echo $row['warehouse'];
                                        echo'">';
                                        echo $row['warehouse'];
                                        echo'</option>';
                                    }

                                    
                                ?> <!-- PHP END -->
                                                    
                        </select>
                      </div>
					  <div class="form-group" id = "depotConcessionaire">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Concessionaire <span class="required">*</span>
                        </label>
                        <select id="heard" class="form-control col-md-7 col-xs-12" required="" style=" width:250px">
                            <option value="">Choose..</option>
                            <?php
                                    require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');

                                    $sql = "SELECT * FROM concessionaire";
                                    $result=mysqli_query($dbc,$sql);
                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                    { 
                                        echo'<option value="press">';
                                        echo $row['concess_name'];
                                        echo'</option>';
                                    }


                                ?> <!-- PHP END -->
                        </select>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-danger" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" name = "submitBtn">Submit</button>
                          
                          <?php
                          require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
                            if(isset($_POST['submitBtn']))
                            {
                                $itemName = $_POST['item_name']; //Stores the Values from Textbox in HTML
                                $itemAmount = $_POST['amount'];
                                $itemPrice = $_POST['price'];
                                $itemThreshold = $_POST['threshold'];

                                $warehouseIDfromSelect = $_POST['selectWarehouse'];
                                $itemTypeIDfromSelect = $_POST['selectItemtype'];


                                $queryWarehouseID = "SELECT warehouses.warehouse_id FROM warehouses WHERE warehouse = '$warehouseIDfromSelect'";
                                $resultWarehouseID = mysqli_query($dbc,$queryWarehouseID);                                
                                $rowWarehouseID = mysqli_fetch_assoc($resultWarehouseID); //Query for getting WarehouseID 

                                $queryItemtypeID = "SELECT ref_itemtype.itemtype_id FROM ref_itemtype WHERE itemtype = '$itemTypeIDfromSelect'";
                                $resultItemtype = mysqli_query($dbc,$queryItemtypeID);                                
                                $rowItemtypeID = mysqli_fetch_assoc($resultItemtype); //Query For getting itemtypeID

                                $queryItemID = "SELECT item_id FROM items_trading ORDER BY item_id DESC LIMIT 1 ";
                                $resultItemID = mysqli_query($dbc,$queryItemID);
                                $rowResultItemID = mysqli_fetch_assoc($resultItemID);

                                
                                
                                // var_dump($resultWarehouseID);                               
                                // print_r($queryWarehouseID);

                                // echo $rowWarehouseID['warehouse_id'];
                                // echo $rowItemtypeID['itemtype_id'];

                                $WareHouseID = $rowWarehouseID['warehouse_id'];
                                $ItemtypeID = $rowItemtypeID['itemtype_id'];
                                $ItemID = $rowResultItemID['item_id']+1;

                                echo  $ItemID;
                              
                                
                                $sql = "INSERT INTO items_trading (item_id, item_name, itemtype_id, item_count, last_restock, last_update, threshold_amt, warehouse_id, supplier_id, price)
                                Values(
                                '$ItemID',
                                '$itemName', 
                                '$ItemtypeID',
                                '$itemAmount', curdate(),curdate(),
                                '$itemThreshold',
                                '$WareHouseID',
                                '1',
                                '$itemPrice')";

                                $result=mysqli_query($dbc,$sql);              
                            }
                          ?>
                        </div>
                      </div>

                    </form>
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

</body>

</html>
