#!/bin/sh -xe

echo 'installing drupal'	

cd /var/www/public_html

# wait for database to bootstrap itself before we attempt to run the install command
sleep 10

drush --root=/var/www/public_html site-install standard -vv --account-name=admin --account-pass=admin --yes --db-url=mysql://${MYSQL_USER}:${MYSQL_PASSWORD}@${MYSQL_HOST}:3306/${MYSQL_DATABASE}
drush --root=/var/www/public_html theme:enable lark
drush --root=/var/www/public_html cr
drush --root=/var/www/public_html config-set system.theme admin lark -y