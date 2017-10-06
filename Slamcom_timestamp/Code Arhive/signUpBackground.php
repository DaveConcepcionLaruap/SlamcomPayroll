<?php
    if($_POST){
        session_start();


        include("DBconnect.php");
        $firstname = mysqli_real_escape_string($conn, $_POST['txt_firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['txt_lastname']);
        $emailaddress = mysqli_real_escape_string($conn, $_POST['txt_signUpEmail']);
        $password = mysqli_real_escape_string($conn, $_POST['txt_signUpPassword']);

        //add user existence verification
         $sql = "SELECT `userID`, `firstname`, `lastname`, `emailadd`, `password`
            FROM `user`
            WHERE `emailadd` = '$emailaddress'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
           // $_SESSION['userAlreadyExistErr'] = "the user already exists!"; //not working
            //use ?err or something
            header("Location: LoginOrSignup.php?EmailalreadyExist");
        }else{
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `user`(`firstname`, `lastname`, `emailadd`, `password`)
            VALUES ('$firstname','$lastname','$emailaddress','$hash')";
    
            if(mysqli_query($conn,$sql)){
                echo "you have been added successfully!";
                header("Location: LoginOrSignup.php");
            }else{
                echo "oh noes, something went wrong!";
            }

           
        }
        mysqli_close($conn);
    }else{
        echo "POST error";
    }
?>
