_PHONY: all build deploy

# templates
all: build deploy

build:
	sam build

deploy:
	sam deploy --profile labs --config-env=labs

# testing
test-build:
	docker build --progress plain -t mobomo/govcon2021-al2-step1 -f ./docker-src/Dockerfile ./docker-src

test-ssh:
	docker exec -it govcon2021 /bin/bash

test-run:
	docker run -it --name govcon2021 mobomo/govcon2021-al2-step1

# utility
get-imageid:
	aws ssm get-parameters --names /aws/service/ami-amazon-linux-latest/amzn2-ami-hvm-x86_64-gp2 --region us-east-1 --output yaml | grep Value | xargs -d' ' -n4 bash -c 'echo $$3'

get-arm-imageid:
	aws ssm get-parameters --names /aws/service/ami-amazon-linux-latest/amzn2-ami-hvm-arm64-gp2 --region us-east-1 --output yaml | grep Value | xargs -d' ' -n4 bash -c 'echo $$3'
