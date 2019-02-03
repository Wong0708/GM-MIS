<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];

if(isset($_POST['register']))
{

    require_once('mysql_connect.php');
    $query="SELECT usertypeID FROM ref_usertype WHERE usertype = '{$_POST['accountType']}'";
    $result1=mysqli_query($dbc,$query);
    $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
    $userTypeID = $row1['usertypeID'];

    $query="SELECT jobID FROM job_list WHERE jobTitle = '{$_POST['jobType']}'";
    $result1=mysqli_query($dbc,$query);
    $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
    $jobID = $row1['jobID'];

    $query="SELECT branchID FROM branch WHERE branchName = '{$_POST['branch']}'";
    $result2=mysqli_query($dbc,$query);
    $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $branch = $row2['branchID'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $username = $_POST['username'];
    $mobile = $_POST['mobileno'];
    $residence = $_POST['residence'];
    $email = $_POST['email'];

    $query="INSERT INTO user (usertypeID, jobID, branchID, username, password, last_name, first_name, middle_name, mobileNo, residence, emailaddress, user_status) 
            VALUES('$userTypeID', '$jobID', '$branch', '$username', PASSWORD('1234'), '$lname', '$fname', '$mname', '$mobile', '$residence', '$email', 'Pending')";
    mysqli_query($dbc,$query);

    echo "<script>alert('Successfully registered account!');</script>";

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
                            <h2>Register Account</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="lname" required="required" class="form-control col-md-7 col-xs-12" name="lname" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="fname" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Middle Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="mname" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Type</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name ="jobType" >
                                            <?php

                                            require_once('mysql_connect.php');
                                            $query="SELECT jobTitle FROM job_list";
                                            $result=mysqli_query($dbc,$query);
                                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                ?> <option><?php echo $row["jobTitle"]; ?> </option> <?php
                                            }
                                            ?>
                                        </select><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Account Type</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name ="accountType" >
                                            <?php

                                            require_once('mysql_connect.php');
                                            $query="SELECT usertype FROM ref_usertype";
                                            $result=mysqli_query($dbc,$query);
                                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                ?> <option><?php echo $row["usertype"]; ?> </option> <?php
                                            }
                                            ?>
                                        </select><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name ="branch" >
                                            <?php

                                            require_once('mysql_connect.php');
                                            $query="SELECT branchName FROM branch";
                                            $result=mysqli_query($dbc,$query);
                                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                ?> <option><?php echo $row["branchName"]; ?> </option> <?php
                                            }
                                            ?>
                                        </select><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="username" class="form-control col-md-7 col-xs-12" type="double" name="username" value="" onkeyup="checkUsername();">
                                    </div>
                                    <label for="middle-name" id="usernameExist" class="control-label red"></label>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mobile Number<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="double" name="mobileno" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Residence<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="double" name="residence" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email Address<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="double" name="email" value="">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button class="btn btn-primary" type="submit" name="register" id="register">Register</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script>

    function checkUsername(){

        let username = document.getElementById("username").valueOf().value;

        $.ajax({
            type: 'POST',
            url: "ajax/checkUsername.php",
            data:{
                username: username
            },
            success: function(result){
                document.getElementById("usernameExist").innerHTML = result;
                if(result == 0)
                        {
                            document.getElementById("usernameExist").innerHTML = "Username already exists!";
                            document.getElementById("register").disabled = true;
                        }
                    if(result == 1)
                        {
                            document.getElementById("usernameExist").innerHTML = "";
                            document.getElementById("register   ").disabled = false;
                        }
        }});
        
    }

</script>
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