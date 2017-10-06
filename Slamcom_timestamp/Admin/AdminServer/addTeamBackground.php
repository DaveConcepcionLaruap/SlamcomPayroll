<?php
    if($_POST){
        include("DBconnect.php");

        $teamName = mysqli_real_escape_string($conn, $_POST['txt_teamName']);
        $teamDesc = mysqli_real_escape_string($conn, $_POST['txt_teamDesc']);

        $sql = "INSERT INTO `team`(`TeamName`, `TeamDesc`)
                VALUES ('$teamName','$teamDesc')";


        if(mysqli_query($conn, $sql)){
            echo "add successful";
        }else{
            echo "add not successful";
        }
  }else{
      echo "wtf";
  }

?>
