<?php
include 'session.php';
include 'connection.php';
?>

<?php
function generateCoachCode()
{
    $date = new DateTime();
    $timestamp = $date->format('YmdHis'); // Format: YYYYMMDDHHMMSS
    return 'sport-' . $timestamp;
}

// Example usage
$sportscode = generateCoachCode();

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
                        <h3 class="page-title"> New Add Sports </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sports</li>
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
                                                    <label class="col-sm-3 col-form-label">Sports Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="sports_code" value="<?php echo $sportscode; ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Sports Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="sportname" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="lname" />
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"> Categories </label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        <select class="form-control" name="scid" id="scid">
                                                            <?php
                                                            $sql = "SELECT * FROM tbl_sports_categories;";
                                                            $res = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($res)) {

                                                                echo '<option value=" ' . $row["sc_id"] . '">' . $row["sc_name"] . '</option>';
                                                            }

                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"> Sports Types </label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        <select class="form-control" name="spid">
                                                            <?php
                                                            $sql = "SELECT * FROM tbl_sports_type;";
                                                            $res = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo '<option value=" ' . $row["sp_id"] . '">' . $row["sp_name"] . '</option>';
                                                            }

                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"> Game Types </label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        <select class="form-control" name="gmid">
                                                            <?php
                                                            $sql = "SELECT * FROM tbl_game_type;";
                                                            $res = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo '<option value=" ' . $row["gm_id"] . '">' . $row["game_type"] . '</option>';
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
                                                    <label class="col-sm-3 col-form-label"> No Of Players</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="splayer" id="playerA" value="1" checked>
                                                            <label class="form-check-label" for="playerA">1</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="splayer" id="playerB" value="2">
                                                            <label class="form-check-label" for="playerB">2</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="splayer" id="playerC" value="7">
                                                            <label class="form-check-label" for="playerC">7</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="splayer" id="playerD" value="9">
                                                            <label class="form-check-label" for="playerD">9</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="splayer" id="playerE" value="11">
                                                            <label class="form-check-label" for="playerE">11</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2" name="btn">Submit</button>
                                        <button class="btn btn-dark">Cancel</button>
                                    </form>
                                    <?php
                                    if (isset($_POST["btn"])) {

                                        $code = $_POST["sports_code"];
                                        $name = strtoupper($_POST["sportname"]);
                                        $scid = $_POST["scid"];
                                        $spid = $_POST["spid"];
                                        $gmid = $_POST["gmid"];
                                        $player = $_POST["splayer"];
                                        // Check if the state name already exists
                                        $check_sql = "SELECT * FROM tbl_sports_details WHERE UPPER(s_name) = '$name'";
                                        $check_res = mysqli_query($conn, $check_sql) or die(mysqli_error($conn));

                                        if (mysqli_num_rows($check_res) > 0) {
                                            // State name already exists
                                            echo "The sports name already exists. Please try a different name.";
                                        } else {
                                            // $id=$_POST["stdid"];
                                            $sql = "INSERT INTO tbl_sports_details (s_code,s_name,sc_id,sp_id,gm_id,no_of_players) VALUES ('$code','$name','$scid','$spid','$gmid','$player');";
                                            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                            if ($res == 1) {
                                                echo "Successfully inserted!";
                                                echo "<script>window.location='sports_view.php'; </script>";
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

            $('#scid').change(function() {
                var numPlayers = $('#scid option:selected').text();
                // Check the radio button based on the number of players
                if (numPlayers.toUpperCase() == "SINGLE") {
                    $("#playerA").attr("checked", "true");
                } else if (numPlayers.toUpperCase() == "DOUBLE") {
                    $("#playerB").attr("checked", "true");
                } else {
                    // Reset all radio buttons first
                    $('input[name="splayer"]').prop('checked', false);
                }
            });

            // Trigger change event on page load to set the initial state
            $('#scid').trigger('change');

            $("#myform").validate({
                rules: {
                    sports_code: {
                        required: true,
                        minlength: 4,
                    },
                    sname: {
                        required: true,
                        minlength: 5,
                    },
                    scid: {
                        required: true,
                    },
                    spid: {
                        required: true,
                    },
                    gmid: {
                        required: true,
                    },
                    splayer: {
                        required: true,
                    }
                },
                messages: {
                    sports_code: {
                        required: "Please enter sports code",
                        minlength: "The sports code must be at least 4 characters long."
                    },
                    sname: {
                        required: "Please enter sports name",
                        minlength: "The sports name must be at least 5 characters long."
                    },
                    scid: {
                        required: "Please select a category",
                    },
                    spid: {
                        required: "Please select a sports type",
                    },
                    gmid: {
                        required: "Please select a game type",
                    },
                    splayer: {
                        required: "Please select the number of players",
                    }
                }
            });
        });
    </script>
</body>

</html>