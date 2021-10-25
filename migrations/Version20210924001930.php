<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210924001930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE guide ADD profession_id INT NOT NULL');
        $this->addSql('ALTER TABLE guide ADD CONSTRAINT FK_CA9EC735FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id)');
        $this->addSql('CREATE INDEX IDX_CA9EC735FDEF8996 ON guide (profession_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE guide DROP FOREIGN KEY FK_CA9EC735FDEF8996');
        $this->addSql('DROP INDEX IDX_CA9EC735FDEF8996 ON guide');
        $this->addSql('ALTER TABLE guide DROP profession_id');
    }
}
