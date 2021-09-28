#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

aws cloudformation create-stack --stack-name phase4-elasticache \
 --template-body file://${CWD}/cloudformation/01-elasticache.yaml \
 --capabilities CAPABILITY_NAMED_IAM \
 --parameters ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0 \
 --region us-east-1