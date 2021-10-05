run 01-create-rds-instance.sh and wait for the RDS instance is up

run 02-copy-db.sh to pipe the mysqldump from the local instance to the RDS instance

run 03-create-db-user.sh to create a limited permission user account to use with the drupal install

run 04-migrate-db.sh to make the local docker instance point to the RDS instance

