<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150302002410 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('CREATE INDEX search_idx ON client (company_name, note)');
        $this->addSql('ALTER TABLE candidate ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, CHANGE disponibility_negociable disponibility_negociable TINYINT(1) DEFAULT NULL');
        $this->addSql('CREATE INDEX search_idx ON candidate (firstname, lastname, key_skills, disponibility, note)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX search_idx ON candidate');
        $this->addSql('ALTER TABLE candidate DROP created_at, DROP updated_at, CHANGE disponibility_negociable disponibility_negociable TINYINT(1) NOT NULL');
        $this->addSql('DROP INDEX search_idx ON client');
        $this->addSql('ALTER TABLE client DROP created_at, DROP updated_at');
    }
}
