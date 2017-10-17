<?php

  if($_POST){
    include("Admin/AdminServer/DBconnect.php");

    $absenteesJSON = $_POST["absentees"];
    $count = $_POST["count"];
    $dateToday = date("Y/m/d");
    $absentees = array();
    $absentees = json_decode($absenteesJSON);

    for($x = 0; $x < $count; $x++){
      if(isset($absentees[$x])){
        $ID = $absentees[$x];
        $absentInsert = "INSERT INTO `absenttable`(`id`, `date`)
        VALUES ('$ID','$dateToday')";

        $absentResult = mysqli_query($conn, $absentInsert);

        $MonthlyAbsent = "SELECT `TotalAbsent` FROM `totalhourspermonth` WHERE `userID` = '$ID'";;

        $monthlyResult = mysqli_query($conn, $MonthlyAbsent);

        if(mysqli_num_rows($monthlyResult) > 0){
          //update
          $row = mysqli_fetch_array($monthlyResult);
          $absentCount = (int)$row["TotalAbsent"] + 1;

          $monthlyUpdated = "UPDATE `totalhourspermonth` SET `TotalAbsent`='$absentCount'
            WHERE `userID` = '$ID'";

          $updateResult = mysqli_query($conn, $monthlyUpdated);
        }else{
          //insert
          $monthlyInsert = "INSERT INTO `totalhourspermonth`(`TotalAbsent`, `userID`)
          VALUES (1,'$ID')";

          $insertResult = mysqli_query($conn, $monthlyInsert);
        }
      }
    }
    echo "success";
  }else{
    echo "POST ERROR";
  }
 ?>
