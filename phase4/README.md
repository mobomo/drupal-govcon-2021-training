1. Create Elasticache Instance

	aws cloudformation create-stack --stack-name phase3-elasticache --template-body file://${PWD}/step4-memcache/cloudformation/01-create-elasticache.yaml \
	--parameters \
	ParameterKey=DefaultSecurityGroupId,ParameterValue=sg-af2496b0 

2. Run composer command against container to install composer

	docker exec -it devcon_web sh -c "cd /var/www/public_html && composer require drupal/memcache"
	
3. Enable composer in Drupal via Drush

	docker exec -it devcon_web drush --root=/var/www/public_html en -y memcache

	optionally install memcache_admin for on screen statistics

	docker exec -it devcon_web drush --root=/var/www/public_html en -y memcache_admin

3. Clear cache
	docker exec -it devcon_web drush --root=/var/www/public_html cr