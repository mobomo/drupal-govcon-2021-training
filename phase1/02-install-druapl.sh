#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

WEBSERVER_IP=$(aws cloudformation describe-stacks --stack-name phase1-webserver | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="InstancePrivateIP") | .OutputValue')

ssh -o "StrictHostKeyChecking=no" $WEBSERVER_IP << EOF
  docker exec -u http govcon2021_web sh -c "/bootstrap/install-drupal.sh"
EOF
