<?php
  if($_POST){
    include("DBconnect.php");

    $userID = $_POST["userID"];
    $firstname = mysqli_real_escape_string($conn, $_POST['txt_firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['txt_lastname']);
    $emailaddress = mysqli_real_escape_string($conn, $_POST['txt_signUpEmail']);


    $sql = "UPDATE `adminusers`
    SET `firstname` = '$firstname', `lastname` = '$lastname',
    `emailaddress` = '$emailaddress'
    WHERE `userID` = '$userID'";

    if(mysqli_query($conn, $sql)){
      echo "user successfully edited";
    }else{
      echo "yous a hacker bruh?";
    }
    mysqli_close($conn);
  }else{
    echo "POST error";
  }
?>
