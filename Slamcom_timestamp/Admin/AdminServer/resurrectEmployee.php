<?php
    if($_POST){

        include("DBconnect.php");
        $userID = mysqli_real_escape_string($conn, $_POST['userID']);
        //echo "$userID";

        //add user existence verification
         $sql = "UPDATE `user` SET `active`= 1 WHERE `userID` = $userID";

        if(mysqli_query($conn,$sql)){
          echo "successfully resurrected the user!";
        }else{
          echo "yous a hacker bruh?";
        }

        mysqli_close($conn);
    }else{
        echo "POST error";
    }
?>
