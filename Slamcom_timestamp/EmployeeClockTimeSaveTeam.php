<?php

    function addTimes(Array $times)
    {
      $total = 0;
      foreach($times as $time){
          list($hours, $minutes, $seconds) = explode(':', $time);
          $hour = (int)$hours + ((int)$minutes/60) + ((int)$seconds/3600);
          $total += $hour;
      }
      $total = $total - (int)$NPHours;// if np hours 
      $h = floor($total);
      $total -= $h;
      $m = floor($total * 60);
      $total -= $m/60;
      $s = floor($total * 3600);

      $s = ($s < 10)? '0'.$s: $s;
      $h = ($h < 10)? '0'.$h: $h;
      $m = ($m < 10)? '0'.$m: $m;

      return "$h:$m:$s";
    }

    ini_set('session.gc_maxlifetime', 36000);
    session_set_cookie_params(36000);
    session_start();


    date_default_timezone_set("Asia/Manila");
    if($_POST){
      include("Admin/AdminServer/DBconnect.php");

      $userID = mysqli_real_escape_string($conn, $_POST['userID']);
      $timeIn = mysqli_real_escape_string($conn, $_POST['timeIn']);
      $timeOut = mysqli_real_escape_string($conn, $_POST['timeOut']);
      $teamID = mysqli_real_escape_string($conn, $_POST['teamID']);

      $specialDay = mysqli_real_escape_string($conn, $_POST['specialDay']);
      $NPHours = mysqli_real_escape_string($conn, $_POST['NPHours']);
    //  echo "'$timeIn'";
      //echo "'$timeOut'";
      $start = new DateTime($timeIn);
      $end = new DateTime($timeOut);

      echo $start->format("h:i:s");
      $interval = $end->diff($start);

      $time = sprintf(
        '%d:%02d:%02d',
        ($interval->d * 24) + $interval->h,
        $interval->i,
        $interval->s
      );

      $sql = "INSERT INTO `timetable`(`timeIn`, `timeOut`,`HoursMade` ,`userID`)
              VALUES ('$timeIn','$timeOut','$time','$userID')";



      if(mysqli_query($conn,$sql)){
          if($teamID != 0){
            $teamOruser = 'teamschedule';
            $tableID = 'TeamID';
            $ID = $teamID;
        }else{
          $teamOruser = 'userschedule';
          $tableID = 'UserID';
          $ID = $userID;

        }
        $selectedDay = Date("l");

        if($selectedDay == "Monday"){
          include("DayOfTheScheduling/MondaySchedule.php");
        }else if($selectedDay == "Tuesday"){
          include("DayOfTheScheduling/TuesdaySchedule.php");
        }else if($selectedDay == "Wednesday"){
          include("DayOfTheScheduling/WednesdaySchedule.php");
        }else if($selectedDay == "Thursday"){
          include("DayOfTheScheduling/ThursdaySchedule.php");
        }else if($selectedDay == "Friday"){
          include("DayOfTheScheduling/FridaySchedule.php");
        }else if($selectedDay == "Saturday"){
          include("DayOfTheScheduling/SaturdaySchedule.php");
        }else{
          include("DayOfTheScheduling/SundaySchedule.php");
        }


      }else{

      // header("Location: LoginOrSignup.php");
          echo "failed";
      }
    }
?>
