<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version4 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE candidate ADD jobOffer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E444417405E FOREIGN KEY (jobOffer_id) REFERENCES job (id)');
        $this->addSql('CREATE INDEX IDX_C8B28E444417405E ON candidate (jobOffer_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E444417405E');
        $this->addSql('DROP INDEX IDX_C8B28E444417405E ON candidate');
        $this->addSql('ALTER TABLE candidate DROP jobOffer_id');
    }
}
