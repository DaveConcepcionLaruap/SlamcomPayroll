<?php
    if($_POST){
      session_start();
      $_SESSION['checker'] = false;
      include('database.php');

  	$username = $_POST['user'];
  	$password = $_POST['pass'];


      $check = mysqli_query($con,"SELECT * FROM `adminusers` WHERE username = '$username'");
      $row = mysqli_fetch_assoc($check);

      if($row['username'] == $username){
          if($row['password'] == $password){

              $_SESSION['id'] = $row['userID'];
              $_SESSION['checker'] = true;
              $_SESSION['user'] = $row['firstname']." ".$row['lastname'];
              header("Location:../home.php");

          }else{
              echo "password error";
          }
      }else{
          echo "username error";
      }
    }else{
      echo "post error";
    }
?>
