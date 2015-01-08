#!/bin/bash


# Installation des dépendances
apt-get install update
apt-get install default-jre
gem install sass

# Copie des fichiers
rm -rf /var/www
cp -rf /vagrant/ /var/www
cd /var/www

# Installation des vendor et mise à disposition
rm -rf vendor
composer install
php app/console doctrine:database:create
php app/console doctrine:migration:migrate
php app/console doctrine:fixtures:load

