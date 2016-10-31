<html>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<link href="cover.css" rel="stylesheet">

 <body background="welcome.jpg">

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
            </div>
          </div>

          <div class="inner cover">
            <img src="longLogo.png">
            <h1>Welcome.</h1>
            <h2>IP Address: 

<?php

$result = shell_exec("sh ./scripts/getIP.sh");
echo $result;

?>


</p>
             <h2 class="lead">Admin Interface: 


<a href="
<?php

$result = shell_exec("sh ./scripts/getDNS.sh");
echo "http://$result";

?>
">

<?php

$result = shell_exec("sh ./scripts/getDNS.sh");
echo "http://$result";

?>

</p>

            </p>
          </div>
          </div>

        </div>

      </div>

    </div>
  </body>
<html>
