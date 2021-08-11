ARG BASE_IMAGE=mobomo/govcon2021-baseimage:latest
FROM ${BASE_IMAGE}

ADD ./drupal/public_html/ /var/www/public_html
ADD ./drupal/storage /var/www/storage
ADD ./drupal/config /var/www/config