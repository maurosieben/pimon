Introduction
================
This repo contains all custom-written files used in the development of the PTC Raspberry Pi Smart Dashboard Software.

Folders
---------
`config`
All scripts from /home/pi/.config/autostart area. These include automatic startup scripts for chromium and the initiation of reporting to a Master Dashboard (if configured).

`init.d`
Startup scripts, these run during initial boot. `asplashscreen` shows a PTC Branded splash screen overtop of the default debug text. `setHostname` intelligently sets the system hostname based on other, already configured dashboards - no two dashboards will ever take the same hostname.

`www`
All web application files, including the `scripts` directory, which contains several specialized scripts used for playing videos, grabbing special information, etc.

`vagrant_home`
All files in /home/vagrant/ directory - currently only contains the script to remote-control chromium-browser

## Warning
These files will not necessarily work just by dropping them in. There is some other configuration on the device (e.g. crontab) necessary for full functionality.