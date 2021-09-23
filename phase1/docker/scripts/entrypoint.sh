#!/bin/sh


cd /var/www/drupal

echo 'entrypoint of app'	

echo 'fix file permissions'
chown http:http /var/www/drupal

echo 'move settings into appropriate place'
mv settings.php web/sites/default/settings.php

exec /usr/sbin/httpd -D FOREGROUND -f /etc/apache2/httpd.conf &
exec /usr/sbin/php-fpm7 -F