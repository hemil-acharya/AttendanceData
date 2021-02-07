

<?php

session_start();
include('database.inc.php');
include('function.inc.php');
$msg="";
if(isset($_POST['submit'])){
  $username=get_safe_value($_POST['username']);
  $password=get_safe_value($_POST['password']);
  
  $sql="select * from admin where username='$username' and password='$password'";
  $res=mysqli_query($con,$sql);
  if(mysqli_num_rows($res)>0){
    $row=mysqli_fetch_assoc($res);
    $_SESSION['IS_LOGIN']='yes';
    $_SESSION['ADMIN_USER']=$row['name'];
    redirect('index.php');
  }else{
    $msg="Please enter valid login details";
  }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ganpat University || Harsh Gandhi</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <h2><span style="color: red;">G</span>anpat University</h2>
                </div>
                <h4>Hi!! admin How are you</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>

                <form class="pt-3" method="post">

                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                 
                   <input type="submit" class="btn btn-primary btn-user btn-block" value="Login" name="submit"/>

                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
           <div class="login_msg"><?php echo $msg?></div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>