<?php
    include('database.php');
    
    $date = $_POST['date'];
    $taskS = $_POST['task'];
    $status = $_POST['status'];
        
    $sql = "INSERT INTO task (`task`,`date`, `status`) 
                VALUES ('$taskS', '$date', '$status')";

    if(mysqli_query($con, $sql)){
        header("Location:../insertSuccessful.html");
    }else{
        echo "Failed";
    }

?>