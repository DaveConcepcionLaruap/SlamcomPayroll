<?php

  $thursdaySql = "SELECT `ThursdayShift`, `thursdayTimeIn`, `thursdayTimeOut`
                FROM `". $teamOruser ."`
                WHERE `". $tableID ."` = '$ID'";

  $result = mysqli_query($conn, $thursdaySql);
  $row = mysqli_fetch_array($result);

  $thursdayTimeIn = new DateTime($row["thursdayTimeIn"]);

  $employeeTimeIn = new DateTime($timeIn);
  //echo " '.$employeeTimeIn.'";

  $timeLate = "00:00:00";//to initialize if no
  $timeOvertime = "00:00:00";

  $intervalLate = new DateInterval('PT0H0M');
  $intervalOvertime = new DateInterval('PT0H0M');
  $lateFlag = 0;
  $overtimeFlag = 0;
  if($employeeTimeIn > $thursdayTimeIn){//check if late

    $intervalLate = $thursdayTimeIn->diff($employeeTimeIn);
    $lateFlag = 1;

    $timeLate = sprintf(
      '%02d:%02d:%02d',
      ($intervalLate->d *24) + $intervalLate->h,
      $intervalLate->i,
      $intervalLate->s
    );

  }
  $thursdayTimeOut = new DateTime($row["thursdayTimeOut"]);
  $employeeTimeOut = new DateTime($timeOut);

  if($employeeTimeOut > $thursdayTimeOut){
  //  echo "entered overtime if";
    $intervalOvertime = $employeeTimeOut->diff($thursdayTimeOut);
    $overtimeFlag = 1;
    $timeOvertime = sprintf(
      '%02d:%02d:%02d',
        ($intervalOvertime->d * 24) + $intervalOvertime->h,
        $intervalOvertime->i,
        $intervalOvertime->s
    );
  }
  if($specialDay == 1){// holiday case
    $tablecontroller = 'totalholiday';
  }else if($specialDay == 2){
    $tablecontroller = 'totalspecialholiday';
  }else if($specialDay == 0){
    $tablecontroller = 'totalhourspermonth';
  }

  $monthlySql = "SELECT * FROM `". $tablecontroller ."` WHERE `userID` = '$userID'";

  $monthlyResult = mysqli_query($conn, $monthlySql);


  if(mysqli_num_rows($monthlyResult) > 0){


    $row = mysqli_fetch_array($monthlyResult);

    $times = array($time, $row["TotalHours"]);
    $TotalHoursString = addTimes($times,0,$NPHours);

    if($lateFlag == 1){
      $times = array($timeLate,$row["TotalLate"]);
      $TotalLateString = addTimes($times,0,$NPHours);
    }else{
      $TotalLateString = $row["TotalLate"];
    }

    if($overtimeFlag == 1){
      $times = array($timeOvertime, $row["TotalOvertime"]);
      $TotalOvertimeString = addTimes($times,0,$NPHours);
    }else{
      $TotalOvertimeString = $row["TotalOvertime"];
    }

    $updateMonthlysql = "UPDATE `". $tablecontroller ."`
    SET `TotalLate`='$TotalLateString',`TotalHours`='$TotalHoursString',
    `TotalOvertime`='$TotalOvertimeString'
     WHERE `userID` = '$userID'";

     if(mysqli_query($conn, $updateMonthlysql)){
       echo "thursday update success";
     }else{
       echo "thursday update failed";
     }
  }else{

    $insertMonthlysql = "INSERT INTO `". $tablecontroller ."`(`TotalLate`,
       `TotalHours`, `TotalOvertime`, `userID`)
       VALUES ('$timeLate','$time','$timeOvertime','$userID')";

     if(mysqli_query($conn,$insertMonthlysql)){
       echo "thursday insert success";
     }else{
       echo "thursday insert fail";
     }
  }


?>
