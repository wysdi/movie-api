<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210811031344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actor ADD movie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE actor ADD CONSTRAINT FK_447556F98F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('CREATE INDEX IDX_447556F98F93B6FC ON actor (movie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actor DROP FOREIGN KEY FK_447556F98F93B6FC');
        $this->addSql('DROP INDEX IDX_447556F98F93B6FC ON actor');
        $this->addSql('ALTER TABLE actor DROP movie_id');
    }
}
