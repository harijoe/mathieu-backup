<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150220135133 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client_contact ADD phone_number VARCHAR(255) NOT NULL, CHANGE profils_wanted skype VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX search_idx ON client');
        $this->addSql('ALTER TABLE client DROP created_at, DROP updated_at');
        $this->addSql('DROP INDEX search_idx ON candidate');
        $this->addSql('ALTER TABLE candidate DROP created_at, DROP updated_at, CHANGE disponibility_negociable disponibility_negociable TINYINT(1) NOT NULL, CHANGE mobility_complement mobility_complement VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidate ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, CHANGE disponibility_negociable disponibility_negociable TINYINT(1) DEFAULT NULL, CHANGE mobility_complement mobility_complement VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('CREATE INDEX search_idx ON candidate (firstname, lastname, key_skills, disponibility, note)');
        $this->addSql('ALTER TABLE client ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('CREATE INDEX search_idx ON client (company_name, note)');
        $this->addSql('ALTER TABLE client_contact ADD profils_wanted VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP skype, DROP phone_number');
    }
}
