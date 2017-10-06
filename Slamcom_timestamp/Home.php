
<?php
include("loginVerification.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <link href="CountDownTimer/inc/TimeCircles.css" rel="stylesheet">

  

  

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body ng-app="timer-demo" ng-controller="TimerDemoController">

<div class="container">
  <div class="jumbotron">


    <?php
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $userID = $_SESSION['userID'];

        echo "<h1> Welcome, $firstname</h1>";
    ?>
    <div id="timeCircle">
    </div>
    
    <a id = "logoutButton"class="btn btn-primary btn-lg" href="LogoutBackground.php" role="button">Log Out</a>
  </div>

</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="CountDownTimer/inc/TimeCircles.js"></script>


  <script type="text/javascript">
    jQuery(document).ready(function(){
      $("#timeCircle").TimeCircles();
    });

    $("#logoutButton").on("click",function(){
      $("#timeCircle.stopwatch").TimeCircles().stop();
    });
  </script>

</body>
</html>
