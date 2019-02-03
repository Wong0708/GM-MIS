<?php
if(isset($_POST['orderNumberIndex']) && isset($_POST['deliveryDate'])){
    session_start();
    require_once('../mysql_connect.php');
    
    $query="UPDATE orders SET deliveryDate = '{$_POST['deliveryDate']}', orderstatus = 'On-going' WHERE orderNumber = '{$_POST['orderNumberIndex']}'";
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
            <th>Comments</th>
            <th>Total Payment</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>';

    
    $query = "SELECT * FROM orders WHERE orderstatus = 'Pending'";
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
                         <td>'.$row['comments'].'</td>
                         <td>'.$row['totalPayment'].'</td>
                         <td><button type="submit" name ="view" class="btn btn-info" onclick="setHidden('.$row['orderNumber'].');" data-toggle="modal" data-target=".bs-example-modal-lg4">Set Delivery Date</button></td>
                         ';
        $table = $table.'</tr>';
        $check = 1;
    }
    
    $query = "SELECT * FROM order_details WHERE orderNumber = '".$_POST['orderNumberIndex']."';";
    $result=mysqli_query($dbc,$query);
     while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $query = "UPDATE order_details SET productionDate = NOW() WHERE orderNumber = '".$_POST['orderNumberIndex']."' AND productID = '".$row['productID']."';";
        $resultUpdate =mysqli_query($dbc,$query);
    }

    $table = $table.'
      </tbody>
    </table>  
    ';
    
    if(!isset($check)){
        echo "No Pending Orders!";
    }
    else{
        echo $table;
    }

}
?>