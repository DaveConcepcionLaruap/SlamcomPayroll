<?php
    if($_POST){
        include('database.php');
        $name = $_POST["name"];
        $position = $_POST["position"];
        $team = $_POST["team"];
        
        $sql = "INSERT INTO employee (`name`,`position`, `team`) 
                VALUES ('$name', '$position', '$team')";

        if(mysqli_query($con, $sql)){
            header("Location:../insertSuccessful.html");
        }else{
            echo "Failed";
        }
    }else{
        echo "something";
    }

?>