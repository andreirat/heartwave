<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170528060118 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE patient_measurements (id INT AUTO_INCREMENT NOT NULL, pacientid INT NOT NULL, heart_chest_pain VARCHAR(255) NOT NULL, heart_rest_bpress DOUBLE PRECISION NOT NULL, blood_sugar_value DOUBLE PRECISION NOT NULL, blood_sugar TINYINT(1) NOT NULL, heart_rest_electro VARCHAR(255) NOT NULL, heart_max_heart_rate INT NOT NULL, heart_disease TINYINT(1) NOT NULL, pulse_frequency INT NOT NULL, pulse_type VARCHAR(255) NOT NULL, body_temp DOUBLE PRECISION NOT NULL, big_t INT NOT NULL, small_t INT NOT NULL, measurement_timestamp DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE patient_measurements');
    }
}
