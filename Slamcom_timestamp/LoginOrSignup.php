<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Start Bootstrap Theme</title>


    <!-- Bootstrap Core CSS -->
    <link href="HomePageBootStrap/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link rel = "stylesheet" href= "https://fonts.googleapis.com/icon?family=Material+Icons" >
    <link rel = "stylesheet" href= "https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css" >
    <!-- Custom Fonts -->
    <link href="HomePageBootStrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="HomePageBootStrap/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="HomePageBootStrap/css/creative.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="HomePageBootStrap/css/manipulate.css" rel="stylesheet">

    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet">

      <style>
        #tabContainer{
          height: 100%;
          padding-left: 50px;
          padding-right: 50px;
        }
        .tabContent{
            margin-top: 20px;
        }
      </style>
</head>

<body id="page-top" ng-app="Application">



    <div id="tabContainer" ng-controller = "tabController as ctrl" ng-cloak >

        <md-content layout = "column" layout-fill>
            <md-tabs layout-fill  md-selected = "data.selectedIndex"
                md-align-tabs = "{{data.bottom ? 'bottom' : 'top'}}">
                <md-tab id = "tab1">
                    <md-tab-label>{{data.firstLabel}}</md-tab-label>
                    <md-tab-body>
                        <div class="tabContent">
                            Day of the week
                          <select id="DayofTheWeekSelector" style="margin-bottom: 10px">
                            <option value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                          </select>
                          <button id="ActivateSpecialDay" style="margin-left: 20px;">special day</button>
                          <h3 id="activationLabel" style="color: red;">Special day not activated</h3>
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
                                          <th>Login</th>
                                          <th>Time In</th>
                                          <th>Logout</th>
                                          <th>Time Out</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <!-- turn this into a form so we can serialize and pass to ajax POST  -->
                                      <?php
                                          include("Admin/AdminServer/DBconnect.php");
                                          $query = 'SELECT `userID`, `firstname`, `lastname`, `emailadd`, `TeamID` FROM `user` WHERE `active` = 1';

                                          $result = mysqli_query($conn,$query);

                                          while($row = mysqli_fetch_array($result)){
                                                if($row[4] != 0){
                                                  $sql = 'SELECT `TeamName` FROM `team` WHERE `TeamID` = '.$row[4].'';
                                                  $teamresult = mysqli_query($conn, $sql);
                                                  $teamrow = mysqli_fetch_array($teamresult);
                                                    $LogInbtnID = $row[0].$row[4];
                                                    $LogOutbtnID = $row[0].$teamrow[0];
                                                      echo '<tr id='.$row[0].'>
                                                              <td>'.$row[0].'</td>
                                                              <td>'.$row[1].'</td>
                                                              <td>'.$row[2].'</td>
                                                              <td>'.$row[3].'</td>
                                                              <td>'.$row[4].'</td>
                                                              <td>'.$teamrow[0].'</td>
                                                              <td><button id="'.$LogInbtnID.'" type="button"
                                                              class="btn btn-sm btn-primary" value="LogIn">Login</button></td>
                                                              <td></td>
                                                              <td><button id="'.$LogOutbtnID.'" type="button" class="btn btn-sm btn-primary"
                                                              value="LogOut" disabled>Logout</button></td>
                                                              <td></td>
                                                              </tr>';

                                              }else{
                                                  $LogInbtnID = $row[0].$row[4];
                                                  $LogOutbtnID = $row[0]."none";
                                                  echo '<tr id='.$row[0].'>
                                                          <td>'.$row[0].'</td>
                                                          <td>'.$row[1].'</td>
                                                          <td>'.$row[2].'</td>
                                                          <td>'.$row[3].'</td>
                                                          <td>'.$row[4].'</td>
                                                          <td>'."none".'</td>
                                                          <td><button id="'.$LogInbtnID.'" type="button"
                                                          class="btn btn-sm btn-primary" value="LogIn">Login</button></td>
                                                          <td></td>
                                                          <td><button id="'.$LogOutbtnID.'" type="button" class="btn btn-sm btn-primary"
                                                          value="LogOut" disabled>Logout</button></td>
                                                          <td></td>
                                                          </tr>';
                                              }
                                          }
                                      ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                    </md-tab-body>
                </md-tab>

            </md-tabs>
        </md-content>

    </div>

    <button type="button" id="AdminLoginValidationModalButton" class="btn btn-info btn-lg" data-toggle="modal" data-target="#AdminLoginValidationModal" style="display: none">Open Modal</button>
    <div class="modal fade" id="AdminLoginValidationModal" role="dialog">
        <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div  class="modal-body">
                        <div class="form-group">
                          <div class="form-group">
                              <input class="form-control" id="AdminID" name="txt_AdminID" type="text" readonly="readonly">
                          </div>
                          <div class="form-group">
                              <input class="form-control" id="AdminFirstName" name="txt_Adminfirstname" type="text" readonly="readonly">
                          </div>
                          <div class="form-group">
                              <input class="form-control" id="AdminLastName"  name="txt_Adminlastname" readonly="readonly">
                          </div>
                          <div class="form-group">

                              <input class="form-control" id="AdminPassword" placeholder="password" name="txt_Adminpassword" type="password" autofocus required >
                          </div>

                        </div>
                    </div>
                    <button id="AdminLoginProceedBtn" type="submit" class="btn btn-primary" >Log in</button>
                    <button id="AdminLoginCancelBtn" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

        </div>
    </div>
    <button type="button" id="EmployeeLoginValidationModalButton" class="btn btn-info btn-lg" data-toggle="modal" data-target="#EmployeeLoginValidationModal" style="display: none">Open Modal</button>
    <div class="modal fade" id="EmployeeLoginValidationModal" role="dialog">
        <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div  class="modal-body">
                        <div class="form-group">
                          <div class="form-group">
                              <input class="form-control" id="EmployeeID" name="txt_EmployeeID" type="text" readonly="readonly">
                          </div>

                          <div class="form-group">

                              <input class="form-control" id="EmployeePassword" placeholder="password" name="txt_Employeepassword" type="password" required autofocus>
                          </div>

                        </div>
                    </div>
                    <button id="EmployeeLoginProceedBtn" type="button" class="btn btn-primary" >Log in</button>
                    <button id="EmployeeLoginCancelBtn" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

        </div>
    </div>


    <script src="HomePageBootStrap/vendor/jquery/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="http://www.datejs.com/build/date.js"></script>
            <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
              <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>
              <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
              <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js"></script>
              <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-messages.min.js"></script>
              <script src = "https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
    <!-- FIRE BASE -->




    <script>
        var app = angular.module("Application", ['ngMaterial', 'ngMessages']);
        app.controller('tabController', function($scope){
          $scope.data = {
            selectedIndex: 0,
            bottom: false,
            firstLabel: "Employees",
            secondLabel: "Admins"
          };
          $scope.next = function(){
            $scope.data.selectedIndex = Math.min($scope.data.selectedIndex + 1, 2);
          }
          $scope.previous = function(){
            $scope.data.selectedIndex = Math.max($scope.data.selectedIndex - 1, 0);
          }
        });

        $(document).ready(function(){
            var txtLoginEmail = $('#LoginEmail');
            var txtLoginPassword = $('#LoginPassword');
            var btnLogin = $('#btnLogin');
            var btnLogout = $('#btnLogout');
            var btnLoginNoAccount = $('#LoginNoAccount');
            var ActiveEmployeeTable = $("#ActiveEmployeeTable").DataTable();
            var AdminTable = $("#AdminTable").DataTable();

            /*$(document).on('change','#DayofTheWeekSelector',function(){
              var selectedDay = $("#DayofTheWeekSelector").find(":selected").text();

          });*/
            $("#ActivateSpecialDay").on("click", function(){
              if($("#activationLabel").text() == "Special day not activated"){
                $("#activationLabel").text("Special day activated");
                $("#activationLabel").css("color","green");
              }else{
                $("#activationLabel").text("Special day not activated");
                $("#activationLabel").css("color","red");
              }

            });
            $("#AdminTable").on("click", "td", function(){
              var data = AdminTable.row($(this).parents('tr')).data();

              var LoginBtn = data[0] + data[1];
              var LogoutBtn = data[0] + data[2];

              if($(this).index() == 4){

//AdminPassword
                $("#AdminID").val(data[0]);
                $("#AdminFirstName").val(data[1]);
                $("#AdminLastName").val(data[2]);

                $("#AdminLoginValidationModalButton").trigger("click");
                $("#AdminLoginProceedBtn").on("click", function(){
                  var Adminpass = $("#AdminPassword").val();

                  $.ajax({
                    url: "Admin/AdminServer/AdminLoginBackground.php",
                    method: "POST",
                    data: {AdminID: data[0],AdminPassword: Adminpass},
                    cache: false,
                    success: function(data){

                      if(data == "success"){
                        location.replace("Admin/AdminClient/AdminDashboard.php");
                      }else{
                        console.log(data);
                        alert(data);
                      }
                    },
                    error: function(data){
                      console.log(data);
                    }
                  });
                });


              }else{
                alert("shit");
              }
            });

            $("#ActiveEmployeeTable").on("click", "td", function(){
              var data = ActiveEmployeeTable.row($(this).parents('tr')).data();
              var cell = ActiveEmployeeTable.cell($(this).parents('tr'), 7);
              var LoginBtn = data[0] + data[4];
              var LogoutBtn = data[0] + data[5];

              if($(this).index() == 6){
                $("#EmployeeID").val(data[0]);
                $("#EmployeeFirstName").val(data[1]);
                $("#EmployeeLastName").val(data[2]);

                $("#EmployeeLoginValidationModalButton").trigger("click");


                $("#EmployeeLoginProceedBtn").unbind("click");
                $("#EmployeeLoginProceedBtn").click(function(){
                    var password = $("#EmployeePassword").val();
                    var request;

                    if(request){
                        request.abort();
                    }
                    request = $.ajax({
                      url: "EmployeeLoginBackground.php",
                      method: "POST",
                      data: {employeeID: $("#EmployeeID").val(), employeePassword: password},
                      cache: false,
                      success: function(data){
                        if(data == "user login secured"){
                            $("#"+LoginBtn).prop('disabled',true);
                            $("#"+LogoutBtn).prop('disabled',false);


                            //alert(data);
                            cell.data(getDateTime());
                            $("#EmployeeLoginCancelBtn").trigger("click");
                            $("#EmployeePassword").val("");
                        }else{
                            alert(data);
                            $("#EmployeePassword").val("");
                        }
                        request = null;
                      },
                      error: function(data){
                      //  alert(data);
                        console.log(data);
                        },
                        complete: function(xhr, status){
                            request = null;
                        }
                    })


                });


            }else if($(this).index() == 8){
                //if user team is 0, redirect to a different clocktimesave that saves in userschedule instead of teamsched
                $("#"+LoginBtn).prop('disabled',false);
                $("#"+LogoutBtn).prop('disabled',true);

                var TimeOutcell = ActiveEmployeeTable.cell($(this).parents('tr'), 9);
                TimeOutcell.data(getDateTime());
                var selectedDay = $("#DayofTheWeekSelector").find(":selected").text();

                    $.ajax({
                      url: "EmployeeClockTimeSaveTeam.php",
                      method: "POST",
                      data: {"userID" : data[0],
                      "timeIn" : data[7],
                      "timeOut" : data[9],
                      "teamID" : data[4],
                      "selectedDay": selectedDay},
                      cache: false,
                      success: function(data){
                        alert(data);

                      },
                      error: function(data){
                        alert(data);
                      }
                    });

              }else{
                console.log("shit");
              }

            });


            function getDateTime(){
              var datetime = new Date();

              var month = datetime.getMonth() + 1;
              var day = datetime.getDate();


              var paddedMonth = (('' + month).length < 2 ? '0' :'') + month;
              var paddedDay = (('' + day).length < 2 ? '0' :'') + day;


              var date = datetime.getFullYear() + "/" +
                          paddedMonth + "/" + paddedDay;

              var time = formatAMPM(datetime);//new Date().toString("hh:mm tt");
              var dateTime = date + " " + time;

              return dateTime;

            }

            function formatAMPM(datetime){
              var hour = datetime.getHours();
              var minute = datetime.getMinutes();
              var ampm = (hour >= 12) ? 'pm' : 'am';

              hour = hour % 12;
              hour = hour ? hour : 12;
              minute = minute < 10 ? '0'+ minute : minute;
              var strTime = hour + ':' + minute  + ' ' + ampm;

              return strTime;
            }
            <?php
                if(isset($_GET['err'])){
                    echo '$("#divLoginError").css("display","block")
                            setTimeout(function() {
                                $("#divLoginError").fadeOut("slow");
                            }, 10000); ';
                }
                if(isset($_GET['EmailalreadyExist'])){
                    echo '$("#divEmailalreadyexist").css("display","block")
                            setTimeout(function() {
                                $("#divEmailalreadyexist").fadeOut("slow");
                            }, 10000); ';
                }
            ?>

            //toggle between login and signup
            $("#LoginNoAccount").click(function(){
                $("div#DivLogin").toggle("fast",function(){
                        $("div#DivSignUp").toggle("fast");
                });
                $("#MainHeaderLogin").fadeOut("fast",function(){
                    $('#LoginEmail').val("");
                    $('#LoginPassword').val("");
                    $("#MainHeaderSignUp").fadeIn("fast");
                });
            });
            $("#signUpHasAcc").click(function(){
                $("div#DivLogin").toggle("fast",function(){
                    $("div#DivSignUp").toggle("fast");
                });
                $("#MainHeaderSignUp").fadeOut("fast",function(){
                    $("#signUpEmail").val("");
                    $("#signUpPassword").val("");
                    $("#signUpConfPassword").val("");
                    $("#MainHeaderLogin").fadeIn("fast");
                });
            });

            //validate email
            function validateEmail($email){
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;

                return ($email.length > 0 && emailReg.test($email));
            }
            $("#signUpEmail").on("input",function(){
                if(!validateEmail($("#signUpEmail").val())){
                    $("#signUpEmail").css('border-color', 'red');
                    $("#signUpEmail").css('border-width', '2px');
                }else{
                    $("#signUpEmail").css('border-color', 'green');
                }
            });

            //validate length of password

            function validatePassword($password){
                var passwordReg = /^(?=.*\d)(?=.*[a-zA-Z]).{6,20}$/;

                return ($password.length > 0 && passwordReg.test($password));
            }
            $("#signUpPassword").on("input",function(){
                if(!validatePassword($("#signUpPassword").val())){

                    $("#signUpPassword").css('border-color', 'red');
                    $("#signUpPassword").css('border-width', '2px');
                }else{
                    $("#signUpPassword").css('border-color', 'green');
                }
            });

            //password confirmation
            $("#signUpConfPassword").on("input",function(){
                if($("#signUpConfPassword").val() == $("#signUpPassword").val()){
                    $("#signUpConfPassword").css('border-color','green');
                    $("#signUpConfPassword").css('border-width', '2px');
                }else{
                    $("#signUpConfPassword").css('border-color','red');
                    $("#signUpConfPassword").css('border-width', '2px');
                }
            });

            //click event for sign up



            $('#login_Form').submit(function(){

                if(txtLoginEmail.val() && txtLoginPassword.val()){
                    $.ajax(
                        $(this).attr('action'),
                        {
                            data: $(this).serialize(),
                            method: $(this).attr('POST'),
                            success: function(){
                                console.log("user logged in");
                            },
                            error: function(){
                                alert("something went wrong");
                            }
                        }
                    );
                }else{
                    $("div#divLoginError").fadeOut("fast",function(){
                        $("div#divFillFields").fadeIn("fast");
                    });
                    if(txtLoginEmail.val() == ''){
                        $("#LoginEmail").css('border-color','red');
                    }
                    if(txtLoginPassword.val() == ''){
                        $("#LoginPassword").css('border-color','red');
                    }
                }
            });

            $("#signUp_Form").submit(function(){
                var self = this;

                var txtSignUpEmail = $("#signUpEmail").val();
                var txtSignUpPassword = $("#signUpPassword").val();
                var txtSignUpConfPassword = $("#signUpConfPassword").val();

                var txtSignUpFirstName = $("#signUpFirstName").val();
                var txtSignUpLastName = $("#signUpLastName").val();

                if(txtSignUpEmail.val() && txtSignUpPassword.val() && txtSignUpConfPassword.val()){
                    if(txtSignUpPassword.val().length < 6){
                        $("div#divPasswordLength").fadeIn("fast",function(){
                            $("div#divFillFieldsSignUp").fadeOut("fast");
                            $("div#divErrorConfPassword").fadeOut("fast");
                        });
                    }else{
                        if(txtSignUpPassword.val() != txtSignUpConfPassword.val()){
                            $("div#divErrorConfPassword").fadeIn("fast",function(){
                                $("div#divFillFieldsSignUp").fadeOut("fast");
                                $("div#divPasswordLength").fadeOut("fast");
                            });
                        }else{
                            //create new user
                            var dataString = 'txt_firstname=' + txtSignUpFirstName
                                                +'&txt_lastname=' + txtSignUpLastName
                                                +'&txt_signUpEmail=' + txtSignUpEmail
                                                +'&txt_signUpPassword=' + txtSignUpPassword;

                            $.ajax(
                                $(this).attr('action'),
                                {
                                    data: $(self).serialize(),
                                    method: $(self).attr('method'),
                                    success: function(){
                                        console.log("user logged in");
                                    },
                                    error: function(){
                                        //alert("something went wrong");
                                    }
                                }
                            );
                        }
                    }
                }else{
                    $("div#divFillFieldsSignUp").fadeIn("fast",function(){
                        $("div#divErrorConfPassword").fadeOut("fast");
                        $("div#divPasswordLength").fadeOut("fast");
                    });
                }
            });


        });
    </script>


    <!-- jQuery -->


    <!-- Bootstrap Core JavaScript -->
    <script src="HomePageBootStrap/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="HomePageBootStrap/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="HomePageBootStrap/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="HomePageBootStrap/js/creative.min.js"></script>

</body>

</html>
