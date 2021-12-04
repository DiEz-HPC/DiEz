<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211204134411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_fluid ADD format_image_size_id INT NOT NULL');
        $this->addSql('ALTER TABLE image_fluid ADD CONSTRAINT FK_1A3F66F6987994AB FOREIGN KEY (format_image_size_id) REFERENCES format_image_size (id)');
        $this->addSql('CREATE INDEX IDX_1A3F66F6987994AB ON image_fluid (format_image_size_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_fluid DROP FOREIGN KEY FK_1A3F66F6987994AB');
        $this->addSql('DROP INDEX IDX_1A3F66F6987994AB ON image_fluid');
        $this->addSql('ALTER TABLE image_fluid DROP format_image_size_id');
    }
}
