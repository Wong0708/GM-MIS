<?php
// if(isset($_POST['clientTypeID']) && isset($_POST['clientName']) && isset($_POST['emailAddress']) && isset($_POST['mobileNo']) && isset($_POST['telephoneNo'])){
    session_start();
    require_once('../mysql_connect.php');
    
    
    
    $clientTypeID = $_POST['clientTypeID'];
    $clientName = $_POST['clientName'];
    $emailAddress = $_POST['emailAddress'];
    $mobileNo = $_POST['mobileNo'];
    $telephoneNo = $_POST['telephoneNo'];
    
    $query="INSERT INTO client(clientID, clientTypeID, clientName, emailAddress, mobileNo, telephoneNo)
                VALUES(nextClientID(), '$clientTypeID', '$clientName', '$emailAddress', '$mobileNo', '$telephoneNo');";
    $result=mysqli_query($dbc,$query);
    echo $query;
    
    $query = "SELECT * FROM client";
    $result=mysqli_query($dbc,$query);
    
    $dropdown = '';
        
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $dropdown = $dropdown.'<option value="'.$row['clientID'].'">'.$row['clientName'].'</option>';
    }
    
    echo $dropdown;
// }
?>