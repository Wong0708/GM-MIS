<?php
if(isset($_POST['username'])){
    $username = $_POST['username'];
    require_once('../mysql_connect.php');
    $query="SELECT username FROM user WHERE '$username' = username";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if($row['username'] == $username AND $username != ""){
        echo "0";
    }
    else
        echo "1";
}
?>