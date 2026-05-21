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

<?php
$sql ="SELECT * FROM tbl_tournament_details ORDER BY t_date ASC LIMIT 1";
$res = mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
$tou_title=$row["t_name"];
$tou_id=$row["t_id"];
}

 ?>
    <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 ml-auto">
            <h1 class="text-white"><?php echo $tou_title; ?></h1>
            <p>Join us for an exciting day of competition at our sports event! Athletes of all skill levels will showcase their talents, and you can cheer for your favorites.</p>
            <div id="date-countdown"></div>
            <p>
              <a href="matches.php" class="btn btn-primary py-3 px-4 mr-3">Book Tournaments</a>
         
            </p>  
          </div>
        </div>
      </div>
    </div>

    
    
    <div class="container">
      

      <div class="row">

        <div class="col-lg-12">
          
          <div class="d-flex team-vs">
            <span class="score">4-1</span>
<?php
$col_name="";
$sql ="SELECT * FROM tbl_tournament_result inner join tbl_collage_details on tbl_tournament_result.cl_id=tbl_collage_details.cl_id where t_id='$tou_id' and r_id=1";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
  while($row=mysqli_fetch_assoc($res)){
  $col_name=$row["cl_name"];
}
}
 ?>

            <div class="team-1 w-50">
              <div class="team-details w-100 text-center">
                <img src="images/logo_1.png" alt="Image" class="img-fluid">
                <h3> <?php echo htmlspecialchars($col_name); ?>  <span>(win)</span></h3>
              </div>
            </div>
            <div class="team-2 w-50">
            <?php
            $col_name = "";
$sql ="SELECT * FROM tbl_tournament_result inner join tbl_collage_details on tbl_tournament_result.cl_id=tbl_collage_details.cl_id where t_id='$tou_id' and r_id=2";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
while($row=mysqli_fetch_assoc($res)){
$col_name=$row["cl_name"];
}
}
 ?>
              <div class="team-details w-100 text-center">
                <img src="images/logo_2.png" alt="Image" class="img-fluid">
                <h3> <?php echo htmlspecialchars($col_name); ?> <span>(second)</span></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  

    <div class="latest-news">
      <div class="container">
        <div class="row">
          <div class="col-9 title-section">
            <h2 class="heading">All PLayers</h2>
          </div>
          <div class="col-3 title-section">
          <a href="all_players.php" class="btn btn-primary py-3 px-4 mr-3">View All</a>

          </div>
        </div>
        <div class="row no-gutters">
        <?php
$sql ="SELECT * FROM tbl_players_details inner join tbl_sports_details on tbl_players_details.s_id=tbl_sports_details.s_id inner join tbl_collage_details on tbl_players_details.cl_id=tbl_collage_details.cl_id limit 3";
$res = mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
?>
<div class="col-md-4">
            <div class="post-entry">
              <a href="#">
                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              </a>
              <div class="caption">
                <div class="caption-inner">
                  <h3 class="mb-3"> <?php echo $row["p_name"] ?>  </h3>
                  <div class="author d-flex align-items-center">
                   
                    <div class="text">
                      <h4><?php echo $row["s_name"] ?></h4>
                      <span><?php echo $row["p_birthdate"]?> &bullet; <?php echo $row["cl_name"] ?></span>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>


<?php
}

 ?>
          
        
        </div>

      </div>
    </div>
    
    <div class="site-section bg-dark">
      <div class="container">
        <div class="row">
        <?php
$sql ="SELECT * FROM tbl_tournament_details  inner join tbl_tournament_type on tbl_tournament_details.tt_id=tbl_tournament_type.tt_id where t_id='4';";
$res = mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
?>
          <div class="col-lg-6">
            <div class="widget-next-match">
              <div class="widget-title">
                <h3>Next Match</h3>
              </div>
              <div class="widget-body mb-3">
                <div class="widget-vs">
                  <div class="d-flex align-items-center justify-content-around justify-content-between w-100">
                    
                    <div class="team-1 text-center">
                      <img src="images/logo_1.png" alt="Image">
                      <h3><?php echo $row["t_name"] ?></h3>
                    </div>
                   
                   
                  </div>
                </div>
              </div>


              <div class="text-center widget-vs-contents mb-4">
                <h4><?php echo $row["tt_type"] ?></h4>
                
                  <span class="d-block"><?php echo $row["t_date"] ?></span>
                  <span class="d-block"><?php echo $row["t_starttime"] ?></span>
                  <strong class="text-primary"><?php echo $row["venue"] ?></strong>
                <div id="date-countdown2" class="pb-1"></div>
              </div>
            </div>
            <?php
}
?>
          </div>
          <div class="col-lg-6">
         
            <div class="widget-next-match">
            
              <table class="table custom-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Upcoming matches</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>players</th>
                  </tr>
                </thead>
                <tbody>
                <?php
