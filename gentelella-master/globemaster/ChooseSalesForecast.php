
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>GM MIS | Sales Forecasting</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       
            

            <!-- sidebar menu -->
            <?php
        require_once("nav.php");    
        ?>
                

            
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        
        

        <!-- page content -->
        <div class="right_col" role="main" style="background-color:#3e4042">
          <!-- top tiles -->
          
          <br><br><br>
          <div class="container">
          <div class="jumbotron" style="background-color:#ffffff">
            <center><font color = "black"><h1><font color = "#ff9900"><i class="fa fa-line-chart"></i></font><font color = "#000066"><b> Sales Forecasting</b></font></h1>
            <p>Please choose a type of sales forecast. <font color = "red">One item will be forecasted in participation to the total sales made.</font></p> 
            <p>The forecast can range from the analysis of:</p> 
            <p>Naive (Past 30 days of data)</p> 
            <p>Short-term (Past 90 days of data)</p> 
            <p>Time-series (Past 365 days of data)</p></font></center>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4" align="center">
                  <div class="x_panel">
                    <div class="x_content">
                      <br />
                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal form-label-left">

                        <div class="form-group">
                        <center>
                        <p>Please choose a type of forecast.</p>
                          <div class="input-group">
                              <input type="text" class="form-control" aria-label="Text input with dropdown button" value = "Naive Forecasting" id = "invforecastlabel" readonly>
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Choose.. <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                  <li id = "invnaive" onclick="changetonaive();"><a>Naive Forecasting</a>
                                  </li>
                                  <li id = "invshortterm" onclick = "changetost();"><a>Short-Term Forecasting</a>
                                  </li>
                                  <li id = "invtimerseries" onclick = "changetots();"><a>Time-Series Forecasting</a>
                                  </li>
                                  <li class="divider"></li>
                                  <li onclick = "toggledatepicker()" id="customdatepick"><a>Custom Date Picker</a>
                                  </li>
                                </ul>
                            </div>
                          </div>
                        </center>
                        </div>
                        <div class="form-group">
                        <center>
                        <p>Please choose an item to forecast.</p>
                        <select name="supplier" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        <option value = "">Choose...</option>
                            <?php
                                require_once('DataFetchers/mysql_connect.php');
                                $query = "SELECT * FROM items_trading";
                                $result=mysqli_query($dbc,$query);
                                
                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                {
                                   echo '<option value = "'.$row['item_name'].'">'.$row['item_name'].'</option>';
                                }
                            ?>             
                            </select>
                          
                        </center>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>            
          </div>
          




        </div>
          

          </div>
          <br />
          <div class="row">
            
   

           
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- FullCalendar -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
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
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- custom scripts -->

    <script>
            var invforecastlabel = document.getElementById("invforecastlabel");
            
            var invnaive = document.getElementById("invnaive");
            var invshortterm = document.getElementById("invshortterm");
            var invtimeseries = document.getElementById("invtimerseries");
            function changetonaive()
            {
              invforecastlabel.value = "Naive Forecasting";
              alert("qweq");
            }
            function changetots()
            {
              invforecastlabel.value = "Time Series Forecasting";
              alert("qweq");
            }
            function changetost()
            {
              invforecastlabel.value = "Short Term Forecasting";
              
            }
          </script>
	
  </body>
</html>
