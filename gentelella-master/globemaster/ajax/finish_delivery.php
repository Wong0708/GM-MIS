<?php
    session_start();
    require_once('mysql_connect.php');

    $GET_DR_NUMBER = $_POST['post_dr_number'];
    $GET_OR_NUMBER = $_POST['post_or_number'];

    $DELIVER_STATUS = "Delivered";

    $UPDATE_ORDERS_TABLE = "UPDATE orders
    SET orders.order_status  = ('$DELIVER_STATUS')                                       
    WHERE ordernumber ='$GET_OR_NUMBER';";

    $RESULT_ORDER_TABLE = mysqli_query($dbc,$UPDATE_ORDERS_TABLE);

    if(!$RESULT_ORDER_TABLE) 
    {
        die('Error: ' . mysqli_error($dbc));
        echo '<script language="javascript">';
        echo 'alert("Error In Update");';
        echo '</script>';
    } 
    else 
    {
        echo '<script language="javascript">';
        echo 'alert("1st Update Successfull");';
        echo '</script>';
        // header("Location: Deliveries.php");
    }
    
    $UPDATE_SCHED_DELIVER_TABLE = "UPDATE scheduledelivery
    SET scheduledelivery.delivery_status  = ('$DELIVER_STATUS')                                       
    WHERE delivery_Receipt ='$GET_DR_NUMBER';";

    $RESULT_SCHED_DELIVER_TABLE = mysqli_query($dbc,$UPDATE_SCHED_DELIVER_TABLE);

    if(!$RESULT_SCHED_DELIVER_TABLE) 
    {
        die('Error: ' . mysqli_error($dbc));
        echo '<script language="javascript">';
        echo 'alert("Error In Update");';
        echo '</script>';
    } 
    else 
    {
        echo '<script language="javascript">';
        echo 'alert("2nd Update Successfull");';
        echo '</script>';
        // header("Location: Deliveries.php");
    }
    
  
?>