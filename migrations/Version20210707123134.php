<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210707123134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hiking (id INT AUTO_INCREMENT NOT NULL, creator VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, time INT NOT NULL, distance DOUBLE PRECISION NOT NULL, elevation INT NOT NULL, highest INT NOT NULL, lowest INT NOT NULL, difficulty VARCHAR(255) NOT NULL, return_point TINYINT(1) NOT NULL, type VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, town VARCHAR(255) NOT NULL, start_point VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, crossing_points LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE hiking');
    }
}
