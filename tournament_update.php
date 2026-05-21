<?php
include 'session.php';
include 'connection.php';
?>

<?php
function generateTournamentCode()
{
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
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="assets/css/mysetting.css" />
</head>

<body>
    <div class="container-scroller">
        <?php include 'sidebar.php'; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include 'topbar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Edit Tournament </h3>
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
                                        <?php
                                        if (isset($_GET["up_id"])) {
                                            $id = $_GET["up_id"];
                                            $sql = "SELECT * FROM tbl_tournament_details WHERE t_id=$id";
                                            $res = mysqli_query($conn, $sql);
                                            if ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Tournament Code</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="tou_code" value="<?php echo $TournamentCode; ?>" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Tournament Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="tou_name" value="<?php echo $row["t_name"]; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Tournament Type Dropdown -->
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Tournament Type </label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="ttid">
                                                                    <?php
                                                                    $sql_tt = "SELECT * FROM tbl_tournament_type";
                                                                    $res_tt = mysqli_query($conn, $sql_tt);
                                                                    while ($row1 = mysqli_fetch_assoc($res_tt)) {
                                                                        $selected = $row1["tt_id"] == $row["tt_id"] ? 'selected' : '';
                                                                        echo '<option value="' . $row1["tt_id"] . '" ' . $selected . '>' . $row1["tt_type"] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Sports Dropdown -->
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Sports</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="sid">
                                                                    <?php
                                                                    $sql_sports = "SELECT * FROM tbl_sports_details";
                                                                    $res_sports = mysqli_query($conn, $sql_sports);
                                                                    while ($row2 = mysqli_fetch_assoc($res_sports)) {
                                                                        $selected = $row2["s_id"] == $row["s_id"] ? 'selected' : '';
                                                                        echo '<option value="' . $row2["s_id"] . '" ' . $selected . '>' . $row2["s_name"] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Coach Dropdown -->
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Coach</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="coid">
                                                                    <?php
                                                                    $sql_coach = "SELECT * FROM tbl_coach_details";
                                                                    $res_coach = mysqli_query($conn, $sql_coach);
                                                                    while ($row3 = mysqli_fetch_assoc($res_coach)) {
                                                                        $selected = $row3["co_id"] == $row["co_id"] ? 'selected' : '';
                                                                        echo '<option value="' . $row3["co_id"] . '" ' . $selected . '>' . $row3["co_name"] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Venue, Date, Time, Rank Fields -->
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Venue</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="tou_venue" value="<?php echo $row["venue"]; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Date</label>
                                                            <div class="col-sm-9">
                                                                <input type="date" class="form-control" name="tou_date" value="<?php echo $row["t_date"]; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Start Time</label>
                                                            <div class="col-sm-9">
                                                                <input type="time" class="form-control" name="tou_time" value="<?php echo $row["t_starttime"]; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Rank Dropdown -->
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Rank</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="rid">
                                                                    <?php
                                                                    $sql_rank = "SELECT * FROM tbl_rank";
                                                                    $res_rank = mysqli_query($conn, $sql_rank);
                                                                    while ($row4 = mysqli_fetch_assoc($res_rank)) {
                                                                        $selected = $row4["r_id"] == $row["r_id"] ? 'selected' : '';
                                                                        echo '<option value="' . $row4["r_id"] . '" ' . $selected . '>' . $row4["r_name"] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <button type="submit" class="btn btn-primary mr-2" name="btn">Update</button>
                                        <button class="btn btn-dark">Cancel</button>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </form>

                                    <?php
                                    if (isset($_POST["btn"])) {
                                        $code = $_POST["tou_code"];
                                        $name = $_POST["tou_name"];
                                        $tid = $_POST["ttid"];
                                        $sid = $_POST["sid"];
                                        $cid = $_POST["coid"];
                                        $venue = $_POST["tou_venue"];
                                        $date = $_POST["tou_date"];
                                        $time = $_POST["tou_time"];
                                        $rid = $_POST["rid"];
                                        $sql = "UPDATE tbl_tournament_details SET t_code='$code',t_name='$name',tt_id='$tid',s_id='$sid',co_id='$cid',venue='$venue',t_date='$date',t_starttime='$time', r_id='$rid' WHERE t_id = $id";
                                        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                        if ($res == 1) {
                                           // echo "<script>alert('Tournament Updated Successfully');</script>";
                                            echo "<script>window.location = 'tournament_view.php';</script>";
                                        } else {
                                            echo "Error updating record: " . mysqli_error($conn);
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'footer.php'; ?>
            </div>
        </div>
    </div>

    <!-- Plugins: js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/js/select2.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
</body>

</html>
