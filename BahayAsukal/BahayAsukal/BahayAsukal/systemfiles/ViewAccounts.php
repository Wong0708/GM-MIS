<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];

if(isset($_POST['activate'])){
    $id = $_POST['id'];
    $query = "UPDATE user SET user_status = 'Active' WHERE userID = '{$id}'";
    $result=mysqli_query($dbc,$query);
}

if(isset($_POST['reject']))
{
    $id = $_POST['id'];
    $query = "DELETE FROM user WHERE userID = '{$id}'";
    $result=mysqli_query($dbc,$query);
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
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View Accounts</h3>
              </div>

            </div>

            <div class="clearfix"></div>

              
            <div class="col-md-12 col-sm-6 col-xs-12">

                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">All Accounts</a>
                        </li>
                        <li role="presentation" class=""><a href="#pending" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pending</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Accounts</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Job Type</th>
                            <th>Account Type</th>
                            <th>Branch</th>
                            <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                            if($_SESSION['branchID'] == 1){
                                $query = "SELECT * FROM user";
                            }
                            else{
                                $branchID = $_SESSION['branchID'];
                                $query = "SELECT * FROM user WHERE branchID = '.$branchID.'";
                            }
                            
                            $result=mysqli_query($dbc,$query);

                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                            {
                                require_once('mysql_connect.php');
                                $branchname = "SELECT branchName FROM branch WHERE branchID = '{$row['branchID']}'";
                                $result1=mysqli_query($dbc,$branchname);
                                $shit=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                                $branch = $shit['branchName'];

                                $usertype = "SELECT usertype FROM ref_usertype WHERE usertypeID = '{$row['usertypeID']}'";
                                $result2=mysqli_query($dbc,$usertype);
                                $shit2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                $userType = $shit2['usertype']; 
                                
                                $usertype = "SELECT jobTitle FROM job_list WHERE jobID = '{$row['jobID']}'";
                                $result2=mysqli_query($dbc,$usertype);
                                $shit2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                $jobType = $shit2['jobTitle']; 

                                    echo '<tr>';
                                    echo '<td>';
                                    echo $row['last_name'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['first_name'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['middle_name'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $jobType;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $userType;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $branch;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['user_status'];
                                    echo '</td>';
                            }

                        ?>      
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="pending" aria-labelledby="profile-tab">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2>Pending Accounts</h2>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">
                                      <?php

                                            require_once('mysql_connect.php');
                                            $query = "SELECT * FROM user WHERE user_status = 'Pending'";
                                            $result1=mysqli_query($dbc,$query);
                                            $row=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                                            if($row == 0)
                                            {
                                                echo '<h1> NO PENDING ACCOUNTS </h1>';
                                            }
                                            else
                                            { ?>
                                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                                  <thead>
                                                    <tr>
                                                        <th>Last Name</th>
                                                        <th>First Name</th>
                                                        <th>Middle Name</th>
                                                        <th>Position</th>
                                                        <th>Branch</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                <?php

                                                    $query = "SELECT * FROM user WHERE user_status = 'Pending'";
                                                    $result=mysqli_query($dbc,$query);
                                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                                    {
                                                        require_once('mysql_connect.php');
                                                        $branchname = "SELECT branchName FROM branch WHERE branchID = '{$row['branchID']}'";
                                                        $result1=mysqli_query($dbc,$branchname);
                                                        $shit=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                                                        $branch = $shit['branchName'];

                                                        $usertype = "SELECT usertype FROM ref_usertype WHERE usertypeID = '{$row['usertypeID']}'";
                                                        $result2=mysqli_query($dbc,$usertype);
                                                        $shit2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                                        $position = $shit2['usertype']; 

                                                            echo '<tr><form method="post" action=""><input type="hidden" name="id" value="'.$row['userID'].'">';
                                                            echo '<td>';
                                                            echo $row['last_name'];
                                                            echo '</td>';
                                                            echo '<td>';
                                                            echo $row['first_name'];
                                                            echo '</td>';
                                                            echo '<td>';
                                                            echo $row['middle_name'];
                                                            echo '</td>';
                                                            echo '<td>';
                                                            echo $position;
                                                            echo '</td>';
                                                            echo '<td>';
                                                            echo $branch;
                                                            echo '</td>';
                                                            echo '<td>';
                                                            echo $row['user_status'];
                                                            echo '</td>';
                                                            echo '<td>';
                                                            echo '<button type="submit" name="activate" class="btn btn-success">Activate</button>';
                                                            echo '<button type="submit" name="reject" class="btn btn-danger">Reject </button></form>';
                                                    }
                                            }

                                            ?>      
                                        </tbody>
                                      </table>
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>  
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
