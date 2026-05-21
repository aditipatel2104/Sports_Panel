<?php
include('connection.php');
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
              <h3 class="card-title text-left mb-3">Registration</h3>
              <form method="post" id="myform">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control p_input" name="unm">
                </div>
                <div class="form-group">
                  <label>Email *</label>
                  <input type="email" class="form-control p_input" name="uemail">
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input type="password" class="form-control p_input" name="password">
                </div>
                <div class="form-group">
                  <label>Confirm Password *</label>
                  <input type="password" class="form-control p_input" name="cpass">
                </div>
                <div class="form-group">
                  <label>Contact *</label>
                  <input type="tel" class="form-control p_input" name="contact">
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Gender</label>
                  <div class="col-sm-4">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="Male" checked> Male </label>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="Female"> Female </label>
                    </div>
                  </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">

                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn" name='btn'>Registration</button>
                </div>

                <p class="sign-in">Already have an Account!<a href="login.php"> Sign in</a></p>

                <?php
                if (isset($_POST["btn"])) {
                  $nm = $_POST["unm"];
                  // echo $nm;
                  $mail = $_POST["uemail"];
                  // echo $mail;
                  $pass = $_POST["password"];
                  // echo $pass;
                  $cpass = $_POST["cpass"];
                  // echo $cpass;
                  $tel = $_POST["contact"];
                  // echo $tel;
                  $gen = $_POST["membershipRadios"];

                  $checkqry = "Select * from userlogin where u_email='$mail';";
                  $checkqry = mysqli_query($conn, $checkqry);

                  if (mysqli_num_rows($checkqry) > 0) {
                    echo "Your Email already exist!";
                  } else {
                    $sql = "INSERT INTO userlogin (u_type,u_name,u_email,u_pass,u_contact,u_gender,is_active) VALUES ('User','$nm','$mail','$pass','$tel','$gen','yes');";
                    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    if ($res) {
                      echo "Successfully inserted.";
                      echo "<script>window.location='login.php'; </script>";
                    } else {
                      echo "You have an issue in registration.";
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
    $(document).ready(function() {
      $("#myform").validate({
        rules: {
          unm: {
            required: true,
            minlength: 4
          },
          uemail: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 6
          },
          cpass: {
            required: true,
            equalTo: "[name='password']"
          },
          contact: {
            required: true,
            minlength: 10,
            maxlength: 11,
            digits: true
          },
          gender: {
            required: true

          }

        },
        messages: {
          unm: {
            required: "Please Enter a username",
            minlength: "Username must be at least 4 characters long."
          },
          uemail: {
            required: "Please enter en email  ",
            minlength: "please enter a valid  email address."
          },
          password: {
            required: "Please provide a password",
            minlength: "password must be atleast 6 characters long."
          },
          cpass: {
            required: "please confirm your password.",
            equalTo: "password do not match."

          },
          contact: {
            required: "Please enter a contact number",
            minlength: "Contact number must be at least 10 digits long",
            maxlength: "Contact number cannot exceed 11 digits",
            digits: "Contact number must contain only digits"
          },
          membershipRadios: {
            required: "Please select a gender"
          }


        }

      });
    });
  </script>
</body>

</html>