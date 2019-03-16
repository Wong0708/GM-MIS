<?php
    session_start();
    
    $_SESSION['DeliveryStatus'] = $_POST['deltype'];
    // echo $_POST['deltype'];
    echo $_SESSION['DeliveryStatus'];
?>