aws cloudformation create-stack --stack-name phase2-rds --template-body file://${PWD}/step2-rds/cloudformation/01-create-rds.yaml \
--parameters \
ParameterKey=WebSecurityGroupId,ParameterValue=sg-08c9d47683c3bb38c \
ParameterKey=DBInstanceClass,ParameterValue=db.t3.small \
ParameterKey=MasterUsername,ParameterValue=drupalmaster \
ParameterKey=MasterPassword,ParameterValue=testingpass



# create drupal user that drupal will use to connect to RDS from
# these commands must be ran from newly created EC2 from step1

# ensure you're in correct directory
cd /var/app

# now with the new database in place, lets create a current backup utilizing drush
docker exec -it devcon_web drush --root=/var/www/public_html sql-dump > gzip > /home/ec2-user/dump.sql.gz

# update db host in .env file
sudo sed -i -e 's/MYSQL_HOST=db/MYSQL_HOST=db.govcon2021.mobomo.net/g' /var/app/.env

# export all env vars from .env to system so we can utilize those values in our sql commands
export $(grep -v '^#' .env | xargs -d '\n')

# bring site down
docker-compose down

# create drupal user and provide neccessary privileges
echo "CREATE USER '$MYSQL_USER'@'%' IDENTIFIED BY '$MYSQL_PASSWORD';" | mysql -h db.govcon2021.mobomo.net -udrupalmaster -ptestingpass 
echo "CREATE DATABASE drupal;" | mysql -h db.govcon2021.mobomo.net -udrupalmaster -ptestingpass 
echo "GRANT ALL PRIVILEGES ON $MYSQL_DATABASE.* TO '$MYSQL_USER'@'%';" | mysql -h db.govcon2021.mobomo.net -udrupalmaster -ptestingpass 
echo "FLUSH PRIVILEGES;" | mysql -h db.govcon2021.mobomo.net -udrupalmaster -ptestingpass 

# import db snapshot into rds
gunzip -c /home/ec2-user/dump.sql.gz | mysql -h db.govcon2021.mobomo.net -udrupalmaster -ptestingpass drupal


