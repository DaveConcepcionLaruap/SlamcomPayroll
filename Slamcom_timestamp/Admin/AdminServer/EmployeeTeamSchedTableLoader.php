<?php
  include("../AdminServer/DBconnect.php");
  session_start();

  $teamID = $_SESSION["TeamID"];
  $sql = "SELECT * FROM `teamschedule` WHERE `TeamID` = '$teamID'";

  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0){
      $data_array = array();

      $row = mysqli_fetch_array($result);
      $limit = mysqli_num_fields($result);
      $limit = $limit - 2;

      for($x = 1;$x < $limit;$x++){

          if($row[$x] == 1){
            $data_array = array(
              "day" => $x,
              "timeIn" => $row[$x+1],
              "timeOut" => $row[$x+2]
            );
            $x = $x + 2;
          }

      }
      $json = json_encode($data_array);
      echo $json;

  }else{
    echo "no data";
  }

?>
