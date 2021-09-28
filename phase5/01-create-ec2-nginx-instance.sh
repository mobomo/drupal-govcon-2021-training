#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

aws cloudformation create-stack --stack-name phase5-nginx \
 --template-body file://${CWD}/cloudformation/01-ec2-nginx-instance.yaml \
 --capabilities CAPABILITY_NAMED_IAM \
 --parameters ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0 \
 --region us-east-1