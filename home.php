<?php
  session_start();
  if(!$_SESSION['checker']){
  header("Location:index.php ");
  }
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <?php
        include('exe/database.php');
        include('scripts.html');
      ?>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
      <meta name="author" content="GeeksLabs">
      <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
      <link rel="shortcut icon" href="img/favicon.png">

      <title>Slamcom</title>




      <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
      ======================================================= -->
    </head>

    <body>
    <!-- container section start -->
      <section id="container" class="">
        <?php
          include("sidebar.php");
          include("header.php");
        ?>
        <!--main content start-->
        <section id="main-content">
          <section class="wrapper">
          <!--overview start-->
            <div class="row">
              <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="home.html">Home</a></li>
                <li><i class="fa fa-laptop"></i>Dashboard</li>
                </ol>
              </div>
              <div>
                <h1><big>reports here</big></h1>
              </div>
            </div>
          </section>
        <div class="text-right">
        <div class="credits">
          <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
          </div>
        </section>

      </section>


      <script>
      </script>
    </body>
  </html>
