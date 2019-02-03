<?php
session_start();
require_once('mysql_connect.php');
$query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];


if(isset($_POST['edit'])){
    $_SESSION['editID'] = $_POST['id'];
    header("Location: http://".$_SERVER['HTTP_HOST'].
                dirname($_SERVER['PHP_SELF'])."/EditSelectAccount.php");
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
                <h3>Edit Accounts</h3>
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
              
            <div class="col-md-12 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Accounts</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="accountTable">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Account Type</th>
                            <th>Branch</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                            require_once('mysql_connect.php');
                            $query = "SELECT * FROM user";
                            $result=mysqli_query($dbc,$query);
                            $ctr = 1;

                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                            {

                                require_once('mysql_connect.php');
                                $branchname = "SELECT branchID, branchName FROM branch WHERE branchID = '{$row['branchID']}'";
                                $result1=mysqli_query($dbc,$branchname);
                                $shit=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                                $branch = $shit['branchName'];

                                $usertype = "SELECT usertypeID, usertype FROM ref_usertype WHERE usertypeID = '{$row['usertypeID']}'";
                                $result2=mysqli_query($dbc,$usertype);
                                $shit2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                $userType = $shit2['usertype'];

                                $usertype = "SELECT jobID, jobTitle FROM job_list WHERE jobID = '{$row['jobID']}'";
                                $result3=mysqli_query($dbc,$usertype);
                                $shit3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                $jobType = $shit3['jobTitle'];


                                    echo '<tr><form method="post" action=""><input type="hidden" name="id" value="'.$row['userID'].'">';
                                    echo '<td>';
                                    echo $row['last_name'].'<input type="hidden" id="lastName'.$row['userID'].'" value="'.$row['last_name'].'" />';
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['first_name'].'<input type="hidden" id="firstName'.$row['userID'].'" value="'.$row['first_name'].'" />';
                                    echo '</td>';
                                    echo '<td>';
                                    echo $userType.'<input type="hidden" id="userType'.$row['userID'].'" value="'.$shit2['usertypeID'].'" />';
                                    echo '</td>';
                                    echo '<td>';
                                    echo $branch.'<input type="hidden" id="branch'.$row['userID'].'" value="'.$shit['branchID'].'" />';
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['username'].'<input type="hidden" id="username'.$row['userID'].'" value="'.$row['username'].'" />';
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row['user_status'].'<input type="hidden" id="status'.$row['userID'].'" value="'.$row['user_status'].'" />';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<button type="button" data-toggle="modal" data-target=".bs-example-modal-lgEditAccount" onclick="passAccountDataToModal('.$ctr.');"class="btn btn-info">Edit</button></form>';
                                    echo '<input type="hidden" id="userIDVAL'.$ctr.'" value="'.$row['userID'].'" />';
                                    echo '</td>';
                                    $ctr++;

                            }

                        ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>


              </div>  
          </div>
        <!-- /page content -->
          
          <!-- Edit Account -->

          <div id="modalChangePassword" class="modal fade bs-example-modal-lgEditAccount" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Edit Password</h4>
                </div>
                <div class="modal-body">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edit Last Name
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="editLastName" required="required" class="form-control col-md-7 col-xs-12" name="editLastName" value="">
                            </div>
                            <label class="control-label red" id="editLastNameLabel" for="first-name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edit First Name
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="editFirstName" required="required" class="form-control col-md-7 col-xs-12" name="editFirstName" value="">
                            </div>
                            <label class="control-label red" id="editFirstNameLabel" for="first-name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edit Middle Name
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="editMiddleName" required="required" class="form-control col-md-7 col-xs-12" name="editMiddleName" value="">
                            </div>
                            <label class="control-label red" id="editMiddleNameLabel" for="first-name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit Job Type</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="editJobType" name ="editJobType" >
                                <?php
                                require_once('mysql_connect.php');
                                $query="SELECT jobID, jobTitle FROM job_list";
                                $result=mysqli_query($dbc,$query);
                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                ?> <option value="<?php echo $row['jobID']; ?>"><?php echo $row["jobTitle"]; ?> </option> <?php
                                }
                                ?>     
                                </select><br>
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit Account Type</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="editAccountType" name ="editAccountType" >
                                <?php
                                require_once('mysql_connect.php');
                                $query="SELECT usertypeID, usertype FROM ref_usertype";
                                $result=mysqli_query($dbc,$query);
                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                ?> <option value="<?php echo $row['usertypeID']; ?>"><?php echo $row["usertype"]; ?> </option> <?php
                                }
                                ?>     
                                </select><br>
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Edit Branch</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="editBranch" name ="editBranch" >
                                <?php
                                require_once('mysql_connect.php');
                                $query="SELECT branchID, branchName FROM branch";
                                $result=mysqli_query($dbc,$query);
                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                ?> <option value="<?php echo $row['branchID']; ?>"><?php echo $row["branchName"]; ?> </option> <?php
                                }
                                ?>     
                                </select><br>
                            </div> 
                        </div>
                        <input type="hidden" id="editUsername" required="required" class="form-control col-md-7 col-xs-12" name="editUsername" value="">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edit Mobile Number
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="editMobileNumber" required="required" class="form-control col-md-7 col-xs-12" name="editMobileNumber" value="">
                            </div>
                            <label class="control-label red" id="editMobileNumber" for="first-name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edit Residence
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="editResidence" required="required" class="form-control col-md-7 col-xs-12" name="editResidence" value="">
                            </div>
                            <label class="control-label red" id="editResidence" for="first-name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edit Email
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="editEmail" required="required" class="form-control col-md-7 col-xs-12" name="editEmail" value="">
                            </div>
                            <label class="control-label red" id="editEmail" for="first-name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edit Status
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="editStatus" required="required" class="form-control col-md-7 col-xs-12" name="editSatus" value="">
                            </div>
                            <label class="control-label red" id="editStatus" for="first-name">
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" id="closeEditPassword" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="editAccount();">Save changes</button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>

    <script>

        function passAccountDataToModal(userID){

            userID = document.getElementById("userIDVAL"+userID).value;
            document.getElementById('editLastName').value = document.getElementById("lastName"+userID).value;
            document.getElementById('editFirstName').value = document.getElementById("firstName"+userID).value;
            document.getElementById('editMiddleName').value = document.getElementById("middleName"+userID).value;
            document.getElementById('editJobType').value = document.getElementById("jobType"+userID).value;
            document.getElementById('editAccountType').value = document.getElementById("userType"+userID).value;
            document.getElementById('editBranch').value = document.getElementById("branch"+userID).value;
            document.getElementById('editUsername').value = document.getElementById("username"+userID).value;
            document.getElementById('editMobileNumber').value = document.getElementById("mobileNo"+userID).value;
            document.getElementById('editResidence').value = document.getElementById("lastName"+userID).value;
            document.getElementById('editEmail').value = document.getElementById("emailAddress"+userID).value;
            document.getElementById('editStatus').value = document.getElementById("status"+userID).value;

        }
        
        function pad(n, width, z) {
          z = z || '0';
          n = n + '';
          return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
        }

        function editAccount(){

            //DO SOME ERROR CHECKING

            $.ajax({
                type: 'POST',
                url: "ajax/editAccount.php",
                data:{
                    lastName: document.getElementById('editLastName').value,
                    firstName: document.getElementById('editFirstName').value,
                    middleName: document.getElementById('editMiddleName').value,
                    jobType: document.getElementById('editJobType').value,
                    accountType: document.getElementById('editAccountType').value,
                    branch: document.getElementById('editBranch').value,
                    username: document.getElementById('editUsername').value,
                    mobileNumber: document.getElementById('editMobileNumber').value,
                    residence: document.getElementById('editResidence').value,
                    email: document.getElementById('editEmail').value,
                    status: document.getElementById('editStatus').value
                },
                success: function(result){
                    updateAccountTable();
                    alert("Successfully saved changes!")
                }
            });

        }

        function updateAccountTable() {

            $.ajax({
                type: 'POST',
                url: "ajax/updateEditAccountTable.php",
                success: function(result){
                    document.getElementById("accountTable").innerHTML = result;
                }
            });
        }

    </script>
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
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
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
  </body>
</html>