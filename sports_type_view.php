<?php include 'session.php'; ?>
<?php include 'connection.php'; ?>

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
                        <h3 class="page-title"> View Sports Type </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li style="margin-right: 20px;">
    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="sports_type_add.php">Add</a>
</li>
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sports Type</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sports Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                // Handle deletion
                                                if (isset($_GET["del_id"])) {
                                                    $d_id = $_GET["del_id"];
                                                    $sql = "DELETE FROM tbl_sports_type WHERE sp_id=$d_id";
                                                    $res = mysqli_query($conn, $sql);
                                                    if ($res) {
                                                        echo "<script>window.location = 'sports_type_view.php';</script>";
                                                    }
                                                }

                                                // Fetch and display sports types
                                                $sql = "SELECT * FROM tbl_sports_type";
                                                $res = mysqli_query($conn, $sql);
                                                $serial_number = 1;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $serial_number++; ?></td>
                                                    <td><?php echo $row["sp_name"]; ?></td>
                                                    <td>
                                                        <div class="template-demo">
                                                            <a type="button" class="btn btn-danger btn-icon-text" href="sports_type_view.php?del_id=<?php echo $row["sp_id"]; ?>">
                                                                <i class="mdi mdi-delete"></i> Delete
                                                            </a>
                                                            <a type="button" class="btn btn-warning btn-icon-text" href="sports_type_update.php?up_id=<?php echo $row["sp_id"]; ?>">
                                                                <i class="mdi mdi-rename-box"></i> Edit
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
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
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
</body>
</html>
