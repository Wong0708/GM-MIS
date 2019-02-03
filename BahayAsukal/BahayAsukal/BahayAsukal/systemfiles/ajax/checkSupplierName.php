<?php
if(isset($_POST['name'])){
    $name = $_POST['name'];
    require_once('../mysql_connect.php');
    $query="SELECT supplierName FROM supplier WHERE '$name' LIKE supplierName";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if($row['supplierName'] == $name AND $name != ""){
        echo "0";
    }
    else
        echo "1";
}
?>