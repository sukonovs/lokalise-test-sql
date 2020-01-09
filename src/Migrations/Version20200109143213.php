<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109143213 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, phone_number VARCHAR(255) NOT NULL, token VARCHAR(255) NOT NULL, secret VARCHAR(255) NOT NULL, pin VARCHAR(255) NOT NULL, registered_at DATETIME NOT NULL, authenticated_at DATETIME NOT NULL, mya2billing_code VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, new_phone_number VARCHAR(255) NOT NULL, carrier_id INT NOT NULL, notified_at DATETIME NOT NULL, balance_notifications SMALLINT NOT NULL, prev_pin VARCHAR(255) NOT NULL, last_park_request_at DATETIME NOT NULL, selected_did_id VARCHAR(255) NOT NULL, promotion_expires_at DATETIME NOT NULL, promotion_status SMALLINT NOT NULL, admin TINYINT(1) NOT NULL, r2r TINYINT(1) NOT NULL, f2g TINYINT(1) NOT NULL, use_sip TINYINT(1) NOT NULL, INDEX IDX_8D93D649F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE park (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, country_id INT NOT NULL, proxy_id INT NOT NULL, schedule DATETIME NOT NULL, planned_outgoing_calls INT NOT NULL, planned_incoming_calls INT NOT NULL, pin VARCHAR(255) NOT NULL, registered_number VARCHAR(255) NOT NULL, status SMALLINT NOT NULL CHECK (status IN (1, 2, 3, 4)), scheduled_at DATETIME NOT NULL, registered_at DATETIME NOT NULL, cancelled_at DATETIME DEFAULT NULL, already_abroad TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_C4077D33A76ED395 (user_id), INDEX IDX_C4077D33F92F3E70 (country_id), INDEX status__idx (status), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, area_id INT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, rate NUMERIC(5, 2) NOT NULL, registrable TINYINT(1) NOT NULL, supported TINYINT(1) NOT NULL, prefix VARCHAR(255) NOT NULL, exchange_rate NUMERIC(5, 2) NOT NULL, currency VARCHAR(255) NOT NULL, currency_symbol VARCHAR(255) NOT NULL, capital VARCHAR(255) NOT NULL, linked TINYINT(1) NOT NULL, happy_destination TINYINT(1) NOT NULL, r2r TINYINT(1) NOT NULL, INDEX code__idx (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE park ADD CONSTRAINT FK_C4077D33A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE park ADD CONSTRAINT FK_C4077D33F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE park DROP FOREIGN KEY FK_C4077D33A76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F92F3E70');
        $this->addSql('ALTER TABLE park DROP FOREIGN KEY FK_C4077D33F92F3E70');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE park');
        $this->addSql('DROP TABLE country');
    }
}
