<?php
session_start();
    if($_SESSION['LoginValid'] != true){
        header("Location: LoginOrSignup.php");
    }
?>
