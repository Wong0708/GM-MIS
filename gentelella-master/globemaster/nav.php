<?php

if(!(isset($_SESSION['usertype']))){
    header("Location: http://".$_SERVER['HTTP_HOST'].
        dirname($_SERVER['PHP_SELF'])."/login.php");
}
if($_SESSION['user_status'] == "Active - New Account" AND $_SERVER['REQUEST_URI'] != "/Sugarhouse/systemfiles/NewAccount.php" ){
    header("Location: http://".$_SERVER['HTTP_HOST'].
        dirname($_SERVER['PHP_SELF'])."/NewAccount.php");
}

?>
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-home"></i> <span>Sugarhouse</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION["fullname"]; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info --> 

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    
                    <?php
                    if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1){
                    ?>
                    
                  <li><a><i class="fa fa-list-alt"></i> Orders <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="CreateOrder.php">Create Order Form</a></li>
                      <li><a href="ViewOrder.php">View Orders</a></li>
                      <li><a href="EditOrders.php">Edit Orders</a></li>
                    </ul>
                  </li>
                    
                    <?php
                    }
                    ?>
                
                  <li><a><i class="fa fa-archive"></i> Inventory<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        
                        <?php
                        if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1 OR $_SESSION['jobID'] == 4 OR $_SESSION['jobID'] == 5){
                        ?>
                        
                        <li><a>Materials<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              
                            <li class="sub_menu"><a href="ViewMaterials.php">View Materials</a>
                            </li>
                              
                            <?php
                            if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1 OR $_SESSION['jobID'] == 4){
                            ?>
                              
                            <li class="sub_menu"><a href="AddMaterials.php">Add Materials</a>
                            </li>
                              
                            <li class="sub_menu"><a href="EditMaterials.php">Edit Materials</a>
                            </li> 
                              
                            <?php
                            }
                            ?>
                              
                          </ul>
                        </li>
                        
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1 OR $_SESSION['jobID'] == 4 OR $_SESSION['jobID'] == 5){
                        ?>
                        
                        <li><a>Inventory<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              
                            <li class="sub_menu"><a href="ViewInventory.php">View Inventory</a>
                            </li>
                              
                            <?php
                            if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1 OR $_SESSION['jobID'] == 4){
                            ?>
                              
                            <li class="sub_menu"><a href="AddInventory.php">Add Inventory</a>
                            </li>
                              
                            <li class="sub_menu"><a href="EditInventory.php">Edit Inventory</a>
                            </li> 
                              
                            <?php
                            }
                            ?>
                              
                          </ul>
                        </li>
                        
                        <?php
                        }
                        ?>
                        
                        <li><a>Products<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              
                            <li class="sub_menu"><a href="ViewProducts.php">View Products</a>
                            </li>
                              
                            <?php
                            if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1 OR $_SESSION['jobID'] == 4){
                            ?>
                              
                            <li class="sub_menu"><a href="AddProducts.php">Add Products</a>
                            </li>
                              
                            <li class="sub_menu"><a href="EditProducts.php">Edit Products</a>
                            </li>
                              
                            <?php
                            }
                            ?>
                              
                          </ul>
                        </li>
                        
                        <?php
                        if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1 OR $_SESSION['jobID'] == 4 OR $_SESSION['jobID'] == 5){
                        ?>
                        
                        <li><a>Restock Inventory<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              
                            <?php
                            if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1 OR $_SESSION['jobID'] == 4){
                            ?>
                              
                            <li class="sub_menu"><a href="CreatePO.php">Create Purchase Order</a>
                            </li>
                              
                            <li class="sub_menu"><a href="ReceivePurchaseOrders.php">Receive Purchase Orders</a>
                            </li>
                              
                            <?php
                            }
                            ?>
                              
                            <li class="sub_menu"><a href="ViewPurchaseOrders.php">View Purchase Orders</a>
                            </li> 
                              
                          </ul>
                        </li>
                        
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1 OR $_SESSION['jobID'] == 4 OR $_SESSION['jobID'] == 5){
                        ?>
                        
                        <li><a>Suppliers<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              
                            <li class="sub_menu"><a href="ViewSuppliers.php">View Suppliers</a>
                            </li>
                              
                            <?php
                            if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1 OR $_SESSION['jobID'] == 4){
                            ?>
                              
                            <li class="sub_menu"><a href="AddSupplier.php">Add Supplier</a>
                            </li>
                              
                            <li class="sub_menu"><a href="EditSuppliers.php">Edit Suppliers</a>
                            </li>  
                              
                            <?php
                            }
                            ?>
                              
                          </ul>
                        </li>
                        
                        <?php
                        }
                        ?>
                        
                    </ul>
                  </li> 
                          
                  <?php
                  if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1 OR $_SESSION['jobID'] == 2){
                  ?>
                
                  <li><a><i class="fa fa-folder-open-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        
                      <li><a href="SalesReport.php">View Sales Report</a></li>
                        
                      <?php
                      if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1){
                      ?>
                        
                      <li><a href="InventoryReport.php">View Inventory Report</a></li>
                        
                      <?php
                      }
                      ?>
                        
                    </ul>
                  </li>

                  <li><a><i class="fa fa-users"></i> Accounts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        
                      <?php
                      if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1){
                      ?>
                        
                      <li><a active href="RegisterUser.php">Register Account</a></li>
                        
                      <?php
                      }
                      ?>
                        
                      <li><a  href="ViewAccounts.php">View Accounts</a></li>
                        
                      <?php
                      if($_SESSION['jobID'] == 1 OR $_SESSION['jobID'] == 6 OR $_SESSION['usertype'] == 1){
                      ?>
                        
                      <li><a href="EditAccounts.php">Edit Accounts</a></li>
                        
                      <?php
                      }
                      ?>
                        
                    </ul>
                  </li> 
                    
                  <?php
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
              <a data-toggle="tooltip" data-placement="top" title="Logout" onclick="destroySession();">
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
                    <img src="images/user.png" alt=""><?php echo $_SESSION["fullname"]; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a data-toggle="modal" data-target=".bs-example-modal-lg">
                        <span>Change Password</span>
                      </a>
                    </li>
                    <li><a onclick="destroySession();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- Change password modal -->

          <div id="modalChangePassword" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Edit Password</h4>
                </div>
                <div class="modal-body">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Old Password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="oldPassword" required="required" class="form-control col-md-7 col-xs-12" name="oldPassword" value="">
                            </div>
                            <label class="control-label red" id="oldPasswordLabel" for="first-name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New Password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="newPassword" required="required" class="form-control col-md-7 col-xs-12" name="newPassword" value="">
                            </div>
                            <label class="control-label red" id="newPasswordLabel" for="first-name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Repeat New Password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="repeatPassword" required="required" class="form-control col-md-7 col-xs-12" name="repeatPassword" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" id="closeEditPassword" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="changePassword();">Save changes</button>
                </div>
              </div>
            </div>
          </div>

    <script>

    function changePassword() {
        let oldPassword = document.getElementById("oldPassword").valueOf().value;
        let newPassword = document.getElementById("newPassword").valueOf().value;
        let repeatPassword = document.getElementById("repeatPassword").valueOf().value;
        $.ajax({
            type: 'POST',
            url: "ajax/changePassword.php",
            data:{
                oldPassword: oldPassword,
                newPassword: newPassword,
                repeatPassword: repeatPassword
            },
            success: function(result){
                document.getElementById("oldPassword").valueOf().value = "";
                document.getElementById("newPassword").valueOf().value = "";
                document.getElementById("repeatPassword").valueOf().value = "";

                if(result == 1) {
                    document.getElementById("oldPasswordLabel").innerHTML = "Old password is invalid!";
                    document.getElementById("newPasswordLabel").innerHTML = "";
                }
                else if(result == 2) {
                    document.getElementById("oldPasswordLabel").innerHTML = "";
                    document.getElementById("newPasswordLabel").innerHTML = "Passwords do not match!";
                }
                else if(result == 3){
                    alert("Successfully changed your password.");
                    document.getElementById("oldPasswordLabel").innerHTML = "";
                    document.getElementById("newPasswordLabel").innerHTML = "";
                    document.getElementById("closeEditPassword");
                }
            }});
        }

    function destroySession(){

        $.ajax({
            type: 'POST',
            url: "ajax/destroySession.php",
            success: function(result){
                window.location.href = "login.php";
            }
        });
    }

</script>