<?php

    ini_set('session.gc_maxlifetime', 36000);
    session_set_cookie_params(36000);
    session_start();

    if($_POST){

      include("DBconnect.php");

      $AdminID = mysqli_real_escape_string($conn, $_POST['AdminID']);
      $password = mysqli_real_escape_string($conn, $_POST['AdminPassword']);

      $sql = "SELECT *
      FROM `adminusers`
      WHERE `userID` = '$AdminID'";

      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) > 0){ //ASK sir if its better to make user input own ID so we
      //can keep track of who gets admin permissions.
          $row = mysqli_fetch_assoc($result);

        //if(password_verify($password, $row['password'])){
          $_SESSION['Adminfirstname'] = $row['firstname'];
          $_SESSION['Adminlastname'] = $row['lastname'];
          $_SESSION['AdminLoginValid'] = true;
          echo "success";
          //header("Location: AdminDashboard.php");
        //}else{
            //header("Location: LoginOrSignup.php?err");
        //    echo "failed";
    //    }

      }else{
        echo "yous a hacker bruh";
      }
      /*else{

        $sql = "SELECT `userID`, `firstname`, `lastname`, `emailadd`, `password`
                FROM `user`
                WHERE `emailadd` = '$email'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['password'])){
                $_SESSION['userID'] = $row['userID'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
               // $_SESSION['email'] = $row['email'];


                $_SESSION['LoginValid'] = true;
                $_SESSION['LoginTime'] = date('Y-m-d h:i:s a');

                header("Location: Home.php");
            }else{
                //echo "password does not exist";
                header("Location: LoginOrSignup.php?err");
            }
        }else{

        // header("Location: LoginOrSignup.php");
            header("Location: LoginOrSignup.php?err");
        }
        */
    }else{
      echo "post error";
    }
?>
