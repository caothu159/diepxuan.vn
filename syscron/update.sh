#!/bin/sh
#update ip
#wget -q --spider http://www.diepxuan.vn/syscron/update.php
wget -q --spider http://cron.diepxuan.vn/update.php
#php /var/www/html/syscron/update.php

cp /var/log/secure /var/www/html/syscron/secure
cp /etc/hosts.deny /var/www/html/syscron/hosts.deny
chmod 777 /var/www/html/syscron/hosts.deny
#wget -q --spider http://www.diepxuan.vn/syscron/block_hosts.php
wget -q --spider http://cron.diepxuan.vn/block_hosts.php
#php /var/www/html/syscron/block_hosts.php
cp /var/www/html/syscron/hosts.deny /etc/hosts.deny
rm /var/www/html/syscron/secure
rm /var/www/html/syscron/hosts.deny
# > /var/log/secure
