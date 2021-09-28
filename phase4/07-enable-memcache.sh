#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

WEBSERVER_IP=$(aws cloudformation describe-stacks --stack-name phase1-webserver | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="InstancePrivateIP") | .OutputValue')

ssh -o "StrictHostKeyChecking no" $WEBSERVER_IP << EOF
  docker exec -it govcon2021_web sh -c "cd ${DRUPAL_ROOT} && composer require drupal/memcache"
  docker exec -it govcon2021_web sh -c "drush --root=${DRUPAL_ROOT} en -y memcache"
  docker exec -it govcon2021_web sh -c "drush --root=${DRUPAL_ROOT} en -y memcache_admin"
  docker exec -it govcon2021_web sh -c "drush --root=${DRUPAL_ROOT} cr -y"
EOF