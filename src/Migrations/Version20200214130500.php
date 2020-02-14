<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200214130500 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE session_type (id INT AUTO_INCREMENT NOT NULL, label_fr VARCHAR(100) NOT NULL, label_ar VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, district_id INT DEFAULT NULL, season_id INT NOT NULL, roller_type_id INT DEFAULT NULL, label_fr VARCHAR(100) NOT NULL, label_ar VARCHAR(100) NOT NULL, year INT NOT NULL, INDEX IDX_6DC044C5B08FA272 (district_id), INDEX IDX_6DC044C54EC001D1 (season_id), INDEX IDX_6DC044C5B912B2D2 (roller_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typical_day (id INT AUTO_INCREMENT NOT NULL, label_fr VARCHAR(100) NOT NULL, label_ar VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C5B08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C54EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C5B912B2D2 FOREIGN KEY (roller_type_id) REFERENCES roller_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE session_type');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE typical_day');
    }
}
