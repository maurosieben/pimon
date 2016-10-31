<?php
// Create connection with data base
$con=mysqli_connect("localhost","root","ptcdashboard","PTC_Dashboard_Registry");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM registry");
while($row = mysqli_fetch_array($result)) {
  $ip= $row['IP'];
  echo $ip;
  echo "</br>";
  $hostname = $row['hostname'];
  echo $hostname;
  echo "</br>";
  $url = "http://localhost:80/each-loop.php?ip=$ip&hostname=$hostname";
  echo $url;
  echo "</br>";	
  shell_exec("curl '$url' > /dev/null 2>&1 & ");
  //sleep(2);
}
mysqli_free_result($result);
?>