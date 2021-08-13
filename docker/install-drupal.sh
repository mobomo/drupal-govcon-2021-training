#!/bin/sh -xe

echo 'installing drupal'	

cd /var/www/public_html

drush --root=/var/www/public_html site-install minimal -vv --account-name=admin --account-pass=admin --yes --db-url=mysql://${MYSQL_USER}:${MYSQL_PASSWORD}@${MYSQL_HOST}:3306/${MYSQL_DATABASE}
drush --root=/var/www/public_html theme enable lark
drush --root=/var/www/public_html cr
drush --root=/var/www/public_html theme set admin lark