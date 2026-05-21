<?php  
// session_start();
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><h1 
          style="color:white;  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);font: size 35px;">
          Game On!</h1></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/messages-2.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Aditi Patel</h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-coach" aria-expanded="false" aria-controls="ui-coach">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Coach</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-coach">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="coach_add.php">Add Coach</a></li>
                <li class="nav-item"> <a class="nav-link" href="coach_view.php">View Coach</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-collage" aria-expanded="false" aria-controls="ui-collage">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Collage</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-collage">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="clg_add.php">Add Collage details</a></li>
                <li class="nav-item"> <a class="nav-link" href="course_add.php">Add Course details</a></li>
                <li class="nav-item"> <a class="nav-link" href="clg_view.php">View Collage details</a></li>
                <li class="nav-item"> <a class="nav-link" href="course_view.php">View Course details</a></li>  
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-state" aria-expanded="false" aria-controls="ui-state">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Area</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-state">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="state_add.php">Add State details</a></li>
                <li class="nav-item"> <a class="nav-link" href="state_view.php">View State details</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-sports" aria-expanded="false" aria-controls="ui-sports">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Sports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-sports">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="sports_type_add.php">Add Sports type</a></li>
                <li class="nav-item"> <a class="nav-link" href="sports_type_view.php">View Sports type</a></li>
                <li class="nav-item"> <a class="nav-link" href="sports_cat_add.php">Add Sports Categories</a></li> 
                <li class="nav-item"> <a class="nav-link" href="sports_cat_view.php">View Sports Categories</a></li>  
                <li class="nav-item"> <a class="nav-link" href="game_add.php">Add Game type</a></li>
                <li class="nav-item"> <a class="nav-link" href="game_view.php">View Game type</a></li>
                <li class="nav-item"> <a class="nav-link" href="sports_add.php">Add Sports details</a></li>
                <li class="nav-item"> <a class="nav-link" href="sports_view.php">View Sports details</a></li>  
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-player" aria-expanded="false" aria-controls="ui-player">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Players</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-player">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="player_add.php">Add Players</a></li>
                <li class="nav-item"> <a class="nav-link" href="player_view.php">View Players</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-tour" aria-expanded="false" aria-controls="ui-tour">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Tournaments</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-tour">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="tournament_add.php">Add Tournament details</a></li>
                <li class="nav-item"> <a class="nav-link" href="tournament_view.php">View Tournament <details></details></a></li>  
                <li class="nav-item"> <a class="nav-link" href="tt_add.php">Add Tournament type</a></li>
                <li class="nav-item"> <a class="nav-link" href="tt_view.php">View Tournament type</a></li>  
                <li class="nav-item"> <a class="nav-link" href="tresult_add.php">Add Tournament result</a></li>
                <li class="nav-item"> <a class="nav-link" href="tresult_view.php">View Tournament result</a></li>  
                <li class="nav-item"> <a class="nav-link" href="rank_add.php">Add Rank</a></li>  
                <li class="nav-item"> <a class="nav-link" href="rank_view.php">View Rank</a></li>  
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-report" aria-expanded="false" aria-controls="ui-report">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Reports</span>
              <i class="menu-arrow"></i>
            </a>
              <div class="collapse" id="ui-report">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="winners.php">Winners</a></li>
              </ul>
            </div>
            </a>
          </li>
        </ul>
      </nav>