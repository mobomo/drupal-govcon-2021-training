#!/bin/sh

echo 'entrypoint of app'	

echo 'setting drupal file permissions'
cd /var/www/public_html

chmod u=rwx,g=rwxs,o=rx ./
find ./ -not -path "sites/default/files*" -exec chown http {} \;
find ./ -not -path "sites/default/files*" -exec chgrp http {} \;
find ./ -not -path "sites/default/files*" -exec chmod u=rwX,g=rwX,o=rX {} \;
find ./ -type d -not -path "sites/default/files*" -exec chmod g+s {} \;
chmod -R u=rwx,g=rwxs,o=rwx sites/default/files

exec /usr/sbin/httpd -D FOREGROUND -f /etc/apache2/httpd.conf &
exec /usr/sbin/php-fpm7 -F