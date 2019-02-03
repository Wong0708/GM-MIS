<?php

if(isset($_POST['startDate']) && isset($_POST['endDate'])){
    
/* 
    
                                                                                    
BEFORE SPLIT
SELECT rm.materialID AS 'Material ID', rm.materialName AS 'Material Name', IFNULL(CONCAT((od.qtyOrdered * i.qtyNeeded), rm.uom), CONCAT('0', uom)) AS 'Amount Used', IFNULL(CONCAT((pod.qtyOrdered * inv.measurementAmountPerStock), rm.uom), CONCAT('0', rm.uom)) AS 'Amount Restocked', CONCAT((rm.material_qty), rm.uom)AS 'Current Remaining' FROM raw_material rm
LEFT JOIN ingredients i ON i.materialID = rm.materialID
LEFT JOIN product p ON p.productID = i.productID
LEFT JOIN order_details od ON od.productID = p.productID
LEFT JOIN orders o ON o.orderNumber = o.orderNumber
LEFT JOIN inventory inv ON inv.materialID = rm.materialID
LEFT JOIN purchase_order_details pod ON pod.inventoryID = inv.inventoryID
LEFT JOIN purchase_order po ON po.p_orderNumber = pod.orderNumber
                                                                                    
                                                                                    
//ID AND NAME
SELECT rm.materialID AS 'Material ID', rm.materialName AS 'Material Name', rm.uom AS 'UOM' FROM raw_material rm;
                                                                                    
//AMOUNT USED
SELECT rm.materialID AS 'Material ID', rm.materialName AS 'Material Name', IFNULL(SUM(od.qtyOrdered * i.qtyNeeded), 0) AS 'Amount Used' FROM raw_material rm
LEFT JOIN ingredients i ON i.materialID = rm.materialID
LEFT JOIN product p ON p.productID = i.productID
LEFT JOIN order_details od ON od.productID = p.productID
LEFT JOIN orders o ON o.orderNumber = o.orderNumber
WHERE o.orderstatus = 'Fulfilled' AND (o.deliveryDate BETWEEN STARTDATE AND ENDDATE)
GROUP BY 1;
                                                                                
//Amount Restocked
SELECT rm.materialID AS 'Material ID', rm.materialName AS 'Material Name', IFNULL(SUM((pod.qtyOrdered * inv.measurementAmountPerStock)), 0) AS 'Amount Restocked' FROM raw_material rm
LEFT JOIN inventory inv ON inv.materialID = rm.materialID
LEFT JOIN purchase_order_details pod ON pod.inventoryID = inv.inventoryID
LEFT JOIN purchase_order po ON po.p_orderNumber = pod.orderNumber
WHERE po.p_orderstatus = 'Received' AND (po.deliveryDate BETWEEN STARTDATE AND ENDDATE)
GROUP BY 1;
                                                                                    
//Amount Remaining
SELECT rm.materialID AS 'Material ID', rm.materialName AS 'Material Name', rm.material_qty AS 'Current Remaining' FROM raw_material rm;
*/ 
    
    require_once('../mysql_connect.php');
    
    $startDate = date_create($_POST['startDate']);
    $startDate = date_format($startDate, "Y-m-d H:i:s");
    
    $endDate = date_create($_POST['endDate']." 23:59:59");
    $endDate = date_format($endDate, "Y-m-d H:i:s");
    
    $ctr = 0;

    $table='
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Material Code</th>
                <th>Material Name</th>
                <th>Amount Used</th>
                <th>Amount Restocked</th>
                <th>Current Stock</th>
            </tr>
        </thead>
        <tbody>';

    $queryIDAndName = "SELECT rm.materialID AS 'Material ID', rm.materialName AS 'Material Name', rm.uom AS 'UOM' FROM raw_material rm;";
    $resultIDAndName=mysqli_query($dbc,$queryIDAndName);
    $arrayID = array();
    $arrayName = array();
    $arrayUOM = array();
    while($row=mysqli_fetch_array($resultIDAndName,MYSQLI_ASSOC)) {
        array_push($arrayID, $row['Material ID']);
        array_push($arrayName, $row['Material Name']);
        array_push($arrayUOM, $row['UOM']);
    }
    
    $queryAmountUsed = "SELECT rm.materialID AS 'Material ID', rm.materialName AS 'Material Name', IFNULL(SUM(od.qtyOrdered * i.qtyNeeded), 0) AS 'Amount Used' FROM raw_material rm LEFT JOIN ingredients i ON i.materialID = rm.materialID LEFT JOIN product p ON p.productID = i.productID LEFT JOIN order_details od ON od.productID = p.productID LEFT JOIN orders o ON o.orderNumber = o.orderNumber WHERE o.orderstatus = 'Fulfilled' AND (o.deliveryDate BETWEEN '".$startDate."' AND '".$endDate."') GROUP BY 1;";
    $resultAmountUsed=mysqli_query($dbc,$queryAmountUsed);
    $arrayAmountUsed= array();
    while($row=mysqli_fetch_array($resultAmountUsed,MYSQLI_ASSOC)) {
        array_push($arrayAmountUsed, $row['Amount Used']);
    }
       
    $queryAmountRestocked = "SELECT rm.materialID AS 'Material ID', rm.materialName AS 'Material Name', IFNULL(SUM((pod.qtyOrdered * inv.measurementAmountPerStock)), 0) AS 'Amount Restocked' FROM raw_material rm
LEFT JOIN inventory inv ON inv.materialID = rm.materialID
LEFT JOIN purchase_order_details pod ON pod.inventoryID = inv.inventoryID
LEFT JOIN purchase_order po ON po.p_orderNumber = pod.orderNumber
WHERE po.p_orderstatus = 'Received' AND (po.deliveryDate BETWEEN '".$startDate."' AND '".$endDate."')
GROUP BY 1;";
    $resultAmountRestocked=mysqli_query($dbc,$queryAmountRestocked);
    $arrayAmountRestocked= array();
    while($row=mysqli_fetch_array($resultAmountRestocked,MYSQLI_ASSOC)) {
        array_push($arrayAmountRestocked, $row['Amount Restocked']);
    }
    
    $queryStock = "SELECT rm.materialID AS 'Material ID', rm.materialName AS 'Material Name', rm.material_qty AS 'Current Remaining' FROM raw_material rm;";
    $resultStock=mysqli_query($dbc,$queryStock);
    $arrayStock= array();
    while($row=mysqli_fetch_array($resultStock,MYSQLI_ASSOC)) {
        array_push($arrayStock, $row['Current Remaining']);
    }
    
    $ctr = 0;
    while($ctr <= count($arrayID) - 1) {

        $table = $table.'<tr>';
        $table = $table.'<td>';
        $table = $table.$arrayID[$ctr];
        $table = $table.'</td>';
        $table = $table.'<td>';
        $table = $table.$arrayName[$ctr];
        $table = $table.'</td>';
        $table = $table.'<td>';
        if(empty($arrayAmountUsed[$ctr])){
            $table = $table.'0'.$arrayUOM[$ctr];
        }
        else{
            $table = $table.$arrayAmountUsed[$ctr].$arrayUOM[$ctr];
        }
        $table = $table.'</td>';
        $table = $table.'<td>';
        if(empty($arrayAmountRestocked[$ctr])){
            $table = $table.'0'.$arrayUOM[$ctr];
        }
        else{
            $table = $table.$arrayAmountRestocked[$ctr].$arrayUOM[$ctr];
        }
        $table = $table.'</td>';
        $table = $table.'<td>';
        if(empty($arrayStock[$ctr])){
            $table = $table.'0'.$arrayUOM[$ctr];
        }
        else{
            $table = $table.$arrayStock[$ctr].$arrayUOM[$ctr];
        }
        $table = $table.'</td>';
        $table = $table.'</tr>';

        $ctr = $ctr + 1;
    }

    $table = $table.'</tbody></table>';

    echo $table;
}

?>