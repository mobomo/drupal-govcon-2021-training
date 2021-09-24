#!/bin/sh

echo 'entrypoint of app'
cd ${DRUPAL_ROOT}

echo 'fix file permissions'
chown http:http ${DRUPAL_ROOT}

echo 'move settings into appropriate place'
mv settings.php web/sites/default/settings.php

exec /usr/sbin/httpd -D FOREGROUND -f /etc/apache2/httpd.conf &
exec /usr/sbin/php-fpm7 -F