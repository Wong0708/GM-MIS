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

    <title>GM MIS | Dashboard</title>

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
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
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

            <!-- sidebar menu -->
            <?php
        require_once("nav.php");    
        ?>
              <!--<div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div> --!>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
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
        <?php
          require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');

          $query = "SELECT SUM(item_qty) FROM order_details"; //Query for getting the Total Sales from Order Details
          $resultOrderDetail = mysqli_query($dbc,$query);
          $qtyfromOrderDeatils = mysqli_fetch_array($resultOrderDetail,MYSQLI_ASSOC);
          $itemQty = $qtyfromOrderDeatils['SUM(item_qty)'];

          echo'<div class="row tile_count">';
          echo'<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">';  //HTML to display the Target Sales and Actual Total Sales
          echo'<span class="count_top"> Target Sales: </span>';
          echo'<div class="count">2500</div>';
              
          echo'</div>';
          echo'<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">';
          echo'<span class="count_top"> Total Sales: </span>';
            echo'<div class="count">'; 
            echo $itemQty;
            echo'</div>';
          echo'</div>';
          
          $query = "SELECT * FROM items_trading"; //Query for getting the Total Profit of All Sales
          $result=mysqli_query($dbc,$query);

          $totalPrice = 0;

          while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
          { 
            $length = count($row);
            $i = $row['item_id'];
            foreach((array) $row['item_id'] as $count)
            {
              $query = "SELECT *,SUM(item_qty) as total_amount FROM order_details where item_id = $count GROUP BY item_id";
              $resultOrderDetail = mysqli_query($dbc,$query);
              $qtyfromOrderDeatils = mysqli_fetch_array($resultOrderDetail,MYSQLI_ASSOC);
              $itemQty = $qtyfromOrderDeatils['total_amount'];
             
              
            }   
            $totalPrice += $row['price'] * $itemQty; 
                                 
          }
          echo'<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">'; //HTML to display TOTAL PROFIT and Cost
          echo'<span class="count_top">Total Profit: </span>';
            echo'<div class="count green">';
            echo $totalPrice;
            echo'</div>';
          echo'</div>';
          echo'<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">';
          echo'<span class="count_top"><i class="fa fa-user"></i> Total Incurred Cost: </span>';
          echo'<div class="count">764,567</div>'; //COST: Needs to be clarified
          echo'</div>';          
          echo'</div>';
          ?> <!-- PHP END -->
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Trading Asset <small></small></h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                  </div>
                

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div id="chart_plot_01" class="demo-placeholder"></div>
                </div>

                
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white"> 
                      <div class="x_panel tile fixed_height_320">
                        <div class="x_title">
                          <h2>Top Selling This Month: </h2>                          
                          <div class="clearfix"></div>
                        </div>
                
                <?php
                  require_once('mysql_connect.php');

                  $query = "SELECT *, SUM(item_qty) as total_amount 
                  FROM order_details 
                  GROUP BY item_id 
                  ORDER by total_amount 
                  DESC LIMIT 5 "; //Query to get the 5 most sold items in current month.

                  $resultOrderDetail = mysqli_query($dbc,$query);
                  
                  
                  while($qtyfromOrderDetails = mysqli_fetch_array($resultOrderDetail,MYSQLI_ASSOC))
                  { 
                   
                    $itemName =  $qtyfromOrderDetails['item_name'];
                    $itemQty = $qtyfromOrderDetails['total_amount'];


                    echo'     <div class="x_content">'; //Html to show the top 5 most sold assets in trading
                    echo'         <h4></h4>';
                    echo'   <div class="widget_summary">';
                    echo'       <div class="w_right w_45">';
                    echo'         <span>';
                    echo '<b><font size="3" color="black">',$itemName,':</b></font>';
                    echo'        </span>';
                    echo'      </div>';
                    echo'      ';
                    echo'      <div class="w_right w_20">';
                    echo'        <span>';
                    echo '<b><font size="3" color="green">',$itemQty,'</b></font>'  ;
                    echo'        </span>';
                    echo'      </div>';
                    echo'      <div class="clearfix"></div>';
                    echo'     </div>';
                    echo'  </div>';
                   
                  }                                 
                  ?>    
                    
                    </div>
                  </div>        
          </div>        
          <br />

          <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Asset List <small></small></h2>
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

                     

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Item ID </th>
                            <th class="column-title">Item Name </th>
                            <th class="column-title">Price </th>
                            <th class="column-title">Amount Sold </th>
                            <th class="column-title">Total Price Sold </th>
                            
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                            require_once('mysql_connect.php');
                            $query = "SELECT * FROM items_trading";
                            $result=mysqli_query($dbc,$query);

                            
                            

                           while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                            { 
                              $length = count($row);
                              $i = $row['item_id'];
                              foreach((array) $row['item_id'] as $count)
                              {
                                $query = "SELECT *,SUM(item_qty) as total_amount FROM order_details where item_id = $count GROUP BY item_id";
                                $resultOrderDetail = mysqli_query($dbc,$query);
                                $qtyfromOrderDeatils = mysqli_fetch_array($resultOrderDetail,MYSQLI_ASSOC);
                                $itemQty = $qtyfromOrderDeatils['total_amount'];
                               
                              }                                  

                              echo '<tr class="even pointer">';
                              echo '<td class="a-center">';
                              echo    '<input type="checkbox" class="flat" name="table_records">';
                              echo  '</td>';
                              echo '<td>';
                              echo $row['item_id'];
                              echo '</td>';  
                              echo '<td>';
                              echo $row['item_name'];
                              echo '</td>'; 
                              echo '<td>';
                              echo $row['price'];
                              echo '</td>';  
                              echo '<td>';
                              echo $itemQty;
                              echo '</td>';  
                              echo '<td>';
                              echo $row['price'] * $itemQty;
                              echo '</td>';  
                              echo '<td class="last" ><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">View Details</a></td>';                          
                              echo '</tr>';
                            }
                          ;    
                         ?>                                              
   
                              <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                  
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                      </button>
                                      <h4 class="modal-title" id="myModalLabel">Trading</h4>
                                    </div>
                  
                                    <div class = "modal-body">
                                    <form class="form-horizontal form-label-left" novalidate>
                                                       
                                      <span class="section">Item Information</span>
                  
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="customer" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="customer" placeholder="Customer Name" required="required" type="text">
                                        </div>
                                      </div>
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Number <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                                        </div>
                                      </div>
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Driver <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                                        </div>
                                      </div>
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Destination <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                                        </div>
                                      </div>

                                                               
                                      <div class="ln_solid"></div>
                                      <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                          <button type="submit" class="btn btn-primary">Back</button>
                                        
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                  </div>
                                </div>
                              </div><!-- End MODAL -->
                             
                          
                        </tbody>
                      </table>
                    </div>
                           <!-- <div id="echart_line" style="height:350px;"></div> -->
        
                        

         
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

    <!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <script src="../vendors/echarts/map/js/world.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
