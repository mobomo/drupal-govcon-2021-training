ARG BASE_IMAGE=mobomo/govcon2021-baseimage:1.0.11
FROM ${BASE_IMAGE}

ADD ./drupal/public_html/ /var/www/public_html
ADD ./drupal/storage /var/www/storage
ADD ./drupal/config /var/www/config