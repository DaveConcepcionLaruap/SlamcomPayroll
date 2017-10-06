<?php
session_start();
    if($_SESSION['AdminLoginValid'] != true){
        header("Location: LoginOrSignup.php");
    }
?>
