
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



    <!-- Custom Fonts -->
    <link href="../../AdminPageBootStrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

    <link href="../../munchkinBootStrap/CSS/userCSS.css" rel="stylesheet" type="text/css">

    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet"/>

          <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>
          <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js"></script>
          <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js"></script>
          <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-messages.min.js"></script>
          <script src = "https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>



    <script language="javascript">
      var app  = angular.module("EmployeeTabApp", ['ngMaterial'])

      app.controller('tabController', function($scope){
        $scope.data = {
          selectedIndex: 0,
          bottom: false,
          firstLabel: "Active Employees",
          secondLabel: "Non-Active Employees",
          thirdLabel: "Teams"

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

/*
      app.controller('gridListCtrl', function(){
        this.tiles = buildGridModel({
          title: "Team-",
          background: ""
        });
        function buildGridModel(tileTmpl){
          var it, results = [];
          $http.get('getAllTeams.php').success(function(data){
            $scope.teams = $.parseJSON(data);
          });
          var len = $scope.teams;
          for(var j = 0; j < len; j++){

          }
        }
      });
      */
    </script>
    <style>
      .FAB{
        position: fixed;
        bottom:0;
        right:0;
      }
      #page-wrapper{
          width: 89%;
      }
      #mainContent{
        width: 84%;
      }
    </style>
</head>

<body>

    <div id="wrapper" ng-app = "EmployeeTabApp">


        <?php include("sideBar.php"); ?>

        <div>

            <div id="mainContent" >

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Employees
                        </h1>

                    </div>
                </div>
                <!-- /.row
                <button id="RButton" class="btn  btn-primary">Refresh</button>-->
                <div  id="tableContent"  >
                  <div id="userEditSuccess" class="alert alert-success" style="display: none;">

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
                                                <table id="ActiveEmployeeTable" class="table table-hover table-striped" cellspacing="0" width="100%" style= "width: 80%">
                                                    <thead>
                                                        <tr>
                                                            <th>User ID</th>
                                                            <th>First name</th>
                                                            <th>Last name</th>
                                                            <th>Email add</th>
                                                            <th>Team ID</th>
                                                            <th>Team</th>
                                                            <th>Delete/edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <!-- turn this into a form so we can serialize and pass to ajax POST  -->
                                                        <?php
                                                            include("../AdminServer/DBconnect.php");
                                                            $query = 'SELECT `userID`, `firstname`, `lastname`, `emailadd`, `TeamID` FROM `user` WHERE `active` = 1';

                                                            $result = mysqli_query($conn,$query);
                                                            if($result){
                                                              while($row = mysqli_fetch_array($result)){
                                                                  $sql = 'SELECT `TeamName` FROM `team` WHERE `TeamID` = '.$row[4].'';
                                                                  $teamresult = mysqli_query($conn, $sql);
                                                                  if(mysqli_num_rows($teamresult) > 0){
                                                                    $teamrow = mysqli_fetch_array($teamresult);
                                                                    echo '<tr id='.$row[0].'>
                                                                            <td>'.$row[0].'</td>
                                                                            <td>'.$row[1].'</td>
                                                                            <td>'.$row[2].'</td>
                                                                            <td>'.$row[3].'</td>
                                                                            <td>'.$row[4].'</td>
                                                                            <td>'.$teamrow[0].'</td>
                                                                            <td><button id="delbutton" type="button" class="btn btn-sm btn-danger">Delete</button>
                                                                                <button id="editbutton" type="button" class="btn btn-sm btn-warning">Edit</button>
                                                                            </tr>';
                                                                  }else{

                                                                    echo '<tr id='.$row[0].'>
                                                                            <td>'.$row[0].'</td>
                                                                            <td>'.$row[1].'</td>
                                                                            <td>'.$row[2].'</td>
                                                                            <td>'.$row[3].'</td>
                                                                            <td>'.$row[4].'</td>
                                                                            <td>'."N/A".'</td>
                                                                            <td><button id="delbutton" type="button" class="btn btn-sm btn-danger">Delete</button>
                                                                                <button id="editbutton" type="button" class="btn btn-sm btn-warning">Edit</button>
                                                                            </tr>';
                                                                  }
                                                              }
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
                                                <table id="NonActiveEmployeeTable" class="table table-hover table-striped" cellspacing="0" width="100%" style= "width: 80%">
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
                                                            $query = 'SELECT `userID`, `firstname`, `lastname`, `emailadd` FROM `user` WHERE `active` = 0';

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

                </div>
                <div ng-controller="FABCtrl as demo" class="FAB" ng-cloak>
                    <md-content>
                        <md-fab-speed-dial md-open="demo.isOpen"
                            md-direction="{{demo.selectedDirection}}"
                              ng-class="demo.selectedMode">
                              <md-fab-trigger>
                                <md-button id="AddEmployeeTrigger" aria-label="menu" class="md-fab md-primary">
                                  <md-icon md-svg-src="../../img/icons/addIcon.svg"></md-icon>
                                </md-button>
                              </md-fab-trigger>
                        </md-fab-speed-dial>
                    </md-content>
                </div>
            </div>


                <!--delete Modal -->
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

                                    <div class="form-group">
                                      <h4>user ID</h4>
                                        <input class="form-control" id="edituserID" name="txt_userID" type="text" readonly="readonly" autofocus required>
                                    </div>
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
                                      <h4>Team</h4>
                                        <select id="teamSelect">
                                            <?php
                                              include("DBconnect.php");
                                              $sql = "SELECT * FROM `Team` WHERE 1";

                                              $result = mysqli_query($conn, $sql);

                                              if(mysqli_num_rows($result) > 0){
                                                  $data_array = array();
                                                  echo '<option value=0> N/A</option>';
                                                  while($row = mysqli_fetch_array($result)){

                                                        echo '<option value='.$row['TeamID'].'>'.$row['TeamName'].'</option>';
                                                  }
                                              }else{
                                                echo "no data";
                                              }
                                            ?>
                                        </select>
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

                <button type="button" id="addNewEmployee" class="btn btn-info btn-lg" data-toggle="modal" data-target="#employeeAddModal" style="display: none">Open Modal</button>
                <div class="modal fade" id="employeeAddModal" role="dialog">
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
                                          <input class="form-control" id="addEmailadd" placeholder="email address" name="txt_signUpEmail" type="email" required>
                                    </div>
                                    <div class="form-group">
                                        <h4>password</h4>
                                          <input class="form-control" id="addPassword" placeholder="password" name="txt_password" type="password" required>
                                    </div>
                                    <div class="form-group">
                                        <h4>confirm password</h4>
                                          <input class="form-control" id="confaddPassword" placeholder="confirm password" name="txt_confpassword" type="password" required>
                                    </div>
                                    <div class="form-group">
                                      <h4>Team</h4>
                                        <select id="addteamSelect">
                                            <?php
                                              include("DBconnect.php");
                                              $sql = "SELECT * FROM `Team` WHERE 1";

                                              $result = mysqli_query($conn, $sql);

                                              if(mysqli_num_rows($result) > 0){
                                                  $data_array = array();
                                                  echo '<option value=0>none</option>';
                                                  while($row = mysqli_fetch_array($result)){

                                                        echo '<option value='.$row['TeamID'].'>'.$row['TeamName'].'</option>';
                                                  }
                                              }else{
                                                echo "no data";
                                              }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button style="float: middle;" id="btnAddEmp" class="btn btn-lg btn-primary">Add</button>
                                    </div>

                                </div>
                                <div class="modal-footer">

                                    <div class="form-group">

                                    </div>
                                    <button id="AddCloseButton" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                    </div>
                </div>


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

      <!-- jQuery -->
      <script src="../../HomePageBootStrap/vendor/jquery/jquery.min.js"></script>
      <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
    <!--<script src="//code.jquery.com/jquery-1.12.4.js"></script>-->

    <script type="text/javascript" charset="utf-8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../AdminPageBootStrap/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>





    <script>
        jQuery(document).ready(function(){
            $(".modal-dialog").draggable();
            //$(".modal-content").resizable();
            var userTable = $("#ActiveEmployeeTable").DataTable({
              "autoWidth":false
            });
            var nonActiveTable = $("#NonActiveEmployeeTable").DataTable({
                "autoWidth": false
            });
            var TeamTable = $("#TeamTable").DataTable({
                autoWidth: false
            });

            $("#AddEmployeeTrigger").on("click",function(){
              $("#addNewEmployee").trigger("click");
            });
            $("#AddTeam").on("click", function(){
                $("#AddTeamModalButton").trigger("click");
            });

            function validateEmail($email){
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;

                return ($email.length > 0 && emailReg.test($email));
            }
            var validateFlagEmail;
            var validateFlagPassword;

            $("#addEmailadd").on("input",function(){
              if(!validateEmail($("#addEmailadd").val())){
                $("#addEmailadd").css('border-color', 'red');
                $("#addEmailadd").css('border-width', '2px');
                validateFlagEmail = 0;
              }else{
                $("#addEmailadd").css('border-color', 'green');
                validateFlagEmail = 1;
              }
            });

            $("#confaddPassword").on("input",function(){
              if($("#confaddPassword").val() != $("#addPassword").val()){
                $("#confaddPassword").css('border-color', 'red');
                $("#confaddPassword").css('border-width', '2px');
                validateFlagPassword = 0;
              }else{
                $("#confaddPassword").css('border-color', 'green');
                validateFlagPassword = 1;
              }
            });

            $("#btnAddEmp").on("click",function(){
              if(validateFlagPassword == 1 && validateFlagEmail == 1){
                var addLastName = $("#addLastname").val();
                var addEmailAdd = $("#addEmailadd").val();
                var addFirstName = $("#addFirstname").val();
                var addPassword = $("#confaddPassword").val();
                var Teamselected = $("#addteamSelect option:selected").val();

                $.ajax({
                  url:"../AdminServer/signUpBackground.php",
                  method: "POST",
                  data: {firstname: addFirstName, lastname: addLastName, emailadd: addEmailAdd,
                        password: addPassword, teamselected: Teamselected},
                  success: function(data){
                    alert(data);
                    $("#addLastname").val("");
                    $("#addEmailadd").val("");
                    $("#addFirstname").val("");
                    $("#addPassword").val("");
                    $("#AddCloseButton").trigger("click");
                    window.location.reload();
                  },
                  error: function(data){
                    alert(data);
                  }
                });
              }else{
                alert("please input correctly")
              }
            });


            $("#myModal").on("show.bs.modal", function(){
              $(this).find('.modal-body').css({
                'max-height': '100%'
              });
            });
            var userHours;
            var txt = "";
            var userIDfocus;
            $("#UsersHoursTable").DataTable();



            function getUserhours(data){
                if(data){
                    console.log("success in retrieving user hours");
                    var obj = $.parseJSON(data);

                    var len = obj.length;
                    //var txt = "";

                    if(len > 0){
                        var cnt = 1;
                        var diff;
                        var SS;
                        var HH;
                        var MM;

                        var time_In;
                        var time_Out;

                        var totalHH = 0;
                        var totalMM = 0;

                        var totalformatted = 0;
                        var formatted;

                        for(var i = 0; i < len && (obj[i].timeIn && obj[i].timeOut); i++){
                            time_In = new Date(Date.parse(obj[i].timeIn));
                            time_Out = new Date(Date.parse(obj[i].timeOut));

                            diff = time_Out - time_In;
                            SS = diff/1000;
                            MM = Math.floor((SS % 3600)/60);
                            HH = Math.floor(SS / 3600);

                            formatted = ((HH < 10) ? ("0" + HH) : HH) + ":" + ((MM < 10) ? ("0" + MM) : MM);

                            txt += "<tr><td>"+cnt+"</td><td>"+obj[i].timeIn+"</td><td>"+obj[i].timeOut+"</td><td>"+formatted+"</td></tr>";

                            totalHH += HH;
                            totalMM += MM;
                            cnt++;
                        }
                        if(txt != ""){

                            totalformatted = ((totalHH < 10) ? ("0" + totalHH) : totalHH) + ":" + ((totalMM < 10) ? ("0" + totalMM) : totalMM);


                            return totalformatted;

                        }
                    }else{
                        alert("something weird happened");
                    }
                }else{
                        txt = "<p>user has no activity...</p>";
                }

            }



            function userHoursByDay(data,firstname,lastname){
                var totalhoursformatted;

                userHours = data;

                totalhoursformatted = getUserhours(data);
                $("#UserHoursTableBody").html(txt);
                $("#totalHours").attr('value', totalhoursformatted);
                $("#userbuttonRow").trigger('click');
                $("#UserModalName").html(firstname+" "+lastname);
                $("#userHoursTableContainer").css("display","block");
                $("#UserHoursTable").css("display","block");

                txt = "";
            }


            $("#NonActiveEmployeeTable").on('click','#resurrectButton', function(){
              var data = nonActiveTable.row($(this).parents('tr')).data();

              $.ajax({
                type: 'POST',
                url: '../AdminServer/resurrectEmployee.php',
                data: {userID : data[0]},

                success: function(data){
                  alert(data);
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


            $("#ActiveEmployeeTable").on("click",'#editbutton' ,function(){
                  var data = userTable.row($(this).parents('tr')).data();
                $("#edituserID").val(data[0]);
                $("#editFirstname").val(data[1]);
                $("#editLastname").val(data[2]);
                $("#editEmailadd").val(data[3]);
                $("#employeeEditButton").trigger("click");

                $("#btnEditEmp").on("click", function(){

                  $.ajax({
                      method: 'POST',
                      data: {txt_userID : $("#edituserID").val(),
                            txt_firstname : $("#editFirstname").val(),
                            txt_lastname : $("#editLastname").val(),
                            txt_signUpEmail : $("#editEmailadd").val(),
                            txt_Team : $("#teamSelect option:selected").val()},
                      url: '../AdminServer/editEmployeeBackground.php',
                      success: function(data){
                        //login popup
                        //alert($("#teamSelect option:selected").val());
                    //    alert(data);
                        console.log("user edited");
                        userEditsuccess();
                        window.location.reload();
                      },
                      error: function(){
                        alert("something went wrong");
                      }
                  });
                });
            });

            $("#ActiveEmployeeTable").on('click','#delbutton', function(){
              var data = userTable.row($(this).parents('tr')).data();
              //alert(data[0]);
            //  alert(data[1]+" "+data[2]);
              $("#DeleteUserContentContainer").html("Are you sure you want to delete, "+data[1]+" "+data[2]+" ?");
              $("#DeleteUsertrapButton").trigger('click');

              $("#deleteYes").on("click",function(){

                $.ajax({
                    type: 'POST',
                    url: '../AdminServer/deleteUserBackground.php',
                    data: {userID : data[0]},

                    success: function(data){
                        alert(data);
                        window.location.reload();
                    },
                    error: function(){
                        console.log("failed in retrieving user hours");
                    }
                })
                $("#deleteNo").trigger("click");
              });
            });

            /*$("#RButton").on("click", function(){
              //$("#nonActiveTable").load("deletedEmployees.php #nonActiveTable");
              window.location.reload();
            });*/



            $("#ActiveEmployeeTable tbody").on('click', 'td', function(){
                if($(this).index() == 6){
                    return;
                }else{
                //  $("#myModal").data('bs.modal').handleUpdate();
                    var data = userTable.row(this).data();
                    var firstname = data[1];
                    var lastname = data[2];
                    userIDfocus = data[0];
                    //alert(data[0]);

                    $.post("../AdminServer/UserHoursPageLoader.php", {"userID": data[0], "firstname": data[1], "lastname": data[2], "TeamID": data[4]},function(){
                        window.location.replace("AdminUserPage.php");
                    });

                }
            });

        });

    </script>




</body>

</html>
