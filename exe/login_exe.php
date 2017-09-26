<?php
    if($_POST){
      session_start();
      $_SESSION['checker'] = false;
      include('database.php');

  	$username = $_POST['user'];
  	$password = $_POST['pass'];



      $check = mysqli_query($con,"SELECT * FROM `admin` WHERE username = '$username'");
      $row = mysqli_fetch_assoc($check);


      if($row['username'] == $username){
          if($row['password'] == $password){

              $_SESSION['user'] = $username;
              $_SESSION['checker'] = true;
              $_SESSION['user'] = $row['username'];
              header("Location:../home.php");


          }else{
              //header("Location:..");
              echo "password error";
          }
      }else{
          //header("Location:..");
          echo "username error";
      }
    }else{
      echo "post error";
    }
?>
