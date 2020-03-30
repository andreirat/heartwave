<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170527123502 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE hospital_has_doctor (hospital_id INT NOT NULL, doctor_id INT NOT NULL, INDEX IDX_4345EDE563DBB69 (hospital_id), INDEX IDX_4345EDE587F4FB17 (doctor_id), PRIMARY KEY(hospital_id, doctor_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hospital_has_patient (hospital_id INT NOT NULL, patient_id INT NOT NULL, INDEX IDX_6781CC4463DBB69 (hospital_id), INDEX IDX_6781CC446B899279 (patient_id), PRIMARY KEY(hospital_id, patient_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doctor_has_patient (doctor_id INT NOT NULL, patient_id INT NOT NULL, INDEX IDX_FA140BCB87F4FB17 (doctor_id), INDEX IDX_FA140BCB6B899279 (patient_id), PRIMARY KEY(doctor_id, patient_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hospital_has_doctor ADD CONSTRAINT FK_4345EDE563DBB69 FOREIGN KEY (hospital_id) REFERENCES hospital (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hospital_has_doctor ADD CONSTRAINT FK_4345EDE587F4FB17 FOREIGN KEY (doctor_id) REFERENCES doctor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hospital_has_patient ADD CONSTRAINT FK_6781CC4463DBB69 FOREIGN KEY (hospital_id) REFERENCES hospital (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hospital_has_patient ADD CONSTRAINT FK_6781CC446B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doctor_has_patient ADD CONSTRAINT FK_FA140BCB87F4FB17 FOREIGN KEY (doctor_id) REFERENCES doctor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doctor_has_patient ADD CONSTRAINT FK_FA140BCB6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE hospital_has_doctor');
        $this->addSql('DROP TABLE hospital_has_patient');
        $this->addSql('DROP TABLE doctor_has_patient');
    }
}
