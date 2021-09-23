#!/bin/bash

WEBSERVER_IP=$(aws cloudformation describe-stacks --stack-name phase1-webserver | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="InstancePrivateIP") | .OutputValue')

ssh $WEBSERVER_IP << EOF
  cd /var/app 
  docker-compose -f step1/docker-compose.yml down
  docker-compose -f step2/docker-compose.yml up -d --build
EOF