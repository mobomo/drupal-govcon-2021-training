#!/bin/bash
WEBSERVER_IP=$(aws cloudformation describe-stacks --stack-name phase1-webserver | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="InstancePrivateIP") | .OutputValue')

echo $WEBSERVER_IP

echo "CREATE DATABASE drupal;" | mysql -h db.govcon2021.mobomo.net -udrupalmaster -ptestingpass 

ssh -t $WEBSERVER_IP docker exec -it govcon2021_web drush --root=/var/www/drupal sql-dump | pv | mysql -h db.govcon2021.mobomo.net -udrupalmaster -ptestingpass drupal