<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170527170409 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE patient ADD latitude VARCHAR(255) NOT NULL, ADD longitude VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE hospital ADD latitude VARCHAR(255) NOT NULL, ADD longitude VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE doctor ADD latitude VARCHAR(255) NOT NULL, ADD longitude VARCHAR(255) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE doctor DROP latitude, DROP longitude');
        $this->addSql('ALTER TABLE hospital DROP latitude, DROP longitude');
        $this->addSql('ALTER TABLE patient DROP latitude, DROP longitude');
    }
}
