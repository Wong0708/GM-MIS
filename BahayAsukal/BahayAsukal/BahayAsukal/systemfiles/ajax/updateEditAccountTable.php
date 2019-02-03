<?php

require_once('../mysql_connect.php');
$query = "SELECT * FROM user";
$result=mysqli_query($dbc,$query);

$table='
<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Job Type</th>
            <th>Account Type</th>
            <th>Branch</th>
            <th>Username</th>
            <th>Mobile Number</th>
            <th>Residence</th>
            <th>Email Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>';

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {

    $branchname = "SELECT branchID, branchName FROM branch WHERE branchID = '{$row['branchID']}'";
    $result1=mysqli_query($dbc,$branchname);
    $shit=mysqli_fetch_array($result1,MYSQLI_ASSOC);
    $branch = $shit['branchName'];

    $usertype = "SELECT usertypeID, usertype FROM ref_usertype WHERE usertypeID = '{$row['usertypeID']}'";
    $result2=mysqli_query($dbc,$usertype);
    $shit2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $userType = $shit2['usertype'];

    $usertype = "SELECT jobID, jobTitle FROM job_list WHERE jobID = '{$row['jobID']}'";
    $result3=mysqli_query($dbc,$usertype);
    $shit3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
    $jobType = $shit3['jobTitle'];

    $table = $table.'<tr><form method="post" action=""><input type="hidden" name="id" value="'.$row['userID'].'">';
    $table = $table.'<td>';
    $table = $table.$row['last_name'].'<input type="hidden" id="lastName'.$row['userID'].'" value="'.$row['last_name'].'" />';
    $table = $table.'</td>';
    $table = $table.'<td>';
    $table = $table.$row['first_name'].'<input type="hidden" id="firstName'.$row['userID'].'" value="'.$row['first_name'].'" />';
    $table = $table.'</td>';
    $table = $table.'<td>';
    $table = $table.$row['middle_name'].'<input type="hidden" id="middleName'.$row['userID'].'" value="'.$row['middle_name'].'" />';
    $table = $table.'</td>';
    $table = $table.'<td>';
    $table = $table.$jobType.'<input type="hidden" id="jobType'.$row['userID'].'" value="'.$shit3['jobID'].'" />';
    $table = $table.'</td>';
    $table = $table.'<td>';
    $table = $table.$userType.'<input type="hidden" id="userType'.$row['userID'].'" value="'.$shit2['usertypeID'].'" />';
    $table = $table.'</td>';
    $table = $table.'<td>';
    $table = $table.$branch.'<input type="hidden" id="branch'.$row['userID'].'" value="'.$shit['branchID'].'" />';
    $table = $table.'</td>';
    $table = $table.'<td>';
    $table = $table.$row['username'].'<input type="hidden" id="username'.$row['userID'].'" value="'.$row['username'].'" />';
    $table = $table.'</td>';
    $table = $table.'<td>';
    $table = $table.$row['mobileNo'].'<input type="hidden" id="mobileNo'.$row['userID'].'" value="'.$row['mobileNo'].'" />';
    $table = $table.'</td>';
    $table = $table.'<td>';
    $table = $table.$row['residence'].'<input type="hidden" id="residence'.$row['userID'].'" value="'.$row['residence'].'" />';
    $table = $table.'</td>';
    $table = $table.'<td>';
    $table = $table.$row['emailaddress'].'<input type="hidden" id="emailAddress'.$row['userID'].'" value="'.$row['emailaddress'].'" />';
    $table = $table.'</td>';
    $table = $table.'<td>';
    $table = $table.$row['user_status'].'<input type="hidden" id="status'.$row['userID'].'" value="'.$row['user_status'].'" />';
    $table = $table.'</td>';
    $table = $table.'<td>';
    $table = $table.'<button type="button" data-toggle="modal" data-target=".bs-example-modal-lgEditAccount" onclick="passAccountDataToModal('.$row['userID'].');"class="btn btn-info">Edit</button></form>';
    $table = $table.'</td>';

}

$table = $table.'</tbody></table>';

echo $table;

?>