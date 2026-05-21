<?php
include 'session.php';
include 'connection.php';
?>

<?php
function generatePlayerCode()
{
    $date = new DateTime();
    $timestamp = $date->format('YmdHis'); // Format: YYYYMMDDHHMMSS
    return 'player-' . $timestamp;
}

// Example usage
$playercode = generatePlayerCode();

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

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Player Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="player_code" value="<?php echo $playercode; ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Player Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="pname" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">BirthDate</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" name="pdate" id="pdate" max="" onchange="calculateAge()" />
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Age</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="page" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Course </label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        <select class="form-control" name="cid">
                                                            <?php
                                                            $sql = "SELECT * FROM tbl_clg_courses;";
                                                            $res = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo '<option value=" ' . $row["course_id"] . '">' . $row["course_name"] . '</option>';
                                                            }

                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        
                                        
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="paddress" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Gender</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="pgen" id="membershipRadios1" value="Male" checked> Male </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="pgen" id="membershipRadios2" value="Female"> Female </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Contact </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="pcontact" />
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Email Field -->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control" name="pemail" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Password Field -->
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
                                                    <label class="col-sm-3 col-form-label">Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="p_pass" value="<?php echo $pwd; ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>


                                        
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Sports </label>
                                                <div class="col-sm-9">
                                                    <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                    <select class="form-control" name="sid">
                                                        <?php
                                                        $sql = "SELECT * FROM tbl_sports_details;";
                                                        $res = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($res)) {
                                                            echo '<option value="' . $row["s_id"] . '">' . $row["s_name"] . '</option>';
                                                        }

                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Collage </label>
                                                <div class="col-sm-9">
                                                    <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                    <select class="form-control" name="clid">
                                                        <?php
                                                        $sql = "SELECT * FROM tbl_collage_details;";
                                                        $res = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($res)) {
                                                            echo '<option value=" ' . $row["cl_id"] . '">' . $row["cl_name"] . '</option>';
                                                        }

                                                        ?>

                                                    </select>
                                                </div>
                                            </div>


                                            <button type="submit" class="btn btn-primary mr-2" name="btn">Submit</button>
                                            <button class="btn btn-dark">Cancel</button>
                                    </form>
                                    <?php
                                    if (isset($_POST["btn"])) {
                                        $code = $_POST["player_code"];
                                        $name = strtoupper($_POST["pname"]);
                                        $date = $_POST["pdate"];
                                        $age = $_POST["page"];
                                        $id = $_POST["cid"];
                                        $address = $_POST["paddress"];
                                        $gender = $_POST["pgen"];
                                        $contact = $_POST["pcontact"];
                                        $email = $_POST["pemail"];
                                        $pass = $_POST["p_pass"];
                                        $xid = $_POST["sid"];
                                        $yid = $_POST["clid"];

                                        // Check if the email already exists (case insensitive)
                                        $check_sql = "SELECT * FROM tbl_players_details WHERE LOWER(p_email) = LOWER('$email')";
                                        $check_res = mysqli_query($conn, $check_sql) or die(mysqli_error($conn));

                                        if (mysqli_num_rows($check_res) > 0) {
                                            // Email already exists
                                            echo "<div class='alert alert-danger'>This email already exists. Please try again with a different email.</div>";
                                        } else {
                                            // Proceed with inserting the new player
                                            $sql = "INSERT INTO tbl_players_details (p_code,p_name,p_birthdate,p_age,course_id,p_address,p_gender,p_contact,s_id,cl_id,p_email,p_pass)
                VALUES ('$code','$name','$date','$age','$id','$address','$gender','$contact','$xid','$yid','$email','$pass')";
                                            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                                            if ($res == 1) {
                                                echo "<div class='alert alert-success'>Successfully inserted!</div>";
                                                echo "<script>window.location='player_view.php';</script>";
                                            } else {
                                                echo "<div class='alert alert-danger'>Please try again!</div>";
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

        document.addEventListener('DOMContentLoaded', function() {
            // Set the maximum date to today minus 18 years for birthdate selection
            const today = new Date();
            const maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
            document.getElementById('pdate').setAttribute('max', maxDate.toISOString().split('T')[0]);
        });

        function calculateAge() {
            const birthdate = new Date(document.getElementById('pdate').value);
            const today = new Date();

            let age = today.getFullYear() - birthdate.getFullYear();
            const monthDifference = today.getMonth() - birthdate.getMonth();

            // Adjust age if the current month is before the birth month or the same month but earlier day
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthdate.getDate())) {
                age--;
            }

            // Update the age field in the form
            document.querySelector('input[name="page"]').value = age;

            // Check if the age is below 18 and give a warning
            if (age < 18) {
                alert("Player must be at least 18 years old.");
                document.getElementById('pdate').value = ''; // Clear the invalid date
                document.querySelector('input[name="page"]').value = ''; // Clear the age
            }
        }

        $(document).ready(function() {
            $('input[name="pemail"]').on('blur', function() {
                var email = $(this).val();
                if (email !== '') {
                    $.ajax({

                        method: 'POST',
                        data: {
                            email: email
                        },
                        success: function(response) {
                            if (response === 'exists') {
                                alert('This email is already in use. Please choose a different one.');
                                $('input[name="pemail"]').val(''); // Clear the email field
                            }
                        }
                    });
                }
            });
        });
    </script>


</body>

</html>