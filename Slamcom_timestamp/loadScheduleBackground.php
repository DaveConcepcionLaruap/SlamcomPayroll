<?php
    if($_POST){//this is used to preload the schedule in the team tab
        include("DBconnect.php");

        $TeamID = $_POST["TeamID"];

        $sql = "SELECT * FROM `teamschedule` WHERE `TeamID` = '$TeamID'";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){ //updates users schedule if team sched already exists
            $data_array = array();

            $row = mysqli_fetch_array($result)

            $data_array[] = array(
                "Sunday" => $row["SundayShift"],
                "sundayTimeIn" => $row["sundayTimeIn"],
                "sundayTimeOut" => $row["sundayTimeOut"],
                "Monday" => $row["MondayShift"],
                "mondayTimeIn" => $row["mondayTimeIn"],
                "mondayTimeOut" => $row["mondayTimeOut"],
                "Tuesday" => $row["TuesdayShift"],
                "tuesdayTimeIn" => $row["tuesdayTimeIn"],
                "tuesdayTimeOut" => $row["tuesdayTimeOut"],
                "Wednesday" => $row["WednesdayShift"],
                "wednesdayTimeIn" => $row["wednesdayTimeIn"],
                "wednesdayTimeOut" => $row["wednesdayTimeOut"],
                "Thursday" => $row["ThursdayShift"],
                "thursdayTimeIn" => $row["thursdayTimeIn"],
                "thursdayTimeOut" => $row["thursdayTimeOut"],
                "Friday" => $row["FridayShift"],
                "fridayTimeIn" => $row["fridayTimeIn"],
                "fridayTimeOut" => $row["fridayTimeOut"],
                "Saturday" => $row["SaturdayShift"],
                "saturdayTimeIn" => $row["saturdayTimeIn"],
                "saturdayTimeOut" => $row["saturdayTimeOut"]
            );
            $json = json_encode($data_array);
            echo $json;
        }else{
          echo "no team schedule returned";
        }
    }else{
        echo "something went wrong";
    }
?>
