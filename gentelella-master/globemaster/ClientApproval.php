<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Clients</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
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
                  <h1>Client Master List</h1><br>
              </div>
            </div>

              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      This is where the users will be able to view the list of all of the clients and their current statuses.
                      It will also allow the user to edit the statuses of their clients according to their payments and payments due.
                    </p><br>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Client Name</th>                       
                          <th>Address</th>
                          <th>City</th>
                          <th>Contact Number</th>
                          <th>E-mail</th>                         
                          <th>Status</th>              
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            
                            require_once('DataFetchers/mysql_connect.php');
                            $query = "SELECT * FROM clients;";
                            $result=mysqli_query($dbc,$query);
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                            {
                                    echo '<tr>';
                                    echo '<td>';
                                    echo $row['client_name'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['client_address'];
                                    echo '</td>';                                  
                                    echo '<td>';
                                    echo $row['client_city'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['client_contactno'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['client_email'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<input type="checkbox" id="';
                                    echo $row['client_id'];
                                    echo '" class="';
                                    if($row['client_status'] == "Enabled")
                                    {
                                        echo 'js-switch" onClick="changeStatus(';
                                        echo $row['client_id'];
                                        echo ')" value = "Enabled" checked="checked"></input>';
                                    }
                                    else
                                    {
                                        echo 'js-switch" onClick="changeStatus(';
                                        echo $row['client_id'];
                                        echo ')" value = "Disabled"></input>';
                                    }       
                                    echo '</td>';
                                    
                                    echo '</tr>';
                                    
                            }
                        ?>  
                      </tbody>
                    </table><br>
                    <div>
                        <form action="AddClient.php" method="POST">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>  Save Changes</button>
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
   
        
    </script>    

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
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
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
    


    <!--Client Switches -->
    <script>    
    function changeStatus(rownum) 
    {
        var elem = document.getElementById(rownum);
        if (elem.checked == true)
        {
            var elem.value("Disabled");
        }
        else 
        {
            var elem.value("Enabled");
        }
        
    }
    
    </script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>