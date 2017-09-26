<?php
    session_start();
    $_SESSION['checker'] = "false";
    error_reporting(0);

    $con = mysqli_connect("localhost","root","","payroll_slamcom");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>