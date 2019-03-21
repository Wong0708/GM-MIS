<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GM MIS | View Deliveries</title>
    <link rel="icon" type="image/ico" href="images/GM%20LOGO.png" />
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
      </div>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
              <div>
                  <center><h1><img src="images/GM%20LOGO.png" width = "80px" height = "80px">DELIVERIES</h1>
              </div>
            </div>
            <br><br><br><br>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Schedule Deliveries</h2>
    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                  <form method = "POST" action = "Delivery Receipt.php">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>D.R.</th>
                          <th>Date</th>
                          <th>Driver</th>
                          <th>Truck #</th>
                          <th>Customer</th>
                          <th>Destination</th>                                                   
                          <th>Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                            require_once('DataFetchers/mysql_connect.php');

                            $querytogetDBTable = "SELECT * FROM scheduledelivery";
                            $resultofQuery =  mysqli_query($dbc, $querytogetDBTable);
                            $count = 0;
                            $postmalone;
                            while($rowofResult=mysqli_fetch_array($resultofQuery,MYSQLI_ASSOC))
                            {

                              echo " <tr>";
                                echo '<td  id = "delivrow',$count,'"  value="',$rowofResult['delivery_Receipt'],'"  "> ';            
                                echo $rowofResult['delivery_Receipt'];
                                echo '</td>';  
                                echo '<td>';
                                echo $rowofResult['delivery_Date'];
                                echo '</td>'; 
                                echo '<td>';
                                echo $rowofResult['driver'];
                                echo '</td>';  
                                echo '<td>';
                                echo $rowofResult['truck_Number'];
                                echo '</td>';  
                                echo '<td>';
                                echo $rowofResult['customer_Name'];
                                echo '</td>';  
                                echo '<td>';
                                echo $rowofResult['Destination'];
                                echo '</td>';  
                                echo '<td>';
                                echo $rowofResult['delivery_status'];
                                echo '</td>';
                                echo '<td align = "center">';
                                echo '<a href ="Delivery Receipt.php?deliver_number='.$rowofResult['delivery_Receipt'].'&order_number='.$rowofResult['ordernumber'].' "> <i class="fa fa-wrench"></i> </a>';
                                echo '</td>';
                              echo "</tr>";
                              $count++;
                              
                                // if(isset($_POST["delivrow".$count ]))
                                // {
                                //   echo $_POST["delivrow".$count ];  
                                // }
                                // $_SESSION['GET_DEV'] = "delivrow".$count;
                              // echo $_POST["delivRow',$count,'"];
                            };
                          ?>
                        </tr>
                        
                      </tbody>
                    </table>
                    </form>
					
					
                  </div>
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

    </style>   


  </body>
</html>