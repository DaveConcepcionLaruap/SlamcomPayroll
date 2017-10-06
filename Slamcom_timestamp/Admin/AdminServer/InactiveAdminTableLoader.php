<?php
    include("DBconnect.php");
    $query = 'SELECT `userID`, `firstname`, `lastname`, `emailaddress` FROM `adminusers` WHERE `Active` = 0';

    $result = mysqli_query($conn,$query);

    if($result){
      $columns = array(
        0 => 'userID',
        1 => 'firstname',
        2 => 'lastname',
        3 => 'emailaddress'
      );
      while($row = mysqli_fetch_array($result)){
/*
          echo '<tr id='.$row[0].'>
                  <td>'.$row[0].'</td>
                  <td>'.$row[1].'</td>
                  <td>'.$row[2].'</td>
                  <td>'.$row[3].'</td>
                  <td><button id="resurrectButton" type="button" class="btn btn-sm btn-primary">Resurrect</button></td>

                  </tr>';*/
          $dataArray = array();
          $dataArray[] = $row["userID"];
          $dataArray[] = $row["firstname"];
          $dataArray[] = $row["lastname"];
          $dataArray[] = $row["emailaddress"];
          $dataArray[] = "<button id='resurrectButton' type='button'
          class='btn btn-sm btn-primary'>Resurrect</button>";
      }
      $json = json_encode($dataArray);
      echo $json;
    }else{
      echo "no data";
    }
?>
