<?php
  if($_POST){
    session_start();
    include('database.php');

    $id = $_SESSION['id'];
    $newPass = $_POST['password'];

    $hash = password_hash($newPass, PASSWORD_DEFAULT);

    $query = "UPDATE `adminusers` SET `password` = '$hash' WHERE `userID` = '$id'";
    if(mysqli_query($con,$query)){
        echo "success";
    }else{
        echo "failed";
    }
  }else{
    echo "Edit Error";
  }

?>
