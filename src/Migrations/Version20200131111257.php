<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200131111257 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FB748AAC3');
        $this->addSql('DROP INDEX UNIQ_C53D045FB748AAC3 ON image');
        $this->addSql('ALTER TABLE image ADD serie INT NOT NULL, DROP serie_id_id, DROP id_serie, DROP serie_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image ADD id_serie INT NOT NULL, ADD serie_id INT NOT NULL, CHANGE serie serie_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FB748AAC3 FOREIGN KEY (serie_id_id) REFERENCES serie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C53D045FB748AAC3 ON image (serie_id_id)');
    }
}
