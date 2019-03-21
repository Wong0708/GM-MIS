<?php
    session_start();   
    require_once('mysql_connect.php');

    $GET_OR_NUMBER = $_POST['post_or_number'];
    $ORDER_STATUS = "Finished Order";

    $CHECK_ORDER_STATUS = "SELECT * FROM orders WHERE ordernumber = '$GET_OR_NUMBER'";
    $RESULT_CHECK_ORDER_STATUS = mysqli_query($dbc,$CHECK_ORDER_STATUS);
    $ROW_CHECK_STATUS = mysqli_fetch_assoc($RESULT_CHECK_ORDER_STATUS);
    $CURRENT_ORDER_STATUS = $ROW_CHECK_STATUS['order_status']; //Checks the current status if [PickUp] or [Type of Deliver]

    if($CURRENT_ORDER_STATUS == "PickUp")
    {
        $UPDATE_ORDERS_TABLE = "UPDATE orders
        SET orders.order_status  = ('$ORDER_STATUS')                                       
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
    }//END IF
    else
    {
        $UPDATE_ORDERS_TABLE = "UPDATE orders
        SET orders.order_status  = ('$ORDER_STATUS')                                       
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
        SET scheduledelivery.delivery_status  = ('$ORDER_STATUS')                                       
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
    }// END Else
   
?>