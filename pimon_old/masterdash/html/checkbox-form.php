<?php
header('Location: index.php');
// Create connection with data base
$con = mysqli_connect("localhost","root","ptcdashboard","PTC_Dashboard_Registry");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$Pis = $_POST['Pis'];
echo $_POST['url2'];
echo "<br>";
echo $_POST['time'];
echo "<br>";

if(empty($Pis)) 
{
  echo("You didn't select any Pi.");
}

 
else
{
  $N = count($Pis);
     
  echo("You selected $N Pi(s): ");

  for($i=0; $i < $N; $i++)
  {  
     echo "<br>";
     echo $Pis[$i];
     $dashboard = $Pis[$i];
     $sql = "SELECT IP FROM registry WHERE hostname = '$dashboard'";
     if($result = mysqli_query($con, $sql))
     {
	echo "<br>";  
     	$row =  mysqli_fetch_array($result);
	$ip = $row['IP'];	
        echo $ip;
	mysqli_free_result($result);
	  if(isset($_POST['url2']) && !empty($_POST['url2']) && isset($_POST['time']) && !empty($_POST['time'])){
	    $sql1 = "INSERT INTO url_list (IP, url, time) VALUES ('$ip','{$_POST['url2']}','{$_POST['time']}')";
	    if (mysqli_query($con, $sql1)) {
	      echo "<br>";
              echo "URL added successfully";
            } else {
              echo "Error adding url: " . mysqli_error($con);
            }
  
	  } else {
	    echo "<br>";
	    echo "Invalid Request" ;
	  }
	  echo "<br>";
     } else {
        echo "Error: " . mysqli_error($con);
     }
     

   }
}

?>