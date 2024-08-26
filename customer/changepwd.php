<?php include 'session.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>change password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>

<?php
/*session_start();
if (isset($_POST['change_password'])) {
    header('location:change_password.php');
    
}
else{
  header('location:login.php');
}
*/  

$username=$_SESSION['username'];
if($username)
{
    if (isset($_POST['login'])) {
            $oldpass=$_POST['oldpass'];
            $newpass=$_POST['newpass'];
            $retypepass=$_POST['retypepass'];
            include "conn.php";
            $result=mysqli_query($connection,"select password from ragister where username='$username'");
            while ($row= mysqli_fetch_assoc($result)) {
        $pass=$row['password'];
        if($pass==$oldpass)
        {
            if($newpass==$retypepass)
            {
                $update="update ragister set password='".$retypepass."' where username='$username'";
                if(mysqli_query($connection,$update))
                {
                    echo '<script> alert("Your password has been set successfuly!"); </script>';
                    echo "<script>window.location='dashboard.php'</script>";
                  
                }else{
                    echo '<script> alert("Password did not change!"); </script>';
                }

            }else{
                 echo '<script> alert("New password and Retype Password does not matched"); </script>';
                 echo "<script>window.location='changepwd.php'</script>";

            }
        }else{
             echo '<script> alert("Your old and new password does not matched please try again"); </script>';
                 echo "<script>window.location='changepwd.php'</script>";

        }
        }


    }
else{
    echo '
  <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                    <span class="login100-form-title-1">
                        Change Password
                    </span>
                </div>

                <form class="login100-form validate-form" method="POST">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Old Password is required">
                        <span class="label-input100">Old Password</span>
                        <input class="input100" type="password" name="oldpass" placeholder="Enter Old password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "New Password is required">
                        <span class="label-input100">New Password</span>
                        <input class="input100" type="password" name="newpass" placeholder="Enter new password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Retype Password</span>
                        <input class="input100" type="password" name="retypepass" placeholder="Retype Password">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">

                    <input type="submit" name="login" class="login100-form-btn" value="Change">   
                    </div>
                </form>
            </div>
        </div>
    </div>
      ';
}
}


  
