<?php
if(isset($_POST['productname'])){
    $name = $_POST['productname'];
    require_once('../mysql_connect.php');
    $query="SELECT productName FROM product WHERE '$name' = productName";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if($row['productName'] == $name AND $name != ""){
        echo "0";
    }
    
    else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name)){
        echo "2";
    }
    else
        echo "1";
}
?>