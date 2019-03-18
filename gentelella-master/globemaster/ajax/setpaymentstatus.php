<?php
    session_start();

    $_SESSION['payment_status'] = $_POST['post_payment_type'];

    echo $_SESSION['payment_status'];
?>