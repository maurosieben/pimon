#/bin/bash


# gets the given IP using getIP script
ipaddr=$(/var/www/scripts/getIP.sh)

# gets the hostname given
hostname=$(hostname)

# builds an url to masterdash database with the dashboard info
urlToSend="http://coisalinda/register.php?ip=&hostname="

echo $urlToSend
# sends url
curl $urlToSend

echo "Dashboard Registered"


