<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200408110247 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE course ADD approach_id INT NOT NULL, ADD language_id INT NOT NULL, ADD level_id INT NOT NULL, ADD avatar_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB915140614 FOREIGN KEY (approach_id) REFERENCES approach (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB95FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB986383B10 FOREIGN KEY (avatar_id) REFERENCES avatar_course (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB915140614 ON course (approach_id)');
        $this->addSql('CREATE INDEX IDX_169E6FB982F1BAF4 ON course (language_id)');
        $this->addSql('CREATE INDEX IDX_169E6FB95FB14BA7 ON course (level_id)');
        $this->addSql('CREATE INDEX IDX_169E6FB986383B10 ON course (avatar_id)');
        $this->addSql('ALTER TABLE data_file ADD course_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE data_file ADD CONSTRAINT FK_37D0FDF2591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('CREATE INDEX IDX_37D0FDF2591CC992 ON data_file (course_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB915140614');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB982F1BAF4');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB95FB14BA7');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB986383B10');
        $this->addSql('DROP INDEX IDX_169E6FB915140614 ON course');
        $this->addSql('DROP INDEX IDX_169E6FB982F1BAF4 ON course');
        $this->addSql('DROP INDEX IDX_169E6FB95FB14BA7 ON course');
        $this->addSql('DROP INDEX IDX_169E6FB986383B10 ON course');
        $this->addSql('ALTER TABLE course DROP approach_id, DROP language_id, DROP level_id, DROP avatar_id');
        $this->addSql('ALTER TABLE data_file DROP FOREIGN KEY FK_37D0FDF2591CC992');
        $this->addSql('DROP INDEX IDX_37D0FDF2591CC992 ON data_file');
        $this->addSql('ALTER TABLE data_file DROP course_id');
    }
}
