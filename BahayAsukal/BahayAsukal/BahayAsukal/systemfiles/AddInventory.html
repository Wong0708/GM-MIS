<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];


if(isset($_POST['add']))
{
    $name = $_POST['name'];
    
    $materialID = $_POST['materialType'];
    
    $measurementAmountPerStock = $_POST['measurementAmountPerStock'];
    
    $supplierID = $_POST['supplierID'];
    
    $price = $_POST['price'];
    
        require_once('mysql_connect.php');
        $query="SELECT inventoryName from inventory where inventoryName= '{$name}'";
        $result=mysqli_query($dbc,$query);
        if ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
            echo "<script> alert('Inventory already exists'); </script>";
        }else{
              $query="INSERT INTO inventory(inventoryID, materialID, supplierID, inventoryName, measurementAmountPerStock, price, quantity)
                VALUES(nextInventoryID(), '$materialID', '$supplierID', '$name', '$measurementAmountPerStock', '$price', 0)";
                $result=mysqli_query($dbc,$query);
                echo "<script> alert('Inventory added'); </script>";
        }
        
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
                                    <h1 align="center">Add New Inventory</h1>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="inventoryname" required="required" class="form-control col-md-7 col-xs-12" name="name" onkeyup="checkInventoryName();">
                                            </div>
                                            <label for="middle-name" id="inventoryexist" class="control-label red"></label>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Material Type</label>
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier</label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <select class="form-control" name="supplierID">
                                                <?php

                                                    require_once('mysql_connect.php');
                                                    $query="SELECT supplierID, supplierName FROM supplier WHERE status = 'Active'";
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Amount Per Material <span class="required">*</span>
                        </label>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <input type="text" id="last-name" name="measurementAmountPerStock" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Price <span class="required">*</span>
                                            </label>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <input type="float" id="last-name" name="price" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button class="btn btn-success" name="add" id="addinventory">Add Inventory</button>
                                                <a href="ViewInventory.php"><button class="btn btn-danger" type="button">Cancel</button></a>
                                                <button class="btn btn-primary" type="reset">Reset</button>
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
                            document.getElementById("addinventory").disabled = true;
                        }
                    if(result == 1)
                        {
                            document.getElementById("inventoryexist").innerHTML = "";
                            document.getElementById("addinventory").disabled = false;
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
