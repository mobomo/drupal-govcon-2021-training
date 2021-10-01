#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

## Deploy Drupal into an auto scaling group
aws cloudformation deploy --stack-name phase6-autoscaling-group-web \
 --template-file ${CWD}/cloudformation/01-web-autoscale-group.yaml \
 --capabilities CAPABILITY_NAMED_IAM \
 --parameter-overrides \
 	ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0 \
 --region us-east-1 \
 --no-fail-on-empty-changeset

## Deploy Nginx into an auto scaling group
aws cloudformation deploy --stack-name phase6-autoscaling-group-nginx \
 --template-file ${CWD}/cloudformation/02-nginx-autoscale-group.yaml \
 --capabilities CAPABILITY_NAMED_IAM \
 --parameter-overrides \
 	ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0 \
 --region us-east-1 \
 --no-fail-on-empty-changeset
