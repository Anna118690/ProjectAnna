<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200417190828 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB986383B10');
        $this->addSql('DROP TABLE avatar_course');
        $this->addSql('DROP INDEX IDX_169E6FB986383B10 ON course');
        $this->addSql('ALTER TABLE course ADD course_photo VARCHAR(255) DEFAULT NULL, DROP avatar_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE avatar_course (id INT AUTO_INCREMENT NOT NULL, lien VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE course ADD avatar_id INT DEFAULT NULL, DROP course_photo');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB986383B10 FOREIGN KEY (avatar_id) REFERENCES avatar_course (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB986383B10 ON course (avatar_id)');
    }
}
