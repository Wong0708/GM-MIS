<?php
if(isset($_POST['productIndex'])){
    session_start();
    require_once('../mysql_connect.php');

    unset($_SESSION['productArray'][$_POST['productIndex']]);
    unset($_SESSION['quantityArray'][$_POST['productIndex']]);

    $_SESSION['productArray'] = array_values($_SESSION['productArray']);
    $_SESSION['quantityArray'] = array_values($_SESSION['quantityArray']);

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
                         <td>'.$price.'</td>
                         <td>'.$_SESSION['quantityArray'][$ctr].'</td>
                         <td>'.$_SESSION['quantityArray'][$ctr]*$price.'</td>
                         <td><button type="button" onclick="removeProductFromOrder('.$ctr.');" class="btn btn-danger">Delete</button></td>';
        $table = $table.'</tr>';
        $totalPayment = $totalPayment + $_SESSION['quantityArray'][$ctr]*$price;
        $ctr++;
    }

    $table = $table.'
      </tbody>
    </table>  
    <input type="hidden" name="totalPayment" value="'.$totalPayment.'"><h4>Total Payment: '.$totalPayment.'</h4>
    ';
    
    echo $table;

}
?>