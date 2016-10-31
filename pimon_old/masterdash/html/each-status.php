<?php
http_response_code(204);
// Create connection with data base
$con=mysqli_connect("localhost","root","ptcdashboard","PTC_Dashboard_Registry");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query1 = "DELETE FROM status";
$query2 = "INSERT INTO status (on_off) VALUE ('on')";
$query3 = "INSERT INTO status (on_off) VALUE ('off')";

$status=off; 

if (isset($_POST['on']))
{
	if ($status != on)
	{
		mysqli_query($con, $query1);
		mysqli_query($con, $query2);
		shell_exec("php call-loops.php");
		echo "on";
		$status = on;
	}
	
}

elseif (isset($_POST['off']))
{
        mysqli_query($con, $query1);
        mysqli_query($con, $query3);
	$status = off;
        echo "off";
}

else{
	echo "Invalid Request";
}

?>