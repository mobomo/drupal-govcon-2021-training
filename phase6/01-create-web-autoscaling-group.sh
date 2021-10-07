#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

## Deploy Drupal into an auto scaling group
aws cloudformation create-stack --stack-name phase6-autoscaling-group-web \
 --template-body file://${CWD}/cloudformation/01-web-autoscale-group.yaml \
 --capabilities CAPABILITY_NAMED_IAM \
 --parameters \
    ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0 \
 --region us-east-1 \
