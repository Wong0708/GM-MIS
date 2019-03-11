<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>GM MIS | Edit Inventory</title>

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
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
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
            </div>
                <!-- page content -->
                <div class="right_col" role="main">
                    <!-- top tiles -->
                    
                    

                    <!-- /top tiles -->

                    

                    <!--TABLE OF DETAILS FOR DELIVERY RECEIPT-->
                    <div class="col-md-12 col-sm-9 col-xs-12" >
                        <div class="x_panel" >
                            <div class="x_title">
                                <h1>Edit Inventory - <?php echo $_GET['id'];?></h1>
                                
                                <div class="clearfix"></div>
                            </div>
                           
                            <div class="x_content">
                                <br>
                                <form class="form-horizontal form-label-center">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">SKU </label>
                                        <div class="col-md-3 col-sm-9 col-xs-12">
                                            <input type="text" id = "sku_id" class="form-control" readonly="readonly" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Name</label>
                                        <div class="col-md-3 col-sm-9 col-xs-12">
                                            <input type="text" id = "item_name" class="form-control" readonly="readonly" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Type</label>
                                        <div class="col-md-3 col-sm-9 col-xs-12">
                                            <input type="text" id = "item_tyoe" class="form-control" readonly="readonly" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Count</label>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <input type="text" id = "item_count" class="form-control" readonly="readonly" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier</label>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <input type="text" id = "supplier_name" class="form-control" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <input type="text" id = "item_price" class="form-control" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Warehouse Location</label>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <input type="text" id = "warehouse_name" class="form-control" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Restock</label>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <input type="text" id = "last_restock" class="form-control" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Update</label>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <input type="text" id = "last_update" class="form-control" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                                            <button type="button" class="btn btn-round btn-default" id = "addDamage"><i class="fa fa-plus-circle"></i> Add a Damaged Item</button>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="clearfix"></div>
                                    <br>
                                    </form>
                                    <form class="form-horizontal form-label-center">
                                        <div class="x_panel" id ="damageDiv" style="display:none">
                                        
                                            <div class="x_title">
                                                <h4>Add Damaged Item - <?php echo $_GET['id'];?></h4>
                                                
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Damaged Quantity</label>
                                                <div class="col-md-3 col-sm-9 col-xs-6">
                                                    <input   type="text" id = "drTotal" class="form-control"  >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Percentage of Damage</label>
                                                <div class="col-md-3 col-sm-9 col-xs-6">
                                                    <input   type="text" id = "drTotal" class="form-control"  placeholder="%">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Price Each</label>
                                                <div class="col-md-3 col-sm-9 col-xs-6">
                                                    <input   type="text" id = "drTotal" class="form-control" readonly="readonly" replaceholder="Read-Only Input">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Losses</label>
                                                <div class="col-md-3 col-sm-9 col-xs-6">
                                                    <input   type="text" id = "drTotal" class="form-control" readonly="readonly" placeholder="Read-Only Input">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <button type="reset" class="btn btn-warning" onclick="clearLocalStorage()">Archive</button>
                                            </div>
                                        </div>
                                    </form>

                                

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
</body>

<!-- /page content -->

<!-- footer content -->

<!-- /footer content -->
</div>
</div>
<script>
    var button = document.getElementById('addDamage'); 

    var damageItemDiv = document.getElementById('damageDiv');
    var counter = 0;
        button.onclick = function() 
        {
            if(damageItemDiv.style.display != "block")
            {
                damageItemDiv.style.display = "block";
                console.log("aaaa");
            }
            else
            {
                var cloneDiv  = damageItemDiv.cloneNode(true)
                cloneDiv.id = "Div"+ counter;
                counter++;
                damageItemDiv.parentNode.appendChild(cloneDiv);
            }
        };
</script>

<?php
    $skuID = $_GET['id'];
    echo $_GET['id'];

    $skuArray = array();
    $itemNameArray = array();
    $itemTypeArray = array();
    $itemCountArray = array();
    $supplierArray = array(); 
    $priceArray = array(); 
    $warehouseArray = array();
    $lastRestockArray = array();
    $lastUpdateArray = array();

    $query = "SELECT * FROM mydb.items_trading
    JOIN warehouses ON warehouses.warehouse_id = items_trading.warehouse_id
    JOIN suppliers ON suppliers.supplier_id = items_trading.supplier_id
    WHERE sku_id =  '$skuID'
    order by item_id
    ;";

    $result = mysqli_query($dbc, $query);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $skuArray[] = $row['sku_id'];
        $itemNameArray[] = $row['item_name']; 
        $itemTypeArray[] = $row['itemtype_id']; 
        $itemCountArray[] = $row['item_count']; 
        $supplierArray[] = $row['supplier_name']; 
        $priceArray[] = $row['price']; 
        $warehouseArray[] = $row['warehouse']; 
        $lastRestockArray[] = $row['last_restock']; 
        $lastUpdateArray[] = $row['last_update']; 
    }

    echo '<script>';

    echo "var sku_idfromPHP = ".json_encode($skuArray).";";
    echo "var itemNamefromPHP = ".json_encode($itemNameArray).";";
    echo "var itemTypefromPHP = ".json_encode($itemTypeArray).";";
    echo "var itemCountfromPHP = ".json_encode($itemCountArray).";";
    echo "var supplierNamefromPHP = ".json_encode($supplierArray).";";
    echo "var itempricefromPHP = ".json_encode($priceArray).";";
    echo "var warehousefromPHP = ".json_encode($warehouseArray).";";
    echo "var lastRestockfromPHP = ".json_encode($lastRestockArray).";";
    echo "var lastUpdatefromPHP = ".json_encode($lastUpdateArray).";"; // Get values from items_trading table to JS Variable
        
    echo "var SKUfromHTML = document.getElementById('sku_id');";
    echo "var itemNamefromHTML = document.getElementById('item_name');";
    echo "var itemTypefromHTML = document.getElementById('item_tyoe');";
    echo "var itemCountfromHTML = document.getElementById('item_count');";
    echo "var supplierfromHTML = document.getElementById('supplier_name');";
    echo "var itemPricefromHTML = document.getElementById('item_price');";
    echo "var warehousefromHTML = document.getElementById('warehouse_name');";
    echo "var lastRestockfromHTML = document.getElementById('last_restock');";
    echo "var lastUpdatefromHTML = document.getElementById('last_update');";
       
    echo 'SKUfromHTML.value = sku_idfromPHP[0];';
    echo 'itemNamefromHTML.value = itemNamefromPHP[0];';
    echo 'itemTypefromHTML.value = itemTypefromPHP[0];';
    echo 'itemCountfromHTML.value = itemCountfromPHP[0];';
    echo 'supplierfromHTML.value = supplierNamefromPHP[0];';
    echo 'itemPricefromHTML.value = itempricefromPHP[0];';
    echo 'warehousefromHTML.value = warehousefromPHP[0];';
    echo 'lastRestockfromHTML.value = lastRestockfromPHP[0];';
    echo 'lastUpdatefromHTML.value = lastUpdatefromPHP[0];';

    echo '</script>';
?>

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

<!-- Datatables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
</body>

</html>