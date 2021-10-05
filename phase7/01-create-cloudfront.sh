#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

## Get output of DNS Name from previous phase where nginx was created
DRUPAL_ALB_DNS=$(aws cloudformation describe-stacks --stack-name phase6-autoscaling-group-nginx | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="ALBDNSValue") | .OutputValue')

## Deploy Drupal into an auto scaling group
aws cloudformation create-stack --stack-name phase7-cloudfront \
 --template-body file://${CWD}/cloudformation/01-cloudfront.yaml \
 --capabilities CAPABILITY_NAMED_IAM \
 --parameters \
    ParameterKey=OriginDomainName,ParameterValue=${DRUPAL_ALB_DNS} \
    ParameterKey=DomainCNAME,ParameterValue=www.govcon2021.mobomo.net \
    ParameterKey=CertificateARN,ParameterValue=arn:aws:acm:us-east-1:418040265006:certificate/f4463002-e9be-4c92-8063-81de15d50e79 \
 --region us-east-1 \
