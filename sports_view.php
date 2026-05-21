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
              <h3 class="page-title"> View Sports </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li style="margin-right: 20px;">
    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="sports_add.php">Add</a>
</li>
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Sports</li>
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
                            
                            <th> Sports code </th>
                            <th> Sports Name </th>
                            <th> Sports Categories</th>
                            <th> Sports Types </th>
                            <th> Game type</th>
                            <th> No Of Players </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 

if(isset($_GET["del_id"]))

{
 $d_id=$_GET["del_id"];
      $sql = "DELETE FROM tbl_sports_details where s_id=$d_id;";
      $res=mysqli_query($conn,$sql);
      if($res==1)
      {
        echo "<script> window.location = 'sports_view.php'; </script>";
      }
}
else{
  $sql="SELECT * FROM tbl_sports_details inner join tbl_sports_categories on tbl_sports_details.sc_id=tbl_sports_categories.sc_id inner join tbl_sports_type on tbl_sports_details.sp_id=tbl_sports_type.sp_id inner join tbl_game_type on tbl_sports_details.gm_id=tbl_game_type.gm_id";
                           
                            $res = mysqli_query($conn,$sql);
                           while($row = mysqli_fetch_assoc($res))
                           {
                            ?>

                            <tr>
                            <td> <?php echo $row["s_code"]; ?>    </td>
                            <td> <?php echo $row["s_name"]; ?>    </td>
                            <td> <?php echo $row["sc_name"]; ?>    </td>
                            <td> <?php echo $row["sp_name"]; ?>    </td>
                            <td> <?php echo $row["game_type"]; ?>    </td>
                            <td> <?php
                             $player = $row["no_of_players"];
                             switch ($player) {
                                 case 'A':
                                     echo '<i class="mdi mdi-star"></i> 1';
                                     break;
                                 case 'B':
                                     echo '<i class="mdi mdi-star-outline"></i> 2';
                                     break;
                                 case 'C':
                                     echo '<i class="mdi mdi-star-half"></i> 7';
                                     break;
                                 case 'D':
                                     echo '<i class="mdi mdi-star-off"></i> 9';
                                     break;
                                     case 'E':
                                        echo '<i class="mdi mdi-star-off"></i> 11';
                                        break;
                                 default:
                                     echo $player; // For any unexpected values
                                     break;
                             } ?>    </td>
                            
                           
                            <td>  <div class="template-demo">
                          <a type="button" class="btn btn-danger btn-icon-text" href="sports_view.php?del_id=<?php echo $row["s_id"];?>">
                            <i class="mdi mdi-delete"></i> Delete </a>
                          <a type="button" class="btn btn-warning btn-icon-text" href="sports_update.php?up_id=<?php echo $row["s_id"];?>">
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