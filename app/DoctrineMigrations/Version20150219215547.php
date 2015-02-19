<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150219215547 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE pfl_portfolio ALTER videolinkheader DROP NOT NULL');
        $this->addSql('ALTER TABLE pfl_portfolio ALTER title DROP NOT NULL');
        $this->addSql('ALTER TABLE pfl_portfolio ALTER type DROP NOT NULL');
        $this->addSql('ALTER TABLE pfl_portfolio ALTER description DROP NOT NULL');
        $this->addSql('ALTER TABLE pfl_portfolio ALTER descriptiondetail DROP NOT NULL');
        $this->addSql('ALTER TABLE pfl_portfolio ALTER videolink DROP NOT NULL');
        $this->addSql('ALTER TABLE pfl_portfolio ALTER sitelink DROP NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE pfl_Portfolio ALTER videoLinkHeader SET NOT NULL');
        $this->addSql('ALTER TABLE pfl_Portfolio ALTER title SET NOT NULL');
        $this->addSql('ALTER TABLE pfl_Portfolio ALTER type SET NOT NULL');
        $this->addSql('ALTER TABLE pfl_Portfolio ALTER description SET NOT NULL');
        $this->addSql('ALTER TABLE pfl_Portfolio ALTER descriptionDetail SET NOT NULL');
        $this->addSql('ALTER TABLE pfl_Portfolio ALTER videoLink SET NOT NULL');
        $this->addSql('ALTER TABLE pfl_Portfolio ALTER siteLink SET NOT NULL');
    }
}
