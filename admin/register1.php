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
  include 'session.php';
include 'conn.php';

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
<style type="text/css">
  .pagination{
    margin-left: 250px;
  }
</style>
  </head>

  <body>

    <div id="wrapper">

     <?php
     $page='register1';

      include 'header.php';?>
      <div id="page-wrapper">
                <div class="container">
                  <div class="jumbotron">
                      <div class="card">
                          <h2> Search Customer </h2>
                      </div>    
                          <div class="card-body ">
                       <div class="panel-body">
                             <form method="POST" action="register1.php" class="form">
                                <input type="text" name="search1"  class="form-control" autocomplete="on">
                                <br>
                                <input type="submit" name="search" value="search" class="btn btn-info">
                            </form>

                          </div>
                      </section>
                  </div>
              </div>
               <table class="table table-striped table-advance table-hover">
                <tr>
                   <th  > ID </th>
                     <th > Firstname </th>
                    <th > Lastname </th>
                    <th > Username </th>
                     <th >Password</th>
                     <th > Email </th>
                     <th > Address </th>
                     <th > Phone 1</th>
                     <th > Phone 2</th>
                </tr>
                
                 <?php
                 include 'conn.php';
              if(isset($_POST['search1'])){
                  $search = $_POST['search1'];
                 
                  $sql = "SELECT*FROM ragister WHERE firstname like '%$search%'";
                  $result = mysqli_query($connection, $sql);
                   while ($row=mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['id']."</td>"
                ."<td>".$row['firstname']."</td>"
                ."<td>".$row['lastname']."</td>"
                ."<td>".$row['username']."</td>"
                ."<td>".$row['password']."</td>"
                ."<td>".$row['email']."</td>"
                ."<td>".$row['address']."</td>"
                ."<td>".$row['phone1']."</td>"
                ."<td>".$row['phone2']."</td>";
                

                }
                }
              /*  else {
               $query="select * from ragister";
                $result=mysqli_query($connection,$query);
                if (mysqli_num_rows($result)>0) {
                while ($row=mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['id']."</td>"
                ."<td>".$row['firstname']."</td>"
                ."<td>".$row['lastname']."</td>"
                ."<td>".$row['username']."</td>"
                ."<td>".$row['password']."</td>"
                ."<td>".$row['email']."</td>"
                ."<td>".$row['address']."</td>"
                ."<td>".$row['phone1']."</td>"
                ."<td>".$row['phone2']."</td>";

          
                }
               
              }
            }*/
                ?>
            </table>
                          <?php
                              include 'conn.php';
                              if(isset($_POST['del']))
                    {
                        if(isset($_POST['chk']))
                        {
                            foreach ($_POST['chk'] as $check) {
                                $del="delete from ragister where id='$check'";
                                mysqli_query($connection,$del);
                            }
                        }
                    }
                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  } else {
    $page_no = 1;
        }

  $total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2"; 

  $result_count = mysqli_query($connection,"SELECT COUNT(*) As total_records FROM `ragister`");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $seconnectiond_last = $total_no_of_pages - 1; // total page minus 1

    $result = mysqli_query($connection,"SELECT * FROM `ragister` order by id desc LIMIT $offset, $total_records_per_page");
                    
                     ?>


            <form action="register1.php" method="POST" >
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
                                          <th scope="col"> Firstname </th>
                                          <th scope="col"> Lastname </th>
                                          <th scope="col"> Username </th>
                                          <th scope="col">Password</th>
                                          <th scope="col"> Email </th>
                                          <th scope="col"> Address </th>
                                          <th scope="col"> Phone 1</th>
                                          <th scope="col"> Phone 2</th>
                                          <th scope="col">
                                            <input type="checkbox" id="checkAll">
                                          </th>
                                      </tr>
                                  </thead>
                          <?php
                              if($result)
                              {
                                  foreach($result as $row)
                                  {
                          ?>
                                  <tbody>
                                  <tr id="<?php echo $row['id'] ?>">
                                           

                                          <td> <?php echo $row['id']; ?> </td>                            
                                          <td> <?php echo $row['firstname']; ?> </td> 

                                          <td> <?php echo $row['lastname']; ?> </td>                            
                                          <td> <?php echo $row['username']; ?> </td>                            
                                          <td> <?php echo $row['password']; ?> </td>                            

                                          <td> <?php echo $row['email']; ?> </td>                            
                                          <td> <?php echo $row['address']; ?> </td>                                           
                                          <td> <?php echo $row['phone1']; ?> </td>

                                          <td> <?php echo $row['phone2']; ?> </td>                                            

                                          <!-- <td> 
                                              <button type="button" class="btn btn-success editbtn"> EDIT </button>
                                          </td>  -->
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
                      
<ul class="pagination">
  <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
  <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
  </li>
       
    <?php 
  if ($total_no_of_pages <= 10){     
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }
        }
  }
  elseif($total_no_of_pages > 10){
    
  if($page_no <= 4) {     
   for ($counter = 1; $counter < 8; $counter++){     
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }
        }
    echo "<li><a>...</a></li>";
    echo "<li><a href='?page_no=$seconnectiond_last'>$seconnectiond_last</a></li>";
    echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    }

   elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
    echo "<li><a href='?page_no=1'>1</a></li>";
    echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
           if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }                  
       }
       echo "<li><a>...</a></li>";
     echo "<li><a href='?page_no=$seconnectiond_last'>$seconnectiond_last</a></li>";
     echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
    
    else {
        echo "<li><a href='?page_no=1'>1</a></li>";
    echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }                   
                }
            }
  }
?>
    
  <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
  </li>
    <?php if($page_no < $total_no_of_pages){
    echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
    } ?>
</ul>

        
     
        


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>s

<!-- <script>

$(document).ready(function() {

    $('#datatableid').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [5, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search Your Data",
        }
    });

});

</script> -->
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
            $('#pname').val(data[1]);
            $('#price').val(data[2]);
            $('#desc').val(data[3]);
            $('#quantity').val(data[4]);
    });
});

</script>
  </body>
</html>
