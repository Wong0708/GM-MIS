<?php
session_start();
require_once('mysql_connect.php');
if(isset($_POST['register']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $mobileno = $_POST['mobileno'];
    $residence = $_POST['residence'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    $usertype = $_POST['usertype'];
    $username = $_POST['username'];
    $password = $_POST['password'];                                                                                                                                                                                                                                                                                                                                                                                                                            
    require_once('mysql_connect.php');
    $query="INSERT INTO user(usertypeID, branchID, username, password, last_name, first_name, middle_name, mobileno, residence, emailaddress, user_status)
            VALUES((SELECT usertypeID from ref_usertype WHERE '$usertype' = usertype), 
                   (SELECT branchID from branch WHERE '$branch' = branchName),
                    '$username', '$password', '$lname', '$fname', '$mname', '$mobileno', '$residence', '$email', 'Pending')";
    $result=mysqli_query($dbc,$query);
}

if(isset($_POST['login']))
{
    $_SESSION['username'] = $_POST['loginuser'];
    $_SESSION['password'] = $_POST['loginpass'];
    require_once('mysql_connect.php');
    $checkuser = "SELECT jobID, usertypeID, branchID, user_status FROM user WHERE 
                      username = '{$_SESSION['username']}' AND
                      password = PASSWORD('{$_SESSION['password']}')
                      AND (user_status = 'Active')";
    $result=mysqli_query($dbc,$checkuser);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if($row["usertypeID"])
        {
            $_SESSION["usertype"] = $row["usertypeID"];
            $_SESSION["jobID"] = $row["jobID"];
            $_SESSION["branchID"] = $row["branchID"];
            $_SESSION["user_status"] = $row["user_status"];
            header("Location: http://".$_SERVER['HTTP_HOST'].
                dirname($_SERVER['PHP_SELF'])."/index.php");
        }
        else
        {
            $error = "Invalid login, please try again";
        }
    
}
?>
    <html>

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
        <!-- Animate.css -->
        <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
        <!-- PNotify -->
        <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
        <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
        <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
    </head>
    <br><br><br><br><br><br><br>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                            <h1><img src="images/Sugarhouse-logo.png" alt="Welcome to Sugarhouse" width="500" height="90" IMG STYLE="position:absolute; TOP:-100px; LEFT:-50px; HEIGHT:90px"></h1>
                            <h1>Account Login</h1>
                            <div>
                                <input type="text" class="form-control" placeholder="Username" name="loginuser" required="" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" name="loginpass" required="" />
                            </div>
                            <?php if(isset($error)){ echo $error; }?>
                            <br>
                            <div>
                                <button name="login" class="btn btn-round btn-danger">Log in</button>
                            </div>

                        </form>
                    </section>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="../vendors/iCheck/icheck.min.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
    </body>

    </html>