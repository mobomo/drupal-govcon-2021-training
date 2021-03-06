#!/bin/sh -xe

echo 'installing drupal'	

cd ${DRUPAL_ROOT}

# wait for database to bootstrap itself before we attempt to run the install command
while ! nc -w 2 -z $MYSQL_HOST 3306; do sleep 1; done

drush --root=${DRUPAL_ROOT}/web site-install \
    --account-name=govcon2021 --account-pass=mobomo --account-mail=drupal@mobomo.com \
    --site-mail=drupal@mobomo.com --site-name="Drupal GovCon 2021" \
    --yes --existing-config

echo "Config found. Processing setting uuid..."

cat ${DRUPAL_ROOT}/config/system.site.yml | \
grep uuid | tail -c +7 | head -c 36 | \
drush --root=${DRUPAL_ROOT} config-set -y system.site uuid -
drush --root=${DRUPAL_ROOT} config-import -y
drush --root=${DRUPAL_ROOT} theme-enable lark
drush --root=${DRUPAL_ROOT} config-set system.theme admin lark -y
drush --root=${DRUPAL_ROOT} cache-rebuild