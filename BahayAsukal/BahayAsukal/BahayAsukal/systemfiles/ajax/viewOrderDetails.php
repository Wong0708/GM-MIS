<?php
if(isset($_POST['orderDetailsIndex'])){
    session_start();
    require_once('../mysql_connect.php');
    
    $table ='';
    
    $table =$table. '
    <table id="datatable-buttons" class="table table-striped table-bordered">
      <thead>
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Production Date</th>
        </tr>
      </thead>
      <tbody>';

    $query = "SELECT * FROM order_details WHERE orderNumber = ".$_POST['orderDetailsIndex'];
    $result=mysqli_query($dbc,$query);

    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $queryInventory = 'SELECT * FROM product WHERE productID ='.$row['productID'].';';
        $resultInventory = mysqli_query($dbc, $queryInventory);
        $rowInventory = mysqli_fetch_array($resultInventory,MYSQLI_ASSOC);
        $productName = $rowInventory['productName'];
        $price = $rowInventory['productCost'];

        $table = $table.'<tr>';
        $table = $table.'<td>'.$productName.'</td>
                         <td>P'.number_format($price, 2).'</td>
                         <td>'.$row['qtyOrdered'].'</td>
                         <td>P'.number_format($row['qtyOrdered']*$price, 2).'</td>
                         <td>'.$row['productionDate'].'</td>
                         ';
        $table = $table.'</tr>';
    }

    $table = $table.'
      </tbody>
    </table>  
    ';
    
    echo $table;

}
?>