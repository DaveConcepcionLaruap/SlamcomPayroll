<?php
    include('database.php');
	$username = $_POST['user'];
	$password = $_POST['pass'];

    $check = mysqli_query($con,"SELECT * FROM `admin` WHERE username = '$username'");
    $row = mysqli_fetch_assoc($check);
    

    if($row['username'] == $username){
        if($row['password'] == $password){
            mysqli_close($con);
            header("Location:../home.php");
            $_SESSION['checker'] = true;
            $_SESSION['user'] = $row['username'];    
        }else{
            header("Location:..");
        }
    }else{
        header("Location:..");
    }
?>