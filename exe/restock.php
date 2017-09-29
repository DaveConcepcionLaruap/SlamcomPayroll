<?php
    include('database.php');
    if($_POST){
      $itemID = $_POST['itemID'];
      $restockQty = $_POST['restockQty'];
      $oldQty = $_POST['oldQty'];

      $answer = $restockQty + $oldQty;

      $query = "UPDATE `item` SET `qty` = '$answer' WHERE `item`.`id` = '$itemID'";
      if(mysqli_query($con,$query)){
          echo "Restock Success";
      }else{
          echo "Restock Failed";
      }
    }
?>
