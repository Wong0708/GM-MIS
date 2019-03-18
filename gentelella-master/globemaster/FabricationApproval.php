<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GM - Fabrication Approval</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
              <div>
                  <center><h1><img src="images/GM%20LOGO.png" width = "80px" height = "80px">ORDERS WITH FABRICATION REQUEST</h1><br>
              </div>
            </div>
            <br><br><br><br>

              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div>
                    <div class="x_content">
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            
                            require_once('DataFetchers/mysql_connect.php');
                            $query = "SELECT * FROM orders o  
                                    JOIN joborderfabrication j
                                    ON j.order_number  = o.ordernumber
                                    WHERE o.fab_status = 'For Fabrication' 
                                    OR o.fab_status = 'Under Fabrication'
                                    ORDER BY expected_date ASC";
                            $result=mysqli_query($dbc,$query);
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                            {
                            
                              $query1 = "SELECT * FROM order_details d  
                              JOIN orders o
                              ON o.ordernumber  = d.ordernumber
                              WHERE o.fab_status = 'For Fabrication' 
                              ORDER BY expected_date ASC";
                              $result1=mysqli_query($dbc,$query1);  
                              $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)
                                                                  
                        ?>
                                    <tr>
                                    <td>
                                    <div class="panel panel-default">
                                      <div class="panel-body">
                                        <div class = "row">
                                          <div class = "col-md-6">
                                            <img src = "images/gt86.jpg" border-style = "border-width:3px"style = "height:40vh; width:30vw">
                                          </div>
                                          <div class = "col-md-6">
                                              <div class = "row"><h2>Order Number: <?php  echo $row['ordernumber'];?></h2></div>
                                              <div class = "clearfix"></div>
                                              <br><br><br>  
                                            

                                              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                                              <div class = "row">
                                                    <div class = "col-md-6 col-sm-6 col-xs-12">
                                                      <p><b>Ordered Items:</b> 
                                                      <?php  
                                                        for($i=0; $i<=$row1['item_name']; $i++)
                                                        {
                                                      ?>
                                                        <p><?php  echo $row1['item_name'];?></p>
                                                        
                                                      <?php
                                                        }
                                                      ?></p>
                                                    </div>                    
                                                    <div class = "col-md-6 col-sm-6 col-xs-12">
                                                      <p><b>Expected Delivery Date:</b> <?php  echo $row['expected_date'];?></p>
                                                      <p><b>Description:</b> <?php  echo $row['fab_description'];?></p>
                                                    </div>  
                                                    <div class = "col-md-12 col-sm-12 col-xs-12" align="right">

                                                    <?php 
                                                      if($row['fab_status'] == "For Fabrication")
                                                      {
                                                    ?>
                                                        <button type = "submit" name="approveBtn" class="btn btn-round btn-primary">Approve</button>
                                                        <button type = "submit" name="finishBtn" class="btn btn-round btn-success" <?php echo 'disabled';?>>Finish</button> 
                                                    <?php 
                                                      } 
                                                      else if($row['fab_status'] == "Under Fabrication")
                                                      {
                                                    ?>
                                                        <button type = "submit" name="approveBtn" class="btn btn-round btn-primary" <?php echo 'disabled';?>>Approve</button>
                                                        <button type = "submit" name="finishBtn" class="btn btn-round btn-success">Finish</button>
                                                    
                                                    <?php
                                                      }

                                                      if(isset($_POST['approveBtn']))
                                                      {
                                                        $updateApprove = "UPDATE orders
                                                        SET orders.fab_status  = 'Under Fabrication';";
                                                        $resultApprove=mysqli_query($dbc,$updateApprove); 
                                                        if(!$resultApprove) 
                                                        {
                                                            die('Error: ' . mysqli_error($dbc));
                                                        } 
                                                        else 
                                                        {
                                                            echo '<script language="javascript">';
                                                            echo 'alert("Fabrication approval successful! The items in this order are now under fabrication");';
                                                            echo '</script>';
                                                        }
                                                      }

                                                      if(isset($_POST['finishBtn']))
                                                      {
                                                        $updateFinish = "UPDATE orders
                                                        SET orders.fab_status  = 'Finished';";
                                                        $resultFinish=mysqli_query($dbc,$updateFinish); 
                                                        if(!$resultFinish) 
                                                        {
                                                            die('Error: ' . mysqli_error($dbc));
                                                        } 
                                                        else 
                                                        {
                                                            echo '<script language="javascript">';
                                                            echo 'alert("Fabrication done! This item is ready to deliver!");';
                                                            echo '</script>';
                                                        }
                                                      }
                                                    ?>
                                                    </div>
                                                                          
                                              </div>
                                              </form> 
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    </td>
                                    </tr>
                        <?php
                            }
                        ?>  
                      </tbody>
                    </table><br>
                    <div>
                        
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
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
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
    
    <!-- Custom Fonts -->
    <style>
        
        @font-face {
        font-family: "Couture Bold";
        src: url("css/fonts/couture-bld.otf");
        }
        
        h1 {
            font-family: 'COUTURE Bold', Arial, sans-serif;
            font-weight:normal;
            font-style:normal;
            font-size: 50px;
            color: #1D2B51;
            }
        h2 {
            font-family: 'COUTURE', Arial, sans-serif;
            font-weight:normal;
            font-style:normal;
            font-size: 30px;
            color: #1D2B51;
            }

    </style>    

    <style>
    p {
        word-break: break-all;
        white-space: normal;
    }
    </style>

  </body>
</html>