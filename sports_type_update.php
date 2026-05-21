<?php include 'session.php';?>
<?php include 'connection.php';?>

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
                        <h3 class="page-title"> Edit Sports Type </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sports Type</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-sample" method="post" id="myform">
                                        <?php
                                        if(isset($_GET["up_id"])) {
                                            $id = $_GET["up_id"];
                                            $sql = "SELECT * FROM tbl_sports_type WHERE sp_id=$id";
                                            $res = mysqli_query($conn, $sql);
                                            if($row = mysqli_fetch_assoc($res)) {
                                        ?> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Sports Type</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="spname" value="<?php echo $row["sp_name"] ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            } else {
                                                echo "<div class='alert alert-danger'>Record not found.</div>";
                                            }
                                        } else {
                                            echo "<div class='alert alert-danger'>No ID provided.</div>";
                                        }

                                        if(isset($_POST["btn"])) {
                                            $name = $_POST["spname"];
                                            $sql = "UPDATE tbl_sports_type SET sp_name='$name' WHERE sp_id=$id";
                                            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                            if($res) {
                                                echo "<script>window.location = 'sports_type_view.php';</script>";
                                            } else {
                                                echo "<div class='alert alert-danger'>Error updating record: " . mysqli_error($conn) . "</div>";
                                            }
                                        }
                                        ?>

                                        <button type="submit" class="btn btn-primary mr-2" name="btn">Update</button>
                                        <a href="sports_type_view.php" class="btn btn-dark">Cancel</a>
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
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js">
