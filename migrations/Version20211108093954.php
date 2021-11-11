<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211108093954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE post_uploaded_image');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post_uploaded_image (post_id INT NOT NULL, uploaded_image_id INT NOT NULL, INDEX IDX_49C99BD34B89032C (post_id), INDEX IDX_49C99BD3AFC309FC (uploaded_image_id), PRIMARY KEY(post_id, uploaded_image_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE post_uploaded_image ADD CONSTRAINT FK_49C99BD34B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_uploaded_image ADD CONSTRAINT FK_49C99BD3AFC309FC FOREIGN KEY (uploaded_image_id) REFERENCES uploaded_image (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
