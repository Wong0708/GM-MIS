<?php
    session_start();
    require_once('mysql_connect.php');
    $GET_DMG_QTY = $_POST['post_damage_qty'];
    $GET_DMG_PERCENT = $_POST['post_damage_percent'];
    $GET_DMG_PRICE = $_POST['post_damage_price'];
    $GET_DMG_TOTAL = $_POST['post_damage_total'];
    $GET_DMG_ITEM_NAME = $_POST['post_damage_item'];
    $ITEM_ID_FROM_DB = $_SESSION['item_IDfromView'];

    // $SQL_GET_ITEM_ID = "SELECT item_id FROM items_tradings WHERE sku_id = $GET_DMG_ITEM_NAME";
    // $RESULT_GET_SQL = mysqli_query($dbc,$SQL_GET_ITEM_ID);
    // while($ROW_RESULT=mysqli_fetch_array($RESULT_GET_SQL,MYSQLI_ASSOC))
    // {
    //     $ITEM_ID_FROM_DB = $ROW_RESULT['item_id'];
    // } 

    $SQL_INSERT_DMG_TABLE = "INSERT INTO damage_item (refitem_id, item_name, damage_percentage, item_quantity,total_loss,last_update)
    VALUES ('$ITEM_ID_FROM_DB', '$GET_DMG_ITEM_NAME','$GET_DMG_PERCENT','$GET_DMG_QTY','$GET_DMG_TOTAL',Now())";
    $RESULT_GET_SQL = mysqli_query($dbc,$SQL_INSERT_DMG_TABLE);
    if(! $RESULT_GET_SQL) 
    {
        die('Error: ' . mysqli_error($dbc));
    } 
    else 
    {
        echo 'Damaged Item Added!';
    
    }
    
    
?>