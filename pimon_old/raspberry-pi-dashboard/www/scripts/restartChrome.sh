#! /bin/bash

#rm -rf /home/pi/.cache/chromium/


#Chrome clearing startup script
#Ben Shepherd 2014


ps ax |grep chromium | awk '{ system("kill " $1) }'

sed -i 's/"exited_cleanly": false/"exited_cleanly": true/' /home/pi/.config/chromium/Default/Preferences
echo "Altered Preferences File to Enable Clean Run" >> chromeClearLog.txt
rm -rf /home/pi/.config/chromium/SingletonLock

service lightdm restart



