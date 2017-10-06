<?php
    session_start();
    if($_POST){
        $_SESSION["ProfileTeamID"] = $_POST["TeamID"];
        $_SESSION["ProfileTeamName"] = $_POST["TeamName"];
        $_SESSION["ProfileTeamDesc"] = $_POST["TeamDesc"];

        echo "cookie success";
    }else{
        echo "post error";
    }
?>
