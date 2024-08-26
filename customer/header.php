
          <?php
             session_start();
             if(!isset($_SESSION['IS_LOGIN'])){
             ?>
               <script>
                window.location.href='login.php';
               </script>
               <?php
             }
            ?>
<!-- Sidebar -->


      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Shor Oo Shireen</a>
          <a href="" class="navbar-brand"><?php echo "Hello"." ".$_SESSION['username'];?></a>
          
          <a class="btn btn-primary" style="margin-left:700px;margin-top:6px;" href="changepwd.php">Change Password</a>
          <a class="btn btn-primary" style="margin-top:6px;" href="logout.php">Log Out</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav" >
              <li class="<?php if($page=='dashboard'){echo 'active';}?>"><a href="dashboard.php"><i class="fa fa-user"></i> Dashboard</a></li>
            <li class="<?php if($page=='index'){echo 'active';}?>" ><a href="index.php"><i class="fa fa-user"></i> Orders</a></li>
             <li class="<?php if($page=='index'){echo 'active';}?>" ><a href="/shor_o_shireen/index.php"><i class="fa fa-user"></i> Go to Shoping section</a></li>
             </ul>
        </div><!-- /.navbar-collapse -->
      </nav>