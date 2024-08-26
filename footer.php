
    


<!DOCTYPE html>
<html>

<body>

    <!-- Start Instagram Feed  -->
    
    <div class="instagram-box">
    <?php
         include 'conn.php';
         $select="select image from carousel limit 10";
         $select_run=mysqli_query($connection,$select);
         $count=mysqli_num_rows($select_run);
    ?> 
        <div class="main-instagram owl-carousel owl-theme">
            
<?php while($row=mysqli_fetch_array($select_run)){?>
            <div class="item">
                 <div class="ins-inner-box">
                <img src="admin/<?=$row['image'];?>" alt="" style="width: 100%;height:300px;">
                <div class="hov-in">
                        <i class="fab fa-opencart"></i>
                    </div>
            </div>
            </div>

        <?php }?>
    </div>
           

</div>
<?php include("conn.php"); 

    if(!isset($_SESSION["lang"])) { 
        $_SESSION["lang"] = "local/en.php";
    }

    if(isset($_POST["lang"])) {
        $lang = $_POST["lang"];
        if($lang == "en") {
            $_SESSION["lang"] = "local/en.php";
        }
        else if($lang == "fa") {
            $_SESSION["lang"] = "local/fa.php";
        }
        else if($lang == "ps") {
            $_SESSION["lang"] = "local/ps.php";
        }
    }

    include($_SESSION["lang"]);
?>

        

    <!-- End Instagram Feed  -->
<!DOCTYPE html>
<html>

<head>
     <?php if($_SESSION["lang"] == "local/fa.php") { ?>
    <style type="text/css">

.glyphicon  {
    font-family:'Glyphicons Halflings' !important;
}

<style type="text/css">
.navbar a {
    font-size:20px;
}
#collapse {
    padding-top:10px;
}
</style>
<?php } ?>
    <title></title>
</head>
<body>



    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
            <?php
                                  include 'conn.php';
                                  $query="select * from footer limit 1";
                                  $query_run=mysqli_query($connection,$query);
                                  $count=mysqli_num_rows($query_run);
                                  if ($count > 0 ) {
                                  while ($row=mysqli_fetch_array($query_run)) {
                                 $address = $row['address'];
                                 $what_no = $row['what_no'];
                                 $fb = $row['fb'];
                                 $email = $row['email'];
                                 $phone = $row['phone'];
                                 $delivery_date = $row['delivery_date'];
                                 $delivery_time = $row['delivery_time'];
                                 $about = $row['about'];
                                 $today = $row['today'];    
                                 $totime = $row['totime'];
                                 $close = $row['close'];
                                  ?>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3><?php echo $business;?></h3>
                            <ul class="list-time">
                                <li>From: <?php echo $row['delivery_date'];?><br><span>To: <?php echo $row['today'];?></span></li>
                                <li><?php echo $row['delivery_time'];?> <span>To <?php echo $row['totime'];?></span></li>
                                <li>Close: <?php echo $row['close'];?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3><?php echo $news;?></h3>
                            <form class="newsletter-box">
                                <div class="form-group">
                                    <input class="" type="email" name="Email" placeholder="Email Address*" />
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <button class="btn hvr-hover" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3><?php echo $social;?></h3>
                            <p><?php echo $socialaa;?></p>
                            <ul>
                                <li><a href="https://www.facebook.com"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li title="0788026301"><a href="https://web.whatsapp.com"><i class="fab fa-whatsapp" aria-hidden="true" ></i></a></li>
                                <li><a href="https://www.instagram.com"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget text-justify">
                            <h4><?php echo $aboutsh;?></h4>
                            <p><?php echo $row['about'];?></p>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4><?php echo $info;?></h4>
                            <ul>
                                
                              <!--  <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>-->
                                <li><a href="delivery_info.php"><?php echo $dlivinfo;?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4><?php echo $menu_contact;?></h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i> Address: <?php echo $row['address'];?></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <?php echo $row['phone'];?><a href="tel:0202300323"></a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: 
                                    <?php echo $row['email'];?> 
                                    <a href="gmail.com"></a></p>
                                </li>
                                <li>
                                    <p><i class="fab fa-whatsapp"></i>Whatsapp: <?php echo $row['what_no'];?> </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-facebook"></i>Facebook: <?php echo $row['fb'];?> </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                            }
                        }
                        ?>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    
</body>
</html>