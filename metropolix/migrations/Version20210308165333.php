<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308165333 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movies (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, backdrop_path VARCHAR(255) NOT NULL, poster_path VARCHAR(255) NOT NULL, original_language VARCHAR(255) NOT NULL, overview LONGTEXT NOT NULL, popularity INT NOT NULL, release_date VARCHAR(255) NOT NULL, video_path VARCHAR(255) NOT NULL, vote_average INT NOT NULL, vote_count INT NOT NULL, runtime INT NOT NULL, origin_country VARCHAR(255) NOT NULL, director VARCHAR(255) NOT NULL, writer VARCHAR(255) NOT NULL, cast LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE movies');
    }
}
