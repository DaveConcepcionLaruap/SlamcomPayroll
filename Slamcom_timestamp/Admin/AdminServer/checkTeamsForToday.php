<?php
  include("DBconnect.php");

  if($_POST){
    $selectedDay = mysqli_real_escape_string($conn,$_POST["dayOfTheWeek"]);

    $teamSql = "SELECT * FROM `team` WHERE 1";

    $teamresult = mysqli_query($conn,$teamSql);

    switch($selectedDay){
      case "Monday":
                    $shift = 1;
                    break;
      case "Tuesday":
                    $shift = 4;
                    break;
      case "Wendnesday":
                    $shift = 7;
                    break;
      case "Thursday":
                    $shift = 10;
                    break;
      case "Friday":
                    $shift = 13;
                    break;
      case "Saturday":
                    $shift = 16;
                    break;
      case "Sunday":
                    $shift = 19;
                    break;
    }

    if(mysqli_num_rows($teamresult) > 0){
      $teamActiveToday = array();
      while($teamrow = mysqli_fetch_array($teamresult)){
        $teamID = $teamrow["TeamID"];

        $teamsched = "SELECT * FROM `teamschedule` WHERE `TeamID` = '$teamID'";
        $schedresult = mysqli($conn,$teammsched);

        $schedRow = mysqli_fetch_array($schedresult);

        if($schedRow[$shift] == 1){
          array_push($teamActiveToday, $teamID);
        }
      }
    }
    $limit = count($teamActiveToday);
    for($x = 0;$x < $limit;$x++){
      $teamID = $teamActiveToday[$x];
      $employeeSql = "SELECT * FROM `user` WHERE `TeamID` = '$teamID'";


    }
  }
?>
