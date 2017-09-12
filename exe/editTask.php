<?php
    include('database.php');
    if($_POST){
        $id = $_POST['userID'];
        $date = $_POST['editDate'];
        $taskS = $_POST['editTask'];
        $status = $_POST['status'];

        $sql = "UPDATE `task` 
                    SET `task` = '$taskS', `date` = '$date', `status` = '$status'
                    WHERE `id` = '$id'";

        if(mysqli_query($con, $sql)){
            header("Location:../insertSuccessful.html");
        }else{
            echo "Failed";
        }
    }else{
        echo "bitch";
    }
    
?>