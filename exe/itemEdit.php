<?php

    if($_POST){

      include('database.php');

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
    }else{
      echo "Edit Error";
    }
 ?>
