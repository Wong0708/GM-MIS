<?php
if(isset($_POST['product']) && isset($_POST['quantity'])){
    session_start();
    require_once('./mysql_connect.php');
    
    if(!isset($_SESSION['itemArray'])){
        $_SESSION['itemArray'] = array();
    }

    if(!isset($_SESSION['quantityArray'])){
        $_SESSION['quantityArray'] = array();
    }

    array_push($_SESSION['itemArray'], $_POST['product']);
    array_push($_SESSION['quantityArray'], $_POST['quantity']);

    $table ='
    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
      <thead>
        <tr>
            <th>Item Name</th>
             <th>Item Type</th>
             <th>Price</th>
             <th>Quantity</th>
             <th>Action</th>
        </tr>
      </thead>
      <tbody>';
    
    $totalPayment = 0;
    $ctr = 0;
    while($ctr < count($_SESSION['itemArray'])){
        $queryProduct = 'SELECT * FROM items_trading WHERE item_id ='.$_SESSION['itemArray'][$ctr].';';
        $resultProduct = mysqli_query($dbc, $queryProduct);
        $rowProduct = mysqli_fetch_array($resultProduct,MYSQLI_ASSOC);
        $productName = $rowProduct['item_name'];
        $price = $rowProduct['price'];

        $queryItemType = "SELECT itemtype FROM ref_itemtype WHERE itemtype_id =" . $row['itemtype_id'] . ";";
        $resultItemType = mysqli_query($dbc,$queryItemType);
        $rowItemType=mysqli_fetch_array($resultItemType,MYSQLI_ASSOC);
        $itemType = $rowItemType['itemtype'];


        $table = $table.'<tr>';
        $table = $table.'<td>'.$productName.'</td>
                         <td>'.$itemType.'</td>
                         <td>'.$_SESSION['quantityArray'][$ctr].'</td>
                         <td>'.$_SESSION['quantityArray'][$ctr]*$price.'</td>;

                         <td><button type="button" onclick="removeProductFromOrder('.$ctr.');" class="btn btn-danger">Delete</button></td>';
        $table = $table.'</tr>';
        $totalPayment = $totalPayment + $_SESSION['quantityArray'][$ctr]*$price;
        $ctr++;
    }

$table = $table.'
  </tbody>
</table>
<input type="hidden" name="totalPayment" value="'.$totalPayment.'"><h4>Total Payment: P'.number_format($totalPayment,2).'</h4>
';
echo $table;
    
}
?>