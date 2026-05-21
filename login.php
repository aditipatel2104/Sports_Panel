<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="assets/css/mysetting.css" />

  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form method="post" id="loginForm">
                  <div class="form-group">
                    <label>Username or email *</label>
                    <input type="text" class="form-control p_input" name="unm">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input" name="password">
                  </div>
                  <!-- <div class="form-group d-flex align-items-center justify-content-between">
                  
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div> -->
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn" name="btn">Login</button>
                  </div>
                  <!-- <p class="sign-up">Don't have an Account?<a href="Registration.php"> Sign Up</a></p> -->
          <?php
          
          if(isset($_POST["btn"]))
          {
            $nm=$_POST["unm"];
            $pass=$_POST["password"];
            
            $sql="select * from userlogin where u_email='$nm' and u_pass='$pass';";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count==1)
            {

              $_SESSION["isLogin"]="Yes";
              $_SESSION["AdminUserName"]=$nm;
              // echo $_SESSION["isLogin"] . " " .$_SESSION["UserName"];
              // echo "Valid user <br/>";
              echo "<script> window.location = 'index.php'; </script>";
              
            }
            else{


              $sql="select * from tbl_players_details where p_email='$nm' and p_pass='$pass'";
              $res = mysqli_query($conn,$sql);
              $count = mysqli_num_rows($res);
              if($count==1)
              {
  
                $_SESSION["isLogin"]="Yes";
                $_SESSION["UserName"]=$nm;
              
                // echo $_SESSION["isLogin"] . " " .$_SESSION["UserName"];
                // echo "Valid user <br/>";
                echo "<script> window.location = 'User_panel/index.php'; </script>";
                
              }
              else{

              echo "Invalid user";
              }
            }

          
          }
            ?>
                </form>

              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"> </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"> </script>
     <script>
      $(document).ready(function(){
        $("#loginForm").validate({
          rules: {
            unm: {
              required: true,
              email: true
             // pattern:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
            },
            password: {
              required: true,
              minlength: 8
            }
          },
          messages: {
            unm: {
              required: "Please enter your username or email",
              email: "Please enter a valid email address"
            },
            password: {
              required: "Please provide a password",
              minlength: "Password must be at least 8 characters long"
            }
          }
        });
      });
    </script>
  </body>
</html>