
#! /bin/bash

#Chrome clearing startup script
#Ben Shepherd 2014

sed -i 's/"exited_cleanly": false/"exited_cleanly": true/' /home/pi/.config/chromium/Default/Preferences
echo "Altered Preferences File to Enable Clean Run" >> chromeClearLog.txt
rm -rf /home/pi/.config/chromium/SingletonLock

# open the browser in full screen mode. Allow remote connection on port 9222. Opens a default web page
# chromium-browser --no-first-run --kiosk --remote-debugging-port=9222 'http://localhost/welcome.php'
chromium-browser --no-first-run --kiosk --remote-debugging-port=9222 http://bla-ce6-utf1183:4567/summary
