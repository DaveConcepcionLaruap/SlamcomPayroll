<?php
    include("DBconnect.php");

   // session_start();


    session_destroy();
    header("Location: ../../LoginOrSignup.php");

    mysqli_close($conn);

?>
