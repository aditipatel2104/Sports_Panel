<?php
include 'session.php';
include 'connection.php';
?>

<?php
// function generateCoachCode()
// {
//     $date = new DateTime();
//     $timestamp = $date->format('YmdHis'); // Format: YYYYMMDDHHMMSS
//     return 'coach-' . $timestamp;
// }

// // Example usage
// $coachCode = generateCoachCode();

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
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <!-- my own link css -->
    <link rel="stylesheet" href="assets/css/mysetting.css" />


</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <?php include 'sidebar.php'; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <?php include 'topbar.php'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Rank </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Rank</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">

                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">

                                    <form class="form-sample" method="post" id="myform">



                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"> Rank Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="rname" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                       


                                        <button type="submit" class="btn btn-primary mr-2" name="btn">Submit</button>
                                        <button class="btn btn-dark">Cancel</button>
                                    </form>
                                    <?php
                                    if (isset($_POST["btn"])) {


                                        $name = strtoupper($_POST["rname"]);
                                       

                                        // Check if the state name already exists
                                        $check_sql = "SELECT * FROM tbl_rank WHERE UPPER(r_name) = '$name'";
                                        $check_res = mysqli_query($conn, $check_sql) or die(mysqli_error($conn));

                                        if (mysqli_num_rows($check_res) > 0) {
                                            // State name already exists
                                            echo "This rank  already exists. Please try a different name.";
                                        } else {
                                            $sql = "INSERT INTO tbl_rank (r_name) VALUES ('$name');";
                                            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                            if ($res == 1) {
                                                echo "Successfully inserted!";
                                                echo "<script>window.location='rank_view.php'; </script>";
                                            } else {
                                                echo "please try again!";
                                            }
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include 'footer.php'; ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/file-upload.js"></script>
    <script src="assets/js/typeahead.js"></script>
    <script src="assets/js/select2.js"></script>
    <!-- End custom js for this page -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"> </script>
    <script>
        $(document).ready(function() {
            $("#myform").validate({
                rules: {
                    rname: {
                        required: true,
                        minlength: 2
                    }
                },
                messages: {
                    rname: {
                        required: "Please enter rank",
                        minlength: "Game type must be at least 2 characters long"
                    }
                }
            });
        });
    </script>
</body>

</html>