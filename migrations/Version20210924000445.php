<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210924000445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expansion (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guide (id INT AUTO_INCREMENT NOT NULL, expansion_id INT NOT NULL, name VARCHAR(255) NOT NULL, url VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_CA9EC7355C15249D (expansion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step (id INT AUTO_INCREMENT NOT NULL, guide_id INT NOT NULL, start INT NOT NULL, end INT NOT NULL, count INT NOT NULL, recipe_id INT NOT NULL, INDEX IDX_43B9FE3CD7ED1D4B (guide_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE guide ADD CONSTRAINT FK_CA9EC7355C15249D FOREIGN KEY (expansion_id) REFERENCES expansion (id)');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3CD7ED1D4B FOREIGN KEY (guide_id) REFERENCES guide (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE guide DROP FOREIGN KEY FK_CA9EC7355C15249D');
        $this->addSql('ALTER TABLE step DROP FOREIGN KEY FK_43B9FE3CD7ED1D4B');
        $this->addSql('DROP TABLE expansion');
        $this->addSql('DROP TABLE guide');
        $this->addSql('DROP TABLE profession');
        $this->addSql('DROP TABLE step');
        $this->addSql('DROP TABLE user');
    }
}
