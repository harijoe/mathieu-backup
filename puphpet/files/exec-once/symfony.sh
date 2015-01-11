#!/bin/bash

# Installation des dépendances
apt-get update
apt-get -y install default-jre phpmyadmin
gem install sass
ln -s /usr/local/rvm/gems/*/bin/sass /usr/local/bin/sass

# Copie des fichiers
rm -rf /var/www/ardemis
cp -rf /vagrant/ /var/www/ardemis
cd /var/www/ardemis

# Installation des vendor et mise à disposition
cp app/config/parameters.yml.dist app/config/parameters.yml
composer install
php app/console doctrine:database:create -n
php app/console doctrine:migration:migrate -n
php app/console doctrine:fixtures:load -n
php app/console assets:install --symlink -n
php app/console assetic:dump
php app/console fos:user:create --super-admin admin admin@admin.net 123

chown -R vagrant:vagrant .
chmod -R 777 app/cache app/logs
