<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Form Component | Creative - Bootstrap 3 Responsive Admin Template</title>
    <?php
    include('exe/database.php');
    include('exe/checker.php'); 
    include('scripts.html');
    ?>
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
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Form elements</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_document_alt"></i>Forms</li>
						<li><i class="fa fa-file-text-o"></i>Add Employee</li>
					</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Form Elements
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal" action="exe/addEmployee.php" method="post">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" autofocus="" name="name" required>
                                      </div>

                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Position</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="position" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Team</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="team" required>
                                      </div>
                                  </div>
                                  <div class = "col-lg-2">
                                       <button class="btn btn-primary btn-lg btn-block" type="submit">Register Employee</button>
                                  </div>
                              </form>
                          </div>
                         
                      </section>
                  </div>
              </div>
          </section>
      </section>
  <!-- container section end -->
  </body>
</html>
