<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['username']))
{
    header("location:/shor_o_shireen/customer/login.php");
}
    /*echo "<pre>";
    print_r($_POST);
    echo "</pre>";*/

    
        $customerid=$_SESSION['customerid'];

        
        
             if(isset($_POST['submit']))
             {
                if(isset($_SESSION['cart']))
                    {
                        $total=0;
                        foreach ($_SESSION['cart'] as $keys => $valuess) {
                           $sql_cart="select * from product";
                           $result_cart=mysqli_query($connection,$sql_cart);
                           $row_cart=mysqli_fetch_assoc($result_cart);
                           $total=$total+($valuess['price']*$valuess['user_quantity']);
                            }
                    }
                    if($total>=1000)
                    {
                        $insertorder="insert into orders (customerid,total,orderstatus) values($customerid,'$total','Order Placed')";
                $resultinsertorder=mysqli_query($connection,$insertorder);
                if($resultinsertorder)
                {
                    $order_id=mysqli_insert_id($connection);
                    foreach ($_SESSION['cart'] as $key => $values) {
                         $sql_cart="select * from product where id=$key";
                         $result_cart=mysqli_query($connection,$sql_cart);
                         $row_cart=mysqli_fetch_assoc($result_cart);
                         $pprice=$values['price'];
                         $pqty=$values['user_quantity'];
                         $pid=$values['id'];
                         $insertorderitem="insert into orderitems (orderid,productid,quantity,productprice) values ($order_id,$pid,$pqty,$pprice)";
                         $insertorderitemresult=mysqli_query($connection,$insertorderitem);
                           if($insertorderitemresult)
                           {
                                echo "<script>alert(' your order has been send will contact you ASAP')</script>";
                                unset($_SESSION['cart']);
            
    
     

                            
                            echo "<script>window.location='/shor_o_shireen/customer/index.php'</script>";
                           }
                    }
                  
                }
             }else{?>
        <div class="alert alert-danger alert-dismissible" style="margin-bottom:-3px;">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>only we deliver your order more than or equal to 1000</strong>
            
        </div>
        <?php
                    
                }
             }
                
?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Site Metas -->
    <title>Shor o Shireen - SuperMarket</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/title.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/title.png">
    <!--font awsome-->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
   <!-- Start Main Top -->
    <?php 
    $page='checkout';
    include 'header.php'; 
    ?>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <form method="POST">
    <div class="cart-box-main">
        <div class="container">
            <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <!-- <div class="title-left">
                        <h3>Login first please!</h3>
                         <h1><?php 
                            echo $_SESSION['customerid'];
                        ?></h1> 
                    </div> -->
                     
                   <!--  <form class="mt-3 collapse review-form-box" id="formLogin">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputEmail" class="mb-0">Email Address</label>
                                <input type="email" class="form-control" id="InputEmail" placeholder="Enter Email"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword" placeholder="Password"> </div>
                        </div>
                        <button type="submit" class="btn hvr-hover">Login</button>
                    </form> -->
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                   
                   <!--  <form class="mt-3 collapse review-form-box" id="formRegister">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">First Name</label>
                                <input type="text" class="form-control" id="InputName" placeholder="First Name"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Last Name</label>
                                <input type="text" class="form-control" id="InputLastname" placeholder="Last Name"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email Address</label>
                                <input type="email" class="form-control" id="InputEmail1" placeholder="Enter Email"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword1" placeholder="Password"> </div>
                        </div>
                        <button type="submit" class="btn hvr-hover">Register</button>
                    </form> -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12 mb-3">
                    <div class="checkout-address">
                        <div class="">
                           
                            <?php 

                                /*echo "<pre>";
                                print_r($_SESSION['cart']);
                                echo "</pre>";*/
                                if(isset($_SESSION['cart']))
                                {
                                    $total=0;
                                    foreach ($_SESSION['cart'] as $key => $values) {
                                       $sql_cart="select * from product where id=$key";
                                       $result_cart=mysqli_query($connection,$sql_cart);
                                       $row_cart=mysqli_fetch_assoc($result_cart);
                                       $total=$total+($values['price']*$values['user_quantity']);



                                    }
                                }
                            ?>
                        </div>
                            
                <div class="col-sm-12 col-lg-12 mb-3">
                    <div class="row" >
                        
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex col-md-8">
                                        <div class="ml-auto font-weight-bold">your checkout and product Info</div>
                                    
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> <?php echo $total;?> </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Discount</h4>
                                    <div class="ml-auto font-weight-bold"> 0 Afg </div>
                                </div>
                                <hr class="my-1">
                                
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> <?php echo $total;?> </div>
                                </div>
                                <hr> 
                                </div>
                        </div>
                        <div class="col-12 d-flex shopping-box"> 
                            <button name="submit" class="ml-auto btn hvr-hover" style="color:white;">Place Order</button>
                           
                           </div>
                    </div>
                </div>
            </div>
           </div>
          </div>

        </div>
    </div>
</form>
    <!-- End Cart -->

   <!-- Start Instagram Feed  -->
    <?php include 'footer.php'; ?>

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">GCC SDK high School ,<a href="#">Womanity Foundation | </a> Design By :
            <a href="https://html.design/">Group A (Sadaf Sarwari,Sahra Srawari and Shabnam)</a></p>
    </div>
    <!-- End copyright  -->
    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
    $('.close').click(function(){
        $('.alert').hide();
    });
</script>
</body>

</html>