<?php 
session_start();
 if(!isset($_SESSION["isLogin"]) || !$_SESSION["isLogin"])
 {
    echo "<script> window.location = 'login.php'; </script>";

 }
?>