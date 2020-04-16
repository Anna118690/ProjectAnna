<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416124816 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C759E3DC5');
        $this->addSql('DROP INDEX IDX_9474526C759E3DC5 ON comment');
        $this->addSql('ALTER TABLE comment ADD user_comment_id INT DEFAULT NULL, DROP comment_maker_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C5F0EBBFF FOREIGN KEY (user_comment_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526C5F0EBBFF ON comment (user_comment_id)');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB941807E1D');
        $this->addSql('DROP INDEX IDX_169E6FB941807E1D ON course');
        $this->addSql('ALTER TABLE course ADD user_id INT DEFAULT NULL, DROP teacher_id');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB9A76ED395 ON course (user_id)');
        $this->addSql('ALTER TABLE lesson_order DROP FOREIGN KEY FK_BFCF471FCB944F1A');
        $this->addSql('DROP INDEX IDX_BFCF471FCB944F1A ON lesson_order');
        $this->addSql('ALTER TABLE lesson_order ADD user_id INT DEFAULT NULL, DROP student_id');
        $this->addSql('ALTER TABLE lesson_order ADD CONSTRAINT FK_BFCF471FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BFCF471FA76ED395 ON lesson_order (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C5F0EBBFF');
        $this->addSql('DROP INDEX IDX_9474526C5F0EBBFF ON comment');
        $this->addSql('ALTER TABLE comment ADD comment_maker_id INT NOT NULL, DROP user_comment_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C759E3DC5 FOREIGN KEY (comment_maker_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526C759E3DC5 ON comment (comment_maker_id)');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9A76ED395');
        $this->addSql('DROP INDEX IDX_169E6FB9A76ED395 ON course');
        $this->addSql('ALTER TABLE course ADD teacher_id INT NOT NULL, DROP user_id');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB941807E1D FOREIGN KEY (teacher_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB941807E1D ON course (teacher_id)');
        $this->addSql('ALTER TABLE lesson_order DROP FOREIGN KEY FK_BFCF471FA76ED395');
        $this->addSql('DROP INDEX IDX_BFCF471FA76ED395 ON lesson_order');
        $this->addSql('ALTER TABLE lesson_order ADD student_id INT NOT NULL, DROP user_id');
        $this->addSql('ALTER TABLE lesson_order ADD CONSTRAINT FK_BFCF471FCB944F1A FOREIGN KEY (student_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BFCF471FCB944F1A ON lesson_order (student_id)');
    }
}
