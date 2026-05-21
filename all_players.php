<?php
include 'session.php';
include 'connection.php';
?>
<?php include 'header.php'; ?>
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

    <div class="container site-section">
      <div class="row">
        <div class="col-11 title-section">
          <h2 class="heading">All Players</h2>
        </div>
        <div class="col-1 title-section">
          <a href="index.php" class="btn btn-primary py-3 px-4 mr-3"> Previous</a>

          </div>
      </div>

      <div class="row">
        <?php
        $sql = "SELECT * FROM tbl_players_details 
                INNER JOIN tbl_sports_details ON tbl_players_details.s_id = tbl_sports_details.s_id 
                INNER JOIN tbl_collage_details ON tbl_players_details.cl_id = tbl_collage_details.cl_id;";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <div class="col-lg-4 mb-4">
              <div class="custom-media d-block">
                <div class="img mb-4">
                  <!-- Adjust the image path based on your actual folder structure -->
                  <a href="#"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="text">
                  <span class="meta"><?php echo $row['p_birthdate']; ?></span>
                  <h3 class="mb-4"><a href="singleplayer.php?pl_id=<?php echo $row["p_id"]; ?>"><?php echo $row['p_name']; ?></a></h3>
                  <p>National sports players showcase exceptional talent and dedication, representing their country with pride.</p>
                </div>
              </div>
            </div>
        <?php
          }
        } else {
          echo '<p>No players found.</p>';
        }
        ?>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
          <div class="custom-pagination">
            <a href="#">1</a>
            <span>2</span>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
          </div>
        </div>
      </div>
    </div>

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
