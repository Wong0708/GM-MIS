<?php
session_start();
if(isset($_POST['oldPassword']) AND isset($_POST['newPassword']) AND isset($_POST['repeatPassword'])){
    require_once('../mysql_connect.php');
    $username = $_SESSION['username'];
    $password = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $query="SELECT usertypeID, user_status FROM user WHERE '$username' = username AND PASSWORD('$password') = password";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(!($_POST['newPassword'] ==  $_POST['repeatPassword']))
        echo 2;
    else if(!($row['usertypeID']))
        echo 1;
    else if($row['usertypeID'] AND $_POST['newPassword'] == $_POST['repeatPassword']) {
        $query="UPDATE user SET password = PASSWORD('$newPassword') WHERE username = '$username'";
        mysqli_query($dbc, $query);
        if($row['user_status'] == "Active - New Account"){
            $query="UPDATE user SET user_status = 'Active' WHERE username = '$username'";
            mysqli_query($dbc, $query);
            $_SESSION['user_status'] = "Active";
        }
        echo 3;
    }
}
?>