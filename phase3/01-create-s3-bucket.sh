#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source $CWD/.env && set +a

aws cloudformation create-stack --stack-name phase3-s3-bucket --template-body file://${CWD}/cloudformation/01-s3-bucket.yaml \
--parameters \
ParameterKey=BucketName,ParameterValue=drupal-govcon-2021-assets