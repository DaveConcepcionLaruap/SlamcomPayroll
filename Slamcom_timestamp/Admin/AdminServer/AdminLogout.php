<?php
    include("DBconnect.php");

    session_start();


    session_destroy();
    header("Location: ../../../Home.php");

    mysqli_close($conn);

?>
