<?php

    ini_set('session.gc_maxlifetime', 36000);
    session_set_cookie_params(36000);
    session_start();

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
            /*  $_SESSION['userID'] = $row['userID'];
              $_SESSION['firstname'] = $row['firstname'];
              $_SESSION['lastname'] = $row['lastname'];
             // $_SESSION['email'] = $row['email'];


              $_SESSION['LoginValid'] = true;
              $_SESSION['LoginTime'] = date('Y-m-d h:i:s a');*/
              echo "user login secured";
            //  header("Location: Home.php");
          }else{
              //echo "password does not exist";
              //header("Location: LoginOrSignup.php?err");
              echo "user wrong password";
          }
      }else{

      // header("Location: LoginOrSignup.php");
          //header("Location: LoginOrSignup.php?err");
          echo "wtf just happened";
      }

    }else{
      echo "post error";
    }
?>
