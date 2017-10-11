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

    <title>SLAMCOM - Profile</title>

    <?php
      include("scripts.html");
      include("exe/database.php");
    ?>
  </head>

  <body>
  <!-- container section start -->
    <section id="container" class="">
    <?php
    include("header.php");
    include("sidebar.php");
    ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Account Settings</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-user-md"></i>Account Settings</li>
            </ol>
          </div>
        </div>
      <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <div id="edit-profile" class="tab-pane">
              <section class="panel">

                <div class="panel-body bio-graph-info">
                  <h1> Profile Info</h1>
                  <div class="form-horizontal" id = "edit_profile" >
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Password</label>
                      <div class="col-lg-6">
                      <input type="password" class="form-control" id="oldpassword" placeholder=" ">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">New Password</label>
                      <div class="col-lg-6">
                        <input type="password" class="form-control" id="NewPassword">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Confirm New Password</label>
                      <div class="col-lg-6">
                        <input type="password" class="form-control" id="ConfirmNewPassword">
                      </div>
                    </div>
                    <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                    <button type="button" id="editbtn" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger">Cancel</button>
                    </div>
                    </div>
                  </div>
                </div>



            </section>
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

    <script>

      $(document).ready(function(){

        var var1 = 0;
        var var2 = 0;

        $("#ConfirmNewPassword").on("input",function(){
          if($("#NewPassword").val() != $("#ConfirmNewPassword").val()){
            $("#ConfirmNewPassword").css('border-color', 'red');
            $("#ConfirmNewPassword").css('border-width', '2px');
            var1 = 0;
          }else{
            $("#ConfirmNewPassword").css('border-color', 'green');
            var1 = 1;
          }
        });

        $("#oldpassword").on("input",function(){

          var password = $("#oldpassword").val();

          $.ajax({
            url:"exe/verifyPassword.php",
            method:"POST",
            data: {password: password},
            success: function(data){
              if(data == "success"){
                $("#oldpassword").css('border-color', 'green');
                var2 = 1;
              }else{
                $("#oldpassword").css('border-color', 'red');
                $("#oldpassword").css('border-width', '2px');
                var2 = 0;
              }
            },
            error: function(data){

            }
          });

        });

        $("#editbtn").on("click", function(){
          if(var1 == 1 && var2 == 1){

            var password = $("#NewPassword").val();

            $.ajax({
              url:"exe/editPassword.php",
              method:"POST",
              data: {password: password},
              success: function(data){
                if(data == "success"){
                  alert("Edit Success");
                }else{
                  alert("Edit Failed");
                }
              },
              error: function(data){

              }
            });
          }else{
            alert("var1"+" "+var1);
            alert("var2"+" "+var2);
          }

        });

      });
    </script>


  </body>
</html>
