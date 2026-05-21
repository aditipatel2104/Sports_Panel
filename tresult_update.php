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
                        <h3 class="page-title"> New Add Result </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Result</li>
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
    $sql = "SELECT * FROM tbl_tournament_result where tou_id=$id";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
       ?> 
   

                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tournament</label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        <select class="form-control" name="tid">
                                                            <?php
                                                            $sql="SELECT * FROM tbl_tournament_details;";
                                                            $res= mysqli_query($conn,$sql);
                                                            while($row1=mysqli_fetch_assoc($res))
                                                            {
                                                            
                                                                if($row1["t_id"]==$row["t_id"])
                                                                {
                                                                echo '<option value=" ' . $row1["t_id"] .'"  selected >' . $row1["t_name"] .'</option>';
                                                                }
                                                                else
                                                                {
                                                                echo '<option value=" ' . $row1["t_id"] .'"  >' . $row1["t_name"] .'</option>';

                                                                 }
                                                            }

                                                            ?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>   

                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Collage</label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        <select class="form-control" name="clid">
                                                            <?php
                                                            $sql="SELECT * FROM tbl_collage_details;";
                                                            $res= mysqli_query($conn,$sql);
                                                            while($row2=mysqli_fetch_assoc($res))
                                                            {
                                                                if($row2["cl_id"]==$row["cl_id"])
                                                                {
                                                                echo '<option value=" ' . $row2["cl_id"] .'"  selected >' . $row2["cl_name"] .'</option>';
                                                                }else{

                                                                echo '<option value=" ' . $row2["cl_id"] .'">' . $row2["cl_name"] .'</option>';

                                                            }
                                                        }

                                                            ?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="col-md-6">
                                            <div class="form-group row">r
                                                    <label class="col-sm-3 col-form-label">Rank</label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" name="stdid" /> -->
                                                        <select class="form-control" name="rid">
                                                            <?php
                                                            $sql="SELECT * FROM tbl_rank;";
                                                            $res= mysqli_query($conn,$sql);
                                                            while($row3=mysqli_fetch_assoc($res))
                                                            {
                                                                if($row3["r_id"]==$row["r_id"])
                                                                {
                                                                echo '<option value=" ' . $row3["r_id"] .'"  selected >' . $row3["r_name"] .'</option>';
                                                                }else{
                                                                
                                                                echo '<option value=" ' . $row3["r_id"] .'">' . $row3["r_name"] .'</option>';

                                                            }
                                                        }

                                                            ?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                            </div>    
    

                                        <?php
                                         }
                                        }
                                        if(isset($_POST["btn"]))
                                        {
                                            $tid=$_POST["tid"];
                                            $clid=$_POST["clid"];
                                            $rid=$_POST["rid"];
                                              
                                              $sql = "UPDATE tbl_tournament_result SET t_id='$tid',cl_id='$clid',r_id='$rid' WHERE tou_id = $id";
                                              $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                              if($res==1)
                                              {
                                                echo "<script>window.location = 'tresult_view.php';</script>";
                                              } else{
                                                echo "Error updating record: " . mysqli_error($conn);
                                              }

                                            
                                        }
                                         ?>

                                        <button type="Edit" class="btn btn-primary mr-2" name="btn">Edit</button>
                                        <button class="btn btn-dark">Cancel</button>
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
                    tid: {
                        required: true
                    },
                    clid: {
                        required: true
                    },
                    rid: {
                        required: true
                    }
                },
                messages: {
                    tid: {
                        required: "Please select a tournament"
                    },
                    clid: {
                        required: "Please select a college"
                    },
                    rid: {
                        required: "Please select a rank"
                    }
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
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
                              
                              
                              