#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

WEBSERVER_IP=$(aws cloudformation describe-stacks --stack-name phase1-webserver | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="InstancePrivateIP") | .OutputValue')
RPROXY_PRIVATE_IP=$(aws cloudformation describe-stacks --stack-name phase5-nginx | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="InstancePrivateIP") | .OutputValue')

ssh -o "StrictHostKeyChecking=no" $WEBSERVER_IP << EOF
  cd /var/app 
  export REVERSE_PROXY_ADDRESSES=${RPROXY_PRIVATE_IP}
  docker-compose -f phase4/docker-compose.yml down
  docker-compose -f phase5/docker-compose-web.yml up -d
EOF