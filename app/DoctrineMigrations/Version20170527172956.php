<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170527172956 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE patient CHANGE latitude latitude VARCHAR(255) DEFAULT NULL, CHANGE longitude longitude VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hospital CHANGE latitude latitude VARCHAR(255) DEFAULT NULL, CHANGE longitude longitude VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE doctor CHANGE latitude latitude VARCHAR(255) DEFAULT NULL, CHANGE longitude longitude VARCHAR(255) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE doctor CHANGE latitude latitude VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE longitude longitude VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE hospital CHANGE latitude latitude VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE longitude longitude VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE patient CHANGE latitude latitude VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE longitude longitude VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
