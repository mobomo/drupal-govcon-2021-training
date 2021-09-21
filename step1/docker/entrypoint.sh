#!/bin/sh

echo 'entrypoint of app'	

cd /var/www/drupal

mv settings.php web/sites/default/

exec /usr/sbin/httpd -D FOREGROUND -f /etc/apache2/httpd.conf &
exec /usr/sbin/php-fpm7 -F