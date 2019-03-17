<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Add Inventory </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
            <!-- sidebar menu -->
            <?php
                require_once("nav.php");    
            ?>
            <!-- /sidebar menu -->
        <!-- Custom Fonts -->
        <style>

            @font-face {
            font-family: "Couture Bold";
            src: url("css/fonts/couture-bld.otf");
            }

            h1 {
                font-family: 'COUTURE Bold', Arial, sans-serif;
                font-weight:normal;
                font-style:normal;
                font-size: 50px;
                color: #1D2B51;
                }

        </style>      
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div>
                  <center><h1><img src="images/GM%20LOGO.png" width = "80px" height = "80px">GLOBEMASTER | ADD INVENTORY</h1><br>
              </div>
            </div>
            <br><br><br><br>
            
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        <select name="selectItemtype" id="selectItemType" required="required" class="form-control col-md-7 col-xs-12" onchange="getType(this)">
                        <option value = "">Choose...</option>
                         <?php
                                require_once('DataFetchers/mysql_connect.php');
                                $query = "SELECT * FROM ref_itemtype";
                                $result=mysqli_query($dbc,$query);
                                $option = "";
                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                {
                                    echo'<option value = "'.$row['itemtype'].'">'.$row['itemtype'].'</option>';
                                }
                            ?>
 
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock Keeping Unit (SKU) <span class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="skuid" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Choose Supplier <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="supplier" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        <option value = "">Choose...</option>
                            <?php
                                require_once('DataFetchers/mysql_connect.php');
                                $query = "SELECT * FROM suppliers";
                                $result=mysqli_query($dbc,$query);
                                
                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                {
                                   echo '<option value = "'.$row['supplier_name'].'">'.$row['supplier_name'].'</option>';
                                }
                            ?>             
                            </select>
                        </div>
                      </div><br><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Item Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="item_name" id="itemName" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Warehouse Location</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="selectWarehouse" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        <option value = "">Choose...</option>
                          <?php
                                require_once('DataFetchers/mysql_connect.php');
                                $query = "SELECT * FROM warehouses";
                                $result=mysqli_query($dbc,$query);
                               
                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                {
                                   echo '<option value = "'.$row['warehouse'].'" > '.$row['warehouse'].' </option>';
                                }
                            ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Threshold Amount <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="threshold" class="form-control col-md-7 col-xs-12" required="required" type="number" min = "0" max ="9999">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="price" class="form-control col-md-7 col-xs-12" required="required" type="number" step="0.01" placeholder = "1000.00">
                        </div>
                      </div><div class="form-group">
                        <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
                          <button name="submitBtn" class="btn btn-success" type="submit" class="btn btn-success">Add</button>
						              <button class="btn btn-primary" type="reset">Reset</button>
                        <!-- </div>z -->
                      </div>

                      <?php

                      require_once('DataFetchers/mysql_connect.php');
                        if(isset($_POST['submitBtn']))
                        {
                            $sku_id = $_POST['skuid'];
                            $itemName = $_POST['item_name']; //Stores the Values from Textbox in HTML
                          
                            $itemPrice = $_POST['price'];
                            $itemThreshold = $_POST['threshold'];

                            $warehouseIDfromSelect = $_POST['selectWarehouse'];
                            $itemTypeIDfromSelect = $_POST['selectItemtype'];
                            $supplierIDFromSelect = $_POST['supplier'];

                           

                            $queryWarehouseID = "SELECT warehouses.warehouse_id FROM warehouses WHERE warehouse = '$warehouseIDfromSelect'";
                            $resultWarehouseID = mysqli_query($dbc,$queryWarehouseID);                                
                            $rowWarehouseID = mysqli_fetch_assoc($resultWarehouseID); //Query for getting WarehouseID 

                            $queryItemtypeID = "SELECT ref_itemtype.itemtype_id FROM ref_itemtype WHERE itemtype = '$itemTypeIDfromSelect'";
                            $resultItemtype = mysqli_query($dbc,$queryItemtypeID);                                
                            $rowItemtypeID = mysqli_fetch_assoc($resultItemtype); //Query For getting itemtypeID
                            
                            $querySupplierID = "SELECT supplier_id FROM suppliers WHERE supplier_name = '$supplierIDFromSelect'";
                            $resultSupplierID = mysqli_query($dbc,$querySupplierID);                                
                            $rowSupplierID = mysqli_fetch_assoc($resultSupplierID); //Query For getting itemtypeID

                            $queryItemID = "SELECT item_id FROM items_trading ORDER BY item_id DESC LIMIT 1 ";
                            $resultItemID = mysqli_query($dbc,$queryItemID);
                            $rowResultItemID = mysqli_fetch_assoc($resultItemID);

                            // var_dump($resultWarehouseID);                               
                            // print_r($queryWarehouseID);

                            // echo $rowWarehouseID['warehouse_id'];
                            // echo $rowItemtypeID['itemtype_id'];

                            $WareHouseID = $rowWarehouseID['warehouse_id'];
                            $ItemtypeID = $rowItemtypeID['itemtype_id'];
                            $ItemID = $rowResultItemID['item_id']+1;
                            $SupplierID = $rowSupplierID['supplier_id'];

                            echo  "warehouse = ".$WareHouseID;
                            echo  "itemtype = ".$ItemtypeID;
                            echo  "itemID = ".$ItemID;
                            echo  "supplierID = ".$SupplierID;
                            echo  "skuid =  ".$sku_id;
                            echo  "item name =  ".$itemName;
                            echo  "3shold = ".$itemThreshold;
                            echo  "price = ".$itemPrice;

                            $sql = "INSERT INTO items_trading (item_id, sku_id, item_name, itemtype_id, item_count, last_restock, last_update, threshold_amt, warehouse_id, supplier_id, price)
                            Values(
                            '$ItemID',
                            '$sku_id',
                            '$itemName', 
                            '$ItemtypeID',
                            '0', now(),now(),
                            '$itemThreshold',
                            '$WareHouseID',
                            '$SupplierID',
                            '$itemPrice')";

                            $result=mysqli_query($dbc,$sql);
                            if(!$result) 
                            {
                                die('Error: ' . mysqli_error($dbc));
                            } 
                            else 
                            {
                                echo '<script language="javascript">';
                                echo 'alert("Items Added Successfully");';
                                echo '</script>';
                                header("Location: ViewInventory.php");
                            }              
                        }

?>
                      

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
  <?php
  
  require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
  $arrayOfPrefix = array();
  $arrayOfItemType = array();
  $query = "SELECT * FROM ref_itemtype";
  $result=mysqli_query($dbc,$query);
  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
    $arrayOfPrefix[] = $row['item_prefix'];
    $arrayOfItemType[] = $row['itemtype'];
  }

  echo "var PrefixFromPHP = ".json_encode($arrayOfPrefix).";";
  echo "var itemTypeFromPHP = ".json_encode($arrayOfItemType).";";
  ?>
  
     function getType(selectItemType)    
     {
      var dropdownValue = selectItemType.value;
       for (var i = 0; i < PrefixFromPHP.length; i++)
       {
         if(itemTypeFromPHP[i] == dropdownValue)
         {
          var item = document.getElementById('itemName');
          item.value = PrefixFromPHP[i]+" ";
          console.log(PrefixFromPHP[i]);
         }
       }
      
     
     }
    </script>
        
  </body>
</html>
