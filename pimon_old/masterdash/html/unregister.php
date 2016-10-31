<?php

// Create connection with data base 
$con=mysqli_connect("localhost","root","ptcdashboard","PTC_Dashboard_Registry");

// Check connection 
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Verify IP and hostname  
if(isset($_GET['ip']) && !empty($_GET['ip']) && isset($_GET['hostname']) && !empty($_GET['hostname'])){

$hostname = $_GET['hostname'];
$sql="DELETE FROM url_list WHERE IP = '{$_GET['ip']}'"; 

if (mysqli_query($con, $sql)) {
    echo "Table $hostname deleted successfully";
} else {
    echo "Error deleting table: " . mysqli_error($con);
}


mysqli_query($con,"DELETE FROM registry WHERE IP = '{$_GET['ip']}' AND hostname = '{$_GET['hostname']}' ");

echo "OK";

}
else{
echo "Invalid Request";
}
?>
