<?php
    if($_POST){
        include("DBconnect.php");


        $json = $_POST["schedule"];
        $TeamID = $_POST["TeamID"];
        $schedule = json_decode($json,true);


        $count = count($schedule);

        $days = array();
        $timeIn = array();
        $timeOut = array();

        for($x = 0;$x < $count;$x++){
            $obj = $schedule[$x];

            if($obj["period"][0] != "" && $obj["period"][1] != ""){
                $days[$x] = 1;
                //$timeobj = $obj["period"][0];

                $timeIn[$x] = $obj["period"][0];
                $timeOut[$x] = $obj["period"][1];

            }else{
                $days[$x] = 0;
                $timeIn[$x] = null;
                $timeOut[$x] = null;
                //echo "did not go in";
            }
        }

        $sql = "SELECT * FROM `teamschedule` WHERE `TeamID` = '$TeamID'";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){ //updates users schedule if team sched already exists
            $sql = "UPDATE `teamschedule` SET
            `MondayShift`='$days[1]',`mondayTimeIn`='$timeIn[1]',`mondayTimeOut`='$timeOut[1]',
            `TuesdayShift`='$days[2]',`tuesdayTimeIn`='$timeIn[2]',`tuesdayTimeOut`='$timeOut[2]',
            `WednesdayShift`='$days[3]',`wednesdayTimeIn`='$timeIn[3]',`wednesdayTimeOut`='$timeOut[3]',
            `ThursdayShift`='$days[4]',`thursdayTimeIn`='$timeIn[4]',`thursdayTimeOut`='$timeOut[4]',
            `FridayShift`='$days[5]',`fridayTimeIn`='$timeIn[5]',`fridayTimeOut`='$timeOut[5]',
            `SaturdayShift`='$days[6]',`saturdayTimeIn`='$timeIn[6]',`saturdayTimeOut`='$timeOut[6]',
            `SundayShift`='$days[0]',`sundayTimeIn`='$timeIn[0]',`sundayTimeOut`='$timeOut[0]',
            `TeamID`='$TeamID' WHERE `TeamID` = '$TeamID'";
        }else{
            $sql = "INSERT INTO `teamschedule`(`MondayShift`, `mondayTimeIn`, `mondayTimeOut`,
                `TuesdayShift`, `tuesdayTimeIn`, `tuesdayTimeOut`,
                `WednesdayShift`, `wednesdayTimeIn`, `wednesdayTimeOut`,
                 `ThursdayShift`, `thursdayTimeIn`, `thursdayTimeOut`,
                 `FridayShift`, `fridayTimeIn`, `fridayTimeOut`,
                 `SaturdayShift`, `saturdayTimeIn`, `saturdayTimeOut`,
                 `SundayShift`, `sundayTimeIn`, `sundayTimeOut`, `TeamID`)
                 VALUES ('$days[1]','$timeIn[1]','$timeOut[1]','$days[2]','$timeIn[2]',
                     '$timeOut[2]','$days[3]','$timeIn[3]','$timeOut[3]','$days[4]',
                     '$timeIn[4]','$timeOut[4]','$days[5]','$timeIn[5]','$timeOut[5]',
                     '$days[6]','$timeIn[6]','$timeOut[6]','$days[0]','$timeIn[0]',
                     '$timeOut[0]','$TeamID')";
        }

        if(mysqli_query($conn, $sql)){
            echo "team schedule successful";
        }else{
            echo "team schedule error";
        }
    }else{
        echo "something went wrong";
    }
?>
