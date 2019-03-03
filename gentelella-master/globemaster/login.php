<?php
session_start();
require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');

if(isset($_POST['login']))
{
    $_SESSION['username'] = $_POST['loginuser'];
    $_SESSION['password'] = $_POST['loginpass'];
    require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
    $checkuser = "SELECT * FROM gm_users WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'";
    $result=mysqli_query($dbc,$checkuser);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION["username"] = $row["username"];
        $_SESSION["usertype"] = $row["usertype_id"];
        $_SESSION["firstname"] = $row["first_name"];
        $_SESSION["lastname"] = $row["last_name"];

        header("Location: http://".$_SERVER['HTTP_HOST'].
            dirname($_SERVER['PHP_SELF'])."/MainDashboard.php");
    }
    else
    {
        $error = "Invalid login, please try again.";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GM MIS | Login</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <div><img src = "images/GM LOGO.png" style = "width:100%;height:40%" class = "center" alt = "Globe Master Logo Here!">
            </div>
              <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
              <h1><font color = "#082656">Welcome! </font>  </h1>
              <div>
                <input type="text" class="form-control" id="loginuser" name="loginuser" placeholder="Username" required />
              </div>
              <div>
                <input type="password" class="form-control" id="loginpass" name="loginpass" placeholder="Password" required />
              </div>
              <div>
                <button class="btn btn-success submit" name="login">Log in</button>
                <br>
                <br>
                <?php 
                  if(isset($error))
                  {
                    echo "<h4><b><font color ='red'> $error</font></h4>";
                  } 
                ?>
              </div>

              <div class="clearfix"></div>

              <div class="separator">               
                <div class="clearfix"></div>
                <br>

                <div>
                  <font color = "black">
                  <p>Created by:</p>
                  <h1><i class="fa fa-hand-o-right"></i> G S M - Wong</h1> <!-- Replace Icon with Group Logo -->
                  <p>All rights reserved.</p>
                  </font>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>