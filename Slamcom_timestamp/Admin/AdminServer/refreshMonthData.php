<?php

    include("DBconnect.php");
    $sql = "UPDATE `totalhourspermonth` SET `TotalLate`='00:00:00',
    `TotalHours`='00:00:00',`TotalOvertime`='00:00:00' WHERE 1";

    $result = mysqli_query($conn, $sql);

    $sqlholiday = "UPDATE `totalholiday` SET `TotalLate`='00:00:00',
    `TotalHours`='00:00:00',`TotalOvertime`='00:00:00' WHERE 1";

    $resultholiday = mysqli_query($conn, $sqlholiday);

    $sqlspecial = "UPDATE `totalspecialholiday` SET `TotalLate`='00:00:00',
    `TotalHours`='00:00:00',`TotalOvertime`='00:00:00' WHERE 1";

    $resultspecial = mysqli_query($conn, $sqlspecial);

    if($result && $resultholiday && $resultspecial){
      echo "refresh successful";
    }else{
      echo "refresh unsuccessful";
    }
?>
