<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];

$disabled = "";


if(isset($_POST['add']))
{
    if(!isset($_SESSION['materialArray']) || count($_SESSION['materialArray']) == 0){
        echo '<script>alert("No ingredients added");</script>';
    }
    else{
        require_once('mysql_connect.php');
        $query="SELECT mydb.nextProductID() AS 'productID';";
        $result=mysqli_query($dbc,$query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $productID = $row['productID'];

        $name = $_POST['productname'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $query="INSERT INTO product(productID, productName, productDesc, productCost)
                VALUES('$productID', '$name', '$desc', '$price')";
        $result=mysqli_query($dbc,$query);

        $ctr = 0;
        if(isset($_SESSION['materialArray'])) {
            while ($ctr < count($_SESSION['materialArray'])) {
                $query="INSERT INTO ingredients(productID, materialID, qtyNeeded)
                        VALUES('$productID', ".$_SESSION['materialArray'][$ctr].",".$_SESSION['quantityArray'][$ctr].");";
                $result=mysqli_query($dbc, $query);

                $ctr++;
            }
        }
        unset($_SESSION['materialArray']);
        unset($_SESSION['quantityArray']);
    }
}

if(isset($_SESSION['materialArray']))
    unset($_SESSION['materialArray']);

if(isset($_SESSION['quantityArray']))
    unset($_SESSION['quantityArray']);

if(!isset($_SESSION['materialArray'])){
    $_SESSION['materialArray'] = array();
}

if(!isset($_SESSION['quantityArray'])){
    $_SESSION['quantityArray'] = array();
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
                                        <h2>Add Product</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />
                                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">*</span>
                        </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="productname" name="productname" required="required" class="form-control col-md-7 col-xs-12" value="" onkeyup="checkProduct();">
                                                </div>
                                                <label for="middle-name" id="productExist" class="control-label red"></label>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Product Description <span class="required">*</span>
                        </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="last-name" name="desc" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Price<span class="required">* ₱</span></label>
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <input id="price" class="form-control col-md-7 col-xs-12" type="float" step="any" name="price" onkeyup="setDecimalValue()">
                                                </div>
                                            </div>

                                            <h2>Add Product Materials</h2>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg1"><i class="fa fa-plus"></i> Add Material</button>

                                            <div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                                                            <h4 class="modal-title" id="myModalLabel">Materials</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Select Material <a href="AddMaterials.php"><i class="fa fa-plus"></i></a></h4>
                                                            <select id="materialType" class="form-control" name="materialType">
                        <?php
                            
                            require_once('mysql_connect.php');
                            $query="SELECT * FROM raw_material";
                            $result=mysqli_query($dbc,$query);
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            ?> <option value="<?php echo $row['materialID']?>"><?php echo $row["materialName"]; echo " | Measurement: "; echo $row["uom"] ?> </option> <?php
                            }
                            ?>     
                        </select>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="middle-name">Quantity of Measurement</label>
                                                                <input id="quantity" class="form-control col-md-3 col-xs-12" type="double">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" onclick="addMaterial();"> <?php echo $disabled ?> <i class="fa fa-plus"></i> Add Material</button> <label for="middle-name"><?php echo $row['uom'] ?></label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div id="materialTable">
                                                <?php
                    if(isset($_SESSION['materialArray']) AND isset($_SESSION['quantityArray'])){
                        $table ='
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                                <th>Material</th>
                                <th>Material Measurement</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>';

                        $ctr = 0;
                        if(isset($_SESSION['materialArray'])) {
                            while ($ctr < count($_SESSION['materialArray'])) {
                                $queryMaterial = 'SELECT materialName, uom FROM raw_material WHERE materialID =' . $_SESSION['materialArray'][$ctr] . ';';
                                $resultMaterial = mysqli_query($dbc, $queryMaterial);
                                $rowMaterial = mysqli_fetch_array($resultMaterial, MYSQLI_ASSOC);
                                $materialName = $rowMaterial['materialName'];
                                $uom = $rowMaterial['uom'];

                                $table = $table . '<tr>';
                                $table = $table . '<td>' . $materialName . '</td><td>' . $_SESSION['quantityArray'][$ctr]  . $uom . '</td><td><button type="button" onclick="removeMaterial('.$ctr.');" class="btn btn-danger">Delete</button></td>';
                                $table = $table . '<input type="hidden" name="id" value="' . $ctr . '">';
                                $table = $table . '</tr>';
                                $ctr++;
                            }
                        }

                        $table = $table.'
                          </tbody>
                        </table>  
                        ';
                        echo $table;
                    }
                    else{
                        echo '
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                                <th>Material</th>
                                <th>Material Measurement</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td></td><td></td><td></td><td></td>
                            </tr>
                          </tbody>
                        </table>   
                        ';
                    }
                    ?>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button class="btn btn-primary" type="button">Cancel</button>
                                                    <button class="btn btn-primary" type="reset">Reset</button>
                                                    <button class="btn btn-primary" type="submit" name="add" id="buttonaddproduct">Add Product</button>
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
            function addMaterial() {

                var material = document.getElementById("materialType").valueOf().value;
                var quantity = document.getElementById("quantity").valueOf().value;

                $.ajax({
                    type: 'POST',
                    url: "ajax/addMaterial.php",
                    data: {
                        material: material,
                        quantity: quantity
                    },
                    success: function(result) {
                        document.getElementById("materialTable").innerHTML = result;
                        //alert(result);
                    }
                });
            }

            function removeMaterial(materialIndex) {

                $.ajax({
                    type: 'POST',
                    url: "ajax/removeMaterial.php",
                    data: {
                        materialIndex: materialIndex
                    },
                    success: function(result) {
                        document.getElementById("materialTable").innerHTML = result;
                    }
                })
            }

            function checkProduct() {

                let productname = document.getElementById("productname").valueOf().value;

                $.ajax({
                    type: 'POST',
                    url: "ajax/checkProduct.php",
                    data: {
                        productname: productname
                    },
                    success: function(result) {
                        if (result == 0){
                            document.getElementById("productExist").innerHTML = "Product already exists";
                            document.getElementById("buttonaddproduct").disabled=true;
                        }else if (result == 1){
                            document.getElementById("productExist").innerHTML = "";
                            document.getElementById("buttonaddproduct").disabled=false;
                        }else if (result == 2){
                            document.getElementById("productExist").innerHTML = "No special characters allowed ";
                            document.getElementById("buttonaddproduct").disabled=true;
                        //alert(result);
                        }
                    }
                });
            }

            function setDecimalValue() {
                var num = $('price').val();
                var n = num.toFixed(2);
                $('price').val(n);
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
