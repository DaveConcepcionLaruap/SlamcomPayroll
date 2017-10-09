
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

   <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">-->
    <link rel = "stylesheet" href= "https://fonts.googleapis.com/icon?family=Material+Icons" >
    <link rel = "stylesheet" href= "https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css" >
    <!-- Bootstrap Core CSS -->
    <link href="../../AdminPageBootStrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../AdminPageBootStrap/css/sb-admin.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="../../AdminPageBootStrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet">

    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!--  <link rel="stylesheet" href="WeeklySchedulerv2/dist/jquery.schedule.css">-->

    <link rel="stylesheet" href="../../munchkinBootStrap/CSS/userCSS.css">
    <!--this link won't work and I don't know why -->
    <link href="../../TimePickerPlugin/mdtimepicker.css" rel="stylesheet">


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
        .buttonSize{
            width:20%;

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
        .FAB{
          position: fixed;
          bottom:0;
          right:0;
        }
        #page-wrapper{
            width: 85%;
            height: 900px;
        }
        .modal-dialog{
            width: 90%;
        }

    </style>

</head>

<body>

    <div id="wrapper">


        <?php include("sideBar.php"); ?>

        <div  ng-app = "tableApplication" id="page-wrapper">

            <div class="container-fluid">

                <!-- /.row -->
            </div>


                <div id="tabContainer" ng-controller = "tabController as ctrl" ng-cloak style="position: relative;">

                    <md-content layout = "column" layout-fill>
                        <md-tabs layout-fill  md-selected = "data.selectedIndex"
                            md-align-tabs = "{{data.bottom ? 'bottom' : 'top'}}">
                            <md-tab id = "tab1">
                                <md-tab-label>{{data.firstLabel}}</md-tab-label>
                                <md-tab-body>
                                    <div class="table-responsive">
                                        <table id="TeamTable" class="table table-hover table-striped" cellspacing="0" width="100%" >
                                            <thead>
                                                <tr>
                                                    <th>Team ID</th>
                                                    <th>Team Name</th>
                                                    <th>Team Description</th>

                                                    <th>Delete/edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <!-- turn this into a form so we can serialize and pass to ajax POST-->
                                                <?php
                                                  include("../AdminServer/DBconnect.php");
                                                  $sql = "SELECT * FROM `Team` WHERE `Active` = 1";

                                                  $result = mysqli_query($conn, $sql);

                                                  if(mysqli_num_rows($result) > 0){
                                                      $data_array = array();

                                                      while($row = mysqli_fetch_array($result)){
                                                        //  $deleteID = $row['TeamID'].$row['TeamName'];
                                                          //$editID = $row['TeamName'].$row['TeamID'];
                                                          echo '<tr id='.$row['TeamID'].'>
                                                                  <td>'.$row['TeamID'].'</td>
                                                                  <td>'.$row['TeamName'].'</td>
                                                                  <td>'.$row['TeamDesc'].'</td>

                                                                  <td><button id="deleteBtn" type="button" data-toggle="modal" data-target="#DeleteTeamModal" class="btn btn-sm btn-danger">Delete</button>
                                                                      <button id="editBtn" type="button" data-toggle="modal" data-target="#EditTeamModal" class="btn btn-sm btn-warning">Edit</button></td>

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
                                      <table id="InactiveTeamTable" class="table table-hover table-striped" cellspacing="0" width="100%" >
                                          <thead>
                                              <tr>
                                                  <th>Team ID</th>
                                                  <th>Team Name</th>
                                                  <th>Team Description</th>

                                                  <th>Resurrect</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          <!-- turn this into a form so we can serialize and pass to ajax POST-->
                                              <?php
                                                include("../AdminServer/DBconnect.php");
                                                $sql = "SELECT * FROM `Team` WHERE `Active` = 0";

                                                $result = mysqli_query($conn, $sql);

                                                if(mysqli_num_rows($result) > 0){
                                                    $data_array = array();

                                                    while($row = mysqli_fetch_array($result)){
                                                        $resurrectBtn = $row['TeamID'].$row['TeamName'];

                                                        echo '<tr id='.$row['TeamID'].'>
                                                                <td>'.$row['TeamID'].'</td>
                                                                <td>'.$row['TeamName'].'</td>
                                                                <td>'.$row['TeamDesc'].'</td>

                                                                <td><button id='.$resurrectBtn.' type="button" data-toggle="modal" data-target="#ResurrectTeamModal" class="btn btn-sm btn-primary">Resurrect</button>
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
                        </md-tabs>
                    </md-content>

                </div>

                <div ng-controller="FABCtrl as demo" class="FAB" ng-cloak>
                    <md-content>
                        <md-fab-speed-dial md-open="demo.isOpen"
                            md-direction="{{demo.selectedDirection}}"
                              ng-class="demo.selectedMode">
                              <md-fab-trigger>
                                <md-button id="addNewTeamTrigger" aria-label="menu" class="md-fab md-primary">
                                  <md-icon md-svg-src="../../img/icons/addIcon.svg"></md-icon>
                                </md-button>
                              </md-fab-trigger>

                        </md-fab-speed-dial>
                    </md-content>
                </div>

            <!-- /.container-fluid -->
            <button type="button" id="AddTeamModalButton" class="btn btn-info btn-lg" data-toggle="modal" data-target="#AddTeamModal" style="display: none">Open Modal</button>
            <div class="modal fade" id="AddTeamModal" role="dialog">
                <div class="modal-dialog">

                        <!-- Modal content modal to add team-->
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">

                                  <div class="form-group">
                                    <h4>Team Name</h4>
                                      <input class="form-control" id="TeamName" placeholder="team name" name="txt_teamName" type="text" autofocus required>
                                  </div>
                                  <div class="form-group">
                                    <h4>Team Description</h4>
                                      <input class="form-control" id="TeamDesc" placeholder="team description" name="txt_teamDesc" type="text" required>
                                  </div>

                                  <div class = "Column buttonSize">
                                        <md-button id="submitNewTeam" flex="15" class="md-raised md-primary">submit</md-button>
                                  </div>
                            </div>
                            <div class="modal-footer">

                                <div class="form-group">

                                </div>
                                <button id="addTeamcloseButton" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                </div>
            </div>

            <div class="modal fade" id="EditTeamModal" role="dialog">
                <div class="modal-dialog">

                        <!-- Modal content modal to add team-->
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">

                                  <div class="form-group">
                                    <h4>Team Name</h4>
                                      <input class="form-control" id="EditTeamName" placeholder="team name" name="txt_teamName" type="text" autofocus required>
                                  </div>
                                  <div class="form-group">
                                    <h4>Team Description</h4>
                                      <input class="form-control" id="EditTeamDesc" placeholder="team description" name="txt_teamDesc" type="text" required>
                                  </div>

                                  <div class = "Column buttonSize">
                                        <md-button id="submitEditTeam" flex="15" class="md-raised md-primary">submit</md-button>
                                  </div>
                            </div>
                            <div class="modal-footer">

                                <div class="form-group">

                                </div>
                                <button id="addTeamcloseButton" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                </div>
            </div>


            <div class="modal fade" id="DeleteTeamModal" role="dialog">
                <div class="modal-dialog">

                        <!-- Modal content modal to add team-->
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                                are you sure you want to delete?

                                <button id="deleteyes">yes</button>
                                <button id="deleteno" data-dismiss="modal">no</button>
                            </div>

                        </div>

                </div>
            </div>


            <div class="modal fade" id="ResurrectTeamModal" role="dialog">
                <div class="modal-dialog">

                        <!-- Modal content modal to add team-->
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                                are you sure you want to resurrect?

                                <button id="resurrectyes">yes</button>
                                <button id="resurrectno" data-dismiss="modal">no</button>
                            </div>

                        </div>

                </div>
            </div>

            <!--template for inserting or editing schedule-->
            <!--<button type="button" id="AddScheduleModalButton" class="btn btn-info btn-lg" data-toggle="modal" data-target="#AddScheduleModal" style="display: none">Open Modal</button>
            <div class="modal fade" id="AddScheduleModal" role="dialog">
                <div class="modal-dialog">


                        <div class="modal-content">
                            <div class="modal-header">

                                <div id="teamNameText">
                                </div>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div ng-controller="inputController" layout="column" ng-cloak class="md-inline-form">


                                <div class = "Column buttonSize">
                                    <md-button id="submitEmployeeSchedule" flex="15" class="md-raised md-primary">submit</md-button>
                                </div>

                                <md-content layout-gt-sm="column" layout-padding>
                                    <div class="form-group">
                                      <input type="checkbox" id="sundayCheck"  value="Sunday">Sunday</br>
                                    </div>
                                    <div class="form-group" id="sundayGroup" style="display:none;">
                                      <md-input-container md-no-float>
                                        <label>Sunday Time In</label>
                                        <input ng-model="sunday.timeIn"  type="text" id="timepickerSundayTimeIn">
                                      </md-input-container>
                                      <md-input-container md-no-float>
                                        <label>Sunday Time Out</label>
                                        <input ng-model="sunday.timeOut"  type="text" id="timepickerSundayTimeOut">
                                      </md-input-container>
                                    </div>
                                    <div class="form-group">
                                      <input type="checkbox" id="mondayCheck" value="Monday">Monday<br>
                                    </div>
                                    <div class="form-group" id="mondayGroup" style="display:none;">
                                      <md-input-container md-no-float>
                                        <label>Monday Time In</label>
                                        <input ng-model="monday.timeIn"  type="text" id="timepickerMondayTimeIn">
                                      </md-input-container>
                                      <md-input-container md-no-float>
                                        <label>Monday Time Out</label>
                                        <input ng-model="monday.timeOut"  type="text" id="timepickerMondayTimeOut">
                                      </md-input-container>
                                    </div>
                                    <div class="form-group">
                                      <input type="checkbox" id="tuesdayCheck" value="Tuesday">Tuesday<br>
                                    </div>
                                    <div class="form-group" id="tuesdayGroup" style="display:none;">
                                      <md-input-container md-no-float>
                                        <label>Tuesday Time In</label>
                                        <input ng-model="tuesday.timeIn"  type="text" id="timepickerTuesdayTimeIn">
                                      </md-input-container>
                                      <md-input-container md-no-float>
                                        <label>Tuesday Time Out</label>
                                        <input ng-model="tuesday.timeOut"  type="text" id="timepickerTuesdayTimeOut">
                                      </md-input-container>
                                    </div>
                                    <div class="form-group">
                                      <input type="checkbox" id="wednesdayCheck" value="Wednesday">Wednesday<br>
                                    </div>
                                    <div class="form-group" id="wednesdayGroup" style="display:none;">
                                      <md-input-container md-no-float>
                                        <label>Wednesday Time In</label>
                                        <input ng-model="wednesday.timeIn"  type="text" id="timepickerWednesdayTimeIn">
                                      </md-input-container>
                                      <md-input-container md-no-float>
                                        <label>Wednesday Time Out</label>
                                        <input ng-model="wednesday.timeOut"  type="text" id="timepickerWednesdayTimeOut">
                                      </md-input-container>
                                    </div>
                                    <div class="form-group">
                                      <input type="checkbox" id="thursdayCheck" value="Thursday">Thursday<br>
                                    </div>
                                    <div class="form-group" id="thursdayGroup" style="display:none;">
                                      <md-input-container md-no-float>
                                        <label>Thursday Time In</label>
                                        <input ng-model="thursday.timeIn"  type="text" id="timepickerThursdayTimeIn">
                                      </md-input-container>
                                      <md-input-container md-no-float>
                                        <label>Thursday Time Out</label>
                                        <input ng-model="thursday.timeOut"  type="text" id="timepickerThursdayTimeOut">
                                      </md-input-container>
                                    </div>
                                    <div class="form-group">
                                      <input type="checkbox" id="fridayCheck" value="Friday">Friday<br>
                                    </div>
                                    <div class="form-group" id="fridayGroup" style="display:none;">
                                      <md-input-container md-no-float>
                                        <label>Friday Time In</label>
                                        <input ng-model="friday.timeIn"  type="text" id="timepickerFridayTimeIn">
                                      </md-input-container>
                                      <md-input-container md-no-float>
                                        <label>Friday Time Out</label>
                                        <input ng-model="friday.timeOut"  type="text" id="timepickerFridayTimeOut">
                                      </md-input-container>
                                    </div>
                                    <div class="form-group">
                                      <input type="checkbox" id="saturdayCheck" value="Saturday">Saturday<br>
                                    </div>
                                    <div class="form-group" id="saturdayGroup" style="display:none;">
                                      <md-input-container md-no-float>
                                        <label>Saturday Time In</label>
                                        <input ng-model="saturday.timeIn"  type="text" id="timepickerSaturdayTimeIn">
                                      </md-input-container>
                                      <md-input-container md-no-float>
                                        <label>Saturday Time Out</label>
                                        <input ng-model="saturday.timeOut"  type="text" id="timepickerSaturdayTimeOut">
                                      </md-input-container>
                                    </div>
                                </md-content>
                            </div>


                            <div class="modal-footer">

                                <div class="form-group">

                                </div>
                                  <button id="addSchedulecloseButton" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                </div>
            </div>-->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


      <!-- jQuery -->
    <!--  <script src="HomePageBootStrap/vendor/jquery/jquery.min.js"></script> -->
     <!-- <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <!--  <script src="WeeklySchedulerv2/dist/jquery.schedule.js"></script>-->
        <script src="../../TimePickerPlugin/mdtimepicker.js"></script>


        <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
          <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>
          <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
          <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js"></script>
          <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-messages.min.js"></script>
          <script src = "https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>



      <script type="text/javascript" charset="utf-8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>


   <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  -->

    <!-- Bootstrap Core JavaScript -->
    <script src="../../AdminPageBootStrap/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->




    <script>

         var app = angular.module("tableApplication", ['ngMaterial', 'ngMessages']);
       var STARTDate;
       var ENDDate;

       app.controller('inputController', function($scope){
        // $scope.sunday = {
          // timeIn: '',
          // timeOut: ''
         //};
       });
        app.controller('tabController', function($scope){
            $scope.data = {
            selectedIndex: 0,
            bottom: false,
            firstLabel: "Active Teams",
            secondLabel: "Inactive Teams",


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
        app.directive('mdDatepicker', function(){
            return{
                link: function(scope, element){
                    var controller = element.controller('mdDatepicker');

                    var event = {
                        target: document.body
                    };
                    var input = element.find('input');

                    input.on('focus', function(e){
                        scope.$apply(function(){
                            controller.openCalendarPane(event);
                        });
                    });
                    input.on('click', function(e){
                        e.stopPropagation();
                    });
                }
            };
        });

        jQuery(document).ready(function(){

            //var hoursTable = $("#UserHoursTable").DataTable();
            var TeamTable = $("#TeamTable").DataTable();
            var InactiveTeamTable = $("#InactiveTeamTable").DataTable();

            $("#timepickerSundayTimeIn").mdtimepicker();
            $("#timepickerSundayTimeOut").mdtimepicker();
            $("#timepickerMondayTimeIn").mdtimepicker();
            $("#timepickerMondayTimeOut").mdtimepicker();
            $("#timepickerTuesdayTimeIn").mdtimepicker();
            $("#timepickerTuesdayTimeOut").mdtimepicker();
            $("#timepickerWednesdayTimeIn").mdtimepicker();
            $("#timepickerWednesdayTimeOut").mdtimepicker();
            $("#timepickerThursdayTimeIn").mdtimepicker();
            $("#timepickerThursdayTimeOut").mdtimepicker();
            $("#timepickerFridayTimeIn").mdtimepicker();
            $("#timepickerFridayTimeOut").mdtimepicker();
            $("#timepickerSaturdayTimeIn").mdtimepicker();
            $("#timepickerSaturdayTimeOut").mdtimepicker();

            $("#sundayCheck").change(function(){
              $("#sundayGroup").toggle();
            });
            $("#mondayCheck").change(function(){
              $("#mondayGroup").toggle();
            });
            $("#tuesdayCheck").change(function(){
              $("#tuesdayGroup").toggle();
            });
            $("#wednesdayCheck").change(function(){
              $("#wednesdayGroup").toggle();
            });
            $("#thursdayCheck").change(function(){
              $("#thursdayGroup").toggle();
            });
            $("#fridayCheck").change(function(){
              $("#fridayGroup").toggle();
            });
            $("#saturdayCheck").change(function(){
              $("#saturdayGroup").toggle();
            });


          /*  $.ajax({
              type: "POST",
              url: "../AdminServer/LoadTeamTableServer.php",
              dataType: "json",
              cache: false,
              success: function(data){
                $("TeamTable").DataTable({
                  "searching": false,
                  "aaData": [data]

                });
              },
              error: function(data){
                alert(data);
              }
            });*/
            $("#InactiveTeamTable tbody").on("click","td",function(){
              var data = InactiveTeamTable.row($(this).parents('tr')).data();

              if($(this).index() == 3){
                var resurrectBtn = data[0]+data[1];

                  $("#resurrectyes").on("click",function(){
                    $.ajax({
                      url: "../AdminServer/resurrectTeamServer.php",
                      method: "POST",
                      data: {TeamID: data[0]},
                      success: function(data){
                        //alert(data);
                        window.location.replace("AdminTeamPage.php");
                        //$("#resurrectno").trigger("click");
                      },
                      error: function(data){
                        alert(data);
                      }
                    });
                  });

              }
            });
            $("#TeamTable tbody").on("click",'td',function(){
                var data = TeamTable.row($(this).parents('tr')).data();
                if($(this).index() == 3){
                    //return;
                    var deleteBtn = data[0]+data[1];
                    var editBtn = data[1]+data[0];

                      $("#deleteyes").on("click",function(){
                        $.ajax({
                          url: "../AdminServer/deleteTeamServer.php",
                          method: "POST",
                          data: {TeamID: data[0]},
                          success: function(data){
                            //alert(data);
                            //$("#deleteno").trigger("click");
                            window.location.replace("AdminTeamPage.php");
                          },
                          error: function(data){
                            alert(data);
                          }
                        });
                      });

                      $("#editBtn").on("click",function(){

                        $("#EditTeamName").val(data[1]);
                        $("#EditTeamDesc").val(data[2]);
                      });
                }else{
                    var data = TeamTable.row($(this).parents('tr')).data();
                    //$("#teamNameText").html("<h4>"+data[1]+"</h4>");
                    //$("#AddScheduleModalButton").trigger("click");

                    $.ajax({
                        url: "../AdminServer/TransferDataToTeamProfile.php",
                        data: {TeamID: data[0],
                                TeamName: data[1],
                                TeamDesc: data[2]
                        },
                        method: "POST",
                        success: function(data){
                            if(data == "cookie success"){
                                window.location.replace("AdminTeamProfilePage.php");
                            }else{
                                console.log("what the shit");
                            }
                        },
                        error: function(data){
                            console.log(data);
                        }
                    });

                    /*$("#submitEmployeeSchedule").on("click",function(){

                        var JSONData = getSchedJSONformat();

                         $.ajax({
                            url: "../AdminServer/insertScheduleBackground.php",
                            method: "POST",

                            data: {schedule: JSONData,TeamID: data[0]},
                            success: function(response){
                                alert(response);
                                $("#addSchedulecloseButton").trigger("click");
                            },
                            error: function(response){
                                alert(response);
                            }
                        });
                    });*/
                }
            });
            /*function getSchedJSONformat(){

              var SundayArray = new Array($("#timepickerSundayTimeIn").val(),
                    $("#timepickerSundayTimeOut").val());
              var MondayArray = new Array($("#timepickerMondayTimeIn").val(),
                    $("#timepickerMondayTimeOut").val());
              var TuesdayArray = new Array($("#timepickerTuesdayTimeIn").val(),
                    $("#timepickerTuesdayTimeOut").val());
              var WednesdayArray = new Array($("#timepickerWednesdayTimeIn").val(),
                    $("#timepickerWednesdayTimeOut").val());
              var ThursdayArray = new Array($("#timepickerThursdayTimeIn").val(),
                    $("#timepickerThursdayTimeOut").val());
              var FridayArray = new Array($("#timepickerFridayTimeIn").val(),
                    $("#timepickerFridayTimeOut").val());
              var SaturdayArray = new Array($("#timepickerSaturdayTimeIn").val(),
                    $("#timepickerSaturdayTimeOut").val())
            //  var ModayArray = new
              //alert(SundayArray[0]+' '+SundayArray[1]);

              var JSONstring = `[{"day":0, "period": ["`+ SundayArray[0] +`" ,"`+ SundayArray[1] +`"]},
              {"day":1, "period": ["`+ MondayArray[0] +`","`+ MondayArray[1] +`"]},
              {"day":2, "period": ["`+ TuesdayArray[0] +`","`+ TuesdayArray[1] +`"]},
              {"day":3, "period": ["`+ WednesdayArray[0] +`","`+ WednesdayArray[1] +`"]},
              {"day":4, "period": ["`+ ThursdayArray[0] +`","`+ ThursdayArray[1] +`"]},
              {"day":5, "period": ["`+ FridayArray[0] +`","`+ FridayArray[1] +`"]},
              {"day":6, "period": ["`+ SaturdayArray[0] +`","`+ SaturdayArray[1] +`"]}]`;//add the other days into the string same format


              return JSONstring;
            }*/



            $("#addNewTeamTrigger").on("click", function(){
                $("#AddTeamModalButton").trigger("click");

            });

            $("#submitNewTeam").on("click", function(){
                $.ajax({
                    method: 'POST',
                    data: {txt_teamName : $("#TeamName").val(),
                           txt_teamDesc : $("#TeamDesc").val()
                    },
                    url: '../AdminServer/addTeamBackground.php',
                    success: function(data){
                        alert(data);
                        TeamTable.ajax.reload();
                    },
                    error: function(data){
                        alert(data);
                    }
                })
                $("#addTeamcloseButton").trigger("click");
            });


            //initialization of datepickers
            $("#startDate").datepicker({dateFormat: 'yy-mm-dd'});
            $("#endDate").datepicker({dateFormat: 'yy-mm-dd'});

            $("#submitDateInterval").on("click",function(){
                var startDate = $("#startDate").val();
                var endDate = $("#endDate").val();


                MonthAjax(startDate,endDate);
            });

            //ajax on history log
            function MonthAjax(startDate, endDate){

                $.ajax({
                    url: "exactMonthTableLoader.php",
                    method: "POST",

                    data: {startDate : startDate,
                            endDate : endDate},
                    success: function(data){
                      //  alert(data);
                        var response = $.parseJSON(data);
                        populateUserTable(response);

                        $("#UserMonthTable").DataTable();
                      //  getTotalHours(response);
                        //$("#totalHours").val(getTotalHours(response));
                    },
                    error: function(data){
                        alert(data);
                    }
                });
            }
        });

        //populates after start date and end date php pass
        function populateUserTable(response){
            var totalHours = 0;
            $.each(response, function(i, item){
                var $tr = $('<tr>').append(
                    $('<td>').text(item.timeIn),
                    $('<td>').text(item.timeOut),
                    $('<td>').html("<p class='totalHour'>"+item.numberOfHours+"</p>")
                );

                $('#UserMonthTable tbody').append($tr);
            });
            var t1 = "00:00";
            var mins = 0;
            var hours = 0;
            var numrow = 0;
            $(".totalHour").each(function(){

                numrow++;
                t1 = t1.split(':');
                var t2 = $(this).text().split(':');
                mins = parseInt(t1[1]) + parseInt(t2[1]);
                alert(t1[1]);
                var minhrs = Math.floor(parseInt(mins/60));
                hours = Number(t1[0]) + Number(t2[0]) + minhrs;
                mins = mins % 60;
                t1 = padTime(hours) + ':' + padTime(mins);
                console.log(t1);

            });
            alert(t1);
            $("#totalHours").val(t1);
        }
        function padTime(time){
            return (time < 10)? '0' + time : time;
        }
    </script>

</body>

</html>
