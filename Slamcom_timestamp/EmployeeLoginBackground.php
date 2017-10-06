<?php

    if($_POST){

        include("Admin/AdminServer/DBconnect.php");

        $employeeID = mysqli_real_escape_string($conn, $_POST['employeeID']);
        $password = mysqli_real_escape_string($conn, $_POST['employeePassword']);

        $sql = "SELECT `userID`, `firstname`, `lastname`, `emailadd`, `password`
              FROM `user`
              WHERE `userID` = '$employeeID'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['password'])){

              echo "user login secured";
            }else{

              echo "user wrong password";
            }
        }else{
          echo "wtf just happened";
        }

    }else{
      echo "post error";
    }
?>
