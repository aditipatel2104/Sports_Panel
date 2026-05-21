<?php
include 'session.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Soccer &mdash; Website by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">



</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <!-- header -->
    <?php include 'header.php'; ?>
    <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mx-auto text-center">
            <h1 class="text-white">Result</h1>
            <p>Winners are not defined solely by their victories, but by the resilience, determination, and hard work they demonstrate along the way. </p>
          </div>
        </div>
      </div>
    </div>



    <div class="container site-section">
   
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
        <div class="row">
        <div class="col-12 title-section">
          <h2 class="heading"><?php echo $tournament_name ; ?></h2>
        </div>
<?php
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
    if ($row_rank)
    {
      ?>
 <div class="col-lg-4 mb-4">
          <div class="custom-media d-block">
            <div class="img mb-4">
              <a href="#">
                <!-- <img src="images/img_1.jpg" alt="Image" class="img-fluid"> -->
                <img src="<?php echo $rank ==1 ? '../assets/images/rank_1.jpg' : ($rank == 2 ? '../assets/images/rank_2.jpg' :'../assets/images/rank_3.jpg')  ?>" class="img-fluid" alt="">

              </a>
            </div>
            <div class="text">
              <span class="meta">May 20, 2020</span>
              <h3 class="mb-4"><a href="#"><?php echo $row_rank["r_name"]; ?></a></h3>
              <h3 class="mb-4"><?php echo $row_rank["cl_name"]; ?></h3>
            </div>
          </div>
        </div>
      <?php

    }

    else
    {

    

    }
  
  }
?>








        
      
      </div>
  <?php
        }
  ?>
  
  </div>




  </div>


  </div>







  <!-- footer -->
  <?php include 'footer.php'; ?>


  </div>
  <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>


  <script src="js/main.js"></script>

</body>

</html>