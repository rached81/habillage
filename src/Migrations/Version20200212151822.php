<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200212151822 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE constraint_type (id INT AUTO_INCREMENT NOT NULL, label_fr VARCHAR(255) NOT NULL, label_ar VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, label_fr VARCHAR(50) NOT NULL, label_ar VARCHAR(50) NOT NULL, alias VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(45) NOT NULL, label_ar VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line (id INT AUTO_INCREMENT NOT NULL, district_id_id INT DEFAULT NULL, type_line_id_id INT DEFAULT NULL, label_fr VARCHAR(10) NOT NULL, label_ar VARCHAR(5) NOT NULL, INDEX IDX_D114B4F6D0023964 (district_id_id), INDEX IDX_D114B4F69DC36FF1 (type_line_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_line (id INT AUTO_INCREMENT NOT NULL, label_ar VARCHAR(100) NOT NULL, label_fr VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, matricule VARCHAR(10) NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, date_nais VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE constraint_rh (id INT AUTO_INCREMENT NOT NULL, constraint_type_id_id INT NOT NULL, agent_id_id INT NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, comment LONGTEXT DEFAULT NULL, attachment LONGTEXT DEFAULT NULL, INDEX IDX_4388F84DEA5ECF08 (constraint_type_id_id), INDEX IDX_4388F84D46EAB62F (agent_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE district (id INT AUTO_INCREMENT NOT NULL, label_ar VARCHAR(100) NOT NULL, label_fr VARCHAR(100) NOT NULL, code VARCHAR(5) NOT NULL, alias VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE line ADD CONSTRAINT FK_D114B4F6D0023964 FOREIGN KEY (district_id_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE line ADD CONSTRAINT FK_D114B4F69DC36FF1 FOREIGN KEY (type_line_id_id) REFERENCES type_line (id)');
        $this->addSql('ALTER TABLE constraint_rh ADD CONSTRAINT FK_4388F84DEA5ECF08 FOREIGN KEY (constraint_type_id_id) REFERENCES constraint_type (id)');
        $this->addSql('ALTER TABLE constraint_rh ADD CONSTRAINT FK_4388F84D46EAB62F FOREIGN KEY (agent_id_id) REFERENCES agent (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE constraint_rh DROP FOREIGN KEY FK_4388F84DEA5ECF08');
        $this->addSql('ALTER TABLE line DROP FOREIGN KEY FK_D114B4F69DC36FF1');
        $this->addSql('ALTER TABLE constraint_rh DROP FOREIGN KEY FK_4388F84D46EAB62F');
        $this->addSql('ALTER TABLE line DROP FOREIGN KEY FK_D114B4F6D0023964');
        $this->addSql('DROP TABLE constraint_type');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE line');
        $this->addSql('DROP TABLE type_line');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE constraint_rh');
        $this->addSql('DROP TABLE district');
    }
}
