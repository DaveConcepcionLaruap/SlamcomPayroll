
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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

    <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet">

    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../../WeeklySchedulerv2/dist/jquery.schedule.css">


    <link rel="stylesheet" href="../../munchkinBootStrap/CSS/userCSS.css">
    <link href="../../TimePickerPlugin/mdtimepicker.css" rel="stylesheet">
    <!--this link won't work and I don't know why -->


    <style>
        #wrapper{
          height: 100%;
        }
        .mainContent{
          height: 100%;
        }
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
    </style>

</head>

<body>

    <div id="wrapper">


        <?php include("sideBar.php"); ?>

        <div class="mainContent" ng-app = "tableApplication">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             <?php

                                                $firstname = $_SESSION['firstname'];
                                                $lastname = $_SESSION['lastname'];
                                                echo "$firstname";
                                            ?>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
            </div>


                <div id="tabContainer" ng-controller = "tabController as ctrl" ng-cloak style="position: relative;">

                    <md-content layout = "column" layout-fill>
                        <md-tabs layout-fill  md-selected = "data.selectedIndex"
                            md-align-tabs = "{{data.bottom ? 'bottom' : 'top'}}">
                            <md-tab id = "tab1">
                                <md-tab-label>{{data.firstLabel}}</md-tab-label>
                                <md-tab-body>

                                    <table id="UserscheduleTable" class="table table-hover table-striped" cellspacing="0" width="100%" height="100%">
                                      <thead>
                                          <tr>
                                              <th>Monday Time In</th>
                                              <th>Monday Time Out</th>
                                              <th>Tuesday Time In</th>
                                              <th>Tuesday Time Out</th>
                                              <th>Wednesday Time In</th>
                                              <th>Wednesday Time Out</th>
                                              <th>Thursday Time In</th>
                                              <th>Thursday Time Out</th>
                                              <th>Friday Time In</th>
                                              <th>Friday Time Out</th>
                                              <th>Saturday Time In</th>
                                              <th>Saturday Time Out</th>
                                              <th>Sunday Time In</th>
                                              <th>Sunday Time Out</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                          include("../AdminServer/DBconnect.php");
                                          $teamID = $_SESSION["TeamID"];

                                          if($teamID == 0){
                                            $userID =  $_SESSION["employeeID"];

                                            $sql = "SELECT * FROM `userschedule` WHERE `UserID` = '$userID'";

                                            $result = mysqli_query($conn, $sql);

                                            if($result){
                                              if(mysqli_num_rows($result)){
                                                $row = mysqli_fetch_array($result);

                                                echo '<tr>
                                                        <td>'.$row['mondayTimeIn'].'</td>
                                                        <td>'.$row['mondayTimeOut'].'</td>
                                                        <td>'.$row['tuesdayTimeIn'].'</td>
                                                        <td>'.$row['tuesdayTimeOut'].'</td>
                                                        <td>'.$row['wednesdayTimeIn'].'</td>
                                                        <td>'.$row['wednesdayTimeOut'].'</td>
                                                        <td>'.$row['thursdayTimeIn'].'</td>
                                                        <td>'.$row['thursdayTimeOut'].'</td>
                                                        <td>'.$row['fridayTimeIn'].'</td>
                                                        <td>'.$row['fridayTimeOut'].'</td>
                                                        <td>'.$row['saturdayTimeIn'].'</td>
                                                        <td>'.$row['saturdayTimeOut'].'</td>
                                                      <td>'.$row['sundayTimeIn'].'</td>
                                                      <td>'.$row['sundayTimeOut'].'</td>
                                                      </tr>';

                                              }
                                                //should say, user has no team and no schedule, would you like to give a schedule?
                                                echo "<button id='AddSchedule' type='button' class='btn btn-primary' data-toggle='modal' data-target='#AddUserSchedModal'>Add/Edit Schedule</button>";

                                            }else{
                                              echo "user query error";
                                            }
                                          }else{

                                            $sql = "SELECT * FROM `teamschedule` WHERE `TeamID` = '$teamID'";
                                            $result = mysqli_query($conn, $sql);

                                            if($result){
                                              if(mysqli_num_rows($result)){
                                                $row = mysqli_fetch_array($result);
                                                echo '<tr>
                                                        <td>'.$row[2].'</td>
                                                        <td>'.$row[3].'</td>
                                                        <td>'.$row[5].'</td>
                                                        <td>'.$row[6].'</td>
                                                        <td>'.$row[8].'</td>
                                                        <td>'.$row[9].'</td>
                                                        <td>'.$row[11].'</td>
                                                        <td>'.$row[12].'</td>
                                                        <td>'.$row[14].'</td>
                                                        <td>'.$row[15].'</td>
                                                        <td>'.$row[17].'</td>
                                                        <td>'.$row[18].'</td>
                                                        <td>'.$row[20].'</td>
                                                        <td>'.$row[21].'</td>
                                                        </tr>';
                                              }else{
                                                echo "team does not have schedule";
                                              }
                                            }else{
                                              echo "team query error";
                                            }
                                        }
                                        ?>


                                      </tbody>
                                    </table>
                                </md-tab-body>
                            </md-tab>
                            <md-tab id = "tab2">
                                <md-tab-label>{{data.secondLabel}}</md-tab-label>
                                <md-tab-body>
                                    <div id="MonthContainer">
                                        <div class="Row">
                                            <!--<div id="startDATE" class="Column datepickerdemo" ng-controller = "StartdateController as ctrl"
                                            layout = "column" ng-cloak >
                                                <md-content>
                                                    <h4>start date</h4>
                                                    <md-datepicker id= "STARTDate"
                                                    ng-model="ctrl.startDate"
                                                    ng-placeholder="start date"
                                                    required
                                                    md-open-on-focus></md-datepicker>
                                                </md-content>
                                            </div>-->
                                            <div class = "Column">
                                                <input type="text" id="startDate" placeholder="start date">
                                            </div>
                                           <!-- <div id="endDATE" class=" Column datepickerdemo" ng-controller = "EnddateController as ctrl"
                                            layout = "column" ng-cloak >
                                                <md-content>
                                                    <h4>end date  </h4>
                                                    <md-datepicker id = "ENDDate"
                                                    ng-model="ctrl.endDate"
                                                    ng-placeholder="end date"
                                                    required
                                                    ng-change="onclick()"
                                                    md-open-on-focus></md-datepicker>
                                                </md-content>

                                            </div>-->
                                            <div class = "Column">
                                                <input type="text" id="endDate" placeholder="end date">
                                            </div>
                                            <div class = "Column buttonSize">
                                                    <md-button id="submitDateInterval" flex="15" class="md-raised md-primary">submit</md-button>
                                            </div>
                                        </div>
                                        <table id="UserMonthTable" class="table table-hover table-striped" cellspacing="0" width="100%" height="100%">
                                            <thead>
                                                <tr>

                                                    <th>Time In</th>
                                                    <th>Time Out</th>
                                                    <th>Number of hours</th>

                                                </tr>
                                            </thead>
                                            <tbody id="UserMonthTableBody">
                                            <?php // add table shit here?>
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                        <div class="form-group">
                                            <span>Total Hours : </span> <input class="form-control" id="totalHours"  name="txt_totalHours" readonly="readonly">
                                        </div>
                                    </div>
                                </md-tab-body>
                            </md-tab>
                        </md-tabs>
                    </md-content>

                </div>



            <!-- /.container-fluid -->
            <div class="modal fade" id="AddUserSchedModal" role="dialog" >
                <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <!--<input id="teamNameText" class="form-control" readonly></input>-->

                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div ng-controller="inputController" layout="column" ng-cloak class="md-inline-form">


                                <div class = "Column buttonSize">
                                    <md-button id="submitEmployeeSchedule" flex="15" class="md-raised md-primary">submit</md-button>
                                </div>

                                <md-content layout-gt-sm="column" layout-padding>

                                    <div class="form-group" id="sundayGroup" >

                                        <label>Sunday Time In</label>
                                        <input ng-model="sunday.timeIn"  type="text" id="timepickerSundayTimeIn">

                                        <br>
                                        <label>Sunday Time Out</label>
                                        <input ng-model="sunday.timeOut"  type="text" id="timepickerSundayTimeOut">

                                    </div>

                                    <div class="form-group" id="mondayGroup" >

                                        <label>Monday Time In</label>
                                        <input ng-model="monday.timeIn"  type="text" id="timepickerMondayTimeIn">

                                        <br>
                                        <label>Monday Time Out</label>
                                        <input ng-model="monday.timeOut"  type="text" id="timepickerMondayTimeOut">

                                    </div>

                                    <div class="form-group" id="tuesdayGroup" >

                                        <label>Tuesday Time In</label>
                                        <input ng-model="tuesday.timeIn"  type="text" id="timepickerTuesdayTimeIn">

                                        <br>
                                        <label>Tuesday Time Out</label>
                                        <input ng-model="tuesday.timeOut"  type="text" id="timepickerTuesdayTimeOut">

                                    </div>

                                    <div class="form-group" id="wednesdayGroup" >


                                        <label>Wednesday Time In</label>
                                        <input ng-model="wednesday.timeIn"  type="text" id="timepickerWednesdayTimeIn">

                                        <br>
                                        <label>Wednesday Time Out</label>
                                        <input ng-model="wednesday.timeOut"  type="text" id="timepickerWednesdayTimeOut">

                                    </div>

                                    <div class="form-group" id="thursdayGroup">

                                        <label>Thursday Time In</label>
                                        <input ng-model="thursday.timeIn"  type="text" id="timepickerThursdayTimeIn">

                                        <br>
                                        <label>Thursday Time Out</label>
                                        <input ng-model="thursday.timeOut"  type="text" id="timepickerThursdayTimeOut">

                                    </div>

                                    <div class="form-group" id="fridayGroup" >

                                        <label>Friday Time In</label>
                                        <input ng-model="friday.timeIn"  type="text" id="timepickerFridayTimeIn">

                                        <br>
                                        <label>Friday Time Out</label>
                                        <input ng-model="friday.timeOut"  type="text" id="timepickerFridayTimeOut">

                                    </div>

                                    <div class="form-group" id="saturdayGroup">

                                        <label>Saturday Time In</label>
                                        <input ng-model="saturday.timeIn"  type="text" id="timepickerSaturdayTimeIn">

                                        <br>
                                        <label>Saturday Time Out</label>
                                        <input ng-model="saturday.timeOut"  type="text" id="timepickerSaturdayTimeOut">

                                    </div>
                                </md-content>
                            </div>


                            <div class="modal-footer">

                                <div class="form-group">

                                </div>
                                <button id="addTeamcloseButton" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                </div>
            </div>




        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


      <!-- jQuery -->
    <!--  <script src="HomePageBootStrap/vendor/jquery/jquery.min.js"></script> -->
     <!-- <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="../../WeeklySchedulerv2/dist/jquery.schedule.js"></script>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>



    <script>

         var app = angular.module("tableApplication", ['ngMaterial', 'ngMessages']);
       var STARTDate;
       var ENDDate;
        app.controller('tabController', function($scope){
            $scope.data = {
            selectedIndex: 0,
            bottom: false,
            firstLabel: "Edit Employee schedule",
            secondLabel: "Employee log",


            };
            $scope.next = function(){
                $scope.data.selectedIndex = Math.min($scope.data.selectedIndex + 1, 2);

            }
            $scope.previous = function(){
                $scope.data.selectedIndex = Math.max($scope.data.selectedIndex - 1, 0);
            }


        });
        app.controller('inputController', function($scope){

        });
        app.controller('StartdateController', function($scope){


         //  STARTDate = moment(this.startDate).format('YYYY-MM-DD');

        });

        app.controller('EnddateController', function($scope){


          //  ENDDate = moment(this.endDate).format('YYYY-MM-DD');
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

            var hoursTable = $("#UserHoursTable").DataTable();
            var schedule;

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



            var userTable = $("#UserscheduleTable").DataTable();
            $("#schedule-demo").jqs({
                mode: "read",
                hour: 12
              //  data:
                //ok get the variables from the JSON data you finally got
                      //and put it in the template, make a template for the data getter
            });

            $("#AddSchedule").on("click", function(){
              var data = userTable.row(0).data();

              if(data[0] != "" && data[1] != ""){
                $("#timepickerMondayTimeIn").val(data[0]);
                $("#timepickerMondayTimeOut").val(data[1]);
              }
              if(data[2] != "" && data[3] != ""){
                $("#timepickerTuesdayTimeIn").val(data[2]);
                $("#timepickerTuesdayTimeOut").val(data[3]);
              }
              if(data[4] != "" && data[5] != ""){
                $("#timepickerWednesdayTimeIn").val(data[4]);
                $("#timepickerWednesdayTimeOut").val(data[5]);
              }
              if(data[6] != "" && data[7]){
                $("#timepickerThursdayTimeIn").val(data[6]);
                $("#timepickerThursdayTimeOut").val(data[7]);
              }
              if(data[8] != "" && data[9] != ""){
                $("#timepickerFridayTimeIn").val(data[8]);
                $("#timepickerFridayTimeOut").val(data[9]);
              }
              if(data[10] != "" && data[11] != ""){
                $("#timepickerSaturdayTimeIn").val(data[10]);
                $("#timepickerSaturdayTimeOut").val(data[11]);
              }
              if(data[12] != "" && data[13] != ""){
                $("#timepickerSundayTimeIn").val(data[12]);
                $("#timepickerSundayTimeOut").val(data[13]);
              }
            });
            $("#submitEmployeeSchedule").on("click",function(){
                alert($("#schedule-demo").jqs("export"));
                var JSONData = getSchedJSONformat();

                 $.ajax({
                    url: "../AdminServer/insertUserScheduleBackground.php",
                    method: "POST",

                    data: {schedule: JSONData, userID: <?php echo $_SESSION["employeeID"]?>},
                    success: function(data){
                        if(data == "user schedule successful"){
                            window.location.replace("AdminUserPage.php");

                        }else{
                            console.log(data);
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            })

            function getSchedJSONformat(){

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
            }
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
                    url: "../AdminServer/exactMonthTableLoader.php",
                    method: "POST",

                    data: {startDate : startDate,
                            endDate : endDate},
                    success: function(data){
                        alert(data);
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
                //alert(t1[1]);
                var minhrs = Math.floor(parseInt(mins/60));
                hours = Number(t1[0]) + Number(t2[0]) + minhrs;
                mins = mins % 60;
                t1 = padTime(hours) + ':' + padTime(mins);
                console.log(t1);

            });
          //  alert(t1);
            $("#totalHours").val(t1);
        }
        function padTime(time){
            return (time < 10)? '0' + time : time;
        }
    </script>




</body>

</html>
