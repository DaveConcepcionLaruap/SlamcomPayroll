
<?php
include("../AdminServer/AdminLoginVerification.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel = "stylesheet" href = "https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css">

    <!-- Bootstrap Core CSS -->
    <link href="../../AdminPageBootStrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../AdminPageBootStrap/css/sb-admin.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">


    <link href="../../munchkinBootStrap/CSS/userCSS.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="../../AdminPageBootStrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

    <!--this link won't work and I don't know why -->
    <link href="../../munchkinBootStrap/CSS/userCSS.css" rel="stylesheet" type="text/css">

    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet"/>

     <style>
        .datepickerdemo md-content{
            display: flex;

        }
        .datepickerdemo .validation-messages{
            font-size: 11px;
            color: darkred;
            margin: 10px 0 0 25px;
        }
        .buttondemoBasicUsage section {
            background: #f7f7f7;
            border-radius: 3px;
            text-align: center;
            margin: 1em;
            position: relative !important;
            padding-bottom: 10px;
        }
        .buttondemoBasicUsage md-content {
            margin-right: 7px;
        }
        .buttondemoBasicUsage section .md-button {
            margin-top: 16px;
            margin-bottom: 16px;
        }
        .buttondemoBasicUsage .label {
            position: absolute;
            bottom: 5px;
            left: 7px;
            font-size: 14px;
            opacity: 0.54;
        }
        .FAB{
          position: fixed;
          bottom:0;
          right:0;
        }
        .buttonSize{
           /* width:20%;*/
            display: inline-block;
        }
        #startDATE {
            width: 48%;

        }
        #endDATE{
            width: 38%;

        }
        .Row{
            display: table;

        }
        .Column{
            display: table-cell;
        }
        #mainContent{
          width: 84%;
        }
    </style>


</head>

