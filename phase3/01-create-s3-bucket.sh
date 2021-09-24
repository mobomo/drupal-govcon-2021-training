#!/bin/bash -xe

CWD=$(dirname $0)

aws cloudformation create-stack --stack-name phase3-s3-bucket --template-body file://${CWD}/cloudformation/01-create-s3-bucket.yaml \
--parameters \
ParameterKey=BucketName,ParameterValue=drupal-devcon-2021-assets