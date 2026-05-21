<?php
include 'session.php';
include 'connection.php';
?>

<?php
function generateCollageCode()
{
    $date = new DateTime();
    $timestamp = $date->format('YmdHis'); // Format: YYYYMMDDHHMMSS
    return 'collage-' . $timestamp;
}

// Example usage
$collagecode = generateCollageCode();

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
                        <h3 class="page-title"> New Add Collage </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Collage</li>
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
                                                    <label class="col-sm-3 col-form-label">Collage Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="collage_code" value="<?php echo $collagecode; ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Collage Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="clgname" />
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">College Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="clgaddress" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">State </label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        <select class="form-control" name="stid">
                                                            <?php
                                                            $sql = "SELECT * FROM tbl_state_details;";
                                                            $res = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo '<option value=" ' . $row["st_id"] . '">' . $row["state_name"] . '</option>';
                                                            }

                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Collage Grade</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="clggrade" id="gradeA" value="A" checked>
                                                            <label class="form-check-label" for="gradeA">A</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="clggrade" id="gradeB" value="B">
                                                            <label class="form-check-label" for="gradeB">B</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="clggrade" id="gradeC" value="C">
                                                            <label class="form-check-label" for="gradeC">C</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="clggrade" id="gradeD" value="D">
                                                            <label class="form-check-label" for="gradeD">D</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Course </label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        
                                                            <?php
                                                            $sql = "SELECT * FROM tbl_clg_courses;";
                                                            $res = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                               ?>
                                                                  <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="clgcourse"  value=" <?php echo $row["course_id"] ?>">  <?php echo $row["course_name"] ?>
                             </label>
                            </div>
                                                               <?php
                                                            }

                                                            ?>

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2" name="btn">Submit</button>
                                        <button class="btn btn-dark">Cancel</button>
                                    </form>
                                    <?php
                                    if (isset($_POST["btn"])) {

                                        $code = $_POST["collage_code"];
                                        $name = strtoupper($_POST["clgname"]);
                                        $grade = $_POST["clggrade"];
                                        $address = $_POST["clgaddress"];
                                        $id = $_POST["stid"];
                                        $course = $_POST["clgcourse"];
                                        // Check if the state name already exists
                                        $check_sql = "SELECT * FROM tbl_collage_details WHERE UPPER(cl_name) = '$name'";
                                        $check_res = mysqli_query($conn, $check_sql) or die(mysqli_error($conn));

                                        if (mysqli_num_rows($check_res) > 0) {
                                            // State name already exists
                                            echo "The collage name already exists. Please try a different name.";
                                        } else {
                                            // $id=$_POST["stdid"];
                                            $sql = "INSERT INTO tbl_collage_details (cl_code,cl_name,cl_address,cl_grade,st_id,course_id) VALUES ('$code','$name','$address','$grade','$id','$course');";
                                            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                            if ($res == 1) {
                                                echo "Successfully inserted!";
                                                echo "<script>window.location='clg_view.php'; </script>";
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
            collage_code: {
                required: true,
                minlength: 4,
            },
            clgname: {
                required: true,
                minlength: 5,
            },
            clgaddress: {
                required: true,
            },
            clggrade: {
                required: true,
            },
            stid: { // Corrected name according to your field "stid"
                required: true,
                //digits: true,
            },
            'clgcourse[]': { // Target checkboxes by name for array
                required: true,
            }
        },
        messages: {
            collage_code: {
                required: "Please enter a college code",
                minlength: "College code must be at least 4 characters long."
            },
            clgname: {
                required: "Please enter the college name",
                minlength: "College name must be at least 5 characters long."
            },
            clgaddress: {
                required: "Please enter a valid address",
            },
            clggrade: {
                required: "Please select a grade"
            },
            stid: {
                required: "Please select a state",
                //digits: "Please select a valid state."
            },
            'clgcourse[]': { // Custom message for checkboxes
                required: "Please select at least one course"
            }
        }
    });
});

    </script>
</body>

</html>