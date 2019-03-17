<?php
session_start();
$_SESSION['user'] = 1;
if(!(isset($_SESSION['usertype']))){
    header("Location: http://".$_SERVER['HTTP_HOST'].
        dirname($_SERVER['PHP_SELF'])."/login.php");
}
?>
<script type="text/javascript"> 
  function display_c(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct()',refresh)
  }

  function display_ct() {
    var x = new Date()
    document.getElementById('ct').innerHTML = x;
    tt=display_c();
 }
 
</script>
    <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="MainDashboard.php" class="site_title"><img src="images/GM%20LOGO.png" width = "50" height = "50" onload = "display_ct()"><b>Globe Master</b></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>
                <?php
                  require_once('DataFetchers/mysql_connect.php');
                  $checkuser = "SELECT usertype FROM gm_usertype WHERE usertype_id = '{$_SESSION['usertype']}'";
                  $result=mysqli_query($dbc,$checkuser);
                  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

                  $checkuser1 = "SELECT * FROM gm_users WHERE usertype_id = '{$_SESSION['usertype']}'";
                  $result1=mysqli_query($dbc,$checkuser1);
                  $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
              
                    echo "<h2>Welcome, ";
                    echo $row1['first_name']." ".$row1['last_name'];
                    echo "!</h2>";  
                    echo "<b>";
                    echo $row['usertype'];
                    echo "</b>";
                  
        
                ?>
                </span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-archive"></i> Inventory <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="AddInventory.php">Add Inventory Items</a></li>
                      <li><a href="ViewInventory.php">View Inventory</a></li>
                      <li><a href="index2.html">Economic Order Quantity (EOQ)</a></li>
                      <ul class="nav child_menu">
                          <li><a href="index.html">Input EOQ Details</a></li>
                          <li><a href="index2.html">View Inventory EOQ</a></li>
                      </ul>
                      <li><a href="index2.html">Item Sales Visualization</a></li>
                      <li><a href="qrcodegeneration.php">Generate QR Code</a></li>
                      <li><a href="index2.html">Discounts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-car"></i> Deliveries <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_advanced.html">View Deliveries</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-external-link-square"></i> Orders <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ViewOrders.php">View Orders</a></li>
                      <li><a href="ViewFabJobOrders.php">View Fabrication Job Orders</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Clients <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ViewClients.php">View Clients</a></li>
                      <li><a href="tables_dynamic.html">Client Order Approval</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Analytics <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a> Sales <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="index.html">Sales Variance Analysis</a></li>
                          <li><a href="index2.html">Sales Forecasting</a></li>
                        </ul>
                      </li>
                      <li><a> Inventory <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <li><a href="index2.html">Inventory Forecasting</a></li>
                          </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-folder-open"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Inventory Report</a></li>
                      <li><a href="fixed_footer.html">Sales Report</a></li>
                      <li><a href="fixed_footer.html">Delivery Report</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
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
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
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
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                
            <div id='ct' class="monika" style="font-size:120%"></div>
                
                <!-- <li role="presentation" class="dropdown">
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
                    </li> -->
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        
        <!-- /top navigation -->

<!-- Clock Script -->