$sql ="SELECT * FROM tbl_tournament_details INNER JOIN tbl_sports_details on tbl_tournament_details.s_id=tbl_sports_details.s_id  WHERE t_date > CURDATE()
        ORDER BY t_date ASC LIMIT 6";
$res = mysqli_query($conn,$sql);
$count=1;
while($row=mysqli_fetch_assoc($res))
{
?>
            
                  <tr>
                    <td> <?php echo $count; ?></td>
                    <td><strong class="text-white"><?php echo $row["t_name"] ?></strong></td>
                    <td><?php echo $row["t_starttime"] ?></td>                   
                    <td><?php echo date("M j, Y", strtotime($row["t_date"])); ?></td>
                    <td><?php echo $row["no_of_players"] ?></td>
                  
                  </tr>
                
                </tbody>
                <?php
                $count++;
            }
            ?>
              </table>
            </div>
           


          </div>
          
        </div>
      </div>
    </div> <!-- .site-section -->

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-6 title-section">
            <h2 class="heading">Coach-details</h2>
          </div>
          <div class="col-6 text-right">
            <div class="custom-nav">
            <a href="#" class="js-custom-prev-v2"><span class="icon-keyboard_arrow_left"></span></a>
            <span></span>
            <a href="#" class="js-custom-next-v2"><span class="icon-keyboard_arrow_right"></span></a>
            </div>
          </div>
        </div>


        <div class="owl-4-slider owl-carousel">
          <?php
          $sql ="SELECT * FROM tbl_coach_details;";
          $res = mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($res))
          {
            ?>
 <div class="item">
            <div class="video-media">
              <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              <a href="#" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0"> <?php echo $row["co_name"]; ?></h3>
                </div>
              </a>
            </div>
          </div>
            <?php
          }
          ?>

          <!-- <div class="item">
            <div class="video-media">
              <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              <a href="#" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0">Dogba set for Juvendu return?</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="item">
            <div class="video-media">
              <img src="images/img_2.jpg" alt="Image" class="img-fluid">
              <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0">Kai Nets Double To Secure Comfortable Away Win</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="item">
            <div class="video-media">
              <img src="images/img_3.jpg" alt="Image" class="img-fluid">
              <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0">Romolu to stay at Real Nadrid?</h3>
                </div>
              </a>
            </div>
          </div>

          <div class="item">
            <div class="video-media">
              <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0">Dogba set for Juvendu return?</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="item">
            <div class="video-media">
              <img src="images/img_2.jpg" alt="Image" class="img-fluid">
              <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0">Kai Nets Double To Secure Comfortable Away Win</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="item">
            <div class="video-media">
              <img src="images/img_3.jpg" alt="Image" class="img-fluid">
              <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0">Romolu to stay at Real Nadrid?</h3>
                </div>
              </a>
            </div>
          </div> -->

        </div>

      </div>
    </div>

   


<!-- footer  -->
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
  <script>
// Check if PHP variables are outputting correctly
console.log("Date:", "<?php echo $row['t_date']; ?>");
console.log("Time:", "<?php echo $row['t_starttime']; ?>");

// Set the target date and time from PHP
var targetDate = new Date("<?php echo $row['t_date'] . ' ' . $row['t_starttime']; ?>").getTime();
console.log("Target Date:", targetDate); // Debugging line

// Update the countdown every 1 second
var countdownFunction = setInterval(function() {
    // Get current date and time
    var now = new Date().getTime();

    // Calculate the distance between now and the target date
    var distance = targetDate - now;

    // Time calculations for days, weeks, hours, minutes, and seconds
    var weeks = Math.floor(distance / (1000 * 60 * 60 * 24 * 7));
    var days = Math.floor((distance % (1000 * 60 * 60 * 24 * 7)) / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="date-countdown2"
    document.getElementById("date-countdown2").innerHTML = 
        weeks + " weeks " + days + " days " + 
        hours + " hours " + minutes + " minutes " + seconds + " seconds ";

    // If the countdown is over, display a message
    if (distance < 0) {
        clearInterval(countdownFunction);
        document.getElementById("date-countdown2").innerHTML = "EXPIRED";
    }
}, 1000);
</script>

</body>

</html>