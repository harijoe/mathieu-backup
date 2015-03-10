<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150310102240 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidate ADD skype_username VARCHAR(255) DEFAULT NULL, DROP handicap, CHANGE address address VARCHAR(255) DEFAULT NULL, CHANGE zipcode zipcode VARCHAR(255) DEFAULT NULL, CHANGE key_skills key_skills VARCHAR(255) NOT NULL, CHANGE note note DOUBLE PRECISION NOT NULL, CHANGE region phone_number VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidate ADD handicap TINYINT(1) DEFAULT NULL, DROP skype_username, CHANGE address address VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE zipcode zipcode VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE key_skills key_skills VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE note note DOUBLE PRECISION DEFAULT NULL, CHANGE phone_number region VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
