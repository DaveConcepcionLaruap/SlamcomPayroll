<?php

    if($_POST){
      $userID = $POST["userID"];
      $teamID = $POST["teamID"];

      $selectedDay = Date("l");

      ($teamID != 0)? $tableID = 'TeamID': $tableID = 'UserID';

      switch($selectedDay){
        case "Sunday":  $timeInDay = 'sundayTimeIn';
                        $timeOutDay = 'sundayTimeOut';
                        break;
        case "Monday":  $timeInDay = 'mondayTimeIn';
                        $timeOutDay = 'mondayTimeOut';
                        break;
        case "Tuesday": $timeInDay = 'tuesdayTimeIn';
                        $timeOutDay = 'tuesdayTimeOut';
                        break;
        case "Wednesday": $timeInDay = 'wednesdayTimeIn';
                          $timeOutDay = 'wednesdayTimeOut';
                          break;
        case "Thursday": $timeInDay = 'thursdayTimeIn';
                          $timeOutDay = 'thursdayTimeOut';
                          break;
        case "Friday": $timeInDay = 'fridayTimeIn';
                        $timeOutDay = 'fridayTimeOut';
                        break;
        case "Saturday": $timeInDay = 'saturdayTimeIn';
                          $timeOutDay = 'saturdayTimeOut';
                          break;
                        
      }
    }else{
      echo "post error";
    }
 ?>
