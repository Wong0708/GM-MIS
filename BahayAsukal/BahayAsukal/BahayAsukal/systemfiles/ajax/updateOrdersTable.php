<?php
    session_start();
    require_once('../mysql_connect.php');

    
    if(isset($_SESSION['productArray']))
        unset($_SESSION['productArray']);

    if(isset($_SESSION['quantityArray']))
        unset($_SESSION['quantityArray']);

    $table ='
    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
      <thead>
        <tr>
            <th>Inventory Name</th>
                                        <th>Unit Amount</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total Amount</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
        </tr>
      </thead>
      <tbody>';

    $table = $table.'
      </tbody>
    </table>  
    ';
    
    echo $table;

?>