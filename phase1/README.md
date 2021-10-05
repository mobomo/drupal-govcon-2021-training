run 01-create-ec2-instance.sh and observe AWS cloudformation console until complete

InstanceIP can be obtained with the following command:
aws cloudformation describe-stacks --stack-name phase1-webserver | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="InstancePrivateIP") | .OutputValue'

run 02-install-drupal.sh or navigate to http://govcon2021.mobomo.net/ and install based on "existing configuration"

Debugging:
ssh @ the IP
/var/log/cloud-init-output.log contains messages to confirm initialization has completed
