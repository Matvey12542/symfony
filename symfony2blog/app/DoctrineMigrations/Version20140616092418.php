<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140616092418 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Post ADD CONSTRAINT FK_FAB8C3B3F675F31B FOREIGN KEY (author_id) REFERENCES Author (id)");
        $this->addSql("ALTER TABLE product ADD slug VARCHAR(255) NOT NULL, CHANGE name name VARCHAR(100) NOT NULL, CHANGE price price NUMERIC(10, 2) NOT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Post DROP FOREIGN KEY FK_FAB8C3B3F675F31B");
        $this->addSql("ALTER TABLE product DROP slug, CHANGE name name VARCHAR(255) NOT NULL, CHANGE price price DOUBLE PRECISION NOT NULL");
    }
}
