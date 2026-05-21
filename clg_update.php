<?php
include 'session.php';
include 'connection.php';
?>

<?php
function generateCoachCode()
{
    $date = new DateTime();
    $timestamp = $date->format('YmdHis'); // Format: YYYYMMDDHHMMSS
    return 'collage-' . $timestamp;
}

// Example usage
$collagecode = generateCoachCode();

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
                        <h3 class="page-title"> Edit Collage </h3>
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
                                    <?php

if(isset($_GET["up_id"]))
{
    $id=$_GET["up_id"];
    $sql = "SELECT * FROM tbl_collage_details where cl_id=$id";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
 ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Collage Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="collage_code" value="<?php echo $row["cl_code"]; ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Collage Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="clgname"  value="<?php echo $row["cl_name"]; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">College Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="clgaddress" value="<?php echo $row["cl_address"]; ?>" />
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
                                                            while ($row1 = mysqli_fetch_assoc($res)) {

                                                                if($row1["st_id"]==$row["st_id"])
                                                                {
                                                                echo '<option value=" ' . $row1["st_id"] . '" selected >' . $row1["state_name"] . '  </option>';
                                                                }
                                                                else
                                                                {
                                                                echo '<option value=" ' . $row1["st_id"] . '">' . $row1["state_name"] . '  </option>';

                                                                }
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
                                                            <input type="radio" class="form-check-input" name="clggrade" id="gradeA" value="A" <?php echo ($row['cl_grade'] == 'A') ? "checked" : ""; ?>>
                                                            <label class="form-check-label" for="gradeA">A</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="clggrade" id="gradeB" value="B"  <?php echo ($row['cl_grade'] == 'B') ? "checked" : ""; ?>>
                                                            <label class="form-check-label" for="gradeB">B</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="clggrade" id="gradeC" value="C"  <?php echo ($row['cl_grade'] == 'C') ? "checked" : ""; ?>>
                                                            <label class="form-check-label" for="gradeC">C</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="clggrade" id="gradeD" value="D"  <?php echo ($row['cl_grade'] == 'D') ? "checked" : ""; ?>>
                                                            <label class="form-check-label" for="gradeD">D</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Courses</label>
        <div class="col-sm-9">
            <?php
            $sql = "SELECT * FROM tbl_clg_courses;";
            $res = mysqli_query($conn, $sql);
            while ($row3 = mysqli_fetch_assoc($res)) {
                $isChecked = $row3["course_id"] == $row["course_id"] ? 'checked' : '';
                echo '
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="clgcourse" value="' . $row3["course_id"] . '" ' . $isChecked . '>
                    <label class="form-check-label">' . $row3["course_name"] . '</label>
                </div>';
            }
            ?>
        </div>
    </div>
</div>
                                        </div>
<?php 
   }
}
    
?>
                                        <button type="submit" class="btn btn-primary mr-2" name="btn">Update</button>
                                        <button class="btn btn-dark">Cancel</button>
                                    </form>
                                    <?php
                                    if (isset($_POST["btn"])) {

                                        $code = $_POST["collage_code"];
                                        $name = strtoupper($_POST["clgname"]);
                                        $grade = $_POST["clggrade"];
                                        $address = $_POST["clgaddress"];
                                        $ssid = $_POST["stid"];
                                        $course = $_POST["clgcourse"];
                                        // echo $code . " " . $name  ." " .$grade . " " . $address . " " . $ssid . " " . $course . " " .$id;

                                       $sql = "UPDATE tbl_collage_details SET cl_name='$name',cl_address='$address',cl_grade='$grade',st_id='$ssid',course_id='$course' WHERE cl_id = $id";
                                        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                        if($res==1)
                                        {
                                          echo "<script>window.location = 'clg_view.php';</script>";
                                        } else{
                                          echo "Error updating record: " . mysqli_error($conn);
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
               // digits: true,
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