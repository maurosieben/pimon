#!/bin/bash


url_host=${1:-"default_host"}

prog_dir=$(dirname $0)

config_file_path=$prog_dir/disconnect.sh

echo $config_file_path

cat << EOF > $config_file_path

#! /bin/sh
# /etc/init.d/disconnect.sh

### BEGIN INIT INFO
# Provides:          disconnect.sh
# Required-Start:
# Required-Stop:
# Should-Start:
# Default-Start:     2 3 4 5
# Default-Stop:      0 1 6
# Short-Description: Disconnect dashboard from the database
# Description:
### END INIT INFO

#disc(){

        # gets the given IP using getIP script
        ipaddr=\$(/var/www/scripts/getIP.sh)

        # gets the hostname given
        hostname=\$(hostname)

        # builds an url to masterdash database with the dashboard info
        urlToSend="http://$url_host/unregister.php?ip=\$ipaddr&hostname=\$hostname"

        echo \$urlToSend
        # sends url
        curl \$urlToSend
        #exit 0
#}

case "\$1" in
  start|"")
   # disc
    ;;
  restart|reload|force-reload)
    echo "Error: argument '\$1'not supported" >&2
    exit 3
    ;;
  stop)
    #nothing
    ;;
  status)
    exit 0
    ;;
  *)
    echo "Usage: /etc/init.d/disconnect.sh {start|stop}">&2
    exit 1
    ;;
esac
:

EOF
