FROM amazonlinux:latest as base

# Ready environment for PHP7.4
RUN amazon-linux-extras enable php7.4
RUN yum clean metadata

# Get Apache, PHP and other dependencies
RUN yum install -y bash httpd curl tar git procps
RUN yum install -y php php-{common,gd,json,mbstring,opcache,xml,pdo}

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN ln -s /usr/local/bin/composer /usr/bin/composer

# Clone LandoStand into /var/www/html
RUN git clone https://github.com/mobomo/LandoStand-Drupal/
RUN rm -rf /var/www/html
RUN mv LandoStand-Drupal /var/www/html

# Install LandoStand via composer
WORKDIR /var/www/html

# EC2-only configuration
# --
# cd /var/www/html

RUN composer install
RUN ln -s /var/www/html/vendor/bin/drush /usr/bin/drush

# Install MySQL
RUN yum install -y mariadb-server

# Enable services
# EC2-only configuration
# --
# systemctl enable --now httpd
# systemctl enable --now mariadb

# Docker-only configuration
RUN mysql_install_db
RUN chown -R mysql:mysql /var/lib/mysql

# Set password
# EC2-only configuration
# --
# @todo make promptless
# mysql_secure_installation

# Docker-only configuration
RUN amazon-linux-extras install epel
RUN yum install -y supervisor
COPY supervisord.conf /src/supervisord/service.conf
CMD ["supervisord","-c","/src/supervisord/service.conf"]