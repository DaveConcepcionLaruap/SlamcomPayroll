<?php
    include("DBconnect.php");
    date_default_timezone_set("Asia/Manila");
    session_start();//probably wont need this anymore

    //$_SESSION['LogoutTime'] = date('Y-m-d h:i:s a');
    $logouttime = date('Y-m-d h:i:s a');

    $userID = mysqli_real_escape_string($conn, $_POST['userID']);
/*
    $logintime = $_SESSION['LoginTime'];
    $userid = $_SESSION['userID'];
    $logouttime = $_SESSION['LogoutTime'];
*/

    $query = "SELECT * FROM `loggedin` WHERE `userID` = '$userID'";

    $result = mysqli_query($conn,$query);
    if($result){
      $row = mysqli_fetch_assoc($result);

      $logintime = $row["TimeIn"];
    }
    $start = new DateTime($logintime);
    $end = new DateTime($logouttime);

   $interval = $end->diff($start);



   $time = sprintf(
        '%d:%02d:%02d',
        ($interval->d * 24) + $interval->h,
        $interval->i,
        $interval->s
   );

    $sql = "INSERT INTO `timetable`(`timeIn`, `timeOut`,`HoursMade` ,`userID`)
            VALUES ('$logintime','$logouttime','$time','$userid')";

    if(mysqli_query($conn,$sql)){
        $query = "DELETE FROM `loggedin` WHERE `userID` = $userID";

        mysqli_query($conn,$query);
        session_destroy();
        header("Location: LoginOrSignup.php");
    }
    mysqli_close($conn);
?>
