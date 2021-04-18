<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210315152259 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favourites_movies DROP FOREIGN KEY FK_5903E2DA4F6A19D0');
        $this->addSql('ALTER TABLE favourites_user DROP FOREIGN KEY FK_1ADE26A4F6A19D0');
        $this->addSql('DROP TABLE favourites');
        $this->addSql('DROP TABLE favourites_movies');
        $this->addSql('DROP TABLE favourites_user');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favourites (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE favourites_movies (favourites_id INT NOT NULL, movies_id INT NOT NULL, INDEX IDX_5903E2DA4F6A19D0 (favourites_id), INDEX IDX_5903E2DA53F590A4 (movies_id), PRIMARY KEY(favourites_id, movies_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE favourites_user (favourites_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_1ADE26A4F6A19D0 (favourites_id), INDEX IDX_1ADE26AA76ED395 (user_id), PRIMARY KEY(favourites_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE favourites_movies ADD CONSTRAINT FK_5903E2DA4F6A19D0 FOREIGN KEY (favourites_id) REFERENCES favourites (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favourites_movies ADD CONSTRAINT FK_5903E2DA53F590A4 FOREIGN KEY (movies_id) REFERENCES movies (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favourites_user ADD CONSTRAINT FK_1ADE26A4F6A19D0 FOREIGN KEY (favourites_id) REFERENCES favourites (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favourites_user ADD CONSTRAINT FK_1ADE26AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
