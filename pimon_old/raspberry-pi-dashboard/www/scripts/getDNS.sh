#/bin/bash

/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}' | /usr/bin/nslookup $clientIP |  grep 'name = ' | cut -d: -f2 | awk '{ print $4}'| rev | cut -b 2- |rev
