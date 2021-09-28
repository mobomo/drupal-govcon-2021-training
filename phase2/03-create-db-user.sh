#!/bin/bash -xe

CWD=$(dirname $0)
set -a && source ${CWD}/.env && set +a

echo "CREATE USER '$MYSQL_USER'@'%' IDENTIFIED BY '$MYSQL_PASSWORD';" | mysql -h ${MYSQL_HOST} -u${MYSQL_ROOT_USER} -p${MYSQL_ROOT_PASSWORD}
echo "GRANT ALL PRIVILEGES ON $MYSQL_DATABASE.* TO '$MYSQL_USER'@'%';" | mysql -h ${MYSQL_HOST} -u${MYSQL_ROOT_USER} -p${MYSQL_ROOT_PASSWORD}
echo "FLUSH PRIVILEGES;" | mysql mysql -h ${MYSQL_HOST} -u${MYSQL_ROOT_USER} -p${MYSQL_ROOT_PASSWORD}
