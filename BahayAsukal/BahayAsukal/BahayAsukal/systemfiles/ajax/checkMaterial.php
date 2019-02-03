<?php
if(isset($_POST['materialname'])){
    $name = $_POST['materialname'];
    require_once('../mysql_connect.php');
    $query="SELECT materialName FROM raw_material WHERE '$name' LIKE materialName";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if($row['materialName'] == $name AND $name != ""){
        echo "0";
    }else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name)){
        echo "2";
    }else if(preg_match("/^[0-9]+$/", $name)){
        echo"3";
    }
    else
        echo "1";
}
?>