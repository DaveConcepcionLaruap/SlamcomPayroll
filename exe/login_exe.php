<?php
    if($_POST){
      session_start();
      $_SESSION['checker'] = false;
      $_SESSION['AdminLoginValid'] = false;
      include('database.php');

  	$email = $_POST['user'];
  	$password = $_POST['pass'];


      $check = mysqli_query($con,"SELECT * FROM `adminusers` WHERE `email` = '$email'");
      $row = mysqli_fetch_assoc($check);

      if($row['email'] == $email){
          if(password_verify($password,$row["password"])){

              $_SESSION['id'] = $row['userID'];
              $_SESSION['checker'] = true;
              $_SESSION['AdminLoginValid'] = true;
              $_SESSION['user'] = $row['firstname']." ".$row['lastname'];
              $_SESSION['Adminfirstname'] = $row['firstname'];
              $_SESSION['Adminlastname'] = $row['lastname'];
            //  header("Location:../home.php");
              echo "success";
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
