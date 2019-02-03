<?php
session_start();
if(isset($_POST['lastName']) AND isset($_POST['firstName']) AND isset($_POST['middleName']) AND isset($_POST['jobType']) AND isset($_POST['accountType']) AND isset($_POST['branch']) AND isset($_POST['username']) AND isset($_POST['mobileNumber']) AND isset($_POST['residence']) AND isset($_POST['email']) AND isset($_POST['status'])){
    require_once('../mysql_connect.php');

    $usertypeID = $_POST['accountType'];
    $jobID = $_POST['jobType'];
    $branchID = $_POST['branch'];
    $username = $_POST['username'];
    $last_name = $_POST['lastName'];
    $first_name = $_POST['firstName'];
    $middle_name = $_POST['middleName'];
    $mobileNo = $_POST['mobileNumber'];
    $residence = $_POST['residence'];
    $emailaddress = $_POST['email'];
    $user_status = $_POST['status'];

    $query="UPDATE user SET usertypeID = '$usertypeID', jobID = '$jobID', branchID = '$branchID', username = '$username', last_name = '$last_name', first_name = '$first_name', last_name = '$last_name', middle_name = '$middle_name', mobileNo = '$mobileNo', residence = '$residence', emailaddress = '$emailaddress', user_status = '$user_status' WHERE username = '$username'";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
}
?>

