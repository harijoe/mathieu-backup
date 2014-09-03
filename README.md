Ardemis Profil Management - Symfony 2.5
========================

1) Installation
----------------------------------

### Vagrant

Installer Virtualbox et Vagrant puis utiliser la commande `vagrant up` pour lancer la création de la VM.

    vagrant up

L'adresse IP publique est : `33.33.33.200`  
Le nom de domaine publique est : `dev.ardemis.com`  

### Se connecter en SSH / SFTP

Une clé SSH publique `id_rsa` liée à l'utilisateur `vagrant` est générée dans le dossier `puphpet/files/dot/ssh`  

### Informations complémentaires

Aucune base de donnée installée par défaut.  
Identifiant base de données  : `root`  
Mot de passe base de données : `123`

2) Installation de Symfony
-------------------------------------
### Transfert des fichiers

Il est nécessaire d'uploader tous les fichiers dans le répertoire `/var/www` de la VM.

### Installation de Symfony
Toutes les commandes ci-dessous sont à effectuer en ligne de commande sur la VM (SSH) dans le répertoire d'installation de Symfony `var/www`

Après avoir uploadé tous les fichiers sur la machine virtuelle lancer l'installation des dépendances avec `composer` :

    composer install

### Installation de la BDD

Lancer la création de la base de données et de son schéma :

    php app/console doctrine:database:create
    php app/console doctrine:schema:create

-------------------------------------
Symfony 2
-------------------------------------

What's inside?
---------------

The Symfony Standard Edition is configured with the following defaults:

  * Twig is the only configured template engine;

  * Doctrine ORM/DBAL is configured;

  * Swiftmailer is configured;

  * Annotations for everything are enabled.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * [**AsseticBundle**][12] - Adds support for Assetic, an asset processing
    library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  http://symfony.com/doc/2.4/book/installation.html
[2]:  http://getcomposer.org/
[3]:  http://symfony.com/download
[4]:  http://symfony.com/doc/2.4/quick_tour/the_big_picture.html
[5]:  http://symfony.com/doc/2.4/index.html
[6]:  http://symfony.com/doc/2.4/bundles/SensioFrameworkExtraBundle/index.html
[7]:  http://symfony.com/doc/2.4/book/doctrine.html
[8]:  http://symfony.com/doc/2.4/book/templating.html
[9]:  http://symfony.com/doc/2.4/book/security.html
[10]: http://symfony.com/doc/2.4/cookbook/email.html
[11]: http://symfony.com/doc/2.4/cookbook/logging/monolog.html
[12]: http://symfony.com/doc/2.4/cookbook/assetic/asset_management.html
[13]: http://symfony.com/doc/2.4/bundles/SensioGeneratorBundle/index.html