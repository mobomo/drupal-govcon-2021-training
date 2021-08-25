aws cloudformation create-stack --stack-name phase1-webserver --template-body file://${PWD}/step1/cloudformation/02-create-ec2-instance.yaml --capabilities CAPABILITY_NAMED_IAM --parameters ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0


SSH from bastion host to webservers example

ssh ec2-user@172.31.43.19 -i ~/.ssh/devcon-bastion.pem