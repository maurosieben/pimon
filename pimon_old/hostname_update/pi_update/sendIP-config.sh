#!/bin/bash


url_host=${1:-"default_host"}

prog_dir=$(dirname $0)

config_file_path=$prog_dir/sendIP.sh

echo $config_file_path

cat << EOF > $config_file_path
#/bin/bash


# gets the given IP using getIP script
ipaddr=\$(/var/www/scripts/getIP.sh)

# gets the hostname given
hostname=\$(hostname)

# builds an url to masterdash database with the dashboard info
urlToSend="http://$url_host/register.php?ip=\$ipaddr&hostname=\$hostname"

echo \$urlToSend
# sends url
curl \$urlToSend

echo "Dashboard Registered"


EOF
