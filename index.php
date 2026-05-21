<?php
include 'session.php';
include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sports Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     <?php include 'sidebar.php';?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
      <?php include 'topbar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
         
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">
                            <?php 
                            $sql = "SELECT * FROM tbl_tournament_details;";
                            $res = mysqli_query($conn,$sql);
                            $total_tournament = mysqli_num_rows($res);
                            echo $total_tournament;
                            ?>
                          </h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-swim icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Tournament</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">
                          <?php 
                            $sql = "SELECT * FROM tbl_players_details;";
                            $res = mysqli_query($conn,$sql);
                            $total_player = mysqli_num_rows($res);
                            echo $total_player;
                            ?>
                          </h3>
                          
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-face icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Players</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">
                          <?php 
                            $sql = "SELECT * FROM tbl_sports_details;";
                            $res = mysqli_query($conn,$sql);
                            $total_sports = mysqli_num_rows($res);
                            echo $total_sports;
                            ?>
                          </h3>

                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-run icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Sports </h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">
                          <?php 
                            $sql = "SELECT * FROM tbl_collage_details;";
                            $res = mysqli_query($conn,$sql);
                            $total_collage = mysqli_num_rows($res);
                            echo $total_collage;
                            ?>
                          </h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-chair-school icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal"> Total Collages</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
             
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Open tournament</h4>
                      <p class="text-muted mb-1">Your data status</p>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                          <?php
                            $sql = "SELECT * FROM tbl_tournament_details inner join tbl_tournament_type on tbl_tournament_details.tt_id=tbl_tournament_type.tt_id;";
                            $res = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res))
                            {
                              ?>
                          <div class="preview-item border-bottom">
                          <div class="preview-item border-bottom">
    
        <div class="preview-icon bg-primary">
            <span><?php echo $row["tt_type"] ?> </span>
        </div>
    
</div>

                            <div class="preview-item-content d-sm-flex flex-grow">
                            <!-- <div class="flex-grow">
                                <h6 class="preview-subject"><?php //echo $row["tt_id"] ?>  </h6>
                              </div> -->
                              <div class="flex-grow">
                                <h6 class="preview-subject"><?php echo $row["t_name"] ?>  </h6>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                              <p class="text-muted"><?php echo $row["venue"]; ?></p>
                              <p class="text-muted"><?php echo $row["t_date"]; ?> at <?php echo $row["t_starttime"]; ?></p>
                              </div>
                            </div>
                          </div>
                              <?php
                            }
                          ?>
                         
                      
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
     
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
           <?php include 'footer.php';?>
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
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>