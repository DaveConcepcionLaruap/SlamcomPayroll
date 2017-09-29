<?php
session_start();
  if(!$_SESSION['checker']){
    header("Location:index.php ");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Widgets | Creative - Bootstrap 3 Responsive Admin Template</title>
    <?php
        include("scripts.html");
        include("exe/database.php");
    ?>
  </head>

  <body>
  <style>
      .dataTables_wrapper .dt-buttons{
        float:none;
        text-align:left;
      }
  </style>
  <!-- container section start -->
  <section id="container" class="">
      <?php
        include("sidebar.php");
        include("header.php");
      ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_genius"></i> Inventory List</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="fa fa-desktop"></i>Inventory</li>
						<li><i class="icon_genius"></i>Edit Item</li>
                    </ol>
				</div>
			</div>
          <h3>EDIT ITEM</h3>
          <hr>
            <div>
                <div>
                    <form >

                        <div class = "col-md-6">
                            <div class="form-group">
                                <label>Item Name</label>
                                <?php
                                    $result = mysqli_query($con,"SELECT name FROM item where id =".$_GET['itemID']);
                                    $row = mysqli_fetch_Array($result);
                                    echo'<input class="form-control" type="text" name="name" id="name" value="'.$row[0].'" required>';
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <?php
                                    $result = mysqli_query($con,"SELECT category FROM item where id =".$_GET['itemID']);
                                    $row = mysqli_fetch_Array($result);
                                    echo'<input class="form-control" type="text" name="category" id="category" value="'.$row[0].'" required>';
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <?php
                                    $result = mysqli_query($con,"SELECT qty FROM item where id =".$_GET['itemID']);
                                    $row = mysqli_fetch_Array($result);
                                    echo'<input class="form-control" type="number" name="qty" id="qty" value="'.$row[0].'" required>';
                                ?>
                            </div>

                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <label>Item Description</label>
                                <?php
                                    $result = mysqli_query($con,"SELECT itemDesc FROM item where id =".$_GET['itemID']);
                                    $row = mysqli_fetch_Array($result);
                                    echo'<textarea class="form-control" rows="9.8" id="desc" name="desc">'.$row[0].'</textarea>';
                                ?>
                            </div>
                            <button type="button" class="btn btn-danger" id ="del_btn" >Delete</button>
                            <div style="float:right">
                                <button type="button" onclick="cancel()" class="btn">Cancel</button>
                                <button type="submit" name="submit" id = "editbtn" class="btn btn-primary">Edit</button>
                            </div>

                        </div>

                    </form>

                </div>


            </div>

          </section>
      </section>
      <!--main content end-->
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
  <!-- container section end -->


  <script>
    $("#editbtn").on("click",function(){
        var name = $("#name").val();
        var category = $("#category").val();
        var qty = $("#qty").val();
        var desc = $("#desc").val();
        var itemID = <?php echo $_GET["itemID"]?>;

        $.ajax({
            url: "exe/itemStuff.php",
            method: "POST",
            data: {name: name, category: category, qty: qty, desc: desc, itemID: itemID},
            success: function(data){
                alert("Edit Success");
                window.location.href="InventoryList.php";
            },
            error: function(data){
                alert("Edit Error");
            }
        });
      });

      $("#del_btn").on("click",function(){
          var itemID = <?php echo $_GET["itemID"]?>;

          $.ajax({
              url: "exe/itemDelete.php",
              method: "POST",
              data: {itemID: itemID},
              success: function(data){
                  alert("Delete Success");
                  window.location.href="InventoryList.php";
              },
              error: function(data){
                  alert("Delete Error");
              }
          });
        });



    function cancel() {
        window.location.href="InventoryList.php";
    }

  </script>

  </body>
</html>
