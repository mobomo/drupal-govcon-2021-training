1. Create Elasticache Instance

	aws cloudformation create-stack --stack-name phase3-elasticache --template-body file://${PWD}/step4-memcache/cloudformation/01-create-elasticache.yaml \
	--parameters \
	ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0 

2. SSH to new Host and download memcache module

	docker exec -it devcon_web drush --root=/var/www/public_html en -y memcache
	
	docker exec -it devcon_web drush --root=/var/www/public_html en -y memcache

	optionally install memcache_admin for on screen statistics

	docker exec -it devcon_web drush --root=/var/www/public_html en -y memcache_admin

3. Clear cache
	docker exec -it devcon_web drush --root=/var/www/public_html en -y cr