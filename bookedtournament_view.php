
<?php
include 'session.php';
include 'connection.php';
$usernm = $_SESSION["UserName"];
$sql = "SELECT * FROM tbl_players_details where p_email='$usernm'";
$res= mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($res))
{
  $p_id = $row["p_id"];
}



if(isset($_GET["tid"]))
{
  $selected_tid = $_GET["tid"];
  $selected_pid = $_GET["plyid"];

  $sql = "INSERT INTO `tbl_book_tournament`(`t_id`, `p_id`, `status`) VALUES ('$selected_tid','$selected_pid','pending')";
  $res= mysqli_query($conn,$sql);
  if($res==1)
  {
    echo "<script> window.location = 'matches.php'; </script>";

  }
  else{
    echo "You are still not booked for this tournament";
  }
}
?>
<?php include 'header.php'; ?>
<!-- 
 
-->
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
  <link rel="stylesheet" href="css/mysetting.css">



</head>

<body>
  <div class="site-wrap">

   
  

    

    
    
   

    
    <div class="site-section bg-dark">
      <div class="container">
        
        
        <div class="row">
        <div class="col-12 title-section">
            <h2 class="heading">Booked Tournaments</h2>
          </div>
         
        <?php



$sql = "SELECT * 
        FROM tbl_book_tournament ttb
        RIGHT join tbl_tournament_details ttd on ttb.t_id = ttd.t_id INNER JOIN tbl_tournament_type ttt ON ttd.tt_id = ttt.tt_id
         WHERE ttb.p_id='$p_id';";
$res = mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
?>
        
        
          <div class="col-lg-6 mb-4">
            <div class="bg-light p-4 rounded">
              <div class="widget-body">
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



                

                </div>

              
            </div>
          </div>

                <?php 
}
?>
            </div>
          </div>
          <div class="text-center">
          <a href="matches.php" class="btn btn-primary py-3 px-4 mr-3"> Previous</a>
          </div>
        </div>
      </div>
     <!-- .site-section -->

   


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