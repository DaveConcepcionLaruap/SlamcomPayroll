<?php
    if($_POST){
        include("DBconnect.php");
        session_start();
        $_SESSION["employeeID"] = $_POST["userID"];
        $_SESSION["firstname"] = $_POST["firstname"];
        $_SESSION["lastname"] = $_POST["lastname"];
        $_SESSION["TeamID"] = $_POST["TeamID"];
    }
?>
