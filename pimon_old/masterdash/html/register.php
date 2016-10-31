<?php

// Create connection with data base 
$con=mysqli_connect("localhost","root","ptcdashboard","PTC_Dashboard_Registry");

// Check connection 
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Verify IP and hostname  
if(isset($_GET['ip']) && !empty($_GET['ip']) && isset($_GET['hostname']) && !empty($_GET['hostname'])){

date_default_timezone_set('EST');
$dt=date("Y-m-d H:i:s");
$hostname = $_GET['hostname'];

//mysqli_query($con,$sql);
mysqli_query($con,"INSERT IGNORE INTO registry (IP, hostname, checkin_time)
VALUES ('{$_GET['ip']}','{$_GET['hostname']}','$dt')");

//echo "OK";

}
else{
echo "Invalid Request";
}
?>
