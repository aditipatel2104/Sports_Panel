<?php 
                 
                      session_start();
                      if(isset($_SESSION["isLogin"])=="Yes")
                      {

                      // session_destroy();
                    unset($_SESSION['isLogin']);
                      unset($_SESSION['UserName']);
              echo "<script> window.location = '../login.php'; </script>";

                      }



                  ?>