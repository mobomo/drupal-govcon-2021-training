#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

WEBSERVER_IP=$(aws cloudformation describe-stacks --stack-name phase1-webserver | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="InstancePrivateIP") | .OutputValue')

ssh $WEBSERVER_IP << EOF
  cd /var/app 
  docker-compose -f phase2/docker-compose.yml down
  docker-compose -f phase3/docker-compose.yml up -d --build
  docker exec -u http govcon2021_web sh -c "drush pm-enable s3fs && drush cache-rebuild && drush s3fs-copy-local"
EOF