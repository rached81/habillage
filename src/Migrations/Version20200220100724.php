<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200220100724 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tour_program DROP FOREIGN KEY FK_D207F2057A45358C');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('ALTER TABLE line DROP FOREIGN KEY FK_D114B4F69DC36FF1');
        $this->addSql('ALTER TABLE line DROP FOREIGN KEY FK_D114B4F6D0023964');
        $this->addSql('DROP INDEX IDX_D114B4F69DC36FF1 ON line');
        $this->addSql('DROP INDEX IDX_D114B4F6D0023964 ON line');
        $this->addSql('ALTER TABLE line ADD district_id INT DEFAULT NULL, ADD type_line_id INT DEFAULT NULL, DROP district_id_id, DROP type_line_id_id');
        $this->addSql('ALTER TABLE line ADD CONSTRAINT FK_D114B4F6B08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE line ADD CONSTRAINT FK_D114B4F6655A1AB7 FOREIGN KEY (type_line_id) REFERENCES type_line (id)');
        $this->addSql('CREATE INDEX IDX_D114B4F6B08FA272 ON line (district_id)');
        $this->addSql('CREATE INDEX IDX_D114B4F6655A1AB7 ON line (type_line_id)');
        $this->addSql('ALTER TABLE tour_program DROP FOREIGN KEY FK_D207F2057A45358C');
        $this->addSql('ALTER TABLE tour_program ADD CONSTRAINT FK_D207F2057A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, district_id INT DEFAULT NULL, season_id INT NOT NULL, roller_type_id INT DEFAULT NULL, label_fr VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, label_ar VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, year INT NOT NULL, INDEX IDX_6DC044C54EC001D1 (season_id), INDEX IDX_6DC044C5B08FA272 (district_id), INDEX IDX_6DC044C5B912B2D2 (roller_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C54EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C5B08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C5B912B2D2 FOREIGN KEY (roller_type_id) REFERENCES roller_type (id)');
        $this->addSql('ALTER TABLE line DROP FOREIGN KEY FK_D114B4F6B08FA272');
        $this->addSql('ALTER TABLE line DROP FOREIGN KEY FK_D114B4F6655A1AB7');
        $this->addSql('DROP INDEX IDX_D114B4F6B08FA272 ON line');
        $this->addSql('DROP INDEX IDX_D114B4F6655A1AB7 ON line');
        $this->addSql('ALTER TABLE line ADD district_id_id INT DEFAULT NULL, ADD type_line_id_id INT DEFAULT NULL, DROP district_id, DROP type_line_id');
        $this->addSql('ALTER TABLE line ADD CONSTRAINT FK_D114B4F69DC36FF1 FOREIGN KEY (type_line_id_id) REFERENCES type_line (id)');
        $this->addSql('ALTER TABLE line ADD CONSTRAINT FK_D114B4F6D0023964 FOREIGN KEY (district_id_id) REFERENCES district (id)');
        $this->addSql('CREATE INDEX IDX_D114B4F69DC36FF1 ON line (type_line_id_id)');
        $this->addSql('CREATE INDEX IDX_D114B4F6D0023964 ON line (district_id_id)');
        $this->addSql('ALTER TABLE tour_program DROP FOREIGN KEY FK_D207F2057A45358C');
        $this->addSql('ALTER TABLE tour_program ADD CONSTRAINT FK_D207F2057A45358C FOREIGN KEY (groupe_id) REFERENCES `group` (id)');
    }
}
