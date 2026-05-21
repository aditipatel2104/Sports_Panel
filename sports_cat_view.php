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
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="assets/css/mysetting.css" />
    <style>
        h1 {
            color: green;
        }
        /* Toggle switch styling */
        .toggle {
            position: relative;
            display: inline-block;
            width: 100px;
            height: 52px;
            background-color: red;
            border-radius: 30px;
            border: 2px solid gray;
        }
        .toggle:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: gray;
            top: 1px;
            left: 1px;
            transition: all 0.5s;
        }
        .checkbox:checked + .toggle::after {
            left: 49px;
        }
        .checkbox:checked + .toggle {
            background-color: green;
        }
        .checkbox {
            display: none;
        }
    </style>
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
                        <h3 class="page-title">View Sports Categories</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li style="margin-right: 20px;">
    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="sports_cat_add.php">Add</a>
</li>
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                                                    <th>Sports Categories</th>
                                                    <th>Is Active</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Handle deletion
                                                if (isset($_GET["del_id"])) {
                                                    $d_id = $_GET["del_id"];
                                                    $sql = "DELETE FROM tbl_sports_categories WHERE sc_id=$d_id";
                                                    $res = mysqli_query($conn, $sql);
                                                    if ($res) {
                                                        echo "<script>window.location = 'sports_cat_view.php';</script>";
                                                    } else {
                                                        echo "Error deleting record: " . mysqli_error($conn);
                                                    }
                                                }

                                                // Handle status update
                                      

                                                // Fetch state data
                                                $sql = "SELECT * FROM tbl_sports_categories";
                                                $res = mysqli_query($conn, $sql);
                                                $serial_number = 1;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                ?>
                                                    <tr>
                                                    <td><?php echo $serial_number++; ?></td> <!-- Display serial number -->
                                                        
                                                        <td><?php echo ucfirst($row["sc_name"]); ?></td>
                                                        <td>
                                                            <form method="post" style="display: inline;">
                                                            <input type="hidden" name="sports_id" value="<?php echo $row["sc_id"]; ?>">
                                                                <input type="hidden" name="status" value="<?php echo $row["is_active"]; ?>">
                                                                
                                                                <button type="submit" name="update_status" class="btn btn-outline-<?php echo $row["is_active"] == 'on' ? 'success' : 'danger'; ?>">
                                                                    <?php echo $row["is_active"] == 'on' ? 'Active' : 'Inactive'; ?>
                                                                </button>
                                                            </form>
                                                            <?php 
                                                                      if (isset($_POST["update_status"])) {
                                                                        //$id = $_POST["state_id"];
                                                                       // echo "hello" . $id;
                                                                          $id = $_POST["sports_id"];
                                                                          $new_status = ($_POST["status"] == "on") ? "off" : "on";
                                                                          $sql = "UPDATE tbl_sports_categories SET is_active='$new_status' WHERE sc_id=$id";
                                                                          $res = mysqli_query($conn, $sql);
                                                                          if ($res) {
                                                                              echo "<script>window.location = 'sports_cat_view.php';</script>";
                                                                          } else {
                                                                              echo "Error updating status: " . mysqli_error($conn);
                                                                          }
                                                                      }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <div class="template-demo">
                                                                <a type="button" class="btn btn-danger btn-icon-text" href="sports_cat_view.php?del_id=<?php echo $row["sc_id"]; ?>">
                                                                    <i class="mdi mdi-delete"></i> Delete
                                                                </a>
                                                                <a type="button" class="btn btn-warning btn-icon-text" href="sports_cat_update.php?up_id=<?php echo $row["sc_id"]; ?>">
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
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
</body>

</html>
