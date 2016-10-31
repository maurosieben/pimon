<html>
<title>PTC Dashboard</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<link href="justified-nav.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">

<body>

  <div class="container">

      <div class="masthead">
       <!-- <h3 class="text-muted">Project name</h3> -->

           <img src="longLogo.png"></img>

           <ul class="nav nav-justified">
          <li><a href="index.php">Web Viewer</a></li>
          <li><a href="mediaplayer.php">Media Player</a></li>
          <li class="active"><a href="settings.php">System Settings</a></li>

        </ul>
      </div>

<br>
<?php
if (isset($_POST['restartDesktop']))
{
   //echo "button 1 has been pressed";
echo "<div class=\"alert alert-danger\" role=\"alert\">";
echo "X Restarted";
echo "</div>";

exec("sudo sh ./scripts/restartChrome.sh");

}

if (isset($_POST['rebootPi']))
{
   //echo "button 1 has been pressed";
echo "<div class=\"alert alert-danger\" role=\"alert\">";
echo "Pi is restarting...";
echo "</div>";

exec("sudo shutdown -r now");

}

if (isset($_POST['haltPi']))
{
   //echo "button 1 has been pressed";
echo "<div class=\"alert alert-danger\" role=\"alert\">";
echo "Pi is stopping...";
echo "</div>";

exec("sudo shutdown -h now");
}



?>

 <div class="btn-group">

<form class ="navbar-form navbar-center" role="Media Link" action="settings.php" method="post">
<button type="submit" text="go" name="restartDesktop"  class="btn btn-warning">Restart Desktop</button> <i> Restart Desktop Environment - Load Startup Page </i> <br><br>
<button type="submit" text="go" name="rebootPi"  class="btn btn-danger">Reboot Pi</button> <i> Reboot entire device - This may take a few minutes </i><br><br>
<button type="submit" text="go" name="haltPi"  class="btn btn-danger">Shutdown Pi</button> <i> Shutdown device - WARNING: The device will NOT come back up automatically from this action. </i><br>
</form>

</div>

</html>
