<html>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<link href="justified-nav.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>PTC Dashboard</title>
<body>

  <div class="container">

      <div class="masthead">
       <!-- <h3 class="text-muted">Project name</h3> -->
	   
	   <img src="longLogo.png"></img>
       
	   <ul class="nav nav-justified">
          <li class="active"><a href="index.php">Web Viewer</a></li>
          <li><a href="mediaplayer.php">Media Player</a></li>
          <li><a href="settings.php">System Settings</a></li>

        </ul>
      </div>


<br>
<?php
if (!empty($_GET)) {
// no data passed by get
echo "<div class=\"alert alert-success\" role=\"alert\">";
echo "Request Successful!";
echo "</div>";

// call ruby file giving the sent URL as an argument 
exec("timeout 10s ruby /home/pi/chromereq.rb {$_GET["url"]}");

}
?>

<h3>Web Viewer</h3>
<p>Directions: Enter a URL to be loaded on the Dashboard.</p>
<br>
<form class ="navbar-form navbar-center" role="Player Name" action="index.php" method="get">
<div class="form-group">
	<!-- Gets the URL -->
    URL To Load: <input type="text" name="url">
  </div>
<button type="submit" class="btn btn-primary">Go</button>
</form>

<hr>
<br>
<br>
<br>
</div>


</body>
</html>
