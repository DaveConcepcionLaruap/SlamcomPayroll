<?php
    include("DBconnect.php");
    $query = 'SELECT `userID`, `firstname`, `lastname`, `emailaddress` FROM `adminusers` WHERE `Active` = 1';

    $result = mysqli_query($conn,$query);
    if($result){
      $columns = array(
        0 => 'userID',
        1 => 'firstname',
        2 => 'lastname',
        3 => 'emailaddress'
      );
      $dataArray = array();
      while($row = mysqli_fetch_array($result)){

          $dataArray[] = array(
            0 => $row["userID"],
            1 => $row["firstname"],
            2 => $row["lastname"],
            3 => $row["emailaddress"],
            4 => "<button id='delbutton' type='button' class='btn btn-sm btn-danger'>Delete</button>
                <button id='editbutton' type='button' class='btn btn-sm btn-warning'>Edit</button>"

          );

      }
      $json = json_encode($dataArray,true);
      echo $json;
    }else{
      echo "no data";
    }
?>
