<?php

  if($_POST){
    session_start();
    include('database.php');

    $pass = $_POST['password'];
    $id = $_SESSION['id'];

    $check = mysqli_query($con,"SELECT `password` FROM `adminusers` WHERE `userID` = '$id'");
    $row = mysqli_fetch_assoc($check);

    if(password_verify($pass, $row['password'])){
      echo "success";
    }else{
      echo "failed";
    }
  }
?>
