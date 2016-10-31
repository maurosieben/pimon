<?php
header('Location: index.php');
// Create connection with data base
$con=mysqli_connect("localhost","root","ptcdashboard","PTC_Dashboard_Registry");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result_status = mysqli_query($con, "SELECT on_off FROM status");

if ($result_status) {
  $row_status = mysqli_fetch_array($result_status);
  $status = $row_status['on_off'];
  echo $status;
  echo "</br>";

}

mysqli_free_result($result_status);

while($status != off) {
  $result = mysqli_query($con,"SELECT * FROM list");
  while($row_url = mysqli_fetch_array($result)) {
     $result2 = mysqli_query($con,"SELECT * FROM registry");
     while($row_ip = mysqli_fetch_array($result2)) {
     	echo $row_ip['IP'];
     	echo "</br>";
     	echo $row_url['url'];
     	echo "</br>";
     	shell_exec("curl http://{$row_ip['IP']}/index.php?url={$row_url['url']}");
     
     }
     mysqli_free_result($result2);
     sleep($row_url['time']);
     echo $row_url['time'];
     echo "</br>";
  }
  mysqli_free_result($result);
  $result_status = mysqli_query($con, "SELECT on_off FROM status");

  if ($result_status) {
     $row_status = mysqli_fetch_array($result_status);
     $status = $row_status['on_off'];
     echo $status;
     echo "</br>";

     }

   mysqli_free_result($result_status);
}
?>
