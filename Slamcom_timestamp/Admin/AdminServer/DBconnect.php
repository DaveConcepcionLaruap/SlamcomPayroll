<?php
  $conn = mysqli_connect("localhost","root","","slamcom");

  if(!$conn){
    die("Connection failed: ".$conn->connection_error);
  }
?>
