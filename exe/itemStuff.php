<?php
    include('database.php');

    if(isset($_GET['del'])){
        $query = "DELETE FROM `item` WHERE `item`.`id` = '".$_GET['itemID']."'";
        $result = mysqli_query($con,$query);
        if(mysqli_query($con,$query)){
            $msg = "Delete Succesful";
            header("Location:../InventoryList.php");
        }else{
            echo "Edit Failed";
        }

    }
    else if(isset($_GET['edit'])){
        $name = $_POST['name'];
        $category = $_POST['category'];
        $qty = $_POST['qty'];
        $desc = $_POST['desc'];
        $itemID = $_POST['itemID'];

        $query = "UPDATE `item` SET `name` = '$name', `category` = '$category', `qty` = '$qty', `itemDesc` = '$desc' WHERE `item`.`id` = '$itemID'";
        if(mysqli_query($con,$query)){
            echo "Edit Success";
        }else{
            echo "Edit Failed";
        }    
    }

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