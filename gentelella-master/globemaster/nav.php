<?php
ob_start();
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
                <a href="MainDashboard.php" class="site_title"><img src="images/GM%20LOGO.png" width = "50px" height = "50px"><font face="Couture Bold Italic" size="4" color="#1D2B51">Globe Master</font></a>
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
                  $checkuser = "SELECT usertype, usertype_id FROM gm_usertype WHERE usertype_id = '{$_SESSION['usertype']}'";
                  $result=mysqli_query($dbc,$checkuser);
                  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                  //$_SESSION['usertype']=$row['usertype'];

                  $checkuser1 = "SELECT * FROM gm_users WHERE usertype_id = '{$_SESSION['usertype']}'";
                  $result1=mysqli_query($dbc,$checkuser1);
                  $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);


                $user=$row['usertype'];
                    echo "<h2><font face='Couture Bold Italic'>Welcome, ";
                    echo $row['usertype'];
                    echo "</font></h2>";
                  
        
                ?>
                </span>
              </div><br><hr>
            </div><br>
            <!-- /menu profile quick info -->

            

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-archive"></i> Inventory <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php
                     
                      if($user == "MKT" or $user == "SALES" or $user == 'INV'){ 
                      echo "<li><a href='AddInventory.php'>Add Inventory Item</a></li>";
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
<<<<<<< HEAD
                      echo    "<li><a href='InputPage.php'>Input EOQ Details</a></li>";
=======
                      echo    "<li><a href='EOQ Input.php'>Input EOQ Details</a></li>";
>>>>>>> b5f0f9aa26b5232145e116b48ef4bc25a1278e8c
                      
                      }
                      if($user == 'CEO' or $user == 'CFO' or $user == 'MKT'){
                      echo    "<li><a href='EOQInventory.php'>View Inventory EOQ</a></li>";
                      }
                      echo "</ul>"; 
                     echo "</li>";
                  }
                      ?>
                     
                      <?php
                      if($user == 'CEO' or $user == 'CFO' or $user == 'MKT'){
                      echo "<li><a>Item Sales Visualization</a></li>";
                      }
                      ?>
                        
                    
                      <?php
                     if($user == 'MKT' or $user == 'SALES' or $user == 'INV'){
                  
                      echo "<li><a href='qrcodegeneration.php'>Generate QR Code</a></li>";
                      
                        }
                      ?>
                      <?php
                       if($user == 'CEO' or $user == 'CFO' or $user == 'MKT'){
                      
<<<<<<< HEAD
                      echo "<li><a>Discounts</a></li>";
=======
                      echo "<li><a href='ItemDiscounts.php'>Discounts</a></li>";
>>>>>>> b5f0f9aa26b5232145e116b48ef4bc25a1278e8c
                      
                        }
                      ?>
                    </ul>
                  </li>

                  <?php
                     if($user == 'CEO' or $user == 'SALES' or $user == 'INV'){
                  

                  echo "<li><a><i class='fa fa-car'></i> Deliveries <span class='fa fa-chevron-down'></span></a>";
                  echo   "<ul class='nav child_menu'>";
                  if($user == 'CEO' or $user == 'SALES' or $user == 'INV'){
<<<<<<< HEAD
                  echo    "<li><a href='Delivery Receipt.php'>View Deliveries</a></li>";
                }
                if($user == 'SALES'){
                  echo    "<li><a href='CreateDeliveryReceipt.php'>Create Delivery Receipt</a></li>";
=======
                  echo    "<li><a href='Deliveries.php'>View Deliveries</a></li>";
                }
                if($user == 'SALES'){
                  echo    "<li><a href='CreateDeliveryReceipt.php'>Generate Delivery Receipt</a></li>";
>>>>>>> b5f0f9aa26b5232145e116b48ef4bc25a1278e8c
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
                  echo    "<li><a href='ViewOrders.php'>View Orders</a></li>";
                }
                  if ($user == 'INV' or $user == 'MKT' or $user == 'SALES'){
                  echo    "<li><a href='ViewFabJobOrders.php'>View Fabrication Job Orders</a></li>";
                 
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
<<<<<<< HEAD
                      echo "<li><a href='ClientApproval.php'>Client Order Approval</a></li>";
=======
                        echo "<li><a href='ClientApproval.php'>Client Order Approval</a></li>";
>>>>>>> b5f0f9aa26b5232145e116b48ef4bc25a1278e8c
                      
                        }
                        echo "</ul>";
                        echo "</li>";
                      }
                      ?>


                  <?php
                     if($user == 'CEO' or $user == 'CFO' or $user == 'MKT'){
                  

                  echo "<li><a><i class='fa fa-bar-chart-o'></i> Data Analytics <span class='fa fa-chevron-down'></span></a>";
                  echo   "<ul class='nav child_menu'>";
                  echo     "<li><a> Sales <span class='fa fa-chevron-down'></span></a>";
                  echo       "<ul class='nav child_menu'>";
<<<<<<< HEAD
                  echo         "<li><a>Sales Variance Analysis</a></li>";
                  echo         "<li><a>Sales Forecasting</a></li>";
=======
                  echo         "<li><a href='index.html'>Sales Variance Analysis</a></li>";
                  echo         "<li data-toggle='modal' data-target='.bs-example-modal-sm'><a>Sales Forecasting</a></li>";
>>>>>>> b5f0f9aa26b5232145e116b48ef4bc25a1278e8c
                  echo       "</ul>";
                  echo    "</li>";
                  echo    "<li><a> Inventory <span class='fa fa-chevron-dow'></span></a>";
                  echo        "<ul class='nav child_menu'>";
<<<<<<< HEAD
                  echo            "<li><a>Inventory Forecasting</a></li>";
=======
                  echo            "<li><a href='InventoryForecasting.php'>Inventory Forecasting</a></li>";
>>>>>>> b5f0f9aa26b5232145e116b48ef4bc25a1278e8c
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
                  echo     "<li><a>Inventory Report</a></li>";
<<<<<<< HEAD
                  echo    "<li><a>Sales Report</a></li>";
                  echo    "<li><a>Delivery Report</a></li>";
=======
                  echo    "<li><a href='SalesReport.php'>Sales Report</a></li>";
                  echo    "<li><a href='DeliveryReport.php'>Delivery Report</a></li>";
>>>>>>> b5f0f9aa26b5232145e116b48ef4bc25a1278e8c
                  echo   "</ul>";
                  echo "</li>";

                        }
                  ?>
              
              
            
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->


            <!-- Modal Trigger -->
            <!-- Small modal -->
                   <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button> -->

            

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

        <!-- Custom Fonts -->
    <style>
        
        @font-face {
        font-family: "Couture Bold Italic";
        src: url("css/fonts/couture-bldit.otf");
        }
        
        .navbar nav_title {
            font-family: 'COUTURE Bold', Arial, sans-serif;
            font-weight:normal;
            font-style:normal;
            color: #1D2B51;
            }

    </style>    