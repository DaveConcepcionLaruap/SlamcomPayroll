<?php

    if($_POST){
      include("Admin/AdminServer/DBconnect.php");
      $userID = $_POST["UserID"];
      $teamID = $_POST["TeamID"];

      $selectedDay = Date("l");


      if($teamID != 0){
        $tableID = 'TeamID';
        $tableName = 'teamschedule';
        $ID = $teamID;
      }else{
        $tableID = 'UserID';
        $tableName = 'userschedule';
        $ID = $userID;
      }

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

      $sql = "SELECT  `". $timeInDay ."`, `". $timeOutDay ."` FROM `". $tableName ."`
       WHERE `". $tableID ."` = '$ID'";

       $result = mysqli_query($conn, $sql);

       if(mysqli_num_rows($result) > 0){
         $row = mysqli_fetch_array($result);
         if($row[0] != ""){


           $difference = subtractTimes($row[0],$row[1]);

           $restSql = "SELECT * FROM `totalrestday` WHERE `userID` =  '$userID'";
           $restResult = mysqli_query($conn, $restSql);

           if(mysqli_num_rows($restResult) > 0){
             //update
             $row = mysqli_fetch_array($restResult);

             $tableHour = new DateTime($row["TotalHours"]);
             $newHour = new DateTime($difference);

             $newTotalHour  = addTimes(array($tableHour, $newHour));

             $newDaysRested = $row["DaysRested"]++;

             $updatedRest = "UPDATE `totalrestday` SET `TotalHours`='$newTotalHour',
             `DaysRested`='$newDaysRested' WHERE `userID` = '$userID'";


             if(mysqli_query($conn,$updatedRest)){
               echo "rest day update success";
             }else{
               echo "rest day update failed";
             }
           }else{
             //insert
             $insertRest = "INSERT INTO `totalrestday`(`TotalHours`,
               `DaysRested`, `userID`) VALUES ('$difference',1,'$userID')";

              if(mysqli_query($conn, $insertRest)){
                echo "rest day insert success";
              }else{
                echo "rest day insert failed";
                echo $difference . " " . $userID;
              }
           }
         }else{
           echo "user does not work today, no need in giving him a rest day";
         }
       }else{
         echo "something went wrong";
       }
    }else{
      echo "post error";
    }


    function subtractTimes($timeIn, $timeOut)
    {
      $In = new DateTime($timeIn);
      $Out = new DateTime($timeOut);

      $interval = $In->diff($Out);

      return $interval->format("%H:%I:%S");
    }

    function addTimes(Array $times)
    {
      $total = 0;
      foreach($times as $time){
          list($hours, $minutes, $seconds) = explode(':', $time);
          $hour = (int)$hours + ((int)$minutes/60) + ((int)$seconds/3600);
          $total += $hour;
      }
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
 ?>
