#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

WEBSERVER_PRIVATE_IP=$(aws cloudformation describe-stacks --stack-name phase1-webserver | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="InstancePrivateIP") | .OutputValue')
WEBSERVER_PUBLIC_IP=$(aws cloudformation describe-stacks --stack-name phase1-webserver | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="InstancePublicIP") | .OutputValue')

aws cloudformation create-stack --stack-name phase5-nginx \
 --template-body file://${CWD}/cloudformation/01-ec2-nginx-instance.yaml \
 --capabilities CAPABILITY_NAMED_IAM \
 --parameters \
 ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0 \
 ParameterKey=WebServerPublicIP,ParameterValue=${WEBSERVER_PUBLIC_IP} \
 ParameterKey=WebServerPrivateIP,ParameterValue=${WEBSERVER_PRIVATE_IP} \
 --region us-east-1