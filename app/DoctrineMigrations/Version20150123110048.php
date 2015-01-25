<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150123110048 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() != 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql('CREATE INDEX search_idx ON client (company_name, note)');
        $this->addSql('CREATE INDEX search_idx ON candidate (firstname, lastname, key_skills, disponibility, note)');
        $this->addSql('CREATE INDEX search_idx ON job (title)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() != 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql('DROP INDEX search_idx ON candidate');
        $this->addSql('DROP INDEX search_idx ON client');
        $this->addSql('DROP INDEX search_idx ON job');
    }
}
