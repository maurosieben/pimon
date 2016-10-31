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
          <li class="active"><a href="mediaplayer.php">Media Player</a></li>
          <li><a href="settings.php">System Settings</a></li>

        </ul>
      </div>
<br>
<?php


if (isset($_POST['button1']))
{
echo "<div class=\"alert alert-danger\" role=\"alert\">";
echo "Video Killed";
echo "</div>";
// kills the video execution
shell_exec("sh ./scripts/killomx.sh");

}
if (!empty($_GET)) {
// no data passed by get
echo "<div class=\"alert alert-success\" role=\"alert\">";
echo "Request Successful!";
echo "</div>";

shell_exec("sh ./scripts/playVideo.sh {$_GET["url"]} >/dev/null 2>/dev/null &");
}
?>
<h3>Media Player</h3>
<p>Directions: Enter a media file to be played on the Dashboard. File can be local or remote, must be MP4 format.</p>

<br>
<form class ="navbar-form navbar-center" role="Media Link" action="mediaplayer.php" method="get">
<div class="form-group">
    Media To Load: <input type="text" name="url">
  </div>
<button type="submit" class="btn btn-primary">Play</button>
</form>

<div align="right">
Kill playing video

 <span class="btn-group"> 
<form class ="navbar-form navbar-center" role="Media Link" action="mediaplayer.php" method="post">
<button type="submit" text="go" name="button1"  class="btn btn-primary">Kill</button>
</form>
</div>

<hr>
<h3>Local Content</h3>
<?php
// lists all available videos in the directory /etc/videos with a play button 
echo shell_exec("sh ./scripts/listVideos.sh");

?>
</div>

</body>
</html>
