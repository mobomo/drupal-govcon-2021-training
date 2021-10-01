#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

## Deploy Drupal into an auto scaling group
aws cloudformation deploy --stack-name phase6-autoscaling-group-web \
 --template-file ${CWD}/cloudformation/01-web-autoscale-group.yaml \
 --capabilities CAPABILITY_NAMED_IAM \
 --parameter-overrides \
 	ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0 \
 --region us-east-1 \
 --no-fail-on-empty-changeset

## Deploy Nginx into an auto scaling group
aws cloudformation deploy --stack-name phase6-autoscaling-group-nginx \
 --template-file ${CWD}/cloudformation/02-nginx-autoscale-group.yaml \
 --capabilities CAPABILITY_NAMED_IAM \
 --parameter-overrides \
 	ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0 \
 --region us-east-1 \
 --no-fail-on-empty-changeset
 
## Get DNS values from stacks
DRUPAL_ALB_DNS=$(aws cloudformation describe-stacks --stack-name phase6-autoscaling-group-web | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="ALBDNSValue") | .OutputValue')
NGINX_ALB_DNS=$(aws cloudformation describe-stacks --stack-name phase6-autoscaling-group-nginx | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="ALBDNSValue") | .OutputValue')

## Update Route53 record for cms hostname
aws route53 change-resource-record-sets --hosted-zone-id Z01629752800X7928YLRP --change-batch file://<(cat << EOF
{
  "Changes": [
    {
      "Action": "DELETE",
      "ResourceRecordSet": {
        "Name": "cms.govcon2021.mobomo.net",
        "Type": "CNAME",
        "TTL": 120,
        "ResourceRecords": [
          {
            "Value": "${DRUPAL_ALB_DNS}"
          }
        ]
      }
    }
  ]
}
EOF
)

## Update Route53 record for www hostname
aws route53 change-resource-record-sets --hosted-zone-id Z01629752800X7928YLRP --change-batch file://<(cat << EOF
{
  "Changes": [
    {
      "Action": "DELETE",
      "ResourceRecordSet": {
        "Name": "www.govcon2021.mobomo.net",
        "Type": "CNAME",
        "TTL": 120,
        "ResourceRecords": [
          {
            "Value": "${NGINX_ALB_DNS}"
          }
        ]
      }
    }
  ]
}
EOF
)