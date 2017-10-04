<?php
session_start();
  if(!$_SESSION['checker']){
    header("Location:index.php ");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
        include('exe/database.php');
        include('scripts.html');
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Slamcom</title>




    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
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
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="home.html">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>
					</ol>
				</div>
			</div>
            <div class="col-lg-12">
                  <table id="taskList" class="table table-hover table-striped" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Due Date</th>
                              <th>Task</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $con = mysqli_connect("localhost","root","","payroll_slamcom");

                            $query = 'SELECT `id`, `task`, `date`, `status` FROM task';
                            $result = mysqli_query($con, $query);

                            while($row = mysqli_fetch_array($result)){
                                echo '<tr id='.$row[0].'>
                                        <td>'.$row[0].'</td>
                                        <td>'.$row[2].'</td>
                                        <td>'.$row[1].'</td>
                                        <td>'.$row[3].'</td>
                                        <td>
                                          <div class="btn-group">
                                              <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                              <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                          </div>
                                        </td>
                                     </tr>';
                            }
                          ?>
                      </tbody>
                  </table>
              </div>

              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addTask">Add Task</button>
              <div class="modal fade" id="addTask" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="taskModal" action="exe/addTask.php" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="date">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="date" id="date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="task">Task</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="task" id="task" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="status">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status" id="status" required>
                                        <option value=""></option>
                                        <option value="Option 1">Option 1</option>
                                        <option value="Option 2">Option 2</option>
                                        <option value="Option 3">Option 3</option>
                                    </select>
                                </div>
                            </div>
                            <button id="taskAddButton" class="btn btn-default" type="Submit">Add Task</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <button id="editBtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editTaskModal" style="display: none"></button>
              <div class="modal fade" id="editTaskModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="editTaskModal" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id">ID</label>
                                <div class="col-sm-10">
                                    <input type="integer" class="form-control" name="id" id="id" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="date">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="editDate" id="editDate">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="task">Task</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="editTask" id="editTask" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="status">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="editStatus" id="editStatus" required>
                                        <option value=""></option>
                                        <option value="Option 1">Option 1</option>
                                        <option value="Option 2">Option 2</option>
                                        <option value="Option 3">Option 3</option>
                                    </select>
                                </div>
                            </div>
                            <button id="taskEditButton" class="btn btn-default">Edit Task</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

          </section>
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

      </section>

      <!--main content end-->
  <!-- container section start -->


  <script>

      jQuery(document).ready(function(){

        var taskTable = $("#taskList").DataTable({
            "bLengthChange":false,
        });

        $("#taskModal").submit(function(){
            $.ajax({
                    data: $(this).serialize(),
                    method: $(this).attr('POST'),
                    success: function(){
                        $("#date").val("");
                        $("#task").val("");
                        $("#status").val("");
                    },
                    error: function(){
                        alert("Something went wrong");
                    }
            });
        });

        $("#taskList tbody").on("click","td", function(){
            if($(this).index() == 4){
                alert("welp");
            }else{
                data = taskTable.row($(this).parents('tr')).data();
                $("#id").val(data[0]);
                $("#editDate").val(data[1]);
                $("#editTask").val(data[2]);
                $("#editStatus").val(data[3]);
                $("#editBtn").trigger("click");
            }
        });

      $("#taskEditButton").on("click",function(){
          var id = $("#id").val();
          var date = $("#editDate").val();
          var task = $("#editTask").val();
          var status = $("#editStatus").val();

          alert(id+" "+task);


        $.ajax({
                url: "exe/editTask.php",
                method:'POST',
                data:{"userID" : id, "editDate" : date, "editTask" : task, "status" : status} ,
                success: function(data){
                    $("#id").val("");
                    $("#editDate").val("");
                    $("#editTask").val("");
                    $("#editStatus").val("");
                    alert(data);
                },
                error: function(data){
                    alert(data);
                }
        });



        });

      });

  </script>

  </body>
</html>
