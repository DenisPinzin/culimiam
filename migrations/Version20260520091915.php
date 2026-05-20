<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260520091915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, mesure VARCHAR(20) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE dosage ADD ingredient_id INT NOT NULL');
        $this->addSql('ALTER TABLE dosage ADD CONSTRAINT FK_1E3ECAA189312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE dosage ADD CONSTRAINT FK_1E3ECAA1933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('CREATE INDEX IDX_1E3ECAA1933FE08C ON dosage (ingredient_id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390414AE422 FOREIGN KEY (typerepas_id) REFERENCES typerepas (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('ALTER TABLE dosage DROP FOREIGN KEY FK_1E3ECAA189312FE9');
        $this->addSql('ALTER TABLE dosage DROP FOREIGN KEY FK_1E3ECAA1933FE08C');
        $this->addSql('DROP INDEX IDX_1E3ECAA1933FE08C ON dosage');
        $this->addSql('ALTER TABLE dosage DROP ingredient_id');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390A76ED395');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390414AE422');
    }
}
