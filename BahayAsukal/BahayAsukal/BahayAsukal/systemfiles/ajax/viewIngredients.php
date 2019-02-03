<?php
if(isset($_POST['productIndex'])){
    session_start();
    require_once('../mysql_connect.php');
    
    $query = "SELECT productName FROM product WHERE productID = ".$_POST['productIndex'];
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $productName = $row['productName'];
    
    $table ='<h2>Ingredients for '.$productName.'</h2>';
    
    $table =$table. '
    <table id="datatable-buttons" class="table table-striped table-bordered">
      <thead>
        <tr>
            <th>Material</th>
            <th>Material Measurement</th>
        </tr>
      </thead>
      <tbody>';

    $query = "SELECT * FROM ingredients WHERE productID = ".$_POST['productIndex'];
    $result=mysqli_query($dbc,$query);

    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $queryMaterial = 'SELECT materialName, uom FROM raw_material WHERE materialID =' . $row['materialID'] . ';';
        $resultMaterial = mysqli_query($dbc, $queryMaterial);
        $rowMaterial = mysqli_fetch_array($resultMaterial, MYSQLI_ASSOC);
        $materialName = $rowMaterial['materialName'];
        $uom = $rowMaterial['uom'];
        $quantity = $row['qtyNeeded'];
        
        $table = $table . '<tr>';
        $table = $table . '<td>' . $materialName . '</td><td>' . $quantity. $uom . '</td>';
        $table = $table . '</tr>';
    }

    $table = $table.'
      </tbody>
    </table>  
    ';
    
    echo $table;

}
?>