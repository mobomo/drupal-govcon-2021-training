#!/bin/bash

CWD=$(dirname $0)

aws cloudformation create-stack --stack-name phase1-webserver \
 --template-body file://${CWD}/cloudformation/01-create-ec2-instance.yaml \
 --capabilities CAPABILITY_NAMED_IAM \
 --parameters ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0 \
 --region us-east-1