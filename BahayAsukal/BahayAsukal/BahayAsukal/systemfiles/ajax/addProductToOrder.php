<?php
if(isset($_POST['product']) && isset($_POST['quantity'])){
    session_start();
    require_once('../mysql_connect.php');
    
    if(!isset($_SESSION['productArray'])){
        $_SESSION['productArray'] = array();
    }

    if(!isset($_SESSION['quantityArray'])){
        $_SESSION['quantityArray'] = array();
    }

    array_push($_SESSION['productArray'], $_POST['product']);
    array_push($_SESSION['quantityArray'], $_POST['quantity']);

    $table ='
    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
      <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>';
    
    $totalPayment = 0;
    $ctr = 0;
    while($ctr < count($_SESSION['productArray'])){
        $queryProduct = 'SELECT * FROM product WHERE productID ='.$_SESSION['productArray'][$ctr].';';
        $resultProduct = mysqli_query($dbc, $queryProduct);
        $rowProduct = mysqli_fetch_array($resultProduct,MYSQLI_ASSOC);
        $productName = $rowProduct['productName'];
        $price = $rowProduct['productCost'];

        $table = $table.'<tr>';
        $table = $table.'<td>'.$productName.'</td>
                         <td>P'.number_format($price, 2).'</td>
                         <td>'.$_SESSION['quantityArray'][$ctr].'</td>
                         <td>P'.number_format($_SESSION['quantityArray'][$ctr]*$price, 2).'</td>
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