<?php
    if($_POST){
        include("DBconnect.php");

        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $emailaddress = mysqli_real_escape_string($conn, $_POST['emailaddress']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);


        $sql = "SELECT `userID`, `firstname`, `lastname`, `emailaddress`, `password`
           FROM `adminusers`
           WHERE `emailaddress` = '$emailaddress'";

        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)){
          echo "user email already exist";
        }else{

          $hash = password_hash($password, PASSWORD_DEFAULT);

          $sql = "INSERT INTO `adminusers`(`firstname`, `lastname`,
             `emailaddress`, `password`, `Active`)
           VALUES ('$firstname','$lastname','$emailaddress',
             '$hash',1)";


          if(mysqli_query($conn, $sql)){
              echo "add successful";
          }else{
              echo "add not successful";
          }
        }
  }else{
      echo "wtf";
  }

?>
