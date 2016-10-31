for file in /etc/videos/*; do
  echo "<span class='glyphicon glyphicon-film'></span> ${file##*/} <a href=mediaplayer.php?url=/etc/videos/${file##*/}> "
  echo "<button type='button' class='btn btn-default btn-sm'> <span class='glyphicon glyphicon-play'></span> Play</button></a><br><br>"
done
