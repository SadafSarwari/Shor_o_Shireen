
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
          <div style="float:right; padding:10px 0px 0px 0px;" >
            <a class="btn btn-primary btn-sm "  href="changepwd.php">Change Password</a>
          <a class="btn btn-primary btn-sm "  href="logout.php">Log Out</a>
          </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" >
            <ul class="nav navbar-nav side-nav" >

            
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Home <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <!-- <li><a href="product.html" ><i class=" fas fa-home"></i> Home</a></li> -->
            <li class="<?php if($page=='slider'){echo "active";}?>" ><a href="slider.php"><i class="fas fa-magic"></i> Slider</a></li>
            <li class="<?php if($page=='carousel'){echo "active";}?>"><a href="carousel.php"><i class="fas fa-magic"></i> Carousel</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Products <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li  class="<?php if($page=='product'){echo "active";}?>"><a href="product.php" ><i class=" fas fa-shopping-cart"></i> Products</a></li>
            <li class="<?php if($page=='order'){echo "active";}?>"><a href="order.php"><i class="fas fa-cart-plus"></i> Order </a></li>
            <!-- <li class="<?php if($page=='order-detail'){echo "active";}?>"><a href="order_detail.php"><i class="fas fa-cart"></i> Order_detail </a></li>
            <li class="<?php if($page=='shop-detail'){echo "active";}?>"><a href="shop_detail.php"><i class="fa fa-sticky-note-o"></i> Shop-detail</a></li> -->
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> About us <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li class="<?php if($page=='about'){echo "active";}?>"><a href="about.php" ><i class=" fa fa-group"></i> About us</a></li>
            <li class="<?php if($page=='delivery_info'){echo "active";}?>"><a href="delivery_info.php"><i class="fa fa-truck"></i> Delivery Info </a></li>
              </ul>
            </li>
            <li class="<?php if($page=='register1'){echo "active";}?>"><a href="register1.php" ><i class="fa fa-user-circle"></i> Costumer </a></li>
             <li class="<?php if($page=='categories'){echo "active";}?>"><a href="categories.php" ><i class="fas fa-cubes"></i> Catagories</a></li>
            <li class="<?php if($page=='footer'){echo "active";}?>"><a href="footer.php" ><i class="fas fa-grip-horizontal"></i> Footer </a></li>
            <li class="<?php if($page=='customer_feedbacks'){echo "active";}?>"><a href="customer_feedbacks.php"><i class="fa fa-phone"></i> Contact us</a></li>
            <!-- <li><a href="contact.php" style="color:black;"><i class="fa fa-image"></i> Gallery</a></li> -->  
            
          </ul>
          </ul>

        </div><!-- /.navbar-collapse -->
      </nav>