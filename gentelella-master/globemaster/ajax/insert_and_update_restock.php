<?php
    session_start();
    require_once('mysql_connect.php');

    $RESTOCK_QTY = $_POST['post_restock_quantity'];
    $ITEM_FROM_INVENTORY_ID = $_POST['post_item_id']; 

    $UPDATE_ITEM_TRADING_RESTOCK = "UPDATE items_trading 
    SET items_trading.item_count  = (item_count + '$RESTOCK_QTY'),
    last_restock = Now() 
    WHERE item_id ='$ITEM_FROM_INVENTORY_ID';"; //Updates the item count in DB

    $RESULT_RESTOCK=mysqli_query($dbc,$UPDATE_ITEM_TRADING_RESTOCK);    

    

    $itemID =  $_SESSION['item_IDfromView'];//Adds items to restock table
    $SQL_INSERT_RESTOCK_DETAILS = "INSERT INTO restock_detail (item_id, quantity, restock_date)
    VALUES ('$ITEM_FROM_INVENTORY_ID','$RESTOCK_QTY',Now())";
    $RESULT_INSERT_RESTOCK_DETAIL =mysqli_query($dbc,$SQL_INSERT_RESTOCK_DETAILS); 

    if(!$RESULT_RESTOCK || !$RESULT_INSERT_RESTOCK_DETAIL) 
    {
        die('Error: ' . mysqli_error($dbc));
    } 
    else 
    {
      echo "Item Restocked!";
    }
   
?>