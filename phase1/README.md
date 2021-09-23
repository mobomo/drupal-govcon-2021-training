run 01-create-stack.sh and observe AWS cloudformation console until complete

InstanceIP can be obtained with the following command:
aws cloudformation describe-stacks --stack-name phase1-webserver | jq -r '.Stacks[0].Outputs[] | select(.OutputKey=="InstancePrivateIP") | .OutputValue'
