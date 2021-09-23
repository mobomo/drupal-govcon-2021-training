#!/bin/sh -xe

echo 'installing drupal'	

cd /var/www/drupal

# wait for database to bootstrap itself before we attempt to run the install command
while ! nc -w 2 -z $MYSQL_HOST 3306; do sleep 1; done

drush --root=/var/www/drupal/web site-install minimal -vv --account-name=admin --account-pass=admin --yes --existing-config

echo "Config found. Processing setting uuid..."

cat /var/www/drupal/config/system.site.yml | \
grep uuid | tail -c +7 | head -c 36 | \
drush --root=/var/www/drupal config:set -y system.site uuid -

drush --root=/var/www/drupal config-import -y
drush --root=/var/www/drupal theme:enable lark
drush --root=/var/www/drupal cr
drush --root=/var/www/drupal config-set system.theme admin lark -y