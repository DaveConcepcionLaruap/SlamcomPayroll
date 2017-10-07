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

    <title>SLAMCOM - Employee Payroll</title>
    <?php
        include("scripts.html");
        include("exe/database.php");
    ?>
  </head>

  <body>
  <style>
      .dataTables_wrapper .dt-buttons{
        float:none;
        text-align:left;
      }
  </style>
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
					<h3 class="page-header"><i class="icon_genius"></i> Inventory List</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-desktop"></i>Employee</li>
						<li><i class="icon_genius"></i>Employee Payroll</li>
          </ol>
				</div>
			</div>
          <h3>Employee Data</h3>
          <hr>
            <div class = "col-lg-6">
                <div class = "panel panel-default">
                    <div class = "panel-body" >
                        <div class = "form-group">
                                <label class = "col-sm-3">Work Days</label>
                                <input class = "col-sm-8" id = "workDays" disabled></input>
                            </div></br></br>
                            <div class = "form-group">
                                <label class = "col-sm-3">Late</label>
                                <input class = "col-sm-8" id = "late" disabled></input>
                            </div></br></br>
                            <div class = "form-group">
                                <label class = "col-sm-3">Absent</label>
                                <input class = "col-sm-8" id = "absent" disabled></input>
                            </div></br></br>
                            <div class = "form-group">
                                <label class = "col-sm-3">Overtime</label>
                                <input class = "col-sm-8" id = "overtime" disabled></input>
                            </div></br></br>
                            <div class = "form-group">
                                <label class = "col-sm-3">Adjustment</label>
                                <input class = "col-sm-8" id = "adjustment" disabled></input>
                            </div></br></br>
                    </div>
                </div>
            </div>
            <div class = "col-lg-6">
                <div class = "panel panel-default">
                    <div class = "panel-body" >
                        <div class = "form-group">
                                <label class = "col-sm-3">Work Days</label>
                                <input class = "col-sm-8" id = "workDays" disabled></input>
                            </div></br></br>
                            <div class = "form-group">
                                <label class = "col-sm-3">Late</label>
                                <input class = "col-sm-8" id = "late" disabled></input>
                            </div></br></br>
                            <div class = "form-group">
                                <label class = "col-sm-3">Absent</label>
                                <input class = "col-sm-8" id = "absent" disabled></input>
                            </div></br></br>
                            <div class = "form-group">
                                <label class = "col-sm-3">Overtime</label>
                                <input class = "col-sm-8" id = "overtime" disabled></input>
                            </div></br></br>
                            <div class = "form-group">
                                <label class = "col-sm-3">Adjustment</label>
                                <input class = "col-sm-8" id = "adjustment" disabled></input>
                            </div></br></br>
                    </div>
                </div>
            </div>
            <br>


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


  <script>
    $(document).ready(function(){


      $("#editbtn").on("click",function(){
          var name = $("#name").val();
          var category = $("#category").val();
          var qty = $("#qty").val();
          var desc = $("#desc").val();
          var itemID = <?php echo $_GET["itemID"]?>;

          $.ajax({
              url: "exe/itemEdit.php",
              method: "POST",
              data: {name: name, category: category, qty: qty, desc: desc, itemID: itemID},
              success: function(data){
                  alert(data);
                  window.location.replace("InventoryList.php");
              },
              error: function(data){
                  alert(data);
                  alert("Edit Error");
                  window.location.replace("InventoryList.php");
              }
          })
        });

        $("#del_btn").on("click",function(){
            var itemID = <?php echo $_GET["itemID"]?>;

            $.ajax({
                url: "exe/itemDelete.php",
                method: "POST",
                data: {itemID: itemID},
                success: function(data){
                    alert("Delete Success");
                    window.location.href="InventoryList.php";
                },
                error: function(data){
                    alert("Delete Error");
                }
            });
          });



      function cancel() {
          window.location.href="InventoryList.php";
      }
    });
  </script>

  </body>
</html>
