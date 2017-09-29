<?php
    include('database.php');

    $itemID = $_POST['itemID'];

    $query = "DELETE FROM `item` WHERE `item`.`id` = '$itemID'";
    $result = mysqli_query($con,$query);
    if(mysqli_query($con,$query)){
        $msg = "Delete Succesful";
        header("Location:../InventoryList.php");
    }else{
        echo "Delete Failed";
    }

?>
