#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

aws cloudformation create-stack --stack-name phase2-rds --template-body file://${CWD}/cloudformation/02-rds-instance.yaml \
--parameters \
ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0 \
ParameterKey=DBInstanceClass,ParameterValue=db.t3.small \
ParameterKey=MasterUsername,ParameterValue=${MYSQL_ROOT_USER} \
ParameterKey=MasterPassword,ParameterValue=${MYSQL_ROOT_PASSWORD}
