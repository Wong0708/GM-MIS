<?php
    session_start();
    require_once('mysql_connect.php');
    $GET_UNDER_FAB = $_POST['post_under_fab'];
    $GET_ORDER_NUMBER = $_POST['post_order_number'];

    $UPDATE_ORDER_FAB_STATUS = "UPDATE orders
    SET orders.fab_status =('$GET_UNDER_FAB')
    WHERE ordernumber = '$GET_ORDER_NUMBER';";
    $RESULT_UPDATE_FAB_STATUS=mysqli_query($dbc,$UPDATE_ORDER_FAB_STATUS);  
    if(!$RESULT_UPDATE_FAB_STATUS) 
    {
        die('Error: ' . mysqli_error($dbc));
        echo "Error: Wadapaok?";
    } 
    else 
    {
        
       
    }
   
?>