#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

aws cloudformation deploy --stack-name phase1-webserver \
 --template-file ${CWD}/cloudformation/01-ec2-instance.yaml \
 --capabilities CAPABILITY_NAMED_IAM \
 --parameter-overrides \
 	DefaultSecurityGroupId=sg-af2496b0 \
 --region us-east-1