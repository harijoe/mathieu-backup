<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141212091715 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE ardemis_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, api_key VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_6E76FFA792FC23A8 (username_canonical), UNIQUE INDEX UNIQ_6E76FFA7A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_contact (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, profils_wanted VARCHAR(255) NOT NULL, INDEX IDX_1E5FA24519EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, agency_id INT DEFAULT NULL, company_name VARCHAR(255) NOT NULL, zipcode VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, activity VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, `update` VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, INDEX IDX_C7440455CDEADB2A (agency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, path LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, cv_id INT DEFAULT NULL, motivation_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zipcode VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, disponibility VARCHAR(255) NOT NULL, disponibility_negociable TINYINT(1) NOT NULL, experience VARCHAR(255) NOT NULL, mobility VARCHAR(255) NOT NULL, mobility_complement VARCHAR(255) NOT NULL, grade VARCHAR(255) NOT NULL, grade_complement VARCHAR(255) DEFAULT NULL, job VARCHAR(255) NOT NULL, income VARCHAR(255) NOT NULL, languages VARCHAR(255) NOT NULL, key_skills VARCHAR(255) DEFAULT NULL, handicap TINYINT(1) NOT NULL, jobOffer_id INT NOT NULL, UNIQUE INDEX UNIQ_C8B28E44CFE419E2 (cv_id), UNIQUE INDEX UNIQ_C8B28E448EDBCD4E (motivation_id), INDEX IDX_C8B28E444417405E (jobOffer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, agency_id INT NOT NULL, createdAt DATETIME NOT NULL, publishedAt DATETIME DEFAULT NULL, published TINYINT(1) NOT NULL, startAt DATETIME NOT NULL, expireAt DATETIME NOT NULL, title VARCHAR(255) NOT NULL, job VARCHAR(255) NOT NULL, job_type VARCHAR(255) NOT NULL, income_type VARCHAR(255) NOT NULL, income VARCHAR(255) NOT NULL, technologies VARCHAR(255) NOT NULL, tools VARCHAR(255) NOT NULL, grade VARCHAR(255) NOT NULL, position INT NOT NULL, city VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, summary LONGTEXT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_FBD8E0F8CDEADB2A (agency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agency (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, twitterCount INT NOT NULL, facebookCount INT NOT NULL, linkedinCount INT NOT NULL, viadeoCount INT NOT NULL, clientCount INT NOT NULL, jobCount INT NOT NULL, profilCount INT NOT NULL, talkCount INT NOT NULL, collaboratorCount INT NOT NULL, agencyCount INT NOT NULL, hourstalkCount INT NOT NULL, hoursphoneCount INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client_contact ADD CONSTRAINT FK_1E5FA24519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455CDEADB2A FOREIGN KEY (agency_id) REFERENCES agency (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44CFE419E2 FOREIGN KEY (cv_id) REFERENCES document (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E448EDBCD4E FOREIGN KEY (motivation_id) REFERENCES document (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E444417405E FOREIGN KEY (jobOffer_id) REFERENCES job (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8CDEADB2A FOREIGN KEY (agency_id) REFERENCES agency (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE client_contact DROP FOREIGN KEY FK_1E5FA24519EB6921');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44CFE419E2');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E448EDBCD4E');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E444417405E');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455CDEADB2A');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8CDEADB2A');
        $this->addSql('DROP TABLE ardemis_user');
        $this->addSql('DROP TABLE client_contact');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE agency');
    }
}
