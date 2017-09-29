<?php
    include('database.php');

    else if(isset($_GET['restock'])){
        $itemID = $_POST['itemID'];
        $restockQty = $_POST['restockQty'];
        $oldQty = $_POST['oldQty'];

        $answer = (int)$restockQty + (int)$oldQty;

        $query = "UPDATE `item` SET `qty` = '$answer' WHERE `item`.`id` = '$itemID'";
        if(mysqli_query($con,$query)){
            echo "Restock Success";
        }else{
            echo "Restock Failed";
        }
    }
    else if(isset($_GET['deduct'])){
        if($_POST){
            $itemID = $_POST['itemID'];
            $restockQty = $_POST['restockQty'];
            $oldQty = $_POST['oldQty'];

            $answer = (int)$oldQty - (int)$restockQty;

            $query = "UPDATE `item` SET `qty` = '$answer' WHERE `item.id` = '$itemID'";
            if(mysqli_query($con,$query)){
                echo "Restock Success";
            }else{
                echo "Restock Failed";
            }
        }else{
            echo "post error";
        }
    }


?>
