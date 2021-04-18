<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318180447 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE seens (user_id INT NOT NULL, movies_id INT NOT NULL, INDEX IDX_8C60557A76ED395 (user_id), INDEX IDX_8C6055753F590A4 (movies_id), PRIMARY KEY(user_id, movies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pendings (user_id INT NOT NULL, movies_id INT NOT NULL, INDEX IDX_A9671159A76ED395 (user_id), INDEX IDX_A967115953F590A4 (movies_id), PRIMARY KEY(user_id, movies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE seens ADD CONSTRAINT FK_8C60557A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seens ADD CONSTRAINT FK_8C6055753F590A4 FOREIGN KEY (movies_id) REFERENCES movies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pendings ADD CONSTRAINT FK_A9671159A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pendings ADD CONSTRAINT FK_A967115953F590A4 FOREIGN KEY (movies_id) REFERENCES movies (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE seens');
        $this->addSql('DROP TABLE pendings');
    }
}
