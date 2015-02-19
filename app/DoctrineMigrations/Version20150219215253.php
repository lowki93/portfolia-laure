<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150219215253 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE pfl_Image_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pfl_Portfolio_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE pfl_Image (id INT NOT NULL, portfolio_id INT DEFAULT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_733E3EB2B96B5643 ON pfl_Image (portfolio_id)');
        $this->addSql('CREATE TABLE pfl_Portfolio (id INT NOT NULL, videoLinkHeader VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, descriptionDetail VARCHAR(255) NOT NULL, videoLink VARCHAR(255) NOT NULL, siteLink VARCHAR(255) NOT NULL, createdAt TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updatedAt TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE pfl_Image ADD CONSTRAINT FK_733E3EB2B96B5643 FOREIGN KEY (portfolio_id) REFERENCES pfl_Portfolio (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE pfl_Image DROP CONSTRAINT FK_733E3EB2B96B5643');
        $this->addSql('DROP SEQUENCE pfl_Image_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pfl_Portfolio_id_seq CASCADE');
        $this->addSql('DROP TABLE pfl_Image');
        $this->addSql('DROP TABLE pfl_Portfolio');
    }
}
