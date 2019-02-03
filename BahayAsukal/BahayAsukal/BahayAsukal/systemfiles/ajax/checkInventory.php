<?php
if(isset($_POST['inventoryname'])){
    $name = $_POST['inventoryname'];
    require_once('../mysql_connect.php');
    $query="SELECT inventoryName FROM inventory WHERE '$name' LIKE inventoryName";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if($row['inventoryName'] == $name AND $name != ""){
        echo "0";
    }
    else
        echo "1";
}
?>