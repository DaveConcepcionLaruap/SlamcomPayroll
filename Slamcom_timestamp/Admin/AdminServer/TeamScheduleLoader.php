<?php
    $sql = "SELECT * FROM `teamschedule` WHERE `TeamID` = '$teamID'";
    $result = mysqli_query($conn, $sql);

    $data = array();
    if($result){
      if(mysqli_num_rows($result)){
        $row = mysqli_fetch_array($result);
        /*echo '<tr id='.$row['TeamID'].'>
                <td>'.$row[2].'</td>
                <td>'.$row[3].'</td>
                <td>'.$row[5].'</td>
                <td>'.$row[6].'</td>
                <td>'.$row[8].'</td>
                <td>'.$row[9].'</td>
                <td>'.$row[11].'</td>
                <td>'.$row[12].'</td>
                <td>'.$row[14].'</td>
                <td>'.$row[15].'</td>
                <td>'.$row[17].'</td>
                <td>'.$row[18].'</td>
                <td>'.$row[20].'</td>
                <td>'.$row[21].'</td>
                </tr>';*/
            $data = array(
                "mondayTimeIn" => $row[2],
                "mondayTimeOut" => $row[3]
            );

            $json = json_encode($data);

            echo $json;
      }else{
        echo "team does not have schedule";
      }
    }else{
      echo "team query error";
    }
?>
