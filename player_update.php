<?php include 'session.php'; ?>
<?php include 'connection.php';
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
                        <h3 class="page-title"> New Add Player </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Players</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">

                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">

                                    <form class="form-sample" method="post" id="myform">

                                        <?php

                                        if (isset($_GET["up_id"])) {
                                            $id = $_GET["up_id"];
                                            $sql = "SELECT * FROM tbl_players_details where p_id=$id";
                                            $res = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($res)) {
                                        ?>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Player Code</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="player_code" value="<?php echo $row["p_code"] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                              
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Player Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="pname" value="<?php echo $row["p_name"]; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">BirthDate </label>
                                                            <div class="col-sm-9">
                                                                <input type="date" class="form-control" name="pdate" value="<?php echo $row["p_birthdate"]; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Age </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="page" value="<?php echo $row["p_age"]; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Course</label>
                                                            <div class="col-sm-9">
                                                                <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                                <select class="form-control" name="cid">
                                                                    <?php
                                                                    $sql = "SELECT * FROM tbl_clg_courses;";
                                                                    $res = mysqli_query($conn, $sql);
                                                                    while ($row1 = mysqli_fetch_assoc($res)) {

                                                                        if ($row1["course_id"] == $row["course_id"]) {
                                                                            echo '<option value=" ' . $row1["course_id"] . '"  selected >' . $row1["course_name"] . '</option>';
                                                                        } else {
                                                                            echo '<option value=" ' . $row1["course_id"] . '"  >' . $row1["course_name"] . '</option>';
                                                                        }
                                                                    }

                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label"> Address </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="paddress" value="<?php echo $row["p_address"] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Gender</label>
                                                        <div class="col-sm-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label">

                                                                    <input type="radio" class="form-check-input" name="pgen" id="membershipRadios1" value="Male" <?php echo ($row['p_gender'] == 'Male') ? 'checked' : ''; ?>> Male </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="pgen" id="membershipRadios2" value="Female" <?php echo ($row['p_gender'] == 'Female') ? 'checked' : ''; ?>> Female </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label"> Contact </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="pcontact" value="<?php echo $row["p_contact"] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label"> Email </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="pemail" value="<?php echo $row["p_email"] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                            

                                                
                                                    <?php
                                                    // Function to generate a random password with letters and digits
                                                    function generateRandomPassword($length = 8)
                                                    {
                                                        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                                                        $charactersLength = strlen($characters);
                                                        $randomString = '';
                                                        for ($i = 0; $i < $length; $i++) {
                                                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                                                        }
                                                        return $randomString;
                                                    }

                                                    // Generate an 8-character password
                                                    $pwd = generateRandomPassword(8);
                                                    ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label"> Password </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="ppass" value="<?php echo $pwd; ?>" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                

                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Sports</label>
                                                        <div class="col-sm-9">
                                                            <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                            <select class="form-control" name="sid">
                                                                <?php
                                                                $sql = "SELECT * FROM tbl_sports_details;";
                                                                $res = mysqli_query($conn, $sql);
                                                                while ($row2 = mysqli_fetch_assoc($res)) {
                                                                    if ($row2["s_id"] == $row["s_id"]) {
                                                                        echo '<option value=" ' . $row2["s_id"] . '"  selected >' . $row2["s_name"] . '</option>';
                                                                    } else {

                                                                        echo '<option value=" ' . $row2["s_id"] . '">' . $row2["s_name"] . '</option>';
                                                                    }
                                                                }

                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Collage</label>
                                                        <div class="col-sm-9">
                                                            <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                            <select class="form-control" name="clid">
                                                                <?php
                                                                $sql = "SELECT * FROM tbl_collage_details;";
                                                                $res = mysqli_query($conn, $sql);
                                                                while ($row3 = mysqli_fetch_assoc($res)) {
                                                                    if ($row3["cl_id"] == $row["cl_id"]) {
                                                                        echo '<option value=" ' . $row3["cl_id"] . '"  selected >' . $row3["cl_name"] . '</option>';
                                                                    } else {

                                                                        echo '<option value=" ' . $row3["cl_id"] . '">' . $row3["cl_name"] . '</option>';
                                                                    }
                                                                }

                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                        <?php
                                            }
                                        }
                                        if (isset($_POST["btn"])) {
                                            $code = $_POST["player_code"];
                                            $name = $_POST["pname"];
                                            $date = $_POST["pdate"];
                                            $age = $_POST["page"];
                                            $coid = $_POST["cid"];
                                            $address = $_POST["paddress"];
                                            $gender = $_POST["pgen"];
                                            $contact = $_POST["pcontact"];
                                            $aid = $_POST["sid"];
                                            $bid = $_POST["clid"];
                                            $email = $_POST["pemail"];
                                            $pass = $_POST["ppass"];

                                            $sql = "UPDATE tbl_players_details SET p_code='$code',p_name='$name',p_birthdate='$date',p_age='$age',course_id='$coid',p_address='$address',p_gender='$gender',p_contact='$contact',s_id='$aid',cl_id='$bid',p_email='$email',p_pass='$pass' WHERE p_id = $id";
                                            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                            if ($res == 1) {
                                                echo "<script>window.location = 'player_view.php';</script>";
                                            } else {
                                                echo "Error updating record: " . mysqli_error($conn);
                                            }
                                        }
                                        ?>

                                        <button type="submit" class="btn btn-primary mr-2" name="btn">Edit</button>
                                        <button class="btn btn-dark">Cancel</button>
                                    </form>

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
                    player_code: {
                        required: true,
                    },
                    pname: {
                        required: true,
                        minlength: 3,
                    },
                    pdate: {
                        required: true,
                    },
                    paddress: {
                        required: true,
                        maxlength: 100,
                    },
                    pcontact: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 15,
                    },
                    cid: {
                        required: true,
                    },
                    sid: {
                        required: true,
                    },
                    clid: {
                        required: true,
                    },
                },
                messages: {
                    player_code: {
                        required: "Player code is required",
                    },
                    pname: {
                        required: "Please enter player name",
                        minlength: "Player name must be at least 3 characters long",
                    },
                    pdate: {
                        required: "Please enter birth date",
                    },
                    paddress: {
                        required: "Please enter a valid address",
                        maxlength: "Address cannot exceed 100 characters",
                    },
                    pcontact: {
                        required: "Please enter a contact number",
                        digits: "Contact number must contain only digits",
                        minlength: "Contact number must be at least 10 digits long",
                        maxlength: "Contact number cannot exceed 15 digits",
                    },
                    cid: {
                        required: "Please select a course",
                    },
                    sid: {
                        required: "Please select a sport",
                    },
                    clid: {
                        required: "Please select a college",
                    },
                }
            });
        });
    </script>
</body>

</html>