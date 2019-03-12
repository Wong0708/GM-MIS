<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GM - Order Form </title>

        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->
        <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
        <!-- JQUERY Required Scripts -->
        <script type="text/javascript" src="js/script.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> 

       
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                
                <?php
                require_once("nav.php");    

               

                ?>

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h1>Create Order</h1>
                            </div>
                        </div>

                        <div class="clearfix"></div>


                        <div class="col-md-12 col-sm-6 col-xs-12">

                            <div class="x_content">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h3> 
                                                            <?php
                                                                $queryTogetMaxOR = " SELECT count(ordernumber) as TOTALOR FROM order_details";
                                                                $resultOfQuery=mysqli_query($dbc,$queryTogetMaxOR);
                                                                $row = mysqli_fetch_array($resultOfQuery,MYSQLI_ASSOC);

                                                                $CurrentOR = "OR - ".$row['TOTALOR'];                                                           
                                                               echo "<b>".$CurrentOR."</b>";

                                                               $_SESSION['DeliveryStatus'] = "PickUp"; //Assume order is pickup;
                                                            ?>
                                                        </h3>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">
                                                        <form class="form-horizontal form-label-left" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Client</label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <select onchange="updateOrdersTable();" class="form-control col-md-7 col-xs-12" id="clients" name="clientID">
                                                                <?php

                                                                    require_once('DataFetchers/mysql_connect.php');
                                                                    $query="SELECT client_id, client_name FROM clients";
                                                                    $result=mysqli_query($dbc,$query);
                                                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                                    ?> <option value="<?php echo $row['client_id']?>"><?php echo $row["client_name"]; ?> </option> <?php
                                                                    }
                                                                 ?>
                                                                </select>
                                                                </div>
                                                              
                                                            </div>
                                                            <hr>
                                                            <div class="form-group">
                                                                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                                                                      <thead>
                                                                        <tr>
                                                                          <th>Item Name</th>
                                                                          <th>Item Type</th>
                                                                          <th>Supplier</th>
                                                                          <th>Price</th>
                                                                         
                                                                          <th class="col-md-1 col-sm-1 col-xs-1">Quantity</th>
                                                                          <th>Add to Cart</th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        <?php

                                                                            require_once('DataFetchers/mysql_connect.php');
                                                                            $query = "SELECT * FROM items_trading;";
                                                                            $result1=mysqli_query($dbc,$query);

                                                                           $itemCountArray = array();
                                                                            while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC) )
                                                                            {
                                                                                    $queryItemType = "SELECT itemtype FROM ref_itemtype WHERE itemtype_id =" . $row['itemtype_id'] . ";";
                                                                                    $resultItemType = mysqli_query($dbc,$queryItemType);
                                                                                    $rowItemType=mysqli_fetch_array($resultItemType,MYSQLI_ASSOC);
                                                                                    $itemType = $rowItemType['itemtype'];

                                                                                    $queryWarehouse = "SELECT warehouse FROM warehouses WHERE warehouse_id =" . $row['warehouse_id'] . ";";
                                                                                    $resultWarehouse = mysqli_query($dbc,$queryWarehouse);
                                                                                    $rowWarehouse=mysqli_fetch_array($resultWarehouse,MYSQLI_ASSOC);
                                                                                    $warehouse = $rowWarehouse['warehouse'];

                                                                                    $querySupplierName = "SELECT supplier_name FROM suppliers WHERE supplier_id =" . $row['supplier_id'] . ";";
                                                                                    $resultSupplierName = mysqli_query($dbc,$querySupplierName);
                                                                                    $rowSupplierName=mysqli_fetch_array($resultSupplierName,MYSQLI_ASSOC);
                                                                                    $supplierName = $rowSupplierName['supplier_name'];

                                                                                       
                                                                                    echo '<tr class ="tableRow">';
                                                                                        echo '<td  id = ',$row['item_id'],' >';
                                                                                        echo $row['item_name'];
                                                                                        echo '</td>';
                                                                                        echo '<td>';
                                                                                        echo $itemType;
                                                                                        echo '</td>';
                                                                                        echo '<td>';
                                                                                        echo $supplierName;
                                                                                        echo '</td>';
                                                                                        echo '<td>';
                                                                                        echo  '₱'." ".number_format($row['price'], 2);
                                                                                        echo '</td>';
                                                                                                                                               
                                                                                        echo '<td >';
                                                                                        echo '<input type="number" id="quantity',$row['item_id'],'" name="quantity',$row['item_id'],'"  min="1" max ="',$row['item_count'],'" value="" placeholder ="0"></input>';
                                                                                        echo '</td>';

                                                                                        echo '<td>';
                                                                                        echo '<button type="button" class="btn btn-success" name ="add" value ="',$row['item_id'],'" > + </button>';
                                                                                        echo '</td>';

                                                                                    echo '</tr>';                                                                                  
                                                                            }
                                                                        ?>  
                                                                      </tbody>
                                                                    </table>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <label class="red" id="quantityAlert"></label>
                                                                </div>
                                                            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Order Cart</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="productTable">                                                   
                               
                                <table id="cart" class="table table-striped table-bordered bulk_action">
                                  <thead>
                                    <tr>
                                        <th>Item Name</th>
                                         <th>Item Type</th>
                                         <th>Price</th>
                                         <th>Quantity</th>
                                         <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                        
                                    </tr>
                                  </tbody>
                                </table>
                                <h4 align = "right"> Total Payment: <input style="text-align:right;" readonly="readonly" name="totalPayment" id ="payment" value="0"> </h4>
                        </div>
                      
                        </div>
                    </div>
                </div>
                                                            
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Type</label>
                    <div class='input-group col-md-14'>
                        <select class="form-control col-md-7 col-xs-12" name="paymentID">
                        <?php
                            require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
                            $query="SELECT * FROM ref_payment";
                            $result=mysqli_query($dbc,$query);
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            ?> <option value="<?php echo $row['payment_id']?>"><?php echo $row["paymenttype"]; ?> </option> <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary" align="center" name="next" data-toggle="modal" data-target=".bs-example-modal-lg">Next</button>
                        <button type="Reset" class="btn btn-danger" onclick="destroyTable();">Reset</button>
            <!-- Add Order2 Modal -->
            
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
              
                    <h4 class="modal-title" id="myModalLabel">Finalize Order</h4>
                  </div>

                  <div class = "modal-body">
                  <form class="form-horizontal form-label-left" method="POST" action= "<?php echo $_SERVER["PHP_SELF"];?>">


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >For Delivery?<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <button type="submit" name ="YesDeliv" class="btn btn-round btn-default" onclick = "toggleDeliveryDate(); " value = "Yes" id = "Yesbutton" style = "display:block" >No</button>
                            <button type="submit" name ="NoDeliv" class="btn btn-round btn-success" onclick = "toggleDeliveryDate1();" value = "No" id = "Nobutton" style = "display:none">Yes</button>
                            <?php 
                                
                                if(isset($_POST['YesDeliv']))
                                {
                                    $_SESSION['DeliveryStatus'] = "Deliver";
                                    alert("wadapak");
                                }
                                else 
                                {
                                    $_SESSION['DeliveryStatus'] = "PickUp";
                                }
                                // switch ($_POST['ToFabPage']) {
                                //     case 'YesDel':
                                //         // first pressed
                                //         $_SESSION['DeliveryStatus'] = "Deliver";
                                //     break;
                                //     case 'NoDel':
                                //         // second pressed
                                //         $_SESSION['DeliveryStatus'] = "PickUp";
                                //     break;
                                //     default:
                                //         // something wrong
                                //         echo "Wadapak?";
                                //     break;
                                // }
                            

                            ?>
                          
                        </div>
                    </div>

                    <div id = "ifYes" style = "display:none">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Expected Date<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="customer" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name1" required="required" type="date">
                            </div>
                        </div>
                    </div>
                
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >For Fabrication?<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <button type="button" class="btn btn-round btn-default" onclick = "toggleFabrication()" value = "YesFab" id = "YesbuttonFab" style = "display:block" >No</button>
                            <button type="button" class="btn btn-round btn-success" onclick = "toggleFabrication1()" value = "NoFab" id = "NobuttonFab" style = "display:none">Yes</button>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button id="send" type="submit" class="btn btn-success" style="visibility:visible"><a id ="nextpage" href = "CreateJobOrderFab.php?order_id=<?php echo $CurrentOR?>">Submit</a></button>
                        <button  type="submit" class="btn btn-primary" id="fabricationpage" style="visibility:hidden"><a href = "CreateJobOrderFab.php?order_id=<?php echo $CurrentOR?>">Next</a></button>
                        
                      </div>
                    </div>

                    </form>
                    <!-- Order 2 -->                   
                  
                    </div>
                </div>
              </div>
            </div>
            <br>
            <br>
            <!-- End Order2 Modal -->
                                                </div>
                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
              </div>
            </div>
          </div>
            <!-- /page content -->
        </div>


        <script>
        var count = 0;
        var itemName = "item"+1;
        var quantity = "quantity"+1;
        var currentName = ""; 
        var CurrentTotal = 0; //Gets the current total to pay

            $('#datatable-checkbox tbody button.btn.btn-success').on('click', function(e) {
                var row = $(this).closest('tr');
                var buttonValue = $(this).val();
                
                var payment = document.getElementById("payment");
                var itemQuantity = document.getElementById("quantity"+buttonValue).value;
                document.getElementById("quantity"+buttonValue).value = "";
                
                // console.log('TR 1 cell: ' + row.find('td:first').text());
                // console.log('TR 2 cell: ' + row.find('td:nth-child(2)').text());
                // console.log('TR 3 cell: ' + row.find('td:nth-child(3)').text());
                // console.log('TR 4 cell: ' + row.find('td:nth-child(4)').text());
               
                var currentName =  row.find('td:first').text(); 
                console.log("Current Name = " + currentName);
                if(itemQuantity == 0)
                    {
                        alert("No Quantity Set!");
                    }
                    else
                    {
                        
                      var qty_old = 0
                    var item_does_not_exist = true;
                        $(".qtys").each(function(i){ // this gets all the classes in the order table.
                            if (buttonValue ==$(this).attr('val_id'))
                            { //checks i there is existing item
                                    qty = $(this).text().replace("₱ ", "");
                                    qty_old = parseFloat(qty.replace(/\,/g,''), 10);

                                        item_does_not_exist = false;
                                        new_qty = parseFloat(itemQuantity) + qty_old;

                                    $(this).text(new_qty);
                                        var oldPrice =  $(this).attr('price');
                                        var newPrice = $(this).attr('price') * new_qty;

                                        var subtractOldamount = qty_old *oldPrice;
                                        CurrentTotal = (CurrentTotal - subtractOldamount);
                                        
                                       
                                        CurrentTotal = CurrentTotal+ newPrice;
                                        payment.value = "₱ "+  CurrentTotal.toFixed(2) ;
                                      
                                    console.log("Old Amount = "+subtractOldamount);                                   
                                    console.log("Old Price = "+oldPrice);
                                    console.log("Current Total = "+CurrentTotal);
                            }
                        });
                        if(item_does_not_exist){

                            var price =row.find('td:nth-child(4)').text().replace("₱ ", ""); //Removes the peso sign to make it as INT rather than string
                            var valid= row.find('td:nth-child(4)');
                            var ParsePrice = parseFloat(price.replace(/\,/g,''), 10);

                            // count =  count +1+ parseFloat(price.replace(/\,/g,''), 10);
                            // count =  count+ parseFloat(price.replace(/\,/g,''), 10);
                            var totalPayment = (ParsePrice * itemQuantity);

                            CurrentTotal = CurrentTotal + totalPayment;

                            var newRow = document.getElementById('cart').insertRow();                       
                            newRow.innerHTML = "<tr> <td id = "+itemName +">" + currentName + "</td> <td>" + row.find('td:nth-child(2)').text() +" </td> <td>" + row.find('td:nth-child(4)').text() + "</td> <td class='qtys' price ='"+ParsePrice+"' val_id='"+buttonValue+"'> " + itemQuantity + " </td> <td> <button type='button' class='btn btn-danger' name ='remove' onclick= 'DeleteRow(this)' value ='"+totalPayment.toFixed(2)+"' > - </button></td>"
                             
                            // payment.value = "₱ "+ totalPayment;
                           
                            payment.value = "₱ "+ CurrentTotal.toFixed(2);

                            itemName++;
                            quantity++;

                            console.log("Current Total = ");
                        } // END IF                                                 
                    }   // END ELSE    

            }) //END FUNCTION
             function DeleteRow(obj) 
               {
                
                        var buttonValue =obj.value;     
                        var paymentBox = document.getElementById("payment");

                            var td = event.target.parentNode; // event.target will be the input element.
                            var tr = td.parentNode; // the row to be removed
                   
                            var cartPrice = tr.cells[2].innerHTML.replace("₱ ", ""); //Gets Value of Cell in TR and Removes Peso Sign 
                            var cartQuantity = tr.cells[3].innerHTML;
                            var AmountToBeSubtracted = cartQuantity *  parseFloat(cartPrice.replace(/\,/g,''), 10);
                            console.log("Cart Price = " + cartPrice);
                            console.log("Cart Quantity = " + cartQuantity);
                            console.log("Total Amount = " + AmountToBeSubtracted);
                     
                        // var paymentValue = paymentBox.value.replace("₱ ", "");
                        
                        console.log("button value = "+buttonValue);
                        console.log("Total Payment Value = "+CurrentTotal);
                        CurrentTotal = (CurrentTotal.toFixed(2) - AmountToBeSubtracted.toFixed(2)); //Limits the Decimal points to 2
                        paymentBox.value = "₱ " + CurrentTotal.toFixed(2);

                         tr.parentNode.removeChild(tr);                 
                }                    
            </script>         
            <script>
                function destroyTable()
                {
                    var table = document.getElementById("cart");      //Deletes All Rows of Table except Header before Inserting new Rows   
                    for(var i = table.rows.length - 1; i > 0; i--)
                    {     
                        table.deleteRow(i);
                    } //END FOR
                }           
            </script>
            <script>
            function getValue(obj) 
            {
                var status = obj.value;
                var strLink = "CreateJobOrderFab.php?order_id=<?php echo $CurrentOR?> & delivery_status =" + status;
                document.getElementById("nextpage").setAttribute("href",strLink);
            })
        </script>
        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
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
        <!-- bootstrap-daterangepicker -->
        <script src="../vendors/moment/min/moment.min.js"></script>
        <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


        
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
        <!-- bootstrap-datetimepicker -->
        <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

        <script>
            $('#myDatepicker').datetimepicker();

            $('#myDatepicker2').datetimepicker({
                format: 'YYYY-MM-DD HH:MM:SS'
            });

            $('#myDatepicker3').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('#myDatepicker4').datetimepicker({
                ignoreReadonly: true,
                allowInputToggle: true
            });

            $('#datetimepicker6').datetimepicker();

            $('#datetimepicker7').datetimepicker({
                useCurrent: false
            });

            $("#datetimepicker6").on("dp.change", function(e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });

            $("#datetimepicker7").on("dp.change", function(e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        </script>
        
        <script>
            var divdel = document.getElementById("ifYes");
            var yesbutton = document.getElementById("Yesbutton");
            var nobutton = document.getElementById("Nobutton");

            var yesbuttonfab = document.getElementById("YesbuttonFab");
            var nobuttonfab = document.getElementById("NobuttonFab");

            var submitbtn = document.getElementById("send");
            var nextbtn = document.getElementById("fabricationpage");

            function toggleDeliveryDate()
            {
                
                divdel.style.display = "block";
                yesbutton.style.display = "none";
                nobutton.style.display = "block";
              
            }

            function toggleDeliveryDate1()
            {
                divdel.style.display = "none";
                yesbutton.style.display = "block";
                nobutton.style.display = "none";
               
            }
            function toggleFabrication()
            {
                submitbtn.style.visibility = "hidden";
                nextbtn.style.visibility = "visible"
                yesbuttonfab.style.display = "none";
                nobuttonfab.style.display = "block";
            }
            function toggleFabrication1()
            {
                submitbtn.style.visibility = "visible";
                nextbtn.style.visibility = "hidden"
                yesbuttonfab.style.display = "block";
                nobuttonfab.style.display = "none";
            }
        </script>
    </body>
</html>
