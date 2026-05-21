<?php include 'session.php';?>
<?php include 'connection.php';
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
                        <h3 class="page-title"> New Add Tournament Type </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tournament Types</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">

                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">

                                    <form class="form-sample" method="post" id="myform">

                                    <?php

if(isset($_GET["up_id"]))
{
    $id=$_GET["up_id"];
    $sql = "SELECT * FROM tbl_tournament_type where tt_id=$id";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
       ?> 
   
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tournament Code</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="tournament_code" value="<?php echo $row["tt_code"] ?>"  readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tournament type</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="ttype" value="<?php echo $row["tt_type"]; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                       

                                        <?php
                                         }
                                        }
                                        if(isset($_POST["btn"]))
                                        {
                                            $id = $_POST["id"];
                                            $code = $_POST["tournament_code"];
                                            $name = $_POST["ttype"];
                                              
                                              $sql = "UPDATE tbl_tournament_type SET tt_code='$code',tt_type='$name' WHERE tt_id = $id";
                                              $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                              if($res==1)
                                              {
                                                echo "<script>window.location = 'tt_view.php';</script>";
                                              } else{
                                                echo "Error updating record: " . mysqli_error($conn);
                                              }

                                            
                                        }
                                         ?>

                                        <button type="Edit" class="btn btn-primary mr-2" name="btn">Edit</button>
                                        <button class="btn btn-dark" onclick="window.location.href='tt_view.php';">Cancel</button>
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
        $("#myform").validate({
            rules: {
                ttype: {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
                ttype: {
                    required: "Please enter a tournament type",
                    minlength: "Tournament type must be at least 2 characters long"
                }
            }
        });
    });
</script>
</body>

</html>


                            <!-- //   if (isset($_GET["e_id"])) {
                            //     $ed_id = $_GET["e_id"];
                            //     $sql = "UPDATE tbl_coach_details SET status = 'updated' WHERE co_id = $ed_id";
                            //     if (mysqli_query($conn, $sql)) {
                            //         $sql_select = "SELECT * FROM tbl_coach_details WHERE co_id = $ed_id";
                            //         $res = mysqli_query($conn, $sql_select);
                            //         $coach = mysqli_fetch_assoc($res);
                            
                            //         echo "<script>window.location = 'coach_view.php';</script>";
                            //     } else {
                            //         echo "Error updating record: " . mysqli_error($conn);
                            //     }
                            // }
                              -->
                              
                              
                              