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
              <h3 class="page-title"> view Collage </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li style="margin-right: 20px;">
    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="clg_add.php">Add</a>
</li>

                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Collages</li>
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
                            
                            <th> Collage code </th>
                            <th> Collage Name </th>
                            <th> Collage Address </th>
                            <th> Collage Grade </th>
                            <th> State </th>
                            <th> Course </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 

if(isset($_GET["del_id"]))

{
 $d_id=$_GET["del_id"];
      $sql = "DELETE FROM tbl_collage_details where cl_id=$d_id;";
      $res=mysqli_query($conn,$sql);
      if($res==1)
      {
        echo "<script> window.location = 'clg_view.php'; </script>";
      }
}
else{
  $sql="SELECT * FROM tbl_collage_details inner join tbl_state_details on tbl_collage_details.st_id=tbl_state_details.st_id inner join tbl_clg_courses on tbl_collage_details.course_id=tbl_clg_courses.course_id";
                            $res = mysqli_query($conn,$sql);
                           while($row = mysqli_fetch_assoc($res))
                           {
                            ?>

                            <tr>
                            <td> <?php echo $row["cl_code"]; ?>    </td>
                            <td> <?php echo $row["cl_name"]; ?>    </td>
                            <td> <?php echo $row["cl_address"]; ?>    </td>
                            <td> <?php
                             $grade = $row["cl_grade"];
                             switch ($grade) {
                                 case 'A':
                                     echo '<i class="mdi mdi-star"></i> A';
                                     break;
                                 case 'B':
                                     echo '<i class="mdi mdi-star-outline"></i> B';
                                     break;
                                 case 'C':
                                     echo '<i class="mdi mdi-star-half"></i> C';
                                     break;
                                 case 'D':
                                     echo '<i class="mdi mdi-star-off"></i> D';
                                     break;
                                 default:
                                     echo $grade; // For any unexpected values
                                     break;
                             } ?>    </td>
                            
                            <td> 
                              <?php
                               echo $row["state_name"];
                                ?>   
                           </td>
                           <td> 
                           <!-- <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="clgcourse"  value=" <?php echo $row["course_id"] ?>">  <?php echo $row["course_name"] ?>
                             </label>
                            </div> -->
                              <?php
                               echo $row["course_name"];
                                ?>   
                           </td>
                            <td>  
                              <div class="template-demo">
                          <a type="button" class="btn btn-danger btn-icon-text" href="clg_view.php?del_id=<?php echo $row["cl_id"];?>">
                            <i class="mdi mdi-delete"></i> Delete </a>
                          <a type="button" class="btn btn-warning btn-icon-text" href="clg_update.php?up_id=<?php echo $row["cl_id"];?>">
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