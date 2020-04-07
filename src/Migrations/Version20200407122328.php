<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200407122328 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson_order_line ADD lesson_order_id INT NOT NULL, ADD course_id INT NOT NULL');
        $this->addSql('ALTER TABLE lesson_order_line ADD CONSTRAINT FK_91ECC730C5D82721 FOREIGN KEY (lesson_order_id) REFERENCES lesson_order (id)');
        $this->addSql('ALTER TABLE lesson_order_line ADD CONSTRAINT FK_91ECC730591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('CREATE INDEX IDX_91ECC730C5D82721 ON lesson_order_line (lesson_order_id)');
        $this->addSql('CREATE INDEX IDX_91ECC730591CC992 ON lesson_order_line (course_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson_order_line DROP FOREIGN KEY FK_91ECC730C5D82721');
        $this->addSql('ALTER TABLE lesson_order_line DROP FOREIGN KEY FK_91ECC730591CC992');
        $this->addSql('DROP INDEX IDX_91ECC730C5D82721 ON lesson_order_line');
        $this->addSql('DROP INDEX IDX_91ECC730591CC992 ON lesson_order_line');
        $this->addSql('ALTER TABLE lesson_order_line DROP lesson_order_id, DROP course_id');
    }
}
