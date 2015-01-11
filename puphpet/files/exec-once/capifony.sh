#!/bin/bash

cd /var/www/ardemis
# Installation des dépendances
apt-get install rubygems
gem install bundler
gem install capifony
bundle install
