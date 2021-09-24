#!/bin/bash -xe

CWD=$(dirname $0)

aws cloudformation create-stack --stack-name phase3-s3-cloudfront --template-body file://${CWD}/cloudformation/02-create-cloudfront-distribution.yaml \
--parameters \
ParameterKey=BucketName,ParameterValue=drupal-devcon-2021-assets \
ParameterKey=BucketRegion,ParameterValue=us-east-1 \
ParameterKey=DomainCNAME,ParameterValue=cdn.govcon2021.mobomo.net \
ParameterKey=CertificateARN,ParameterValue=arn:aws:acm:us-east-1:418040265006:certificate/f4463002-e9be-4c92-8063-81de15d50e79 \
