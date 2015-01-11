#!/bin/bash

# Paramètres
export DEBIAN_FRONTEND=noninteractive
echo 'phpmyadmin phpmyadmin/dbconfig-install boolean true' | debconf-set-selections
echo 'phpmyadmin phpmyadmin/mysql/admin-pass password 123' | debconf-set-selections
echo 'phpmyadmin phpmyadmin/mysql/app-pass password 123' | debconf-set-selections
echo 'phpmyadmin phpmyadmin/app-password-confirm password 123' | debconf-set-selections
echo 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2' | debconf-set-selections

# Installation des dépendances
apt-get update
apt-get -y install phpmyadmin

if [ ! -f "/etc/phpmyadmin/apache.conf.base" ]; then
    cp /etc/phpmyadmin/apache.conf /etc/phpmyadmin/apache.conf.base
fi

echo 'ProxyPassMatch ^/phpmyadmin/(.*\.php(/.*)?)$ fcgi://127.0.0.1:9000/usr/share/phpmyadmin/$1' > /etc/phpmyadmin/apache.conf
echo 'ProxyPassMatch ^/phpmyadmin/(.*\.php(/.*)?)$ fcgi://127.0.0.1:9000/usr/share/phpmyadmin$1index.php' >> /etc/phpmyadmin/apache.conf
cat /etc/phpmyadmin/apache.conf.base >> /etc/phpmyadmin/apache.conf

service apache2 restart