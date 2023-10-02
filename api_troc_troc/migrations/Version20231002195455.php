<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231002195455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE announcement (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, published_by_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, is_delete TINYINT(1) NOT NULL, is_finish TINYINT(1) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, type ENUM(\'search\', \'propose\') NOT NULL COMMENT \'(DC2Type:AnnouncementType)\', longitude DOUBLE PRECISION NOT NULL, lattitude DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL, deleted_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_4DB9D91C12469DE2 (category_id), INDEX IDX_4DB9D91C5B075477 (published_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chat (id INT AUTO_INCREMENT NOT NULL, announcement_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_659DF2AA913AEA17 (announcement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, send_by_id INT DEFAULT NULL, chat_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, date_send DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B6BD307FC3852542 (send_by_id), INDEX IDX_B6BD307F1A9A7125 (chat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notice (id INT AUTO_INCREMENT NOT NULL, published_by_id INT DEFAULT NULL, user_id INT DEFAULT NULL, note INT NOT NULL, text VARCHAR(255) NOT NULL, INDEX IDX_480D45C25B075477 (published_by_id), INDEX IDX_480D45C2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE announcement ADD CONSTRAINT FK_4DB9D91C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE announcement ADD CONSTRAINT FK_4DB9D91C5B075477 FOREIGN KEY (published_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE chat ADD CONSTRAINT FK_659DF2AA913AEA17 FOREIGN KEY (announcement_id) REFERENCES announcement (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FC3852542 FOREIGN KEY (send_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F1A9A7125 FOREIGN KEY (chat_id) REFERENCES chat (id)');
        $this->addSql('ALTER TABLE notice ADD CONSTRAINT FK_480D45C25B075477 FOREIGN KEY (published_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notice ADD CONSTRAINT FK_480D45C2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announcement DROP FOREIGN KEY FK_4DB9D91C12469DE2');
        $this->addSql('ALTER TABLE announcement DROP FOREIGN KEY FK_4DB9D91C5B075477');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AA913AEA17');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC3852542');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F1A9A7125');
        $this->addSql('ALTER TABLE notice DROP FOREIGN KEY FK_480D45C25B075477');
        $this->addSql('ALTER TABLE notice DROP FOREIGN KEY FK_480D45C2A76ED395');
        $this->addSql('DROP TABLE announcement');
        $this->addSql('DROP TABLE chat');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE notice');
    }
}
