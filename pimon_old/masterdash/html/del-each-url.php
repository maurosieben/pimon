<?php

header('Location: index.php');
// Create connection with data base
$con=mysqli_connect("localhost","root","ptcdashboard","PTC_Dashboard_Registry");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


if (isset($_GET['ip']) && !empty($_GET['ip'])) {
  $ip = $_GET['ip'];
  mysqli_query($con,"DELETE FROM url_list WHERE IP = '$ip' AND url = '{$_GET['url']}' AND time = '{$_GET['time']}' ");
  echo "OK";

}
else
{
   echo "Invalid Request";
}
?>