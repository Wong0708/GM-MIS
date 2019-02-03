<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];
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
                <h3>View Suppliers</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

              
            <div class="col-md-12 col-sm-6 col-xs-12">

                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">All suppliers</a>
                        </li>
                        <li role="presentation" class=""><a href="#pending" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Archived</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Suppliers </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>Name</th>
                            <th>Telephone Number</th>
                            <th>Mobile Number</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                            require_once('mysql_connect.php');
                            $query = "SELECT * FROM supplier";
                            $result=mysqli_query($dbc,$query);

                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                            {
                                require_once('mysql_connect.php');
                                $suppliername = "SELECT supplierName FROM supplier WHERE supplierID = '{$row['supplierID']}'";
                                $result1=mysqli_query($dbc,$suppliername);
                                $shit=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                                $branch = $shit['supplierName'];

                                //$usertype = "SELECT usertype FROM ref_usertype WHERE usertypeID = '{$row['usertypeID']}'";
                                //$result2=mysqli_query($dbc,$usertype);
                                //$shit2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                //$position = $shit2['usertype']; 

                                    echo '<tr>';
                                    echo '<td>';
                                    echo $row['supplierName'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['supp_telephone'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['supp_mobile'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['supp_address'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['supp_email'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['status'];
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
                          
                            <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2>Archived Suppliers</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    </ul>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                          <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Telephone Number</th>
                                                <th>Mobile Number</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php

                                                require_once('mysql_connect.php');
                                                $query = "SELECT * FROM supplier WHERE status = 'Archived'";
                                                $result=mysqli_query($dbc,$query);

                                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                                {
                                                    require_once('mysql_connect.php');
                                                    $suppliername = "SELECT supplierName FROM supplier WHERE supplierID = '{$row['supplierID']}'";
                                                    $result1=mysqli_query($dbc,$suppliername);
                                                    $shit=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                                                    $branch = $shit['supplierName'];

                                                    //$usertype = "SELECT usertype FROM ref_usertype WHERE usertypeID = '{$row['usertypeID']}'";
                                                    //$result2=mysqli_query($dbc,$usertype);
                                                    //$shit2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                                    //$position = $shit2['usertype']; 

                                                        echo '<tr>';
                                                        echo '<td>';
                                                        echo $row['supplierName'];
                                                        echo '</td>';
                                                        echo '<td>';
                                                        echo $row['supp_telephone'];
                                                        echo '</td>';
                                                        echo '<td>';
                                                        echo $row['supp_mobile'];
                                                        echo '</td>';
                                                        echo '<td>';
                                                        echo $row['supp_address'];
                                                        echo '</td>';
                                                        echo '<td>';
                                                        echo $row['supp_email'];
                                                        echo '</td>';
                                                        echo '<td>';
                                                        echo $row['status'];
                                                        echo '</td>';
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
        </div>
        <!-- /page content -->

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
</html>
