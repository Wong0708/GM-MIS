<?php

if(isset($_POST['branch']) && isset($_POST['startDate']) && isset($_POST['endDate'])){
    
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


//Get Sales report
SELECT p.productID AS 'Product ID', p.productName AS 'Product Name', SUM(od.qtyOrdered) AS 'Total Ordered', p.productCost AS 'Unit Price', productCost * SUM(od.qtyOrdered) AS 'Total Sales' FROM product p
JOIN order_details od ON od.productID = p.productID
JOIN orders o ON o.orderNumber = od.orderNumber
WHERE orderStatus = 'Fulfilled' AND (o.deliveryDate BETWEEN '2018-08-01 00:00:00' AND '2018-08-29 23:59:59')
GROUP BY 1;
*/ 
    
    require_once('../mysql_connect.php');
    
    $startDate = date_create($_POST['startDate']);
    $startDate = date_format($startDate, "Y-m-d H:i:s");
    
    $endDate = date_create($_POST['endDate']." 23:59:59");
    $endDate = date_format($endDate, "Y-m-d H:i:s");
    
    $branchID = $_POST['branch'];

    $table='
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Total Sold</th>
                <th>Unit Price</th>
                <th>Total Sales</th>
            </tr>
        </thead>
        <tbody>';
    
    if($branchID == 0){
    $querySalesReport = "SELECT p.productID AS 'Product ID', p.productName AS 'Product Name', SUM(od.qtyOrdered) AS 'Total Ordered', p.productCost AS 'Unit Price', productCost * SUM(od.qtyOrdered) AS 'Total Sales' FROM product p
JOIN order_details od ON od.productID = p.productID
JOIN orders o ON o.orderNumber = od.orderNumber
WHERE orderStatus = 'Fulfilled' AND (o.deliveryDate BETWEEN '".$startDate."' AND '".$endDate."')
GROUP BY 1;";
    }
    else{
       $querySalesReport = "SELECT p.productID AS 'Product ID', p.productName AS 'Product Name', SUM(od.qtyOrdered) AS 'Total Ordered', p.productCost AS 'Unit Price', productCost * SUM(od.qtyOrdered) AS 'Total Sales' FROM product p
JOIN order_details od ON od.productID = p.productID
JOIN orders o ON o.orderNumber = od.orderNumber
WHERE orderStatus = 'Fulfilled' AND (o.deliveryDate BETWEEN '".$startDate."' AND '".$endDate."') AND od.branchID = ".$branchID."
GROUP BY 1;"; 
    }
    
    $totalSales = 0;
    
    $resultSalesReport=mysqli_query($dbc,$querySalesReport);
    while($row=mysqli_fetch_array($resultSalesReport,MYSQLI_ASSOC)) {
        
        $table = $table.'<tr>';
        $table = $table.'<td>';
        $table = $table.$row['Product ID'];
        $table = $table.'</td>';
        $table = $table.'<td>';
        $table = $table.$row['Product Name'];
        $table = $table.'</td>';
        $table = $table.'<td>';
        $table = $table.$row['Total Ordered'];
        $table = $table.'</td>';
        $table = $table.'<td>';
        $table = $table.'P'.number_format($row['Unit Price'], 2);
        $table = $table.'</td>';
        $table = $table.'<td>';
        $table = $table.'P'.number_format($row['Total Sales'], 2);
        $table = $table.'</td>';
        $table = $table.'</tr>';
        
        $totalSales = $totalSales + $row['Total Sales'];

    }
        
    $table = $table.'</tbody></table>';
    
    $table = $table.'<div align="right"><b><h2>Total Sales: Php '.number_format($totalSales, 2).'</h2></b></div>';
    
    echo $table;
}

?>