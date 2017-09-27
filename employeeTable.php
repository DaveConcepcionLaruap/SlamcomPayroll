<?php
session_start();
  if(!$_SESSION['checker']){
    header("Location:index.php ");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Elements | Creative - Bootstrap 3 Responsive Admin Template</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>

  </head>

  <body>

  <!-- container section start -->
  <section id="container" class="">

      <?php
        include("sidebar.php");
        include("header.php");
      ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-list-alt"></i>Employee List</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-desktop"></i>Employee</li>
						<li><i class="fa fa-list-alt"></i>Employee List</li>
					</ol>
				</div>
			</div>
              <div class="col-lg-12">
                  <table id="employeeList" class="table table-hover table-striped" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Team</th>
                              <th>Position</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $con = mysqli_connect("localhost","root","","payroll_slamcom");

                            $query = 'SELECT `id`, `name`, `position`, `team` FROM employee';
                            $result = mysqli_query($con, $query);

                            while($row = mysqli_fetch_array($result)){
                                echo '<tr id='.$row[0].'>
                                        <td>'.$row[0].'</td>
                                        <td>'.$row[1].'</td>
                                        <td>'.$row[2].'</td>
                                        <td>'.$row[3].'</td>
                                     </tr>';
                            }
                          ?>
                      </tbody>
                  </table>
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
    <!-- gritter -->

    <!-- custom gritter script for this page only-->
    <script src="js/gritter.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- Data Table-->
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

    <script>
        var data;
        $("#employeeList").DataTable({
            "bLengthChange":false,
        });

        $("#employeeList tbody").on("click","td", function(){
            data = userTable.row($this).parents('tr').data();
        });
    </script>
  </body>
</html>
