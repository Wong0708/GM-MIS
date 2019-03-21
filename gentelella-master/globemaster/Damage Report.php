<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>GM MIS | Damaged Items Report</title>

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
            <?php
              require_once("nav.php");    
            ?>
      </div>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><font size = "6px"> Damaged Items Report as of: DATE RANGE/MONTH-YEAR/YEAR

                    <button type="submit" class="btn btn-primary btn-lg" style="float: right;"  data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-filter"></i> Filter this Report</button>
</font></h1>

<!-- Small modal for date filter-->
<form action="<?php echo $_SERVER['SalesForecasting.php']; ?>" method="POST" class="form-horizontal form-label-left">
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h3 class="modal-title" id="myModalLabel2">Report Filtering</h3>
      </div>
      <div class="modal-body">
        <h4>Please choose a filter</h4>
        <div class="form-group">
          <br>
          <center>
            <!-- <div class="input-group col-md-12 col-xs-12">
                <input type="text" class="form-control" aria-label="Text input with dropdown button" value = "Yearly" id = "salesforecastlabel" readonly style="text-align:center">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <li id = "yearly" onclick="changetoyear();"><a>Yearly</a>
                    </li>
                    <li id = "monthyear" onclick = "changetoMY();"><a>Month-Year</a>
                    </li>
                    <li class="divider"></li>
                    <li onclick = "changetoDP()" id="datepick"><a>Custom Date Range</a>
                    </li>
                  </ul>
              </div>
            </div> -->

            <div class="input-group col-md-12 col-xs-12">
              <select class="form-control" value = "" style = "text-align-last:center;" id = "reportfilterlabel"  onchange = "changepickers(this)">
                <option id = "" value = "">Choose..</option>
                <option id = "yearly" value = "yearly">Yearly</option>
                <option id = "monthyear" value = "monthyear">Month-Year</option>
                <option id="datepick" value="datepick">Custom Date Range</option>
              </select>
            </div>

            <div class="input-group col-md-12 col-xs-12" style = "display:none" id = "yearpicker">
              <select class="form-control" style = "text-align-last:center;">
                <option id = "" value = "">Choose..</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
              </select>
            </div>

          <div style = "display:none" class="col-md-12 col-xs-12" id = "monthyearpicker">
            <div class="input-group col-md-12 col-xs-12">
              <p>Month</p>
              <select class="form-control" style = "text-align-last:center;">
                <option id = "" value = "">Choose..</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
              </select>
            </div>
            <div class="input-group col-md-12 col-xs-12">
              <p>Year</p>
              <select class="form-control" style = "text-align-last:center;">
                <option id = "" value = "">Choose..</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
              </select>
            </div>
          </div>

          <div style = "display:none" class="col-md-12 col-xs-12" id = "reportrangepicker">
          <br><br>
            <div class='col-md-12'>
                <div class="form-group">
                  <input type="date" name="startdate" id = "startdate" onchange ="date_setter(this)" class="form-control col-md-12 col-xs-12 deliveryDate" placeholder = "Start Date">
                </div>
            </div>

            <p>to</p>

            <div class='col-md-12'>
                <div class="form-group">
                  <input type="date" name="enddate" id = "enddate" class="form-control col-md-12 col-xs-12 deliveryDate" placeholder = "End Date">
                </div>
            </div>
          </div>

<!-- Date Setter Script -->
<script>
  function date_setter(obj)
  {
    // document.getElementById("enddate").valueAsDate = new Date()
    var start_date = new Date(obj.valueAsDate);
    var end_date = start_date.addDays(30)

    end_date = moment(start_date).format('YYYY-MM-DD');
    
    

    $('#enddate').val(end_date);
    
    var END_DATE_INPUT = document.getElementById('enddate').valueAsDate;
    
    var old_start_date = END_DATE_INPUT.addDays(-30);

    start_date = moment(start_date).format('YYYY-MM-DD');
    old_start_date = moment(END_DATE_INPUT).format('YYYY-MM-DD');

    document.getElementById('enddate').setAttribute('max', start_date);
    document.getElementById('enddate').setAttribute('min', old_start_date );
  }
  

</script>
<!-- End Date Setter Script -->
          </center>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Forecast</button>
      </div>

    </div>
  </div>
