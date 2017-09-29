<?php
    include('database.php');
    if($_POST){
      $itemID = $_POST['itemID'];
      $deductQty = $_POST['deductQty'];
      $oldQty = $_POST['oldQty'];

      $answer = $oldQty - $deductQty;

      $query = "UPDATE `item` SET `qty` = '$answer' WHERE `id` = '$itemID'";
      if(mysqli_query($con,$query)){
          echo "Restock Success";
      }else{
          echo "Restock Failed";
      }
    }

?>
