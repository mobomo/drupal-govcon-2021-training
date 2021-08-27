#!/bin/sh -xe

echo 'installing drupal'	

cd /var/www/public_html

# wait for database to bootstrap itself before we attempt to run the install command
sleep 10

drush --root=/var/www/public_html site-install minimal -vv --account-name=admin --account-pass=admin --yes --existing-config

echo "Config found. Processing setting uuid..."

cat ./config/system.site.yml | \
grep uuid | tail -c +7 | head -c 36 | \
drush --root=/var/www/public_html config:set -y system.site uuid -

drush --root=/var/www/public_html config-import -y
drush --root=/var/www/public_html theme:enable lark
drush --root=/var/www/public_html cr
drush --root=/var/www/public_html config-set system.theme admin lark -y