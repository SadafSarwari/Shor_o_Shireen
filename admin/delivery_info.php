<?php

 
  if(isset($_SESSION["username"]))
{

   if((time() - $_SESSION['last_login_timestamp']) > 15*60)

  {
     header("location:logout.php");


  }
  else
  {
    $_SESSION['last_login_timestamp'] =time();
  
  }
}
  else
  { 
    header('loaction:login.php');
  }
  

?>
<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shor oo Shireen</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>

  <body>

    <div id="wrapper">

     <?php 
     $page='delivery_info';
     include 'header.php';?>
       <div id="page-wrapper">
     
              <!-- Modal -->
              <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Delivery Information Data </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <form action="delivery_infoinsertcode.php" method="POST" enctype="multipart/form-data">

                          <div class="modal-body">
                              <div class="form-group">
                                  <label> image </label>
                                  <input type="file" name="image" class="form-control" placeholder="Enter Image" required>
                              </div>

                              <div class="form-group">
                                  <label> Title </label>
                                  <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                              </div>

                              <div class="form-group">
                                  <label> Information </label>
                                  <input type="text" name="information" class="form-control" placeholder="Enter Information" required>
                              </div>

                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                          </div>
                      </form>

                  </div>
                </div>
              </div>




              <!-- ####################################################################################################################### -->

              <!-- EDIT POP UP FORM (Bootstrap MODAL) -->

              <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"> Edit Delivery Information Data </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <form action="delivery_infoupdatecode.php" method="POST" enctype="multipart/form-data">

                          <div class="modal-body">

                              <input type="hidden" name="update_id" id="update_id">

                              <div class="form-group">
                                  <label> Image </label>
                                  <input type="file" name="image" id="image" class="form-control" placeholder="Enter Image">
                              </div>

                              <div class="form-group">
                                  <label> Title </label>
                                  <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                              </div>

                              <div class="form-group">
                                  <label> Information </label>
                                  <input type="text" name="information" id="information" class="form-control" placeholder="Enter Information">
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                          </div>
                      </form>

                  </div>
                </div>
              </div>

              <!-- #################################################################################################### -->

              <div class="container">
                  <div class="jumbotron">
                      <div class="card">
                          <h2> Change Your Delivery Information </h2>
                      </div>    
                      <div class="card">
                          <div class="card-body">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                                  ADD DATA
                              </button>
                          </div>
                      </div>

                      <div class="card">
                          <div class="card-body ">

                          <?php
                              include 'conn.php';

                              if(isset($_POST['del']))
                    {
                        if(isset($_POST['chk']))
                        {
                            foreach ($_POST['chk'] as $check) {
                                $del="delete from delivery_info where id='$check'";
                                mysqli_query($connection,$del);
                            }
                        }
                    }
                              $query = "SELECT * FROM delivery_info";
                              $query_run = mysqli_query($connection, $query);
                    
                     
                ?>
            <form action="delivery_info.php" method="POST" >
                              <table id="datatableid" class="table table-striped thead-light table-hover">
                                  <thead>
                                    <tr>
                                        <td colspan="5">
                                            <input type="submit" name="del" value="Delete" class="btn btn-danger" onclick="return confirm('Are u sure')">
                                        </td>
                                      </tr>
                                      <tr class="table-primary">
                                          <!-- <th scope="col">
                                            <input type="checkbox" id="checkAll">
                                          </th> -->
                                          <th scope="col" > ID </th>
                                          <th scope="col"> Image </th>
                                          <th scope="col"> Title </th>
                                          <th scope="col"> Information </th>
                                          <th scope="col"> EDIT </th>
                                          <th scope="col">
                                            <input type="checkbox" id="checkAll">
                                          </th>
                                      </tr>
                                  </thead>
                          <?php
                              if($query_run)
                              {
                                  foreach($query_run as $row)
                                  {
                          ?>
                                  <tbody>
                                  <tr id="<?php echo $row['id'] ?>">
                                    <!-- <td>
                                          <input type="checkbox" class="checkItem" value="<?=$row['id']?>" name="idd[]">
                                              
                                          </td> -->

                                          <td> <?php echo $row['id']; ?> </td>                            
                                          <td> <?php echo "<img src='".$row['image']."' width='70' heigth='70'>" ?> </td>                            
                                          <td> <?php echo $row['title']; ?> </td>                            
                                          <td> <?php echo $row['information']; ?> </td>                                            
                                          <td> 
                                              <button type="button" class="btn btn-success editbtn"> EDIT </button>
                                          </td> 
                                          <td>
                                          <input type="checkbox" class="checkItem" value="<?=$row['id']?>" name="chk[]">
                                              
                                          </td>
                                      </tr>
                                  </tbody>
                          <?php           
                                  }
                              }
                              else 
                              {
                                  echo "No Record Found";
                              }
                          ?>
                              </table>
                            </form>
                          </div>
                      </div>


                  </div>
              </div>


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    

    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#checkAll").click(function () {
if($(this).is(":checked"))
{
    $(".checkItem").prop('checked',true);
}else{
     $(".checkItem").prop('checked',false);
}
});
});
</script>

<script>

$(document).ready(function () {
    $('.editbtn').on('click', function() {
        
        $('#editmodal').modal('show');

        
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#image').val(data[1]);
            $('#title').val(data[2]);
            $('#information').val(data[3]);
            
    });
});

</script>
  </body>
</html>
