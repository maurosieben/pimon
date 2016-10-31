<?php

echo "Request Successful! ";
echo "Returning Home.";
exec("timeout 10s ruby /home/pi/chromereq.rb {$_GET["url"]}");

?>

<meta http-equiv="refresh" content="1; url=index.html" />
