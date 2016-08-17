#!/bin/bash

# We need to install dependencies only for Docker
[[ ! -e /.dockerenv ]] && [[ ! -e /.dockerinit ]] && exit 0

set -xe

# Install git (the php image doesn't have it) which is required by composer
apt-get update -yqq
apt-get install git unzip -yqq

# Install phpunit, the tool that we will use for testing
curl --location --output /usr/local/bin/phpunit https://phar.phpunit.de/phpunit.phar
chmod +x /usr/local/bin/phpunit

curl --location --output /usr/local/bin/composer https://getcomposer.org/composer.phar
chmod +x /usr/local/bin/composer

echo "date.timezone = UTC" >> /usr/local/etc/php/conf.d/test.ini

docker-php-pecl-install xdebug
