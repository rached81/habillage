<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200214140042 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dressing_type (id INT AUTO_INCREMENT NOT NULL, label_fr VARCHAR(255) NOT NULL, label_ar VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dressing (id INT AUTO_INCREMENT NOT NULL, agent_id INT DEFAULT NULL, session_id INT DEFAULT NULL, line_id INT NOT NULL, dressing_type_id INT DEFAULT NULL, created_at DATETIME NOT NULL, update_at DATETIME NOT NULL, date DATE NOT NULL, INDEX IDX_BA1BF9D33414710B (agent_id), INDEX IDX_BA1BF9D3613FECDF (session_id), INDEX IDX_BA1BF9D34D7B7542 (line_id), INDEX IDX_BA1BF9D3FB1681F6 (dressing_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, session_type_id INT DEFAULT NULL, tour_program_id INT NOT NULL, typical_day_id INT DEFAULT NULL, start_time TIME NOT NULL, end_time TIME NOT NULL, INDEX IDX_D044D5D4D7940EC9 (session_type_id), INDEX IDX_D044D5D4D8641195 (tour_program_id), INDEX IDX_D044D5D48BDBFC07 (typical_day_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tour_program (id INT AUTO_INCREMENT NOT NULL, groupe_id INT NOT NULL, line_id INT DEFAULT NULL, code VARCHAR(10) NOT NULL, amplitude TIME NOT NULL, driver_paid_hours VARCHAR(255) NOT NULL, receiver_paid_hours VARCHAR(100) NOT NULL, INDEX IDX_D207F2057A45358C (groupe_id), INDEX IDX_D207F2054D7B7542 (line_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dressing ADD CONSTRAINT FK_BA1BF9D33414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        $this->addSql('ALTER TABLE dressing ADD CONSTRAINT FK_BA1BF9D3613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE dressing ADD CONSTRAINT FK_BA1BF9D34D7B7542 FOREIGN KEY (line_id) REFERENCES line (id)');
        $this->addSql('ALTER TABLE dressing ADD CONSTRAINT FK_BA1BF9D3FB1681F6 FOREIGN KEY (dressing_type_id) REFERENCES dressing_type (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4D7940EC9 FOREIGN KEY (session_type_id) REFERENCES session_type (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4D8641195 FOREIGN KEY (tour_program_id) REFERENCES tour_program (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D48BDBFC07 FOREIGN KEY (typical_day_id) REFERENCES typical_day (id)');
        $this->addSql('ALTER TABLE tour_program ADD CONSTRAINT FK_D207F2057A45358C FOREIGN KEY (groupe_id) REFERENCES `group` (id)');
        $this->addSql('ALTER TABLE tour_program ADD CONSTRAINT FK_D207F2054D7B7542 FOREIGN KEY (line_id) REFERENCES line (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dressing DROP FOREIGN KEY FK_BA1BF9D3FB1681F6');
        $this->addSql('ALTER TABLE dressing DROP FOREIGN KEY FK_BA1BF9D3613FECDF');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4D8641195');
        $this->addSql('DROP TABLE dressing_type');
        $this->addSql('DROP TABLE dressing');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE tour_program');
    }
}
