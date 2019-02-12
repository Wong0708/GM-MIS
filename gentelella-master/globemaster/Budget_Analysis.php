<!DOCTYPE html>
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
              <!--div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Dashboard </a>
                    
                  </li>
                  <li><a><i class="fa fa-edit"></i> Inventory Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Add Inventory<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="">Trading</a></li>
                            <li><a href="">Depot</a></li>
                        </ul>
                      </li>
                      <li><a>Inventory Scheduling <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="">Delivery Scheduling</a></li>
                            <li><a href="">Restocking</a></li>
                        </ul>
                      </li>
                      <li><a href="form_validation.html">Generate QR Code</a></li>
                      <li><a href="form_wizards.html">Economic Order Quantity</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Sales Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Assets<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="">Trading</a></li>
                          <li><a href="">Depot</a></li>
                        </ul>                      
                      </li>
                      <li><a >Delivery Receipt</a>
                           
                      </li>
                      <li><a >Sales Invoice<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="">Trading</a></li>
                          <li><a href="">Depot</a></li>
                        </ul>  
                      </li>
                      
                      <li><a href="Budget_Analysis.html">Budget Variance Analysis</span></a>

                      </li>
                      <li><a href="EOQ.html">Economic Order Quantity</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Data Analytics <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Visualization <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
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
          <div class="row tile_count">
           <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"> Target Sales: </span>
              <div class="count">2500</div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"> Total Sales: </span>
              <div class="count">500</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top">Total Profit: </span>
              <div class="count green">2,500,000</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Incurred Cost: </span>
              <div class="count">764,567</div>
            </div>-->
           
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Budget Analysis:    <small> <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div></small></h3>
                    
                  </div>
                
                </div>

                <!-- Add Data module -->
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg"><i class = "fa fa-plus"></i> Add Data</button>

                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Add Expected Data</h4>
                      </div>

                      <div class = "modal-body">
                      <form class="form-horizontal form-label-left" method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                        <span class="section">Input for Expected Data Each Month</span>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Year <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="year" placeholder = "Input a year of analysis" required type="number" min="1900" max="2099" step="1" value="2019" />
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">January <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="jan" placeholder = "Input a monetary amount (e.g. 1000.00)" required type="number" required name="price" min="0" step=0.1 value = "0" />
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">February <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="feb"  placeholder = "Input a monetary amount (e.g. 1000.00)" required type="number" required name="price" min="0" step=0.1 value = "0" />
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">March <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="mar" placeholder = "Input a monetary amount (e.g. 1000.00)" required type="number" required name="price" min="0" step=0.1 value = "0"/>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">April <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="apr" placeholder = "Input a monetary amount (e.g. 1000.00)" required type="number" required name="price" min="0" step=0.1 value = "0"/>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">May <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="may" placeholder = "Input a monetary amount (e.g. 1000.00)" required type="number" required name="price" min="0" step=0.1 value = "0"/>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">June <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="jun" placeholder = "Input a monetary amount (e.g. 1000.00)" required type="number" required name="price" min="0" step=0.1 value = "0"/>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">July <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="jul" placeholder = "Input a monetary amount (e.g. 1000.00)" required type="number" required name="price" min="0" step=0.1 value = "0"/>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">August <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="aug" placeholder = "Input a monetary amount (e.g. 1000.00)" required type="number" required name="price" min="0" step=0.1 value = "0"/>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">September <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="sept" placeholder = "Input a monetary amount (e.g. 1000.00)" required type="number" required name="price" min="0" step=0.1 value = "0"/>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">October <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="oct" placeholder = "Input a monetary amount (e.g. 1000.00)" required type="number" required name="price" min="0" step=0.1 value = "0"/>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">November <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="nov" placeholder = "Input a monetary amount (e.g. 1000.00)" required type="number" required name="price" min="0" step=0.1 value = "0"/>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">December <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="customer" class="form-control col-md-7 col-xs-12" name="dec" placeholder = "Input a monetary amount (e.g. 1000.00)" required type="number" required name="price" min="0" step=0.1 value = "0"/>
                            <br>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-success btn-lg" name = "submit" value = "submit">Submit </button>
                            <button type="reset" class="btn btn-danger btn-lg">Reset </button>
                            <!-- php start -->
                            <?php
                            $year = $jan = $feb = $mar = $apr = $may = $jun = $jul = $aug = $sept = $oct = $nov = $dec = "";

                              if($_SERVER["REQUEST_METHOD"] == "POST")
                              {
                                $year = test_input($_POST['year']);
                                $jan = test_input($_POST['jan']);
                                $feb = test_input($_POST['feb']);
                                $mar = test_input($_POST['mar']);
                                $apr = test_input($_POST['apr']);
                                $may = test_input($_POST['may']);
                                $jun = test_input($_POST['jun']);
                                $jul = test_input($_POST['jul']);
                                $aug = test_input($_POST['aug']);
                                $sept = test_input($_POST['sept']);
                                $oct = test_input($_POST['oct']);
                                $nov = test_input($_POST['nov']);
                                $dec = test_input($_POST['dec']);

                                $expected = array($_POST['jan'], $_POST['feb'], $_POST['mar'], $_POST['apr'], $_POST['may'], $_POST['jun'], $_POST['jul'], $_POST['aug'], $_POST['sept'], $_POST['aug'], $_POST['nov'], $_POST['dec']);
                              }

                              function test_input($data) {
                                $data = trim($data);
                                $data = stripslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                             }
                            

                             
                             $test1 = array (112, 223, 334, 445, 445, 556, 775, 889)          
                            ?>
                            <!-- php end -->
                          </div>
                        </div>

                        
                        
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
                <!-- End Add Data Modal -->
                
                
                <!-- test -->
                <?php 
                // foreach ($_POST as $a)
                // echo $a;
                ?>



                <div class="row">
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Budget Graph</h2>
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
                        <canvas id="mybarChart"></canvas>
                      </div>
                    </div>
                  </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Current Analysis:  </h2>
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
  
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Planned Budget</th>
                            <th>Actual Budget</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">Total: </th>
                            <td>500,000</td>
                            <td>480,000</td>
                            
                          </tr>
                          <tr>
                            <th scope="row">Details:</th>
                            <td>250,000 </td>
                            <td>260,000</td>
                            
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>250,000</td>
                            <td> 220,000</td>
                            
                          </tr>
                        </tbody>
                      </table>
  
                    </div>
                  </div>
                </div>
          <br />

          

         
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

    <!-- Custom Theme Scripts -->
    <!-- <script src="../build/js/custom.min.js"></script>

    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <script src="../vendors/echarts/map/js/world.js"></script> -->
    
    <script>
        // Bar chart

      
      if ($('#mybarChart').length )
      { 

			  $(document).ready(function()
        {
        $.ajax({
          url: "http://localhost//GM-MIS/gentelella-master/globemaster/DataFetchers/DataTest.php",
          method: "GET",
          success: function(data) {
            console.log(data);
            var itemid = [];
            var itemname = [];
            var itemlabel = [];
            var itemprice = [];
            var itemcount = [];
            var itemcount1 = <?php echo json_encode($test1); ?>;
            var expected = <?php echo json_encode($expected); ?>;
            var variancearray = [];

            for(var i in data) 
            {
              itemid.push("Item " + data[i].item_id);
              itemname.push(data[i].item_name);
              itemlabel.push(data[i].item_name + "-" + "Item " + data[i].item_id);
              itemprice.push(data[i].price);
              itemcount.push(data[i].item_count);

              variancearray.push(Math.abs(data[i].price - expected[i]));

              console.log(variancearray);
            }
			  
            var ctx = document.getElementById("mybarChart");
            var mybarChart = new Chart(ctx, 
            {
              type: 'bar',
              data: 
              {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [{
                label: 'Actual Sales',
                backgroundColor: "#26B99A",
                data: itemprice},{
                label: 'Expected Sales',
                backgroundColor: "#273746",
                data: expected},{
                label: 'Sales Variance',
                backgroundColor: "#DF013A",
                data: variancearray}]
            },

              options: 
              {
                scales: 
                {
                  xAxes:[{stacked: true}],
                  yAxes: 
                  [{
                    ticks: 
                    {
                      beginAtZero: true
                    }
                  }]
                }
              }
            });
          }
        })
      })
    } 
    
  </script>
	
  </body>
</html>
