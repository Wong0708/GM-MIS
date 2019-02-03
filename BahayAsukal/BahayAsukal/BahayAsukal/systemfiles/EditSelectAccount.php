<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];

if(isset($_POST['save']))
{
    
    require_once('mysql_connect.php');
    $query="SELECT usertypeID FROM ref_usertype WHERE usertype = '{$_POST['position']}'";
    $result1=mysqli_query($dbc,$query);
    $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
    $position = $row1['usertypeID'];
    
    $query="SELECT branchID FROM branch WHERE branch = '{$_POST['branch']}'";
    $result12=mysqli_query($dbc,$query);
    $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $branch = $row1['branchID'];
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $branch = $_POST['branch'];
    $username = $_POST['username'];  
    $mobile = $_POST['mobileno'];
    $residence = $_POST['residence'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $userID = $_SESSION['editID'];        
    
    
    require_once('mysql_connect.php');
    $query="UPDATE user SET first_name = '{$fname}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET last_name = '{$lname}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET middle_name = '{$mname}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET usertypeID = '{$position}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET branchID = '{$branch}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET username = '{$username}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET mobileno = '{$mobile}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET residence = '{$residence}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET emailaddress = '{$email}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET status = '{$status}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    header("Location: http://".$_SERVER['HTTP_HOST'].
                dirname($_SERVER['PHP_SELF'])."/EditAccounts.php");
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

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Account</h2>
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
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">

                        <?php
                        
                            require_once('mysql_connect.php');
                            $query = "SELECT * FROM user WHERE userID = '{$_SESSION['editID']}'";
                            $result1=mysqli_query($dbc,$query);
                            $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);

                        
                        ?>
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edit Last Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="lname" value="<?php echo $row1['last_name'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edit First Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="fname" value="<?php echo $row1['first_name'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edit Middle Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="mname" value="<?php echo $row1['middle_name'] ?>">
                        </div>
                      </div>    
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit Position</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name ="position" >
                            <?php

                                require_once('mysql_connect.php');
                                $query="SELECT usertype FROM ref_usertype";
                                $result=mysqli_query($dbc,$query);
                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                ?> <option><?php echo $row["usertype"]; ?> </option> <?php
                                }
                                ?>     
                            </select><br>
                          </div> 
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit Branch</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name ="branch" >
                        <?php
                            
                            require_once('mysql_connect.php');
                            $query="SELECT branchName FROM branch";
                            $result=mysqli_query($dbc,$query);
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            ?> <option><?php echo $row["branchName"]; ?> </option> <?php
                            }
                            ?>     
                        </select><br>
                      </div> 
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Edit Username<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="double" name="username" value="<?php echo $row1['username'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Edit Mobile Number<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="double" name="mobileno" value="<?php echo $row1['mobileNo'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Edit Residence<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="double" name="residence" value="<?php echo $row1['residence'] ?>">
                        </div>
                      </div>        
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Edit Email Address<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="double" name="email" value="<?php echo $row1['emailaddress'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Edit User Status<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="double" name="status" value="<?php echo $row1['user_status'] ?>">
                        </div>
                      </div>         
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button class="btn btn-primary" type="submit" name="save">Save Changes</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->

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
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
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
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>