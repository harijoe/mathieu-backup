<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version3 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE candidate ADD region VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE job ADD job_type VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD region VARCHAR(255) NOT NULL, DROP type, DROP location');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE candidate DROP region');
        $this->addSql('ALTER TABLE job ADD type VARCHAR(255) NOT NULL, ADD location VARCHAR(255) NOT NULL, DROP job_type, DROP city, DROP region');
    }
}
