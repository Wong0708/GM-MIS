<?php
if(isset($_POST['supplierID'])){
    session_start();
    require_once('../mysql_connect.php');
    

    $dropdown ='
    <select id="inventoryID" class="form-control" name="inventoryID">';
    
    $query = "SELECT * FROM inventory WHERE supplierID = ".$_POST['supplierID'];
    $result=mysqli_query($dbc,$query);
        
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $check = 1;
        $dropdown = $dropdown.'<option value="'.$row['inventoryID'].'">'.$row['inventoryName'].'</option>';
    }
    
    $dropdown = $dropdown.'
      </select>  
    ';

    if(!isset($check)){
        echo "No inventory has been linked to this Supplier!";
    }
    else{
        echo $dropdown;
    }
        
    if(isset($_SESSION['materialArray']))
    unset($_SESSION['materialArray']);

    if(isset($_SESSION['quantityArray']))
    unset($_SESSION['quantityArray']);

}
?>