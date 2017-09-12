<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Widgets | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- external css -->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
      

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <?php
        include("sidebar.php");
        include("header.php");
      ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_genius"></i> Employee Payroll</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
                        <li><i class="fa fa-desktop"></i>Employee</li>
						<li><i class="icon_genius"></i>Employee Payroll</li>
                    </ol>
				</div>
			</div>
              <div class="col-lg-12">
                  <table id="employeeList" class="table table-striped table-hover " cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Team</th>
                              <th>Position</th>
                              <th>Monthly Salary</th>
                              <th>Total Late</th>
                              <th>Total Absent</th>
                              <th>Total Overtime</th>
                              <th>Total Rest Day</th>
                              <th>Basic Pay</th>
                              <th>Net Pay</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $con = mysqli_connect("localhost","root","","payroll_slamcom");
                            
                            $query = 'SELECT `id`, `name`, `position`, `team` FROM employee';
                            $result = mysqli_query($con, $query);
                          
                            while($row = mysqli_fetch_array($result)){
                                $temp = $row[0];
                                $squery = "SELECT * from employeeinfo WHERE id = '$temp'";
                                $sresult = mysqli_query($con, $squery);
                                while($srow = mysqli_fetch_array($sresult)){
                                    echo '<tr id='.$row[0].'>
                                            <td>'.$row[0].'</td>
                                            <td>'.$row[1].'</td>
                                            <td>'.$row[2].'</td>
                                            <td>'.$row[3].'</td>
                                            <td>'.$srow[1].'</td>
                                            <td>'.$srow[2].'</td>
                                            <td>'.$srow[3].'</td>
                                            <td>'.$srow[5].'</td>
                                            <td>'.$srow[6].'</td>
                                            <td>100</td> /* calculated value */
                                            <td>100</td> /* calculated value */
                                         </tr>';
                                }
                            }
                          ?>
                      </tbody>
                  </table>
              </div>
              
              <button id="editBtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editTaskModal" style="display: none"></button>
              <div class="modal fade" id="editTaskModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Employee Info</h4>
                    </div>
                    <div class="modal-body">
                        <form id="editTaskModal" method="post">
                            <div clas="form-group">
                                <label class="col-sm-3 control-label" for="id">Work Days</label>
                                <div class="col-sm-3">
                                    <input type="text" id="id" class="form-control">
                                </div>
                                    <label class="col-sm-3 control-label" for="name">Late</label>                                
                                <div class="col-sm-3">
                                    <input type="text" id="name" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="salary">Absent</label>
                                <div class="col-sm-3">
                                    <input type="text" id="salary" class="form-control">
                                </div>
                                <label class="col-sm-3 control-label" for="basicPay">Overtime</label>
                                <div class="col-sm-3">
                                    <input type="text" id="basicPay" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label class="col-sm-3" for="restDay">Rest Day</label>
                                <div class="col-sm-3">
                                    <input type="text" id="restDay" class="form-control">
                                </div>
                                <label class="col-sm-3" for="adjustment">Adjustment</label>
                                <div class="col-sm-3">
                                    <input type="text" id="adjustment" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class=form-group>
                                <label class="col-sm-3" for="holiday">Holiday</label>
                                <div class="col-sm-3">
                                    <input type="text" id="holiday" class="form-control">
                                </div>
                                <label class="col-sm-3" for="specialHoliday">Special Holiday</label>
                                <div class="col-sm-3">
                                    <input type="text" id="specialHoliday" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label class="col-sm-3" for="netPay">NP Hours</label>
                                <div class="col-sm-3">
                                    <input type="text" id="netPay" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <button id="taskEditButton" class="btn btn-success">Update</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
          </section>
      </section>
      <!--main content end-->
        <div class="text-right">
            <div class="credits">
                <!-- 
                    All the links in the footer should remain intact. 
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                -->
                <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
  </section>
  <!-- container section end -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery knob -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- Data Table-->
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

    <script>
        
            var taskTable = $("#employeeList").DataTable({
            "bLengthChange":false,
        });
        
        $("#employeeList tbody").on("click","td", function(){
            data = taskTable.row($(this).parents('tr')).data();
            
            $("#editBtn").trigger("click");
        });
        
        
        
    </script>

  </body>
</html>
