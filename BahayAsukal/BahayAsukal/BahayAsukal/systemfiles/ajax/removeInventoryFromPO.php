<?php
if(isset($_POST['inventoryIndex'])){
    session_start();
    require_once('../mysql_connect.php');

    unset($_SESSION['inventoryArray'][$_POST['inventoryIndex']]);
    unset($_SESSION['quantityArray'][$_POST['inventoryIndex']]);

    $_SESSION['inventoryArray'] = array_values($_SESSION['inventoryArray']);
    $_SESSION['quantityArray'] = array_values($_SESSION['quantityArray']);

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
    
    $totalPayment = 0;
    $ctr = 0;
    while($ctr < count($_SESSION['inventoryArray'])){
        $queryInventory = 'SELECT * FROM inventory WHERE inventoryID ='.$_SESSION['inventoryArray'][$ctr].';';
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
                         <td>'.$_SESSION['quantityArray'][$ctr].'</td>
                         <td>'.$_SESSION['quantityArray'][$ctr]*$measurementAmountPerStock.$uom.'</td>
                         <td>P'.number_format($_SESSION['quantityArray'][$ctr]*$inventoryPrice, 2).'</td>
                         <td><button type="button" onclick="removeInventoryFromPO('.$ctr.');" class="btn btn-danger">Delete</button></td>';
        $table = $table.'</tr>';
        $totalPayment = $totalPayment + $_SESSION['quantityArray'][$ctr]*$inventoryPrice;
        $ctr++;
    }

$table = $table.'
  </tbody>
</table>
<input type="hidden" name="totalPayment" value="'.$totalPayment.'"><h4>Total Payment: P'.number_format($totalPayment, 2).'</h4>
';
echo $table;

}
?>