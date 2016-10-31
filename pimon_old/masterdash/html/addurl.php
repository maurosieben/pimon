<?php
header('Location: index.php');
// Create connection with data base
$con=mysqli_connect("localhost","root","ptcdashboard","PTC_Dashboard_Registry");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Verify IP and hostname
if(isset($_GET['url2']) && !empty($_GET['url2']) && isset($_GET['time']) && !empty($_GET['time'])){

  mysqli_query($con,"INSERT INTO list (url, time) VALUES ('{$_GET['url2']}','{$_GET['time']}')");
  echo "OK";
}
else{
  echo "Invalid Request";
}
?>

