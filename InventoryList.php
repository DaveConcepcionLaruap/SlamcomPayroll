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

    <title>Slamcom</title>
    <?php
    include("exe/database.php");
    include("scripts.html");
    ?>
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
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_genius"></i> Inventory List</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_genius"></i>Item List</li>
                    </ol>
				</div>
			</div>
                <button id="addBtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#itemModal" >Add Item</button>
            <br>

            <div>
                <table id="itemList" class="table table-hover table-striped" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Item Name</th>
                              <th>Category</th>
                              <th>Quantity</th>
                              <th>Description</th>

                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $query = 'SELECT `id`, `name`, `category`, `qty`, `itemDesc` FROM item';
                            $result = mysqli_query($con, $query);

                            while($row = mysqli_fetch_array($result)){
                                echo '<tr id='.$row[0].'>
                                        <td>'.$row[0].'</td>
                                        <td>'.$row[1].'</td>
                                        <td>'.$row[2].'</td>
                                        <td>'.$row[3].'</td>
                                        <td>'.$row[4].'</td>
                                     </tr>';
                            }
                          ?>
                      </tbody>
                  </table>
            </div>

          </section>
      </section>
      <!--main content end-->

      <!--Modal-->
    <div class = "modal fade" id = "itemModal" role = "dialog">
        <div class = "modal-dialog">
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                    <h4 class = "modal-title">Item List</h4>
                </div>
                <div class = "modal-body">
                    <div class = "form-group">
                            <label class = "col-sm-3 control-label" for = "name">Item Name</label>
                                <input type = "text" id = "name" class = "form-control">
                            <label class = "col-sm-3 control-label" for = "category">Category</label>
                                <select id = "category" class = "form-control">
                                <option value=""></option>
                                        <option value="Office Equipments">Office Equipments</option>
                                        <option value="Office Supplies">Office Supplies</option>
                                        <option value="Some Stuff">Some Stuff</option>
                                </select>
                            <label class = "col-sm-3 control-label" for = "qty">Quantity</label>
                                <input type = "text" id = "qty" class = "form-control">
                            <label class = "col-sm-3 control-label" for = "name">Item Description</label>
                            <input type = "text" id = "desc" class = "form-control">
                            <br>
                            <button id = "itemBtn" class = "btn btn-success" type = "Submit">Add Item</button>
                    </div>
                </div>
                <div class = "modal-footer">
                    <button class = "close" data-dismiss = "modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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

    var taskTable;
      $(document).ready(function() {
        taskTable = $('#itemList').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
      } );

      $("#itemBtn").on("click",function(){
           var nametxt = $("#name").val();
           var categorytxt = $("#category").val();
           var qtytxt = $("#qty").val();
           var desctxt = $("#desc").val();

            $.ajax({
                url:"exe/addItem.php",
                method:"POST",
                data: {name: nametxt, category: categorytxt, qty: qtytxt, desctxt: desctxt},
                success: function(data){
                    alert(data);
                    window.location.href="InventoryList.php";
                },
                error: function(data){
                    alert(data);
                }
            });
      });

      $("#itemList tbody").on("click","td",function(){
          data = taskTable.row($(this).parent('tr')).data();
          window.location.href=("InventoryListUpdate.php?itemID="+data[0]);
      });



  </script>

  </body>
</html>
