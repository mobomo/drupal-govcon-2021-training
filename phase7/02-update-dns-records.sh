#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

## Get DNS values from stacks
CLOUDFRONT_DNS=$(aws cloudformation describe-stacks --stack-name phase7-cloudfront | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="CloudFrontDomainName") | .OutputValue')

## Update Route53 record for www hostname
aws route53 change-resource-record-sets --hosted-zone-id Z01629752800X7928YLRP --change-batch file://<(cat << EOF
{
  "Changes": [
    {
      "Action": "UPSERT",
      "ResourceRecordSet": {
        "Name": "www.govcon2021.mobomo.net",
        "Type": "CNAME",
        "TTL": 120,
        "ResourceRecords": [
          {
            "Value": "${CLOUDFRONT_DNS}"
          }
        ]
      }
    }
  ]
}
EOF
)