<body>

    <div id="wrapper">
        <?php include("sideBar.php"); ?>

        <div>

            <div id="mainContent">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admins
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div  id="tableContent" ng-app = "AdminTabApp" >
                  <div id="userEditSuccess" class="alert alert-success" style="display: none;">

                  </div>
                    <div class="Row">

                        <div class="Column">
                           <!-- <md-button id="addNewAdmin" class="md-raised md-primary">add new admin</md-button>-->
                        </div>
                    </div>


                  <div flex layout = "column" id="tabContainer" ng-controller = "tabController as ctrl" ng-cloak >
                        <!--<div id="ContentContainer">-->
                            <md-content layout = "column" layout-fill >
                                <md-tabs  layout-fill  md-selected = "data.selectedIndex"
                                    md-align-tabs = "{{data.bottom ? 'bottom' : 'top'}}">

                                    <md-tab id = "tab1">
                                        <md-tab-label>{{data.firstLabel}}</md-tab-label>
                                        <md-tab-body>

                                            <div class="table-responsive">

                                                <table id="ActiveAdminTable" class="table table-hover table-striped" cellspacing="0" width="100%" style= "width: 80%">
                                                    <thead>
                                                        <tr>
                                                            <th>User ID</th>
                                                            <th>First name</th>
                                                            <th>Last name</th>
                                                            <th>Email add</th>
                                                            <th>Delete/edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php

                                                          include("../AdminServer/DBconnect.php");
                                                          $query = 'SELECT `userID`, `firstname`, `lastname`, `emailaddress` FROM `adminusers` WHERE `Active` = 1';

                                                          $result = mysqli_query($conn,$query);
                                                          if($result){

                                                            $dataArray = array();
                                                            while($row = mysqli_fetch_array($result)){

                                                              echo '<tr id='.$row[0].'>
                                                                      <td>'.$row[0].'</td>
                                                                      <td>'.$row[1].'</td>
                                                                      <td>'.$row[2].'</td>
                                                                      <td>'.$row[3].'</td>
                                                                      <td><button id="delbutton" type="button" class="btn btn-sm btn-danger">Delete</button>
                                                                          <button id="editbutton" type="button" class="btn btn-sm btn-warning">Edit</button></td>

                                                                      </tr>';
                                                            }

                                                          }else{
                                                            echo "no data";
                                                          }
                                                      ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </md-tab-body>
                                    </md-tab>
                                    <md-tab id = "tab2">
                                        <md-tab-label>{{data.secondLabel}}</md-tab-label>
                                        <md-tab-body>
                                            <div class="table-responsive">

                                                <table id="NonActiveAdminTable" class="table table-hover table-striped" cellspacing="0" width="100%" style= "width: 80%">
                                                    <thead>
                                                        <tr>
                                                            <th>User ID</th>
                                                            <th>First name</th>
                                                            <th>Last name</th>
                                                            <th>Email add</th>
                                                            <th>Delete/edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <!-- turn this into a form so we can serialize and pass to ajax POST  -->
                                                        <?php
                                                            include("../AdminServer/DBconnect.php");
                                                            $query = 'SELECT `userID`, `firstname`, `lastname`, `emailaddress` FROM `adminusers` WHERE `Active` = 0';

                                                            $result = mysqli_query($conn,$query);

                                                            if($result){
                                                              while($row = mysqli_fetch_array($result)){

                                                                  echo '<tr id='.$row[0].'>
                                                                          <td>'.$row[0].'</td>
                                                                          <td>'.$row[1].'</td>
                                                                          <td>'.$row[2].'</td>
                                                                          <td>'.$row[3].'</td>
                                                                          <td><button id="resurrectButton" type="button" class="btn btn-sm btn-primary">Resurrect</button></td>

                                                                          </tr>';
                                                              }
                                                            }
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </md-tab-body>
                                    </md-tab>
                                </md-tabs>
                            </md-content>
                        <!--</div>-->
                    </div>
                    <div ng-controller="FABCtrl as demo" class="FAB" ng-cloak>
                        <md-content>
                            <md-fab-speed-dial md-open="demo.isOpen"
                                md-direction="{{demo.selectedDirection}}"
                                  ng-class="demo.selectedMode">
                                  <md-fab-trigger>
                                    <md-button id="AddAdminTrigger" aria-label="menu" data-toggle="modal" data-target="#adminAddModal" class="md-fab md-primary">
                                      <md-icon md-svg-src="../../img/icons/addIcon.svg"></md-icon>
                                    </md-button>
                                  </md-fab-trigger>
                            </md-fab-speed-dial>
                        </md-content>
                    </div>
                </div>

            </div>


                <button type="button" id="DeleteUsertrapButton" class="btn btn-info btn-lg" data-toggle="modal" data-target="#DeleteUserModal" style="display: none">Open Modal</button>
                <div class="modal fade" id="DeleteUserModal" role="dialog">
                    <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">

                                <div id="DeleteUserContentContainer" class="modal-body">
                                    <p id="kek">Are you sure you want to delete, </p>
                                </div>
                                <button id="deleteYes" type="button" class="btn btn-danger" >Yes</button>
                                <button id="deleteNo" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>

                    </div>
                </div>
                <button type="button" id="employeeEditButton" class="btn btn-info btn-lg" data-toggle="modal" data-target="#employeeEditModal" style="display: none">Open Modal</button>
                <div class="modal fade" id="employeeEditModal" role="dialog">
                    <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                  <!--
                                    <div class="form-group">
                                      <h4>user ID</h4>
                                        <input class="form-control" id="edituserID" name="txt_userID" type="text" readonly="readonly" autofocus required>
                                    </div>-->
                                      <div class="form-group">
                                        <h4>first name</h4>
                                          <input class="form-control" id="editFirstname" placeholder="first name" name="txt_firstname" type="text" autofocus required>
                                      </div>
                                      <div class="form-group">
                                        <h4>last name</h4>
                                          <input class="form-control" id="editLastname" placeholder="last name" name="txt_lastname" type="text" required>
                                      </div>
                                      <div class="form-group">
                                        <h4>email address</h4>
                                          <input class="form-control" id="editEmailadd" placeholder="email address" name="txt_signUpEmail" type="email" required>
                                      </div>

                                      <div class="form-group">
                                          <button style="float: middle;" id="btnEditEmp" class="btn btn-lg btn-primary">Edit</button>
                                      </div>

                                </div>
                                <div class="modal-footer">

                                    <div class="form-group">

                                    </div>
                                    <button id="editCloseButton" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                    </div>
                </div>

                <div class="modal fade" id="adminAddModal" role="dialog">
                    <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">

                                      <div class="form-group">
                                        <h4>first name</h4>
                                          <input class="form-control" id="addFirstname" placeholder="first name" name="txt_firstname" type="text" autofocus required>
                                      </div>
                                      <div class="form-group">
                                        <h4>last name</h4>
                                          <input class="form-control" id="addLastname" placeholder="last name" name="txt_lastname" type="text" required>
                                      </div>
                                      <div class="form-group">
                                        <h4>email address</h4>
                                          <input class="form-control emailInput" id="addEmailadd" placeholder="email address" name="txt_signUpEmail" type="email" required>
                                      </div>
                                      <div class="form-group">
                                        <h4>password</h4>
                                          <input class="form-control" id="addPassword" placeholder="password" name="txt_password" type="password" required>
                                      </div>


                                </div>
                                <div class="modal-footer">
                                    <!--<div class="form-group">

                                    </div>-->
                                    <button style="float: middle;" id="btnAddAdmin" class="btn btn-lg btn-primary">Add</button>
                                    <button id="addCloseButton" type="button" class="btn btn-lg btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                    </div>
                </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

      <!-- jQuery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-messages.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>

    <!--<script src="//code.jquery.com/jquery-1.12.4.js"></script>-->

    <script type="text/javascript" charset="utf-8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../AdminPageBootStrap/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>





    <script>

        var app = angular.module("AdminTabApp", ['ngMaterial'])


        app.controller('tabController', function($scope){
            $scope.data = {
            selectedIndex: 0,
            bottom: false,
            firstLabel: "Active admin",
            secondLabel: "Inactive admin"

            };
            $scope.next = function(){
                $scope.data.selectedIndex = Math.min($scope.data.selectedIndex + 1, 2);

            }
            $scope.previous = function(){
                $scope.data.selectedIndex = Math.max($scope.data.selectedIndex - 1, 0);
            }
        });

        app.controller('FABCtrl', function(){
          this.topDirections = 'up';
          this.bottomDirections = 'down';

          this.isOpen = false;
          this.availableModes = 'md-fling';
          this.selectedMode = 'md-fling';
          this.availableDirections = 'up';
          this.selectedDirection = 'up';
        });

        jQuery(document).ready(function(){
          //  $(".modal-dialog").draggable();
          //  $(".modal-content").resizable();

            $("#myModal").on("show.bs.modal", function(){
              $(this).find('.modal-body').css({
                'max-height': '100%'
              });
            });

            /*var userTable = $("#ActiveAdminTable").DataTable({
              "autoWidth":false
            });*/
            /*var nonActiveTable = $("#NonActiveAdminTable").DataTable({
                "autoWidth": false
            });*/

            var userHours;
            var txt = "";
            var userIDfocus;

            var NonActiveAdminTable = $("#NonActiveAdminTable").DataTable();
            var ActiveAdminTable = $("#ActiveAdminTable").DataTable();
          /*  $.ajax({
              type: "POST",
              url: "../AdminServer/InactiveAdminTableLoader.php",
              dataType: "json",
              cache: false,
              success: function(data){
                console.log(data);
                NonActiveAdminTable = $("#NonActiveAdminTable").DataTable({

                  "aaData": [data]
                });
              }
            });

            $.ajax({
              type: "POST",
              url: "../AdminServer/ActiveAdminTableLoader.php",
              dataType: "json",
              cache: false,
              success: function(data){
                console.log(data);
                //var obj = $.parseJSON(data);
                //alert(data);
                //console.log(obj);
                var obj;
                ActiveAdminTable = $("#ActiveAdminTable").DataTable({


                });

              },
              error: function(data){
                alert(data);
              }
            });
            function formatData(data){
              var formatdata = [];
            }*/

            /*$("#AddAdminTrigger").on("click", function(){
              //alert("add button");
            });*/

            function validateEmail($email){
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;

                return ($email.length > 0 && emailReg.test($email));
            }

            $("#addEmailadd").on("input",function(){
                if(!validateEmail($("#addEmailadd").val())){
                    $("#addEmailadd").css('border-color', 'red');
                    $("#addEmailadd").css('border-width', '2px');
                }else{
                    $("#addEmailadd").css('border-color', 'green');
                }
            });

            $("#editEmailadd").on("input",function(){
                if(!validateEmail($("#editEmailadd").val())){
                    $("#editEmailadd").css('border-color', 'red');
                    $("#editEmailadd").css('border-width', '2px');
                }else{
                    $("#editEmailadd").css('border-color', 'green');
                }
            })

            $("#btnAddAdmin").on("click",function(data){

              $.ajax({
                url: "../AdminServer/AddAdminBackground.php",
                method: "POST",
                data: {firstname: $("#addFirstname").val(),
                      lastname: $("#addLastname").val(),
                      emailaddress: $("#addEmailadd").val(),
                      password: $("#addPassword").val(),
                },
                success: function(data){
                  //alert(data);
                  window.location.replace("AdminAdminPage.php");
                  //$("#addCloseButton").trigger("click");
                },
                error: function(data){
                  alert(data);
                  $("#addCloseButton").trigger("click");
                }
              });
            });



            $("#NonActiveAdminTable").on('click','#resurrectButton', function(){
              var data = NonActiveAdminTable.row($(this).parents('tr')).data();

              $.ajax({
                type: 'POST',
                url: '../AdminServer/resurrectAdmin.php',
                data: {userID : data[0]},

                success: function(data){
                  //alert(data);
                  window.location.reload();
                },
                error: function(){
                  console.log("failed to ressurect employee");
                }
              });
            });

            function userEditsuccess(){
              $("#userEditSuccess").html("<strong>User successfully edited!</strong>");
              $("#editCloseButton").trigger("click");
              $("#userEditSuccess").finish().show().delay(3000).fadeOut("slow");

            }
          //  var userIDedit;


            $("#ActiveAdminTable").on("click",'#editbutton' ,function(){
                  var data = ActiveAdminTable.row($(this).parents('tr')).data();
                $("#edituserID").val(data[0]);
                $("#editFirstname").val(data[1]);
                $("#editLastname").val(data[2]);
                $("#editEmailadd").val(data[3]);
                $("#employeeEditButton").trigger("click");

                $("#btnEditEmp").on("click", function(){
                  $.ajax({
                      method: 'POST',
                      data: {userID: data[0],
                            txt_firstname : $("#editFirstname").val(),
                            txt_lastname : $("#editLastname").val(),
                            txt_signUpEmail : $("#editEmailadd").val(),
                            },
                      url: '../AdminServer/editAdminBackground.php',
                      success: function(data){
                        //login popup
                        //alert(data);
                        if(data == "user successfully edited"){
                          console.log("user edited");
                          window.location.replace("AdminAdminPage.php");
                          //'userEditsuccess();
                        }else{
                          alert(data);
                        }
                      },
                      error: function(){
                        alert("something went wrong");
                      }
                  });
                });
            });

            $("#ActiveAdminTable").on('click','#delbutton', function(){
              var data = ActiveAdminTable.row($(this).parents('tr')).data();
              //alert(data[0]);
            //  alert(data[1]+" "+data[2]);
              $("#DeleteUserContentContainer").html("Are you sure you want to delete, "+data[1]+" "+data[2]+" ?");
              $("#DeleteUsertrapButton").trigger('click');

              $("#deleteYes").on("click",function(){
              //  alert(data[0]);

                $.ajax({
                    type: 'POST',
                    url: '../AdminServer/deleteAdminBackground.php',
                    data: {userID : data[0]},

                    success: function(data){
                        //alert(data);
                        window.location.replace("AdminAdminPage.php");
                    },
                    error: function(){
                        console.log("failed in retrieving user hours");
                    }
                })
                $("#deleteNo").trigger("click");
              });
            });




            $("#ActiveAdminTable tbody").on('click', 'td', function(){
                if($(this).index() == 4){
                    return;
                }else{
                //  $("#myModal").data('bs.modal').handleUpdate();
                    var data = ActiveAdminTable.row(this).data();
                    var firstname = data[1];
                    var lastname = data[2];
                    userIDfocus = data[0];
                    alert(data[0]);

                    $.post("UserHoursPageLoader.php", {"userID": data[0], "firstname": data[1], "lastname": data[2]},function(){
                        window.location.replace("AdminUserPage.php");
                    });

                }
            });

        });

    </script>






</body>

</html>
