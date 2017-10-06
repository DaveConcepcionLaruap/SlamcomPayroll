<?php
  include("DBconnect.php");

  $sql = "SELECT * FROM `Team` WHERE 1";

  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0){
      $data_array = array();

      while($row = mysqli_fetch_array($result)){

          $data_array[] = array(
              'TeamID' => $row['TeamID'],
              'TeamName' => $row['TeamName'],
              'TeamDesc' => $row['TeamDesc']
          );

      }

      $json = json_encode($data_array);
      echo $json;

  }else{
    echo "no data";
  }

?>
