<?php
include 'session.php';
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tournament Ranks</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
           .card-img-top{
            height: 100px !important;
            width: 100px !important;
           }

        </style>
</head>

<body>
    <div class="container-scroller">
        <?php include 'sidebar.php'; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include 'topbar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <?php
                        // Query to get all tournaments
                        $sql = "SELECT * FROM tbl_tournament_result 
                                INNER JOIN tbl_tournament_details ON tbl_tournament_result.t_id = tbl_tournament_details.t_id 
                                GROUP BY tbl_tournament_result.t_id";
                        $res = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($res)) {
                            // Tournament name
                            $tournament_name = $row["t_name"];
                            $tournament_id = $row["t_id"];
                            ?>

                            <div class="col-md-4 col-xl-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Tournament: <?php echo $tournament_name; ?></h4>

                                        <div class="owl-carousel owl-theme" id="carousel-<?php echo $tournament_id; ?>">
                                            <?php
                                            // Loop to show first, second, and third rank
                                            for ($rank = 1; $rank <= 3; $rank++) {
                                                // Query to get player of the current rank in the tournament
                                                $sql_rank = "SELECT tbl_tournament_result.*, tbl_rank.*, tbl_collage_details.*, tbl_sports_details.*
                                                FROM tbl_tournament_result 
                                                INNER JOIN tbl_rank ON tbl_tournament_result.r_id = tbl_rank.r_id 
                                                INNER JOIN tbl_collage_details ON tbl_tournament_result.cl_id = tbl_collage_details.cl_id 
                                                INNER JOIN tbl_tournament_details ON tbl_tournament_result.t_id = tbl_tournament_details.t_id
                                                INNER JOIN tbl_sports_details ON tbl_tournament_details.s_id = tbl_sports_details.s_id
                                                WHERE tbl_tournament_result.t_id = $tournament_id 
                                                AND tbl_rank.r_id = $rank";
                                   
                                                $res_rank = mysqli_query($conn, $sql_rank);
                                                $row_rank = mysqli_fetch_assoc($res_rank); // Get the result for current rank

                                                // Check if a player exists for the current rank
                                                if ($row_rank) {
                                                    ?>
                                                    <div class="item">
                                                        <div class="card">
                                                            
                                                            <img src="<?php echo $rank ==1 ? 'assets/images/rank_1.jpg' : ($rank == 2 ? 'assets/images/rank_2.jpg' :'assets/images/rank_3.jpg')  ?>" class="card-img-top" alt="">
                                                            <!-- <img src="assets/images/dashboard/Rectangle.jpg" class="card-img-top" alt=""> -->
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between">
                                                                    <!-- <h5 class="card-title">
                                                                        <?php 
                                                                        // echo $rank == "FIRST" ? "First" : ($rank == "SECOND" ? "Second" : "THIRD");
                                                                         ?> Rank</h5> -->
                                                                    <p class="text-muted"><?php echo $row_rank["r_name"]; ?></p>
                                                                    
                                                                </div>
                                                                <p class="card-text">
                                                                        <?php
                                                                        echo "Collage:". $row_rank["cl_name"];
                                                                        echo "<br>Sport:" .$row_rank["s_name"]; 
                                                                        
                                                                        ?>

                                                                    </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="item">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?php echo $rank == 1 ? "First" : ($rank == 2 ? "Second" : "Third"); ?> Rank</h5>
                                                                <p class="text-muted">No player available.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div> <!-- end owl-carousel -->

                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                        ?>

                    </div>
                </div>
  <!-- partial:partials/_footer.html -->
              <?php include 'footer.php'; ?>

    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            <?php
            // Initialize carousel for each tournament
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                ?>
                $('#carousel-<?php echo $row['t_id']; ?>').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    items: 1, // Only 1 image at a time
                    responsive: {
                        0: { items: 1 },
                        600: { items: 1 },
                        1000: { items: 1 }
                    }
                });
                <?php
            }
            ?>
        });
    </script>
</body>
</html>

