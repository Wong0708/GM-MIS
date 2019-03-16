<?php
    session_start();
    require_once('mysql_connect.php');
    $itemIDArray = $_POST['post_item_id'];
    $itemQtyArray = $_POST['post_item_qty'];
    $CurrentOR = $_POST['post_order_number'];
    $clientID = $_POST['post_client_id'];
    $itemNameArray = array();
    $itemPriceArray = array();
    $DeliveryStatus = $_POST['post_delivery_status'];
    $FabStatus = $_POST['post_fab_status'];

    for($i = 0; $i < sizeof($itemIDArray); $i++)
    {
        $sqlToGetItemDetail = "SELECT * FROM items_trading WHERE item_id ='$itemIDArray[$i]'";
        $resultofGetItemDetail =mysqli_query($dbc,$sqlToGetItemDetail);
        while($rowofGetItemDetail = mysqli_fetch_array($resultofGetItemDetail,MYSQLI_ASSOC))
        {
            $itemNameArray[] = $rowofGetItemDetail['item_name'];
            $itemPriceArray[] = $rowofGetItemDetail['price']; 
            echo $rowofGetItemDetail['sku_id'], "<br>";
            echo "Item Name = ", $rowofGetItemDetail['item_name'],"<br>";
            echo "Item Price = ", $rowofGetItemDetail['price'],"<br>";
            echo "Item Quantity = ",$itemQtyArray[$i],"<br>";
        }
         echo "Item ID = ",$itemIDArray[$i],"<br>";
        

        $sqlInsertToOrderDetail = "INSERT INTO order_details (ordernumber, client_id, item_id, item_name, item_price, item_qty, item_status, fabrication_status, payment_status)
        VALUES(
            '$CurrentOR', 
            '$clientID', 
            '$itemIDArray[$i]', 
            '$itemNameArray[$i]',
            '$itemPriceArray[$i]',
            '$itemQtyArray[$i]',
            '$DeliveryStatus',
            '$FabStatus',
            'Not Yet Paid');";
        $resultofInsert =mysqli_query($dbc,$sqlInsertToOrderDetail);
    }
    echo implode(" ",$_POST['post_item_qty']),"<br>";
    echo implode(" ",$_POST['post_item_id']),"<br>";
    echo $_POST['post_expected_date'],"<br>";
    echo $_POST['post_payment_id'],"<br>";
    echo $_POST['post_client_id'],"<br>";
    echo $_POST['post_order_number'],"<br>";
    echo $_POST['post_delivery_status'],"<br>";
    echo $_POST['post_fab_status'],"<br>";

    echo $_POST['delivery_status'],"<br>";

   
    
?>