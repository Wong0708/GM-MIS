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
                    <div class="col-md-12 col-sm-12 col-xs-12" >
                        <div class="x_panel" >
                            <div class="x_title">
                                <h1>Edit Inventory - 
                                    <?php
                                     if(isset($_GET['sku_id'], $_GET['item_id']))
                                     {
                                        $_SESSION['getIDfromView'] = $_GET['sku_id'];
                                        $_SESSION['item_IDfromView'] = $_GET['item_id']; //Stores the Value of Get from View Inventory
                                        echo $_SESSION['getIDfromView']; 
                                        
                                     }
                                     else
                                     {
                                        // echo $_GET['getValue'];
                                        echo $_SESSION['getIDfromView']; 
                                     }
                                    ?>
                                
                                <div class="clearfix"></div>
                            </div>
                           
                            <div class="x_content">
                                <br>

                                <form class="form-horizontal form-label-center" method="GET">

                                
                                    <div class="col-md-6 col-sm-6 col-xs-12" >
                                        <div class="x_panel" >

                                            <center><font color = "#2a5eb2"><h3>Item Details </h1>
                                            
                                            </h3></font></center>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">SKU </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id = "sku_id" class="form-control" readonly="readonly" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Name</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id = "item_name" class="form-control" readonly="readonly" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Type</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id = "item_tyoe" class="form-control" readonly="readonly" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Count</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id = "item_count" class="form-control" readonly="readonly" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id = "supplier_name" class="form-control" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id = "item_price" class="form-control" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Warehouse Location</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id = "warehouse_name" class="form-control" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Restock</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id = "last_restock" class="form-control" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Update</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id = "last_update" class="form-control" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                          
                                                <div class="col-md-6 col-sm-6 col-xs-12" >                                  
                                                    <div class="x_panel" >
                                                        <center><font color = "#09961e"><h3>Restocking</h3></font></center>
                                                        <div class="ln_solid"></div>

                                                        <div class="form-group">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1">
                                                                <button type="button" class="btn btn-round btn-primary" id = "restockbtnE" onclick = "enableRestocking();" style = "display:block"><i class="fa fa-cubes"></i> Enable Restocking</button>
                                                                <button type="button" class="btn btn-round btn-danger" id = "restockbtnD" onclick = "disableRestocking();" style = "display:none"><i class="fa fa-cubes"></i> Disable Restocking</button>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <br>
                                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Restock Amount:</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="number" name ="restockAmount" id = "restockamt" class="form-control" value = "0" min = "1">
                                                            </div>
                                                        </div>
                                                        <div class="ln_solid"></div>

                                                        <div class="form-group">
                                                            <div class="col-md-12 col-sm-12 col-xs-12" align = "center">
                                                            <!--  -->
                                                                <button type="submit" class="btn btn-success" onclick = "updatestockalert(this)" id = "updatestock" name ="restockBtn" >Update</button>
                                                                <button type="reset" class="btn btn-danger" id = "resetstockinput">Reset</button>

                                                                <?php  // UPDATE item stock 
                                                                    
                                                                    require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
                                                                    if(isset($_GET['restockBtn'],  $_GET['restockAmount'])) //checks if both GET have values
                                                                    {               
                                                                      
                                                                        $restockCount = $_GET['restockAmount'];

                                                                        echo $restockCount;
                                                                       
                                                                       $itemIDfromViewInventory = $_SESSION['item_IDfromView'];
                                                                        $sqlInsert = "UPDATE items_trading  
                                                                        SET items_trading.item_count  = (item_count + '$restockCount') 
                                                                         WHERE item_id ='$itemIDfromViewInventory';"; //Updates the item count in DB
                                                                        $result=mysqli_query($dbc,$sqlInsert); 
                                                                        
                                                                        if(!$result) 
                                                                        {
                                                                            die('Error: ' . mysqli_error($dbc));
                                                                        } 
                                                                        else 
                                                                        {
                                                                            echo '<script language="javascript">';
                                                                            echo 'alert("Successful!");';
                                                                            echo '</script>';
                                                                        }
                                                                        
                                                                    }                                                     
                                                                ?>

                                                        </div>
                                                    </div>
                                                
                                        </div>
                                    </div>

                                    
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            <br>
                                                <button type="button" class="btn btn-round btn-default" id = "addDamage"><i class="fa fa-plus-circle"></i> Add a Damaged Item</button>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <br>
                                    </form>

                                                                    <!-- Damage Item DIV -->
                                    <form class="form-horizontal form-label-center"> 
                                        <div class="x_panel" id ="damageDiv" style="display:none">
                                        
                                            <div class="x_title">
                                                <h4>Add Damaged Item - 
                                                <?php
                                                    if(isset($_GET['id']))
                                                    {
                                                        
                                                        echo $_SESSION['getIDfromView']; 
                                                        
                                                    }
                                                    else
                                                    {
                                                        // echo $_GET['getValue'];
                                                        echo $_SESSION['getIDfromView']; 
                                                    }
                                                    ?>
                                                </h4>
                                                
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
                                            <div class="col-md-12 col-sm-12 col-xs-12" align = "right">
                                                <button type="button" class="btn btn-success">Confirm</button>
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
    require_once('DataFetchers/mysql_connect.php');
   
    $skuID = $_SESSION['getIDfromView'];
    
    

    $skuArray = array();
    $itemNameArray = array();
    $itemTypeArray = array();
    $itemCountArray = array();
    $supplierArray = array(); 
    $priceArray = array(); 
    $warehouseArray = array();
    $lastRestockArray = array();
    $lastUpdateArray = array();

    $query = "SELECT * FROM items_trading
    JOIN warehouses ON warehouses.warehouse_id = items_trading.warehouse_id
    JOIN suppliers ON suppliers.supplier_id = items_trading.supplier_id
    JOIN ref_itemtype ON ref_itemtype.itemtype_id = items_trading.itemtype_id
    WHERE sku_id =  '$skuID'
    order by item_id
    ;";

    $result = mysqli_query($dbc, $query);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $skuArray[] = $row['sku_id'];
        $itemNameArray[] = $row['item_name']; 
        $itemTypeArray[] = $row['itemtype']; 
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

<!-- Restocking Onclick -->
<script>
    var restockbtnE = document.getElementById("restockbtnE");
    var restockbtnD = document.getElementById("restockbtnD");
    var restockinput = document.getElementById("restockamt"); 

    var updatestock = document.getElementById("updatestock"); 
    var resetstock = document.getElementById("resetstockinput"); 

    restockinput.disabled = true;
    updatestock.disabled = true;
    resetstock.disabled = true;

    function enableRestocking()
    {
        restockbtnE.style.display = "none";
        restockbtnD.style.display = "block";

        restockinput.disabled = false;
        updatestock.disabled = false;
        resetstock.disabled = false;
        
    }
    function disableRestocking()
    {
        restockbtnE.style.display = "block";
        restockbtnD.style.display = "none";

        restockinput.disabled = true;
        updatestock.disabled = true;
        resetstock.disabled = true;

        var insideval = restockinput.value = "0";
    }

    function updatestockalert()
    {
        var insideval = restockinput.value;
        alert("Do you want to restock this amount: " + insideval);

    }
</script>


</body>

</html>
