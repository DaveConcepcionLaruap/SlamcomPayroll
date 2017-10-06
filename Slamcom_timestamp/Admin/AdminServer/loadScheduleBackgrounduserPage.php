<?php

      include("DBconnect.php");
      session_start();
      $TeamID = $_SESSION["TeamID"];
      echo($TeamID);

      $sql = "SELECT * FROM `teamschedule` WHERE `TeamID` = '$TeamID'";

      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0){ //updates users schedule if team sched already exists
          $Objects = array();
          $Times = array();
          $row = mysqli_fetch_array($result);
          $MondayClock = array();
          //$TuesdayClock = array();

           $Times = array(
              array($row['mondayTimeIn'], $row['mondayTimeOut']),
              array($row['tuesdayTimeIn'], $row['tuesdayTimeOut']),
              array($row['wednesdayTimeIn'], $row['wednesdayTimeOut']),
              array($row['thursdayTimeIn'], $row['thursdayTimeOut']),
              array($row['fridayTimeIn'], $row['fridayTimeOut']),
              array($row['saturdayTimeIn'], $row['saturdayTimeOut']),
              array($row['sundayTimeIn'], $row['sundayTimeOut'])
            );

          /*  $MondayClock[] = array(
              'day' => 0,
              'periods' => array($Times[0][0], $Times[0][1])
            );*/

            $Objects[] = array(
              'MondayClock' => array(
                'day' => 0,
                'periods' => array($Times[0][0], $Times[0][1])
              ),

              'TuesdayClock' => array(
                'day' => 1,
                'periods' => array($Times[1][0], $Times[1][1])
              )/*,
              array(
                'day' => 2,
                'periods' => array($Times[2][0], $Times[2][1])
              ),
              array(
                'day' => 3,
                'periods' => array($Times[3][0], $Times[3][1])
              ),
              array(
                'day' => 4,
                'periods' => array($Times[4][0], $Times[4][1])
              ),
              array(
                'day' => 5,
                'periods' => array($Times[5][0], $Times[5][1])
              ),
              array(
                'day' => 6,
                'periods' => array($Times[6][0], $Times[6][1])
              )
*/
            );



          $json = json_encode($Objects, true);
          echo $json;
      }else{
          echo "no data";
      }
//https://stackoverflow.com/questions/5693754/how-can-i-add-a-condition-inside-a-php-array

?>
