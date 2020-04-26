<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200426175212 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE approach (id INT AUTO_INCREMENT NOT NULL, approach VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_comment_id INT NOT NULL, course_id INT NOT NULL, description LONGTEXT NOT NULL, date DATETIME NOT NULL, INDEX IDX_9474526C5F0EBBFF (user_comment_id), INDEX IDX_9474526C591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, language_id INT NOT NULL, level_id INT NOT NULL, approach_id INT NOT NULL, user_id INT DEFAULT NULL, namecourse VARCHAR(100) NOT NULL, short_desc VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price_actual_hour NUMERIC(6, 2) NOT NULL, price_actual_hour_sans_tva NUMERIC(6, 2) DEFAULT NULL, course_photo VARCHAR(255) DEFAULT NULL, INDEX IDX_169E6FB982F1BAF4 (language_id), INDEX IDX_169E6FB95FB14BA7 (level_id), INDEX IDX_169E6FB915140614 (approach_id), INDEX IDX_169E6FB9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE data_file (id INT AUTO_INCREMENT NOT NULL, course_id INT DEFAULT NULL, name VARCHAR(50) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, link VARCHAR(255) NOT NULL, INDEX IDX_37D0FDF2591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, language VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson_order (id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, date_lesson_order DATETIME NOT NULL, price_total NUMERIC(6, 2) NOT NULL, price_total_sans_tva NUMERIC(6, 2) DEFAULT NULL, payment_type VARCHAR(50) DEFAULT NULL, INDEX IDX_BFCF471FCB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson_order_line (id INT AUTO_INCREMENT NOT NULL, course_id INT NOT NULL, lesson_order_id INT NOT NULL, date DATE DEFAULT NULL, hour TIME DEFAULT NULL, duration_min INT NOT NULL, price_full_lesson NUMERIC(6, 2) DEFAULT NULL, price_full_lesson_sans_tva NUMERIC(6, 2) DEFAULT NULL, INDEX IDX_91ECC730591CC992 (course_id), INDEX IDX_91ECC730C5D82721 (lesson_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, level VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, telephone VARCHAR(50) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, skype VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C5F0EBBFF FOREIGN KEY (user_comment_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB95FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB915140614 FOREIGN KEY (approach_id) REFERENCES approach (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE data_file ADD CONSTRAINT FK_37D0FDF2591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE lesson_order ADD CONSTRAINT FK_BFCF471FCB944F1A FOREIGN KEY (student_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE lesson_order_line ADD CONSTRAINT FK_91ECC730591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE lesson_order_line ADD CONSTRAINT FK_91ECC730C5D82721 FOREIGN KEY (lesson_order_id) REFERENCES lesson_order (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB915140614');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C591CC992');
        $this->addSql('ALTER TABLE data_file DROP FOREIGN KEY FK_37D0FDF2591CC992');
        $this->addSql('ALTER TABLE lesson_order_line DROP FOREIGN KEY FK_91ECC730591CC992');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB982F1BAF4');
        $this->addSql('ALTER TABLE lesson_order_line DROP FOREIGN KEY FK_91ECC730C5D82721');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB95FB14BA7');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C5F0EBBFF');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9A76ED395');
        $this->addSql('ALTER TABLE lesson_order DROP FOREIGN KEY FK_BFCF471FCB944F1A');
        $this->addSql('DROP TABLE approach');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE data_file');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE lesson_order');
        $this->addSql('DROP TABLE lesson_order_line');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE user');
    }
}
