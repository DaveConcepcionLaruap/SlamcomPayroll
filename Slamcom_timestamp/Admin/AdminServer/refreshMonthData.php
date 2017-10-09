<?php

    include("DBconnect.php");
    $sql = "UPDATE `totalhourspermonth`
    SET`Active`= 0
    WHERE `Active` = 1";

    $result = mysli_query($conn, $sql);

    if($result){
      echo "refresh successful";
    }else{
      echo "refresh unsuccessful";
    }
?>
