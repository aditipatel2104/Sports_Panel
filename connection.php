<?php
$conn = mysqli_connect("localhost","root","","championspath_db") or die(mysqli_connect_error($conn));

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully";


?>