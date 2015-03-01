<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150210091237 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE published published TINYINT(1) DEFAULT NULL, CHANGE startAt startAt DATETIME DEFAULT NULL, CHANGE expireAt expireAt DATETIME DEFAULT NULL, CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE job job VARCHAR(255) DEFAULT NULL, CHANGE job_type job_type VARCHAR(255) DEFAULT NULL, CHANGE technologies technologies VARCHAR(255) DEFAULT NULL, CHANGE tools tools VARCHAR(255) DEFAULT NULL, CHANGE grade grade VARCHAR(255) DEFAULT NULL, CHANGE position position INT DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE region region VARCHAR(255) DEFAULT NULL, CHANGE summary summary LONGTEXT DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE income_based_on_profile income_based_on_profile TINYINT(1) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job CHANGE published published TINYINT(1) NOT NULL, CHANGE startAt startAt DATETIME NOT NULL, CHANGE expireAt expireAt DATETIME NOT NULL, CHANGE title title VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE job job VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE job_type job_type VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE income_based_on_profile income_based_on_profile TINYINT(1) NOT NULL, CHANGE technologies technologies VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE tools tools VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE grade grade VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE position position INT NOT NULL, CHANGE city city VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE region region VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE summary summary LONGTEXT NOT NULL COLLATE utf8_unicode_ci, CHANGE description description LONGTEXT NOT NULL COLLATE utf8_unicode_ci, CHANGE created_at created_at DATETIME NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');
    }
}
