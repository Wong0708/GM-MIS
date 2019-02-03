<?php
if(isset($_POST['purchaseOrderIndex'])){
    session_start();
    require_once('../mysql_connect.php');
    
    $table ='<h2>PO Details</h2>';
    
    $table =$table. '
    <table id="datatable-buttons" class="table table-striped table-bordered">
      <thead>
        <tr>
            <th>Inventory Name</th>
            <th>Unit Amount</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Total Price</th>
        </tr>
      </thead>
      <tbody>';

    $query = "SELECT * FROM purchase_order_details WHERE orderNumber = ".$_POST['purchaseOrderIndex'];
    $result=mysqli_query($dbc,$query);

    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $queryInventory = 'SELECT * FROM inventory WHERE inventoryID ='.$row['inventoryID'].';';
        $resultInventory = mysqli_query($dbc, $queryInventory);
        $rowInventory = mysqli_fetch_array($resultInventory,MYSQLI_ASSOC);
        $materialID = $rowInventory['materialID'];
        $inventoryName = $rowInventory['inventoryName'];
        $inventoryPrice = $rowInventory['price'];
        $measurementAmountPerStock = $rowInventory['measurementAmountPerStock'];

        $queryMaterial = 'SELECT materialName, uom FROM raw_material WHERE materialID ='.$materialID.';';
        $resultMaterial = mysqli_query($dbc, $queryMaterial);
        $rowMaterial = mysqli_fetch_array($resultMaterial,MYSQLI_ASSOC);
        $materialName = $rowMaterial['materialName'];
        $uom = $rowMaterial['uom'];


        $table = $table.'<tr>';
        $table = $table.'<td>'.$inventoryName.'</td>
                         <td>'.$measurementAmountPerStock.$uom.'</td>
                         <td>P'.number_format($inventoryPrice, 2).'</td>
                         <td>'.$row['qtyOrdered'].'</td>
                         <td>'.$row['qtyOrdered']*$measurementAmountPerStock.$uom.'</td>
                         <td>P'.number_format($row['qtyOrdered']*$inventoryPrice, 2).'</td>';
        $table = $table.'</tr>';
    }

    $table = $table.'
      </tbody>
    </table>  
    ';
    
    echo $table;

}
?>