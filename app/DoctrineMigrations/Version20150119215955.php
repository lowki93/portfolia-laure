<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150119215955 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE pfl_fos_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pfl_workExperience_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE pfl_fos_user (id INT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, locked BOOLEAN NOT NULL, expired BOOLEAN NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, roles TEXT NOT NULL, credentials_expired BOOLEAN NOT NULL, credentials_expire_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7196CAA992FC23A8 ON pfl_fos_user (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7196CAA9A0D96FBF ON pfl_fos_user (email_canonical)');
        $this->addSql('COMMENT ON COLUMN pfl_fos_user.roles IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE pfl_workExperience (id INT NOT NULL, company VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, yourJob VARCHAR(255) NOT NULL, information VARCHAR(255) NOT NULL, year INT NOT NULL, path VARCHAR(255) DEFAULT NULL, createdAt TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updatedAt TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE pfl_fos_user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pfl_workExperience_id_seq CASCADE');
        $this->addSql('DROP TABLE pfl_fos_user');
        $this->addSql('DROP TABLE pfl_workExperience');
    }
}
