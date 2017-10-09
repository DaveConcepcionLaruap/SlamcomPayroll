<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login Page</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>

  <body class="login-img3-body">

    <div class="container">

    <!--<form class="login-form" action="exe/login_exe.php" method="post">-->
        <div  class="login-form">
          <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>

            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" class="form-control" id="emailadd" placeholder="email address" name="user" autofocus required>
            </div>

            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" id="password" placeholder="password" name="pass" required>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="button" id="loginbtn">Login</button>

          </div>
        </div>
    <!--</form>-->

    <div class="text-right">
            <div class="credits">
                <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </div>


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

     <script>
        jQuery(document).ready(function(){
          $("#loginbtn").click(function(){

              $.ajax({
                url: "exe/login_exe.php",
                method: "POST",
                data: {user: $("#emailadd").val(), pass: $("#password").val()},
                success: function(data){
                  if(data == "success"){
                    window.location.replace("home.php");
                  }else{
                    alert(data);
                  }
                },
                error: function(data){
                  console.log(data);
                }
              })
          });
        });
     </script>
  </body>
</html>
