<?php
    include('database.php');
    if($_POST){
        $name = $_POST['name'];
        $category = $_POST['category'];
        $qty = $_POST['qty'];
        $desctext = $_POST['desctxt'];

        $sql = "INSERT INTO item (`name`,`category`, `qty`, `itemDesc`) 
                    VALUES ('$name', '$category', '$qty', '$desctext')";

        if(mysqli_query($con, $sql)){
            echo "Insert Success";
        }else{
            echo "Insert Failed";
        }
    }else{
        echo "Something Wierd Happened";
    }
?>