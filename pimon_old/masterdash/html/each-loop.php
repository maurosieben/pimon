<?php

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
if(isset($_GET['ip']) && !empty($_GET['ip']) && isset($_GET['hostname']) && !empty($_GET['hostname'])){
  $ip = $_GET['ip'];
  $hostname = $_GET['hostname'];
  while($status != "off") {
    $result = mysqli_query($con,"SELECT * FROM url_list WHERE IP = '$ip'");
    while($row_url = mysqli_fetch_array($result)) {
      echo $row_url['url'];
      echo "</br>";
      shell_exec("curl http://$ip/index.php?url={$row_url['url']}");
      sleep($row_url['time']);
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
}
else{
  echo "Invalid Request";
}

?>