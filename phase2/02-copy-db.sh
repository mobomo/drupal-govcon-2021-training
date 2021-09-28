#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

WEBSERVER_IP=$(aws cloudformation describe-stacks --stack-name phase1-webserver | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="InstancePrivateIP") | .OutputValue')

echo "CREATE DATABASE ${MYSQL_DATABASE}" | mysql -h db.govcon2021.mobomo.net -u${MYSQL_ROOT_USER} -p${MYSQL_ROOT_PASSWORD}

ssh -to "StrictHostKeyChecking=no" $WEBSERVER_IP docker exec -it govcon2021_web drush --root=${DRUPAL_ROOT} sql-dump | pv | mysql -h ${MYSQL_HOST} -u${MYSQL_ROOT_USER} -p${MYSQL_ROOT_PASSWORD} ${MYSQL_DATABASE}