aws cloudformation create-stack --stack-name drupal-devcon-2021-assets --template-body file://${PWD}/step1/cloudformation/01-create-s3-bucket.yaml
aws cloudformation create-stack --stack-name phase1-webserver --template-body file://${PWD}/step1/cloudformation/02-create-ec2-instance.yaml --capabilities CAPABILITY_NAMED_IAM 


SSH from bastion host to webservers example

ssh ec2-user@172.31.43.19 -i ~/.ssh/devcon-bastion.pem