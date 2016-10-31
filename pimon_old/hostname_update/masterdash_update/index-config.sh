#!/bin/bash

url_host=${1:-"default_host"}

prog_dir=$(dirname $0)

config_file_path=$prog_dir/index.php

echo $config_file_path


cat << EOF > $config_file_path

<html>

<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 

<meta name="viewport" content="width=device-width, initial-scale=1" />

<script>

\$(document).ready(function() {
    \$('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            \$('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            \$('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});


</script>


</head>

<body>

<script type="text/javascript">

function select_all(name, value) {
  var inputs = document.getElementsByTagName(name);
  for(var i = 0; i < inputs.length; i++) {
      if(inputs[i].type == "checkbox") {
        if (value == '1'){   
           inputs[i].checked = true;
         } else {
	   inputs[i].checked = false;
	 }
      }
  }
}
</script>

<center>
  <div class="container">

      <div class="masthead">
       <!-- <h3 class="text-muted">Project name</h3> -->

           <img src="masterDash.png"></img>
		   
		    <!-- page title -->
		   
<h1>Active Dashboards<h1>
</div>


<?php

function time_elapsed_string(\$datetime, \$full = false) {

    date_default_timezone_set('EST');
    \$now = new DateTime;
    \$ago = new DateTime(\$datetime);
    \$diff = \$now->diff(\$ago);

    \$diff->w = floor(\$diff->d / 7);
    \$diff->d -= \$diff->w * 7;

    \$string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach (\$string as \$k => &\$v) {
        if (\$diff->\$k) {
            \$v = \$diff->\$k . ' ' . \$v . (\$diff->\$k > 1 ? 's' : '');
        } else {
            unset(\$string[\$k]);
        }
    }

    if (!\$full) \$string = array_slice(\$string, 0, 1);
    return \$string ? implode(', ', \$string) . ' ago' : 'just now';
}


// Create connection
\$con=mysqli_connect("localhost","root","ptcdashboard","PTC_Dashboard_Registry");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

date_default_timezone_set('EST');

\$date_fiveminago = date('o-m-d H:i:s',time() - 5 * 60);
\$date_now = date('o-m-d H:i:s',time());

\$result = mysqli_query(\$con,"SELECT * FROM registry"); 

echo "<table class='table table-striped'>";
// print a table of IPs, hostnames and Check-in time
echo "<tr>";
echo "<th>Checkbox</th>";
echo "<th>IP Address</th>";
echo "<th>Hostname</th>";
echo "<th>Checkin Time</th>";
echo "</tr>";
?>

<form class ="navbar-form navbar-center" role="Media Link" action="checkbox-form.php" method="post">
 <tr><td> <input type="checkbox" id="selecctall"/> Select All </td><td></td><td></td><td></td></tr>    
<?php

while(\$row = mysqli_fetch_array(\$result)) {
  echo "<tr>";
  echo "<td>";
  \$hostname = \$row['hostname'];
?>
 <input class ="checkbox1" type="checkbox" name="Pis[]" value="<?php echo \$hostname ?>"/>
<?php    
  echo "</td>";
  echo "<td>";
  echo "<a href=http://{\$row['IP']}/>{\$row['IP']}</a>";
  echo "</td>";
  echo "<td>";
  echo "<a href=http://{\$row['hostname']}/>{\$row['hostname']}</a>";
  echo "</td>";
  echo "<td>";
  echo time_elapsed_string(\$row['checkin_time']);
  echo "</td>";
  echo "</tr>";
}
//echo "</table>";

?>

</table>
 <div class="form-group">
    Add url to the selected Pi(s) : <input type="text" name="url2">
    Time:  <input type="number" name="time" min="20" max="6000" value="20">
    <button type="submit" class="btn btn-primary" >Add</button>
 </div>
</form>

<?php

mysqli_free_result(\$result);
/*
\$result = mysqli_query(\$con,"SELECT * FROM list");

echo "<table class='table table-striped'>";
echo "<tr>";
echo "<th>URL</th>";
echo "<th>Time</th>";
echo "<th>Action</th>";
echo "</tr>";

while(\$row = mysqli_fetch_array(\$result)) {
  echo "<tr>";
  echo "<td>";
  echo \$row['url'];
  echo "</td>";
  echo "<td>";
  echo \$row['time'];
  echo "</td>";
  echo "<td>";
  echo "<a href=http://$url_host/del-url.php?url={\$row['url']}> Delete </a>";
  echo "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_free_result(\$result);
*/
\$result = mysqli_query(\$con,"SELECT * FROM registry");

while(\$row_registry = mysqli_fetch_array(\$result))
{

  \$hostname = \$row_registry['hostname'];
  \$ip = \$row_registry['IP']; 
  \$sql = "SELECT * FROM url_list WHERE IP = '\$ip'";
  if (mysqli_query(\$con, \$sql)) {
      \$result2 = mysqli_query(\$con, \$sql);
  } else {
      echo "Error selecting table: " . mysqli_error(\$con);
  }

  echo "<table class='table table-striped'>"; 
  echo "<tr><th>\$hostname</th></tr>";
  echo "<tr>";  
  echo "<th>URL</th>";
  echo "<th>Time</th>";
  echo "<th>Action</th>";
  echo "</tr>";

  while(\$row = mysqli_fetch_array(\$result2)) {
      echo "<tr>";
      echo "<td>";
      echo \$row['url'];
      echo "</td>";
      echo "<td>";
      echo \$row['time'];
      echo "</td>";
      echo "<td>";
      echo "<a href=http://$url_host/del-each-url.php?url={\$row['url']}&ip=\$ip&time={\$row['time']}> Delete </a>";
      echo "</td>";
      echo "</tr>";
  }
  echo "</table>";
  mysqli_free_result(\$result2);

}
mysqli_free_result(\$result);


if (!empty(\$_GET)) {
  echo "<div class=\"alert alert-success\" role=\"alert\">";
  echo "Request Successful!";
  echo "</div>";
  \$result = mysqli_query(\$con,"SELECT * FROM registry");
  while(\$row = mysqli_fetch_array(\$result)) {
	//send URL to all dashboards connected
        shell_exec("curl http://{\$row['IP']}/index.php?url={\$_GET["url"]}");
    }
  mysqli_free_result(\$result);
  shell_exec("sh ./scripts/playVideo.sh {\$_GET["url"]} >/dev/null 2>/dev/null &");
}

?>

<form class ="navbar-form navbar-center" role="Media Link" action="index.php" method="get">
<div class="form-group">
    MasterLoad - Load to All Dashboards: <input type="text" name="url">
  </div>
<button type="submit" class="btn btn-primary">Go</button>
</form>
<!--
<form class ="navbar-form navbar-center" role="Media Link" action="addurl.php" method="get">
<div class="form-group">
    Add url to the list : <input type="text" name="url2">
    Time:  <input type="number" name="time" min="20" max "6000">
 
  </div>  
<button type="submit" class="btn btn-primary" onClick="window.location.reload()" >Add</button>
</form>
-->
<div class="btn-group">
<form class ="navbar-form navbar-center" role="Media Link" action="each-status.php" method="post">
<button type="submit" text="go" name="on"  class="btn btn-success">On</button>
<button type="submit" text="go" name="off"  class="btn btn-danger">Off</button>

</form>
</div>

</body>
</html>


EOF