</div>
</form>
<!-- /modal end -->

                    <?php 
                       
                        $sqlToViewTotalLoss = "SELECT SUM(total_loss) AS accumulated_loss FROM damage_item";
                        $resultOfSqlTotalLoss =  mysqli_query($dbc,$sqlToViewTotalLoss);
                        while($rowTotalLoss=mysqli_fetch_array($resultOfSqlTotalLoss,MYSQLI_ASSOC))
                        {
                    ?>
                        <label><b><font color = "black" size = "5px">Total losses for this report: <?php echo '₱'."".number_format($rowTotalLoss['accumulated_loss'], 2);?></font></b></label>
                    <?php
                        }
                    ?>
                    
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Item Name Reference</th>
                          <th>Damaged Percentage</th>
                          <th>Item Quantity</th>
                          <th>Total Loss</th>
                          <th>Date Occured </th>
                         
                        </tr>
                      </thead>


                      <tbody>
                       <?php 
                       
                        $sqlToView = "SELECT * FROM damage_item ORDER BY total_loss DESC";
                        $resultOfSql =  mysqli_query($dbc,$sqlToView);
                        while($row=mysqli_fetch_array($resultOfSql,MYSQLI_ASSOC))
                        {
                          echo '<tr>';
                            echo '<td>';
                            echo $row['item_name'];
                            echo '</td>';
                            echo '<td>';
                            echo $row['damage_percentage'],"%";
                            echo '</td>';
                            echo '<td>';
                            echo $row['item_quantity'];
                            echo '</td>';
                            echo '<td align = "right">';
                            echo '₱'." ".number_format($row['total_loss'], 2);
                            echo '</td>';
                            echo '<td>';
                            echo $row['last_update'];
                            echo '</td>';
                          echo '</tr>';
                        }

                       ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          <!-- top tiles -->
          <div class="row tile_count">
           


          
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

    <!-- Modal Input Buton Toggles -->
    <script>
            var reportfilterlabel = document.getElementById("reportfilterlabel");
            var reportfilterlabelVal = reportfilterlabel.value;
            
            var yearly = document.getElementById("yearly");
            var monthyear = document.getElementById("monthyear");
            

            var yearpicker = document.getElementById("yearpicker");
            var monthyearpicker = document.getElementById("monthyearpicker");
            var reportrangepicker = document.getElementById("reportrangepicker");
            
            function changepickers(obj)
            {
              // reportfilterlabel.value = "";
              // alert(reportfilterlabelVal);
              console.log(obj.value);
              if(obj.value == "yearly")
              {
                yearpicker.style.display = "block";
                monthyearpicker.style.display = "none";
                reportrangepicker.style.display = "none";
              }
              else if(obj.value == "monthyear")
              {
                monthyearpicker.style.display = "block";
                yearpicker.style.display = "none";
                reportrangepicker.style.display = "none";
              }
              else if(obj.value == "datepick")
              {
                reportrangepicker.style.display = "block";
                yearpicker.style.display = "none";
                monthyearpicker.style.display = "none";
              }
            }
            
    </script>

    <!-- <script>
            var reportfilterlabel = document.getElementById("reportfilterlabel");
            
            var yearly = document.getElementById("yearly");
            var monthyear = document.getElementById("monthyear");
            

            var yearpicker = document.getElementById("yearpicker");
            var monthyearpicker = document.getElementById("monthyearpicker");
            var reportrangepicker = document.getElementById("reportrangepicker");
            function changetoMY()
            {
              yearpicker.style.display = "none";
              reportrangepicker.style.display = "none";
              monthyearpicker.style.display = "block";
            }
    </script>

    <script>
        var reportfilterlabel = document.getElementById("reportfilterlabel");
            
        var yearly = document.getElementById("yearly");
        var monthyear = document.getElementById("monthyear");
        var datepick = document.getElementById("datepick");
        

        var yearpicker = document.getElementById("yearpicker");
        var monthyearpicker = document.getElementById("monthyearpicker");
        var reportrangepicker = document.getElementById("reportrangepicker");
        
        
        function changetoDP()
          {
            yearpicker.style.display = "none";
            monthyearpicker.style.display = "none";
            reportrangepicker.style.display = "block";
          }
    </script>   -->
	
  </body>
</html>
