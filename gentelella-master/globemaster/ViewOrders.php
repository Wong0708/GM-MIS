<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Gentelella</title>

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
              <div class="title_left">
                  <h1>Globemaster All Orders</h1><br>
              </div>
            </div>

              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      This is where the users will be able to add and remove inventory based on the data tables provided by the company. These can be editable and can be subjected to changes in accordance to the
                  desires of the head different screen sizes through the dynamic insertion and removal of columns from the table.
                    </p><br>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Order Number</th>
                          <th>Client Name</th>
                          <th>Order Date</th>
                          <th>Delivery Date</th>
                          <th>Total Amount</th>
                          <th>Payment Type</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            
                            require_once('C:\xampp\htdocs\GM-MIS\gentelella-master\globemaster\DataFetchers\mysql_connect.php');
                            $query = "SELECT * FROM orders;";
                            $result=mysqli_query($dbc,$query);
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                            {
                                    $queryPaymentType = "SELECT paymenttype FROM ref_payment WHERE payment_id =" . $row['payment_id'] . ";";
                                    $resultPaymentType = mysqli_query($dbc,$queryPaymentType);
                                    $rowPaymentType=mysqli_fetch_array($resultPaymentType,MYSQLI_ASSOC);
                                    $paymentType = $rowPaymentType['paymenttype'];

                                    $queryClientName = "SELECT client_name FROM clients WHERE client_id =" . $row['client_id'] . ";";
                                    $resultClientName = mysqli_query($dbc,$queryClientName);
                                    $rowClientName=mysqli_fetch_array($resultClientName,MYSQLI_ASSOC);
                                    $clientName = $rowClientName['client_name'];
                                    
                                
                                    echo '<tr>';
                                    echo '<td>';
                                    echo $row['ordernumber'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $clientName;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['order_date'];
                                    echo '</td>';
                                    echo '<td>';
                                    
                                    if($row['delivery_date'] == null || $row['delivery_date'] == "")
                                    {
                                        echo '<button type="submit" class="btn btn-round btn-success"><i class="fa fa-plus"></i> Set Delivery Date</button>';
                                    }
                                    else
                                    {
                                        echo $row['delivery_date'];
                                    }
                                    echo '</td>';
                                    echo '<td>';
                                    echo  'Php'." ".number_format($row['totalamt'], 2);
                                    echo '</td>';
                                    echo '<td>';
                                    echo $paymentType;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['orderstatus'];
                                    echo '</td>';
                                    echo '</tr>';
                                    
                            }
                        ?>  
                      </tbody>
                    </table><br>
                    <div>
                        <form action="OrderForm.php" method="POST">
                          <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Create Order </button>
                        </form>
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

  </body>
</html>