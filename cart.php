<?php 
session_start();
if(isset($_GET["action"]))
{
    if($_GET["action"]=="delete")
    {
        foreach ($_SESSION['cart'] as $key => $value) {
            if($value['id']==$_GET['id'])
            {
                unset($_SESSION['cart'][$key]);
                ?>
        <div class="alert alert-danger alert-dismissible" style="margin-bottom:-3px;">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>product has been removed!</strong>
            
        </div>
     <?php
                

            }
            # code...
        }
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
    $page='cart';
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
                    <h2>Cart</h2>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                       <form method="GET">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                   <!--  <th>Quantity</th> -->
                                    <th>User Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'conn.php';
                                    
                                      if(!empty($_SESSION['cart']))
                                      {
                                        $subtotal=0;
                                        $total=0;
                                        foreach ($_SESSION['cart'] as $keys => $values) {
                                            $total=$total+($values['price']*$values['user_quantity']);
                                            $subtotal=$values['user_quantity']*$values["price"];
                                            

                                ?>
                                <tr>
                                   
                                    <td class="name-pr">
                                        
                                    <?php echo $values["pname"];?>
                                
                                    </td>
                                    <td class="price-pr">
                                       AFN &nbsp;&nbsp;&nbsp;<?php echo $values["price"];?>
                                    </td>
                                    
                                   <!--  <td>
                                        <?php echo $values["quantity"];?>
                                    </td> -->

                                    <td>
                                        <?php echo $values["user_quantity"];?>
                                    </td>
                                    <td class="total-pr">
                                        <p>AFN &nbsp;&nbsp;&nbsp;<?php echo $values['user_quantity']*$values["price"];?></p>
                                    
                                    <td class="remove-pr">
                                        <a href="cart.php?action=delete&id=<?php echo $values['id'];?>">
                                    <i class="fas fa-times"></i>
                                    </a>
                                    </td>
                                </tr>
                            <?php
                            

                             }}?>
                            
                            </tbody>
                        </table>
                  </form>
                    </div>
                </div>
            </div>

           <!--  <div class="row my-5" style="margin-right:450px;">
                
                <div class="col-lg-12 col-sm-12">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div>
            </div> -->

            <div class="row my-5" style="margin-right:450px;">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        
                        <!-- <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> 0 Afg</div>
                        </div> -->
                        <hr class="my-1">
                        
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Total</h5>
                            <div class="ml-auto h5">AFN &nbsp;&nbsp;&nbsp; <?php echo $total;?> </div>
                        </div>

                        <hr> </div>
                </div>

                <div class="col-12 d-flex shopping-box"><a href="checkout.php" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

 <?php include 'footer.php'; ?>
    <!-- End Footer  -->

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