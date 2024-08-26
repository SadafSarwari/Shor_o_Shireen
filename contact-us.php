<?php
include "conn.php";
session_start();
if(isset($_POST['save']))
{
    $address = $_POST['address'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];
    

    $query = "INSERT INTO contact_us  VALUES (null,'$address','$email','$subject','$msg')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>Your Massage Have Been Send !</strong>
            
        </div>
     <?php
        
        
    }
    else
    {?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>Your Massage Have Not Been Send !</strong>
            
        </div>
        <?php
    
        
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
 <?php if($_SESSION["lang"] == "local/fa.php") { ?>
    <style type="text/css">
header,footer,p, h3, a, li ,ul , h2 , h1 , span , input , textarea{
    direction: rtl;
}


.glyphicon  {
    font-family:'Glyphicons Halflings' !important;
}
</style>
<?php } ?>

<?php if($_SESSION["lang"] != "local/en.php") { ?>
<style type="text/css">
.navbar a {
    font-size:20px;
}
#collapse {
    padding-top:10px;
}
</style>
<?php } ?>
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
    $page='contact-us';
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
                    <h2><?php echo $menu_contact;?></h2>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2><?php echo $gt;?></h2>
                      
                        <form  action="contact-us.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="<?php echo $am;?>" required data-error="Please enter your address">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" placeholder="<?php echo $em;?>" id="email" class="form-control" name="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="<?php echo $sm;?>"  required data-error="Please enter your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="msg" name="msg" placeholder="<?php echo $ym;?>" rows="4" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <!-- <button class="btn hvr-hover" id="submit" type="submit">Send Message</button> -->
                                        <input type="submit" name="save"  class="btn hvr-hover">
                                       <!--  <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                <?php
                                  include 'conn.php';
                                  $query="select * from footer limit 1";
                                  $query_run=mysqli_query($connection,$query);
                                  $count=mysqli_num_rows($query_run);
                                  if ($count > 0 ) {
                                  while ($row=mysqli_fetch_array($query_run)) {
                                 $address = $row['address'];
                                 $email = $row['email'];
                                 $phone = $row['phone'];
                                 $about = $row['about'];
                                 
                                  ?>
                    <div class="contact-info-left">
                        <h2><?php echo $conin;?></h2>
                        <p><?php echo $row['about'];?> </p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: <?php echo $row['address'];?></p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <?php echo $row['phone'];?></a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="http://www.gmail.com/"><?php echo $row['email'];?></a></p>
                            </li>
                        </ul>
                    </div>
                    <?php
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3286.7685092970005!2d69.19708471483338!3d34.534092480477526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4891da06cb223622!2sShor%20oo%20sheerin!5e0!3m2!1sen!2s!4v1597416071438!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

     <!-- Start Instagram Feed  -->
    <?php include 'footer.php'; ?>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">GCC SDK high School ,<a href="#">Womanity Foundation | </a> Design By :
            <a href="https://html.design/">Group A (Sadaf Sarwari,Sahra Srawari and Shabnam mohammadi)</a></p>
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