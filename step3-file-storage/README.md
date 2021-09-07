
0. Create s3 bucket for assets
aws cloudformation create-stack --stack-name phase3-s3 --template-body file://${PWD}/step3-file-storage/cloudformation/01-create-s3-bucket.yaml

1. Go into container in order to run commands to include s3fs

docker exec -it devcon_web sh

2. change into web root so composer works

cd /var/www/public_html/

3. add s3fs by requiring version specific for drupal9

composer require drupal/s3fs:3.0.0-beta3

4. configure s3fs settings via sites/default/settings.php

cat /var/www/public_html/sites/default/settings.php

5. enable module via drush and copy all local files to s3

drush en -y s3fs
drush s3fs:copy-local

6. clear cache and refresh website to ensure assets are being loaded from aws s3

drush cr