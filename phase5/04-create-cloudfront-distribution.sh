#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source $CWD/.env && set +a

aws cloudformation create-stack --stack-name phase3-s3-cloudfront --template-body file://${CWD}/cloudformation/04-cloudfront-distribution.yaml \
--parameters \
ParameterKey=BucketName,ParameterValue=${S3_BUCKET_NAME} \
ParameterKey=BucketRegion,ParameterValue=us-east-1 \
ParameterKey=DomainCNAME,ParameterValue=cdn.govcon2021.mobomo.net \
ParameterKey=CertificateARN,ParameterValue=arn:aws:acm:us-east-1:418040265006:certificate/f4463002-e9be-4c92-8063-81de15d50e79 \
