<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];


$query = "SELECT * FROM inventory WHERE inventoryID = '{$_SESSION['editID']}'";
$result1=mysqli_query($dbc,$query);
$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);

if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $materialType = $_POST['materialType'];
    $supplierID = $_POST['supplierID'];
    $measurementAmountPerStock = $_POST['measurementAmountPerStock'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $inventoryID = $_SESSION['editID'];        
    $expdate = $_POST['expdate'];
    
    
    require_once('mysql_connect.php');
    $query="UPDATE  inventory 
                SET     inventoryName = '{$name}',
                        quantity = '{$quantity}',
                        materialID = '{$materialType}',
                        measurementAmountPerStock = '{$measurementAmountPerStock}',
                        supplierID = '{$supplierID}',
                        price = '{$price}',
                        lastEdit = NOW(),
                        exp_date = '{$expdate}'
              WHERE     inventoryID = '{$inventoryID}'";
    $result=mysqli_query($dbc,$query);
    header("Location: http://".$_SERVER['HTTP_HOST'].
                dirname($_SERVER['PHP_SELF'])."/EditInventory.php");
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
                    <h2>Edit Inventory</h2>
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
                            $query = "SELECT * FROM inventory WHERE inventoryID = '{$_SESSION['editID']}'";
                            $result1=mysqli_query($dbc,$query);
                            $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);

                        
                        ?>
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edit Inventory Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="inventoryname" required="required" class="form-control col-md-7 col-xs-12" name="name" value="<?php echo $row1['inventoryName'] ?>" onkeyup="checkInventoryName();">
                        </div>
                          <label for="middle-name" id="inventoryexist" class="control-label red"></label>
                      </div>
                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit Material Type</label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <select class="form-control" name="materialType">
                        <?php
                            
                            require_once('mysql_connect.php');
                            $query="SELECT materialID, materialName FROM raw_material";
                            $result=mysqli_query($dbc,$query);
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            ?> <option value="<?php echo $row['materialID']?>"><?php echo $row["materialName"]; ?> </option> <?php
                            }
                            ?>     
                        </select>
                                <a href="AddMaterials.php">Add New Material</a>
                                            </div>
                                        </div>
                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit Supplier</label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <select class="form-control" name="supplierID">
                                                <?php

                                                    require_once('mysql_connect.php');
                                                    $query="SELECT supplierID, supplierName FROM supplier WHERE status='Active'";
                                                    $result=mysqli_query($dbc,$query);
                                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                    ?> <option value="<?php echo $row['supplierID']?>"><?php echo $row["supplierName"]; ?> </option> <?php
                                                    }
                                                    ?>     
                                                </select>
                                                <a href="AddSupplier.php">Add New Supplier</a>
                                            </div>
                                        </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Edit Measurement Amount Per Stock<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="measurementAmountPerStock" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row1['measurementAmountPerStock'] ?>">
                        </div>
                      </div>
                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Price <span class="required">*</span>
                        </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="last-name" name="price" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row1['price'] ?>">
                                            </div>
                                        </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Edit Quantity<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="int" name="quantity" value="<?php echo $row1['quantity'] ?>">
                        </div>
                      </div>
                        
                        
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Update Expiration Date<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="int" name="expdate" value="<?php echo $row1['exp_date'] ?>">
                        </div>
                        </div>      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="EditInventory.php"><button class="btn btn-primary" type="button">Cancel</button></a>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button class="btn btn-primary" type="submit" name="save" id="edit">Save Changes</button>
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
        
            function checkInventoryName(){

            let inventoryname = document.getElementById("inventoryname").valueOf().value;

            $.ajax({
                type: 'POST',
                url: "ajax/checkInventory.php",
                data:{
                    inventoryname: inventoryname
                },
                success: function(result){
                    if(result == 0)
                        {
                            document.getElementById("inventoryexist").innerHTML = "Inventory already exists!";
                            document.getElementById("edit").disabled = true;
                        }
                    if(result == 1)
                        {
                            document.getElementById("inventoryexist").innerHTML = "";
                            document.getElementById("edit").disabled = false;
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