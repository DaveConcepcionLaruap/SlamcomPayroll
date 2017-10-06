<?php

  if($_POST){
    include("DBconnect.php");

    $TeamID = mysqli_real_escape_string($conn, $_POST["TeamID"]);

    $sql = "UPDATE `team`
            SET `Active`= 1
            WHERE `TeamID` = '$TeamID'";

    if(mysqli_query($conn, $sql)){
        echo "resurrect successful";
    }else{
      echo "something went wrong";
    }
  }else{
    echo "Post error";
  }
?>
