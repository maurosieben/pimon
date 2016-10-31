<?php
header('Location: index.php');
// Create connection with data base
$con=mysqli_connect("localhost","root","ptcdashboard","PTC_Dashboard_Registry");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['url']) && !empty($_GET['url'])) {
  mysqli_query($con,"DELETE FROM list WHERE url = '{$_GET['url']}' ");
  echo "OK";

}
else 
{
   echo "Invalid Request";
}



?>