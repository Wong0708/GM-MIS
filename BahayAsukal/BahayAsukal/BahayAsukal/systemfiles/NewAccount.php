<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];

if(isset($_POST['save']))
{

    require_once('mysql_connect.php');
    $query="SELECT usertypeID FROM ref_usertype WHERE usertype = '{$_POST['position']}'";
    $result1=mysqli_query($dbc,$query);
    $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
    $position = $row1['usertypeID'];

    $query="SELECT branchID FROM branch WHERE branch = '{$_POST['branch']}'";
    $result12=mysqli_query($dbc,$query);
    $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $branch = $row1['branchID'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $branch = $_POST['branch'];
    $username = $_POST['username'];
    $mobile = $_POST['mobileno'];
    $residence = $_POST['residence'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $userID = $_SESSION['editID'];


    require_once('mysql_connect.php');
    $query="UPDATE user SET first_name = '{$fname}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET last_name = '{$lname}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET middle_name = '{$mname}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET usertypeID = '{$position}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET branchID = '{$branch}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET username = '{$username}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET mobileno = '{$mobile}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET residence = '{$residence}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET emailaddress = '{$email}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    $query="UPDATE user SET status = '{$status}' WHERE userID = '{$userID}'";
    $result=mysqli_query($dbc,$query);
    header("Location: http://".$_SERVER['HTTP_HOST'].
        dirname($_SERVER['PHP_SELF'])."/EditAccounts.php");
}

?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sugarhouse</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <?php
        require_once("nav.php");
        ?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Change Default Password</h2>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <label>Before proceeding any further please change your default password to a more secure password.</label>
                            <br />

                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New Password<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="newPasswordAccount" required="required" class="form-control col-md-7 col-xs-12" name="newPasswordAccount" value="">
                                    </div>
                                    <label class="control-label red" id="newPasswordLabelAccount" for="first-name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm New Password<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="repeatPasswordAccount" required="required" class="form-control col-md-7 col-xs-12" name="repeatPasswordAccount" value="">
                                    </div>
                                </div>
                                <input type="hidden" id="oldPasswordAccount" required="required" class="form-control col-md-7 col-xs-12" name="oldPasswordAccount" value="1234">
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="button" onclick="changeDefaultPassword();" name="save">Save Changes</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

    </div>
</div>

<script>
function changeDefaultPassword() {
    let oldPassword = document.getElementById("oldPasswordAccount").valueOf().value;
    let newPassword = document.getElementById("newPasswordAccount").valueOf().value;
    let repeatPassword = document.getElementById("repeatPasswordAccount").valueOf().value;
    $.ajax({
        type: 'POST',
        url: "ajax/changePassword.php",
        data:{
            oldPassword: oldPassword,
            newPassword: newPassword,
            repeatPassword: repeatPassword
        },
        success: function(result){
            document.getElementById("newPasswordAccount").valueOf().value = "";
            document.getElementById("repeatPasswordAccount").valueOf().value = "";

            if(result == 1) {}
            else if(result == 2) {
                document.getElementById("newPasswordLabelAccount").innerHTML = "Passwords do not match!";
            }
            else if(result == 3){
                alert("Successfully changed your password.");
                document.getElementById("newPasswordLabelAccount").innerHTML = "";
                window.location.href = "index.php";
            }
        }});
}
</script>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- jQuery Sparklines -->
<script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
</body>
</html>