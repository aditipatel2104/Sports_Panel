<?php include 'session.php';?>
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
    <!-- Plugin css for this page -->
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
              <h3 class="page-title"> View Tournament </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li style="margin-right: 20px;">
    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="tournament_add.php">Add</a>
</li>
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tournament</li>
                </ol>
              </nav>
            </div>
            <div class="row">
             
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <!-- <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> Add class <code>.table-striped</code>
                    </p> -->
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            
                            <th> Tournament code </th>
                            <th> Tournament Name </th>
                            <th> Tournament Type </th>
                            <th> Sports </th>
                            <th> Coaches </th>
                            <th> Venue </th>
                            <th> Date </th>
                            <th> Time </th>
                            <th> Rank </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 

if(isset($_GET["del_id"]))

{
 $d_id=$_GET["del_id"];
      $sql = "DELETE FROM tbl_tournament_details where t_id=$d_id;";
      $res=mysqli_query($conn,$sql);
      if($res==1)
      {
        echo "<script> window.location = 'tournament_view.php'; </script>";
      }
}
else{
  $sql="SELECT * FROM tbl_tournament_details inner join tbl_tournament_type on tbl_tournament_details.tt_id=tbl_tournament_type.tt_id inner join tbl_sports_details on tbl_tournament_details.s_id=tbl_sports_details.s_id inner join tbl_coach_details on tbl_tournament_details.co_id=tbl_coach_details.co_id inner join tbl_rank on tbl_tournament_details.r_id=tbl_rank.r_id ";
                            $res = mysqli_query($conn,$sql);
                           while($row = mysqli_fetch_assoc($res))
                           {
                            ?>

                            <tr>
                            <td> <?php echo $row["t_code"]; ?>    </td>
                            <td> <?php echo $row["t_name"]; ?>    </td>
                            <td> <?php echo $row["tt_type"]; ?>    </td>
                            <td> <?php echo $row["s_name"]; ?>    </td>
                            <td> <?php echo $row["co_name"]; ?>    </td>
                            <td> <?php echo $row["venue"]; ?>    </td>
                            <td> <?php echo $row["t_date"]; ?>    </td>
                            <td> <?php echo $row["t_starttime"]; ?>    </td>
                            <td> <?php echo $row["r_name"]; ?>    </td>

                
                            
                            
                            <td>  
                              <div class="template-demo">
                          <a type="button" class="btn btn-danger btn-icon-text" href="tournament_view.php?del_id=<?php echo $row["t_id"];?>">
                            <i class="mdi mdi-delete"></i> Delete </a>
                          <a type="button" class="btn btn-warning btn-icon-text" href="tournament_update.php?up_id=<?php echo $row["t_id"];?>">
                            <i class="mdi mdi-rename-box"></i> Edit </a>
                        </div> 

                       
                      </td>
                            <!-- <td>
                              <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td> -->
                            <!-- <td> $ 77.99 </td>
                            <td> May 15, 2015 </td> -->
                          </tr>
                         <?php
                           }
                          }
                            ?>
                         
                        
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
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>