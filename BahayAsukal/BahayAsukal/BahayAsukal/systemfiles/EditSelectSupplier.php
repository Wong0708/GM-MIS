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
    $name = $_POST['name'];
    $telephone = $_POST['telephone'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $suppID = $_SESSION['editID'];        
    
    
    require_once('mysql_connect.php');
    $query="UPDATE supplier SET supplierName = '{$name}' WHERE supplierID = '{$suppID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE supplier SET supp_telephone = '{$telephone}' WHERE supplierID = '{$suppID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE supplier SET supp_mobile = '{$mobile}' WHERE supplierID = '{$suppID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE supplier SET supp_address = '{$address}' WHERE supplierID = '{$suppID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE supplier SET supp_email = '{$email}' WHERE supplierID = '{$suppID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE supplier SET status = '{$status}' WHERE supplierID = '{$suppID}'";
    $result=mysqli_query($dbc,$query);
    header("Location: http://".$_SERVER['HTTP_HOST'].
                dirname($_SERVER['PHP_SELF'])."/EditSuppliers.php");
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
                    <h2>Edit Supplier</h2>
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
                            $query = "SELECT * FROM supplier WHERE supplierID = '{$_SESSION['editID']}'";
                            $result1=mysqli_query($dbc,$query);
                            $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);

                        
                        ?>
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edit Supplier Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" name="name" value="<?php echo $row1['supplierName'] ?>" onkeyup="checkSupplierName();">
                        </div>
                          <label for="middle-name" id="inventoryexist" class="control-label red"></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Edit Supplier Telephone<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="telephone"  class="form-control col-md-7 col-xs-12" value="<?php echo $row1['supp_telephone'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Edit Supplier Mobile Number<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="int" name="mobile" value="<?php echo $row1['supp_mobile'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Edit Supplier Address<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="double" name="address" value="<?php echo $row1['supp_address'] ?>">
                        </div>
                      </div>
                        <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Edit Supplier email<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="email" name="email" value="<?php echo $row1['supp_email'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Edit Supplier Status<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="status" value="<?php echo $row1['status'] ?>">
                        </div>
                      </div>    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="EditSuppliers.php"><button class="btn btn-primary" type="button">Cancel</button></a>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button class="btn btn-primary" type="submit" name="save" id="save">Save Changes</button>
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
      
    <script>
        
            function checkSupplierName(){

            let name = document.getElementById("name").valueOf().value;
            
            $.ajax({
                type: 'POST',
                url: "ajax/checkSupplierName.php",
                data:{
                    name: name
                },
                success: function(result){
                    if(result == 0)
                        {
                            document.getElementById("inventoryexist").innerHTML = "Supplier already exists!";
                            document.getElementById("save").disabled = true;
                        }
                    if(result == 1)
                        {
                            document.getElementById("inventoryexist").innerHTML = "";
                            document.getElementById("save").disabled = false;
                        }
                    //alert(result);
            }});
        }
            
            
        </script>

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