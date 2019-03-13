<?php
session_start();
$_SESSION['user'] = 1;
$user="";
if(!(isset($_SESSION['usertype']))){
    header("Location: http://".$_SERVER['HTTP_HOST'].
        dirname($_SERVER['PHP_SELF'])."/login.php");
}
?>

    <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title">
                <a href="MainDashboard.php" class="site_title"><img src="images/GM%20LOGO.png" width = "60px" height = "60px"><b>Globe Master</b></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
                <span>
                <?php
                  require_once('DataFetchers/mysql_connect.php');
                  $checkuser = "SELECT usertype, usertype_id FROM gm_usertype WHERE usertype_id = '{$_SESSION['usertype']}'";
                  $result=mysqli_query($dbc,$checkuser);
                  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                  //$_SESSION['usertype']=$row['usertype'];

                  $checkuser1 = "SELECT * FROM gm_users WHERE usertype_id = '{$_SESSION['usertype']}'";
                  $result1=mysqli_query($dbc,$checkuser1);
                  $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);


                $user=$row['usertype'];
                    echo "<br>";
                    echo "<h2>Welcome, ";
                    echo $row['usertype'];
                    echo "!</h2>";
                  
        
                ?>
                </span>
            </div>
            <!-- /menu profile quick info -->

            

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-archive"></i> Inventory <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php
                     
                      if($user == "MKT" or $user == "SALES" or $user == 'INV'){ 
                      echo "<li><a href='AddInventory.php'>Add Inventory Items</a></li>";
                        }
                     
                      if($user == "CFO" or $user == "MKT" or $user == "SALES" or $user == 'INV' or $user == 'CEO'){
                      echo "<li><a href='ViewInventory.php'>View Inventory</a></li>";
                        }
                      ?>
                      
                      <?php
                      if($user == 'CEO' or $user == 'CFO' or $user == 'MKT'){
                      echo "<li><a>Economic order Quantity (EOQ)<span class='fa fa-chevron-down'></span></a>";
                      echo "<ul class='nav child_menu'>";
                      if($user == 'CFO'){
                      echo    "<li><a href='index.html'>Input EOQ Details</a></li>";
                      
                      }
                      if($user == 'CEO' or $user == 'CFO' or $user == 'MKT'){
                      echo    "<li><a href='index2.html'>View Inventory EOQ</a></li>";
                      }
                      echo "</ul>"; 
                     echo "</li>";
                  }
                      ?>
                     
                      <?php
                      if($user == 'CEO' or $user == 'CFO' or $user == 'MKT'){
                      echo "<li><a href='index2.html'>Item Sales Visualization</a></li>";
                      }
                      ?>
                        
                    
                      <?php
                     if($user == 'MKT' or $user == 'SALES' or $user == 'INV'){
                  
                      echo "<li><a href='qrcodegeneration.php'>Generate QR Code</a></li>";
                      
                        }
                      ?>
                      <?php
                       if($user == 'CEO' or $user == 'CFO' or $user == 'MKT'){
                      
                      echo "<li><a href='index2.html'>Discounts</a></li>";
                      
                        }
                      ?>
                    </ul>
                  </li>

                  <?php
                     if($user == 'CEO' or $user == 'SALES' or $user == 'INV'){
                  

                  echo "<li><a><i class='fa fa-car'></i> Deliveries <span class='fa fa-chevron-down'></span></a>";
                  echo   "<ul class='nav child_menu'>";
                  if($user == 'CEO' or $user == 'SALES' or $user == 'INV'){
                  echo    "<li><a href='form_advanced.html'>View Deliveries</a></li>";
                }
                if($user == 'SALES'){
                  echo    "<li><a href='form_advanced.html'>Create Delivery Receipt</a></li>";
                }
                  echo   "</ul>";
                  echo "</li>";
                        }
                  ?>

                  <?php
                     if($user == 'MKT' or $user == 'SALES' or $user == 'INV'){
                  

                  echo "<li><a><i class='fa fa-external-link-square'></i> Orders <span class='fa fa-chevron-down'></span></a>";
                  echo "<ul class='nav child_menu'>";
                  if($user == 'MKT' or $user == 'SALES'){
                  echo    "<li><a href='Vieworders.php'>View orders</a></li>";
                }
                  if ($user == 'INV' or $user == 'MKT' or $user == 'SALES'){
                  echo    "<li><a href='ViewFabJoborders.php'>View Fabrication Job orders</a></li>";
                 
                }
                   echo  "</ul>";
                  echo "</li>";
                        }
                  ?>
                  <?php
                       if($user == 'CFO' or $user == 'MKT'){
                      echo "<li><a><i class='fa fa-user'></i> Clients <span class='fa fa-chevron-down'></span></a>";
                      echo  "<ul class='nav child_menu'>";
                
                      echo "<li><a href='ViewClients.php'>View Clients</a></li>";
                      
              
                      if($user == 'CFO'){
                        echo "<li><a href='ClientApproval.php'>Client Order Approval</a></li>";
                      
                        }
                        echo "</ul>";
                        echo "</li>";
                      }
                      ?>
                    <!--/ul>
                  </li-->

                  <?php
                     if($user == 'CEO' or $user == 'CFO' or $user == 'MKT'){
                  //echo "</ul>";
                  //echo "</li>";

                  echo "<li><a><i class='fa fa-bar-chart-o'></i> Data Analytics <span class='fa fa-chevron-down'></span></a>";
                  echo   "<ul class='nav child_menu'>";
                  echo     "<li><a> Sales <span class='fa fa-chevron-down'></span></a>";
                  echo       "<ul class='nav child_menu'>";
                  echo         "<li><a href='index.html'>Sales Variance Analysis</a></li>";
                  echo         "<li><a href='index2.html'>Sales Forecasting</a></li>";
                  echo       "</ul>";
                  echo    "</li>";
                  echo    "<li><a> Inventory <span class='fa fa-chevron-dow'></span></a>";
                  echo        "<ul class='nav child_menu'>";
                  echo            "<li><a href='index2.html'>Inventory Forecasting</a></li>";
                  echo         "</ul>";
                  echo    "</li>";
                  echo   "</ul>";
                  echo "</li>";

                  
                        }
                  ?>

                  <?php
                      if($user == 'CEO' or $user == 'CFO' or $user == 'MKT'){
                  

                  echo "<li><a><i class='fa fa-folder-open'></i> Reports <span class='fa fa-chevron-down'></span></a>";
                  echo   "<ul class='nav child_menu'>";
                  echo     "<li><a href='fixed_sidebar.html'>Inventory Report</a></li>";
                  echo    "<li><a href='fixed_footer.html'>Sales Report</a></li>";
                  echo    "<li><a href='fixed_footer.html'>Delivery Report</a></li>";
                  echo   "</ul>";
                  echo "</li>";

                        }
                  ?>

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
                    <img src="images/img.jpg" alt="">
                    <?php
                  require_once('DataFetchers/mysql_connect.php');
                  $checkuser = "SELECT usertype, usertype_id FROM gm_usertype WHERE usertype_id = '{$_SESSION['usertype']}'";
                  $result=mysqli_query($dbc,$checkuser);
                  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                  //$_SESSION['usertype']=$row['usertype'];

                  $checkuser1 = "SELECT * FROM gm_users WHERE usertype_id = '{$_SESSION['usertype']}'";
                  $result1=mysqli_query($dbc,$checkuser1);
                  $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                    echo $row['usertype'];
                    echo "  ";
                  
        
                ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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

<style>

    h1{
        color: white;
        text-align: left;
    }
    h2{
        color: white;
        text-align: left;
    }
    
</style>    