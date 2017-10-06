<?php
    if($_POST){
        include("DBconnect.php");
        session_start();

        $startDate = $_POST["startDate"];
        $endDate = $_POST["endDate"];
        $userID = $_SESSION["employeeID"];

        $sql = "SELECT *
                FROM `timetable`
                WHERE `userID` = '$userID' AND `timeIn` BETWEEN '$startDate' AND '$endDate'";
        $x = 0;
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            $data_array = array();
           $totalHours = strtotime(0);
           $TeamID = $_SESSION['TeamID'];

           $TeamQuery = "SELECT *
                        FROM `teamschedule`
                        WHERE `TeamID` = '$TeamID'";

            $TeamResult = mysqli_query($conn,$TeamQuery);
            if(mysqli_num_rows($TeamResult) > 0){
              $Teamrow = mysqli_fetch_array($TeamResult);
              $TotalLatesUnix = strtotime(0);
              $TotalOverTime = strtotime(0);

              while($row = mysqli_fetch_array($result)){


                  $temp = substr($row['timeIn'],0,9);
                  $dayofweek = date('w', strtotime($temp));
                  $userTimeIn = strtotime($temp);

                  switch($dayofweek){
                    case 0:
                          $TeamTimeIn = strtotime($Teamrow['sundayTimeIn']);
                          $dataHandler = $TeamTimeIn - $userTimeIn;

                          if($dataHandler < 0){
                            //late
                            $TotalLatesUnix += abs($dataHandler);
                          }
                        //  echo "'$TeamTimeIn'";
                          break;
                    case 1:
                          $TeamTimeIn = strtotime($Teamrow['mondayTimeIn']);
                          $dataHandler = $TeamTimeIn - $userTimeIn;

                          if($dataHandler < 0){
                            //late
                            $TotalLatesUnix += abs($dataHandler);
                          }
                        //  echo "'$TeamTimeIn'";
                          break;
                    case 2:
                          $TeamTimeIn = strtotime($Teamrow['tuesdayTimeIn']);
                          $dataHandler = $TeamTimeIn - $userTimeIn;

                          if($dataHandler < 0){
                            //late
                            $TotalLatesUnix += abs($dataHandler);
                          }
                        //  echo "'$TeamTimeIn'";
                          break;
                    case 3:
                          $TeamTimeIn = strtotime($Teamrow['wednesdayTimeIn']);
                          $dataHandler = $TeamTimeIn - $userTimeIn;

                          if($dataHandler < 0){
                            //late
                            $TotalLatesUnix += abs($dataHandler);
                          }
                        //  echo "'$TeamTimeIn'";
                          break;
                    case 4:
                          $TeamTimeIn = strtotime($Teamrow['thursdayTimeIn']);
                          $dataHandler = $TeamTimeIn - $userTimeIn;

                          if($dataHandler < 0){
                            //late
                            $TotalLatesUnix += abs($dataHandler);
                          }
                        //  echo "'$TeamTimeIn'";
                          break;
                    case 5:
                          $TeamTimeIn = strtotime($Teamrow['fridayTimeIn']);
                          $dataHandler = $TeamTimeIn - $userTimeIn;

                          if($dataHandler < 0){
                            //late
                            $TotalLatesUnix += abs($dataHandler);
                          }
                        //  echo "'$TeamTimeIn'";
                          break;
                    case 6:
                          $TeamTimeIn = strtotime($Teamrow['saturdayTimeIn']);
                          $dataHandler = $TeamTimeIn - $userTimeIn;

                          if($dataHandler < 0){
                            //late
                            $TotalLatesUnix += abs($dataHandler);
                          }
                      //    echo "'$TeamTimeIn'";
                          break;

                  }

                //  echo " '$TotalLates'";
                //  $TotalLates = date("h:i:s", $TotalLatesUnix);
                //find late on user log in and put in database
                //find overtime on user log in and put in database
                //do this instead of what you're doing now
                //make the table for user login
                //ng-repeat on cardviews

                  $totalHours += strtotime($row['HoursMade']);
                  $data_array[] = array(
                      'timeIn' => $row['timeIn'],
                      'timeOut' => $row['timeOut'],
                      'numberOfHours' => $row['HoursMade'],
                      'totalHours' => $totalHours,

                  );
              }

              $json = json_encode($data_array);
              echo $json;
            }else{
              echo "employee is not part of a team";
            }
        }else{
          echo "user has not worked since like ever";
        }

    }else{
        echo "something went wrong";
    }
?>
