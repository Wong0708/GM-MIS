<?php
if(isset($_POST['orderNumberIndex']) && isset($_POST['status'])){
    session_start();
    require_once('../mysql_connect.php');
    
    if($_POST['status'] == 0){
        $status = 'Cancelled';
    }
    if($_POST['status'] == 1){
        $status = 'Fulfilled';
    }
    
    $query="UPDATE orders SET orderstatus = '$status' WHERE orderNumber = '{$_POST['orderNumberIndex']}'";
    $result=mysqli_query($dbc,$query);
    
    $table ='';
    
    $table =$table. '
    <table id="datatable-buttons" class="table table-striped table-bordered">
      <thead>
        <tr>
            <th>Order Number</th>
            <th>Client</th>
            <th>Payment Type</th>
            <th>Order Date</th>
            <th>Delivery Date</th>
            <th>Comments</th>
            <th>Total Payment</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>';

    
    $query = "SELECT * FROM orders WHERE orderstatus = 'On-going'";
    $result=mysqli_query($dbc,$query);
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $queryClient = 'SELECT * FROM client WHERE clientID ='.$row['clientID'].';';
        $resultClient = mysqli_query($dbc, $queryClient);
        $rowClient = mysqli_fetch_array($resultClient,MYSQLI_ASSOC);
        $client = $rowClient['clientName'];

        $queryPayment = 'SELECT * FROM ref_payment WHERE paymentID ='.$row['paymentID'].';';
        $resultPayment = mysqli_query($dbc, $queryPayment);
        $rowPayment = mysqli_fetch_array($resultPayment,MYSQLI_ASSOC);
        $payment = $rowPayment['paymentmethod'];
        
        $table = $table.'<tr>';
        $table = $table.'<td>'.$row['orderNumber'].'</td>
                         <td>'.$client.'</td>
                         <td>'.$payment.'</td>
                         <td>'.$row['orderDate'].'</td>
                         <td>'.$row['deliveryDate'].'</td>
                         <td>'.$row['comments'].'</td>
                         <td>'.$row['totalPayment'].'</td>
                         <td><button type="button" name ="fulfill" class="btn btn-success" onclick="endOrder('.$row['orderNumber'].', 1);">Fulfill</button><button type="button" name ="cancel" class="btn btn-danger" onclick="endOrder('.$row['orderNumber'].', 0);">Cancel</button><button type="button" name ="view" class="btn btn-info" onclick="viewOrderDetails('.$row['orderNumber'].');" data-toggle="modal" data-target=".bs-example-modal-lg3">Order Details</button></td>
                         ';
        $table = $table.'</tr>';
        $check = 1;
    }
    
    if($_POST['status'] == 1){
        $query = "SELECT 
                    OD.orderNumber,
                    P.productID,
                    I.materialID,
                    I.qtyNeeded * OD.qtyOrdered AS 'totalQuantity'
                FROM
                    order_details OD
                        JOIN
                    product P ON OD.productID = P.productID
                        JOIN
                    ingredients I ON I.productID = P.productID
                WHERE
                    OD.orderNumber = ".$_POST['orderNumberIndex']."
                ORDER BY 1;
            ";
         $result=mysqli_query($dbc,$query);
         while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $query = "UPDATE raw_material SET material_qty = material_qty - ".$row['totalQuantity']." WHERE materialID = ".$row['materialID'];
            $resultUpdate =mysqli_query($dbc,$query);

            $query = "SELECT 
                            INV.inventoryID,
                            INV.measurementAmountPerStock,
                            MAX(INV.quantity)
                        FROM
                            raw_material RM
                                JOIN
                            inventory INV ON INV.materialID = RM.materialID
                        WHERE
                            RM.materialID = ".$row['materialID']."
                        ORDER BY 1
                        LIMIT 1;";
            $resultAmount = mysqli_query($dbc,$query);
            $rowAmount = mysqli_fetch_array($resultAmount,MYSQLI_ASSOC);

            $query = "UPDATE inventory 
                         SET quantity = quantity-({$row['totalQuantity']}/{$rowAmount['measurementAmountPerStock']}) 
                       WHERE inventoryID = {$rowAmount['inventoryID']}";            
            $resultUpdate =mysqli_query($dbc,$query);

        }
    }
    

    $table = $table.'
      </tbody>
    </table>  
    ';
    
    if(!isset($check)){
        echo "No On-going Orders!";
    }
    else{
        echo $table;
    }

}
?>