<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211108083319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', author VARCHAR(255) NOT NULL, article LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_uploaded_image (post_id INT NOT NULL, uploaded_image_id INT NOT NULL, INDEX IDX_49C99BD34B89032C (post_id), INDEX IDX_49C99BD3AFC309FC (uploaded_image_id), PRIMARY KEY(post_id, uploaded_image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE uploaded_image (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_uploaded_image ADD CONSTRAINT FK_49C99BD34B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_uploaded_image ADD CONSTRAINT FK_49C99BD3AFC309FC FOREIGN KEY (uploaded_image_id) REFERENCES uploaded_image (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_uploaded_image DROP FOREIGN KEY FK_49C99BD34B89032C');
        $this->addSql('ALTER TABLE post_uploaded_image DROP FOREIGN KEY FK_49C99BD3AFC309FC');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE post_uploaded_image');
        $this->addSql('DROP TABLE uploaded_image');
    }
}
