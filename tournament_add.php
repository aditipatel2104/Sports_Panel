<?php
include 'session.php';
include 'connection.php';
  ?>

<?php 
function generateTournamentCode() {
    $date = new DateTime();
    $timestamp = $date->format('YmdHis'); // Format: YYYYMMDDHHMMSS
    return 'Tournament-' . $timestamp;
}

// Example usage
$TournamentCode = generateTournamentCode();

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
                        <h3 class="page-title"> New Add Tournament </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tournament</li>
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
                                                <label class="col-sm-3 col-form-label">Tournament Code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="tou_code" value="<?php echo $TournamentCode; ?>"  readonly/>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tournament Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"  name="tou_name"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tournament Type </label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        <select class="form-control" name="ttid">
                                                            <?php
                                                            $sql = "SELECT * FROM tbl_tournament_type;";
                                                            $res = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo '<option value=" ' . $row["tt_id"] . '">' . $row["tt_type"] . '</option>';
                                                            }

                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"> Sports </label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        <select class="form-control" name="sid">
                                                            <?php
                                                            $sql = "SELECT * FROM tbl_sports_details;";
                                                            $res = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo '<option value=" ' . $row["s_id"] . '">' . $row["s_name"] . '</option>';
                                                            }

                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Coach</label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        <select class="form-control" name="coid">
                                                            <?php
                                                            $sql = "SELECT * FROM tbl_coach_details;";
                                                            $res = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo '<option value=" ' . $row["co_id"] . '">' . $row["co_name"] . '</option>';
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
                                                    <label class="col-sm-3 col-form-label">Venue</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"  name="tou_venue"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Date </label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" name="tou_date" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Start Time </label>
                                                    <div class="col-sm-9">
                                                        <input type="time" class="form-control" name="tou_time" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Rank</label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        <select class="form-control" name="rid">
                                                            <?php
                                                            $sql = "SELECT * FROM tbl_rank;";
                                                            $res = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo '<option value=" ' . $row["r_id"] . '">' . $row["r_name"] . '</option>';
                                                            }

                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                      
                                        <button type="submit" class="btn btn-primary mr-2" name="btn">Submit</button>
                                        <button class="btn btn-dark">Cancel</button>
                                    </form>
                                    <?php
                                        if(isset($_POST["btn"]))
                                        {
                                            
                                            $code = $_POST["tou_code"];
                                            $name = $_POST["tou_name"];
                                            $tid=$_POST["ttid"];
                                            $sid=$_POST["sid"];
                                            $cid=$_POST["coid"];
                                            $venue= $_POST["tou_venue"];
                                            $date=$_POST["tou_date"];
                                            $time=$_POST["tou_time"];
                                            $rid=$_POST["rid"];
                                            $sql = "INSERT INTO tbl_tournament_details (t_code, t_name, tt_id, s_id, co_id, venue, t_date, t_starttime, r_id) VALUES ('$code','$name','$tid','$sid','$cid','$venue','$date','$time','$rid');";
                                            $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                            if($res==1)
                                            {
                                                echo "Successfully inserted!";
                                                echo "<script>window.location='tournament_view.php'; </script>";

                                            } else{
                                                echo "please try again!";                                           
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
$(document).ready(function(){
    $("#myform").validate({
        rules: {
            tou_name: {
                required: true,
                minlength: 3,
            },
            ttid: {
                required: true,
            },
            sid: {
                required: true,
            },
            coid: {
                required: true,
            },
            tou_venue: {
                required: true,
                maxlength: 100,
            },
            tou_date: {
                required: true,
                date: true,
            },
            tou_time: {
                required: true,
                time: true,
            },
            rid: {
                required: true,
            }
        },
        messages: {
            tou_name: {
                required: "Please enter the tournament name",
                minlength: "Tournament name must be at least 3 characters long",
            },
            ttid: {
                required: "Please select the tournament type",
            },
            sid: {
                required: "Please select the sport",
            },
            coid: {
                required: "Please select the coach",
            },
            tou_venue: {
                required: "Please enter the venue",
                maxlength: "Venue cannot exceed 100 characters",
            },
            tou_date: {
                required: "Please select the tournament date",
                date: "Please enter a valid date",
            },
            tou_time: {
                required: "Please select the tournament start time",
                time: "Please enter a valid time",
            },
            rid: {
                required: "Please select the rank",
            }
        }
    });
});
</script>

</body>

</html>