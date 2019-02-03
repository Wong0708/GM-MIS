<?php
if(isset($_POST['productID']) AND isset($_POST['quantity'])){
    require_once('../mysql_connect.php');
    
    $quantity = $_POST['quantity'];
    $productID = $_POST['productID'];
    
    $query="SELECT rm.materialID AS 'Material ID', rm.materialName AS 'Material Name', (".$quantity." * i.qtyNeeded) AS 'Amount Used', rm.material_qty AS 'qty' FROM raw_material rm
LEFT JOIN ingredients i ON i.materialID = rm.materialID
LEFT JOIN product p ON p.productID = i.productID
LEFT JOIN order_details od ON od.productID = p.productID
LEFT JOIN orders o ON o.orderNumber = o.orderNumber
WHERE p.productID = '".$productID."';";
    
    $result=mysqli_query($dbc,$query);

    $invalidMaterial = "";
    $invalidFlag = 0;
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        if($row['Amount Used'] > $row['qty']){
            if($invalidFlag == 0){
                $invalidMaterial =  $invalidMaterial.$row['Material Name'];
            }
            else if($invalidFlag == 1){
                $invalidMaterial =  $invalidMaterial.', '.$row['Material Name'];
            }
            $invalidFlag = 1;
        }
    }
    if($invalidFlag == 1){
        echo "Not Enough Materials! Please Replenish Materials.";
    }else{
        echo "";
    }
}

/*
SELECT rm.materialID AS 'Material ID', rm.materialName AS 'Material Name', quantity * i.qtyNeeded), 0) AS 'Amount Used' FROM raw_material rm
LEFT JOIN ingredients i ON i.materialID = rm.materialID
LEFT JOIN product p ON p.productID = i.productID
LEFT JOIN order_details od ON od.productID = p.productID
LEFT JOIN orders o ON o.orderNumber = o.orderNumber
WHERE p.productID = productID
GROUP BY 1;
*/
?>