<?php
    include("DBconnect.php");
    $query = 'SELECT `userID`, `firstname`, `lastname`, `emailadd` FROM `user` WHERE 1';

    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        $data_array = array();

        while($row=mysqli_fetch_assoc($result)){
          /*  echo '<tr id='.$row[0].'>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                    <td>'.$row[3].'</td>
                    <td><button id='.$row[0].' type="button" class="btn btn-sm btn-danger">Delete</button>
                    </tr>';
                    */
                    $data_array[] = array(
                      'userID' => $row['userID'],
                      'firstname' => $row['firstname'],
                      'lastname' => $row['lastname'],
                      'emailadd' => $row['emailadd']
                    );
        }
        $json = json_encode($data_array);
        echo $json;
    }

?>
