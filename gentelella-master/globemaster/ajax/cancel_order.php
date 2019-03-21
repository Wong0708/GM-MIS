<?php
    session_start();
    require_once('mysql_connect.php');

    $GET_OR_NUMBER = $_POST['post_or_number'];
    $ORDER_STATUS = "Cancelled";

    $CHECK_ORDER_STATUS = "SELECT * FROM orders WHERE ordernumber = '$GET_OR_NUMBER'";
    $RESULT_CHECK_ORDER_STATUS = mysqli_query($dbc,$CHECK_ORDER_STATUS);
    $ROW_CHECK_STATUS = mysqli_fetch_assoc($RESULT_CHECK_ORDER_STATUS);
    $CURRENT_ORDER_STATUS = $ROW_CHECK_STATUS['order_status']; //Checks the current status if [PickUp] or [Type of Deliver]

   if($CURRENT_ORDER_STATUS == "PickUp")
   {
        $SQL_UPDATE_ORDERS_TABLE = "UPDATE orders
        SET orders.order_status  = ('$ORDER_STATUS')                                       
        WHERE ordernumber ='$GET_OR_NUMBER';";
        $RESULT_ORDER_TABLE = mysqli_query($dbc,$SQL_UPDATE_ORDERS_TABLE); //Updates order table 
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
            }
            $ITEM_ID_ORDERED_LIST = array();
        $ITEM_QTY_ORDERED_LIST = array();

        $SELECT_ITEMS_ORDERED="SELECT * FROM order_details WHERE ordernumber = '$GET_OR_NUMBER'";
        $RESULT_SELECT_ITEMS_ORDERED = mysqli_query($dbc,$SELECT_ITEMS_ORDERED);
            while($ROW_ITEMS_ORDERED = mysqli_fetch_array($RESULT_SELECT_ITEMS_ORDERED,MYSQLI_ASSOC))
            {
                $ITEM_ID_ORDERED_LIST[] = $ROW_ITEMS_ORDERED['item_id'];
                $ITEM_QTY_ORDERED_LIST[] = $ROW_ITEMS_ORDERED['item_qty'];
            }// END While
        if(!$RESULT_SELECT_ITEMS_ORDERED) 
        {
            die('Error: ' . mysqli_error($dbc));
            echo '<script language="javascript">';
            echo 'alert("Error In Update");';
            echo '</script>';
        } 
        else 
        {
            echo '<script language="javascript">';
            echo 'alert("Select Success");';
            echo '</script>';
            // header("Location: Deliveries.php");
        }

        for($i = 0 ; $i < sizeof($ITEM_ID_ORDERED_LIST); $i++)
        {
            $SQL_UPDATE_INVENTORY_QTY = "UPDATE items_trading
            SET items_trading.item_count  = (item_count + '$ITEM_QTY_ORDERED_LIST[$i]')                                       
            WHERE item_id ='$ITEM_ID_ORDERED_LIST[$i]';";
        
            $RESULT_UPDATE_INVENTORY_QTY = mysqli_query($dbc,$SQL_UPDATE_INVENTORY_QTY);
            if(!$RESULT_SELECT_ITEMS_ORDERED) 
            {
                die('Error: ' . mysqli_error($dbc));
                echo '<script language="javascript">';
                echo 'alert("Error In Update");';
                echo '</script>';
            } 
            else 
            {
                echo '<script language="javascript">';
                echo 'alert("Update Items Trading Success");';
                echo '</script>';
                // header("Location: Deliveries.php");
            }
        } //End For
    
   } //END IF
   else
   {
        $SQL_UPDATE_ORDERS_TABLE = "UPDATE orders
        SET orders.order_status  = ('$ORDER_STATUS')                                       
        WHERE ordernumber ='$GET_OR_NUMBER';";
        $RESULT_ORDER_TABLE = mysqli_query($dbc,$SQL_UPDATE_ORDERS_TABLE); //Updates order table 
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
            }
        $SQL_UPDATE_DELIVERIES_TABLE = "UPDATE scheduledelivery
        SET scheduledelivery.delivery_status  = ('$ORDER_STATUS')                                       
        WHERE ordernumber ='$GET_OR_NUMBER';";
        $RESULT_SCHED_DELIVER_TABLE = mysqli_query($dbc,$SQL_UPDATE_DELIVERIES_TABLE); //Updates Sched Delivery table
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
            }
        $ITEM_ID_ORDERED_LIST = array();
        $ITEM_QTY_ORDERED_LIST = array();

        $SELECT_ITEMS_ORDERED="SELECT * FROM order_details WHERE ordernumber = '$GET_OR_NUMBER'";
        $RESULT_SELECT_ITEMS_ORDERED = mysqli_query($dbc,$SELECT_ITEMS_ORDERED);
            while($ROW_ITEMS_ORDERED = mysqli_fetch_array($RESULT_SELECT_ITEMS_ORDERED,MYSQLI_ASSOC))
            {
                $ITEM_ID_ORDERED_LIST[] = $ROW_ITEMS_ORDERED['item_id'];
                $ITEM_QTY_ORDERED_LIST[] = $ROW_ITEMS_ORDERED['item_qty'];
            }// END While
        if(!$RESULT_SELECT_ITEMS_ORDERED) 
        {
            die('Error: ' . mysqli_error($dbc));
            echo '<script language="javascript">';
            echo 'alert("Error In Update");';
            echo '</script>';
        } 
        else 
        {
            echo '<script language="javascript">';
            echo 'alert("Select Success");';
            echo '</script>';
            // header("Location: Deliveries.php");
        }

        for($i = 0 ; $i < sizeof($ITEM_ID_ORDERED_LIST); $i++)
        {
            $SQL_UPDATE_INVENTORY_QTY = "UPDATE items_trading
            SET items_trading.item_count  = (item_count + '$ITEM_QTY_ORDERED_LIST[$i]')                                       
            WHERE item_id ='$ITEM_ID_ORDERED_LIST[$i]';";
        
            $RESULT_UPDATE_INVENTORY_QTY = mysqli_query($dbc,$SQL_UPDATE_INVENTORY_QTY);
            if(!$RESULT_SELECT_ITEMS_ORDERED) 
            {
                die('Error: ' . mysqli_error($dbc));
                echo '<script language="javascript">';
                echo 'alert("Error In Update");';
                echo '</script>';
            } 
            else 
            {
                echo '<script language="javascript">';
                echo 'alert("Update Items Trading Success");';
                echo '</script>';
                // header("Location: Deliveries.php");
            }
        } //End For
    
   } //END ELSE
   
    

?>