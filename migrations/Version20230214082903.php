<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214082903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX date_text ON annonces_copy');
        $this->addSql('DROP INDEX id_annonce ON annonces_copy');
        $this->addSql('DROP INDEX id_user ON annonces_copy');
        $this->addSql('ALTER TABLE annonces_copy DROP created, DROP date_text, DROP id_user, DROP name_firstname, DROP type, DROP id_ville, DROP zip, DROP city, DROP phone, DROP sms_sent, DROP texto, DROP message, DROP `when`, DROP day, DROP month, DROP year, DROP message2, DROP day2, DROP month2, DROP year2, DROP when2, DROP has_email, DROP has_phone, DROP json_key, DROP service, DROP source, DROP opened, DROP id_django, CHANGE phone_user phone_user VARCHAR(10) NOT NULL, CHANGE title title VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces_copy ADD created VARCHAR(255) NOT NULL, ADD date_text VARCHAR(255) NOT NULL, ADD id_user VARCHAR(255) NOT NULL, ADD name_firstname VARCHAR(255) NOT NULL, ADD type VARCHAR(255) NOT NULL, ADD id_ville VARCHAR(255) NOT NULL, ADD zip VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD phone VARCHAR(10) NOT NULL, ADD sms_sent INT NOT NULL, ADD texto INT NOT NULL, ADD message TEXT NOT NULL, ADD `when` VARCHAR(255) NOT NULL, ADD day VARCHAR(2) NOT NULL, ADD month VARCHAR(2) NOT NULL, ADD year VARCHAR(4) NOT NULL, ADD message2 VARCHAR(255) DEFAULT \'\', ADD day2 INT DEFAULT NULL, ADD month2 INT DEFAULT NULL, ADD year2 INT DEFAULT NULL, ADD when2 INT DEFAULT NULL, ADD has_email INT NOT NULL, ADD has_phone INT NOT NULL, ADD json_key VARCHAR(255) NOT NULL, ADD service INT NOT NULL, ADD source VARCHAR(255) DEFAULT \'\', ADD opened INT NOT NULL, ADD id_django INT NOT NULL, CHANGE phone_user phone_user VARCHAR(255) NOT NULL, CHANGE title title VARCHAR(1000) NOT NULL');
        $this->addSql('CREATE INDEX date_text ON annonces_copy (date_text)');
        $this->addSql('CREATE INDEX id_annonce ON annonces_copy (id_annonce)');
        $this->addSql('CREATE INDEX id_user ON annonces_copy (id_user)');
    }
}
