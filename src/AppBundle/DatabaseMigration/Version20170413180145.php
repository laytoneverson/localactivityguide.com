<?php

namespace AppBundle\DatabaseMigration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170413180145 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE activity_region (id INT AUTO_INCREMENT NOT NULL, state_id INT DEFAULT NULL, region_label VARCHAR(255) DEFAULT NULL, INDEX IDX_5D1411765D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, map_url VARCHAR(255) DEFAULT NULL, geo_names_id VARCHAR(255) DEFAULT NULL, placeDiscriminator VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT NOT NULL, activity_region_id INT NOT NULL, county_id INT DEFAULT NULL, city_name VARCHAR(255) DEFAULT NULL, website_url VARCHAR(255) DEFAULT NULL, INDEX IDX_2D5B02347F3E26E2 (activity_region_id), INDEX IDX_2D5B023485E73F45 (county_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_card (id INT AUTO_INCREMENT NOT NULL, card_label VARCHAR(255) DEFAULT NULL, email_address VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, contact_notes VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE PostalAddress2ContactCard (contact_card_id INT NOT NULL, postal_address_id INT NOT NULL, INDEX IDX_2B41686DD0E3BBA1 (contact_card_id), INDEX IDX_2B41686DFD54954B (postal_address_id), PRIMARY KEY(contact_card_id, postal_address_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE OperationHours2ContactCard (contact_card_id INT NOT NULL, operation_hours_id INT NOT NULL, INDEX IDX_26CDB8DFD0E3BBA1 (contact_card_id), INDEX IDX_26CDB8DFC6D31B6B (operation_hours_id), PRIMARY KEY(contact_card_id, operation_hours_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT NOT NULL, code VARCHAR(3) DEFAULT NULL, telephone_calling_code VARCHAR(4) DEFAULT NULL, UNIQUE INDEX UNIQ_5373C96677153098 (code), UNIQUE INDEX UNIQ_5373C96668BBB130 (telephone_calling_code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE county (id INT NOT NULL, state_id INT DEFAULT NULL, county_name VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_58E2FF255D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation_hours (id INT AUTO_INCREMENT NOT NULL, valid_start_date DATETIME NOT NULL, valid_end_date DATETIME NOT NULL, open_time TIME NOT NULL, close_time TIME NOT NULL, day_of_week INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE postal_address (id INT AUTO_INCREMENT NOT NULL, postal_code_id INT DEFAULT NULL, street_address VARCHAR(255) DEFAULT NULL, po_box_number VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, state VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, INDEX IDX_972EFBF7BDBA6A61 (postal_code_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE postal_code (id INT AUTO_INCREMENT NOT NULL, activity_region_id INT DEFAULT NULL, country_id INT DEFAULT NULL, city_id INT DEFAULT NULL, state_id INT DEFAULT NULL, country_code VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, place_name VARCHAR(255) DEFAULT NULL, admin_state_name VARCHAR(255) DEFAULT NULL, admin_state_code VARCHAR(255) DEFAULT NULL, admin_county_code VARCHAR(255) DEFAULT NULL, admin_count_name VARCHAR(255) DEFAULT NULL, community_subdivision_code VARCHAR(255) DEFAULT NULL, commuinity_subdivision_name VARCHAR(255) DEFAULT NULL, county_id INT DEFAULT NULL, INDEX IDX_EA98E3767F3E26E2 (activity_region_id), INDEX IDX_EA98E376F92F3E70 (country_id), INDEX IDX_EA98E3768BAC62AF (city_id), INDEX IDX_EA98E3765D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE state (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, code VARCHAR(3) NOT NULL, description LONGTEXT DEFAULT NULL, website_url VARCHAR(255) DEFAULT NULL, INDEX IDX_A393D2FBF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telephone_number (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, contact_card_id INT DEFAULT NULL, phone_number VARCHAR(15) DEFAULT NULL, phone_number_type VARCHAR(255) DEFAULT NULL, country_code VARCHAR(4) DEFAULT NULL, is_toll_free TINYINT(1) DEFAULT NULL, INDEX IDX_337542DEF92F3E70 (country_id), INDEX IDX_337542DED0E3BBA1 (contact_card_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity_region ADD CONSTRAINT FK_5D1411765D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B02347F3E26E2 FOREIGN KEY (activity_region_id) REFERENCES activity_region (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B023485E73F45 FOREIGN KEY (county_id) REFERENCES county (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234BF396750 FOREIGN KEY (id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE PostalAddress2ContactCard ADD CONSTRAINT FK_2B41686DD0E3BBA1 FOREIGN KEY (contact_card_id) REFERENCES contact_card (id)');
        $this->addSql('ALTER TABLE PostalAddress2ContactCard ADD CONSTRAINT FK_2B41686DFD54954B FOREIGN KEY (postal_address_id) REFERENCES postal_address (id)');
        $this->addSql('ALTER TABLE OperationHours2ContactCard ADD CONSTRAINT FK_26CDB8DFD0E3BBA1 FOREIGN KEY (contact_card_id) REFERENCES contact_card (id)');
        $this->addSql('ALTER TABLE OperationHours2ContactCard ADD CONSTRAINT FK_26CDB8DFC6D31B6B FOREIGN KEY (operation_hours_id) REFERENCES operation_hours (id)');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C966BF396750 FOREIGN KEY (id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE county ADD CONSTRAINT FK_58E2FF255D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE county ADD CONSTRAINT FK_58E2FF25BF396750 FOREIGN KEY (id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE postal_address ADD CONSTRAINT FK_972EFBF7BDBA6A61 FOREIGN KEY (postal_code_id) REFERENCES postal_code (id)');
        $this->addSql('ALTER TABLE postal_code ADD CONSTRAINT FK_EA98E3767F3E26E2 FOREIGN KEY (activity_region_id) REFERENCES activity_region (id)');
        $this->addSql('ALTER TABLE postal_code ADD CONSTRAINT FK_EA98E376F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE postal_code ADD CONSTRAINT FK_EA98E3768BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE postal_code ADD CONSTRAINT FK_EA98E3765D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE state ADD CONSTRAINT FK_A393D2FBF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE telephone_number ADD CONSTRAINT FK_337542DEF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE telephone_number ADD CONSTRAINT FK_337542DED0E3BBA1 FOREIGN KEY (contact_card_id) REFERENCES contact_card (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B02347F3E26E2');
        $this->addSql('ALTER TABLE postal_code DROP FOREIGN KEY FK_EA98E3767F3E26E2');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234BF396750');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C966BF396750');
        $this->addSql('ALTER TABLE county DROP FOREIGN KEY FK_58E2FF25BF396750');
        $this->addSql('ALTER TABLE postal_code DROP FOREIGN KEY FK_EA98E3768BAC62AF');
        $this->addSql('ALTER TABLE PostalAddress2ContactCard DROP FOREIGN KEY FK_2B41686DD0E3BBA1');
        $this->addSql('ALTER TABLE OperationHours2ContactCard DROP FOREIGN KEY FK_26CDB8DFD0E3BBA1');
        $this->addSql('ALTER TABLE telephone_number DROP FOREIGN KEY FK_337542DED0E3BBA1');
        $this->addSql('ALTER TABLE postal_code DROP FOREIGN KEY FK_EA98E376F92F3E70');
        $this->addSql('ALTER TABLE state DROP FOREIGN KEY FK_A393D2FBF92F3E70');
        $this->addSql('ALTER TABLE telephone_number DROP FOREIGN KEY FK_337542DEF92F3E70');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B023485E73F45');
        $this->addSql('ALTER TABLE OperationHours2ContactCard DROP FOREIGN KEY FK_26CDB8DFC6D31B6B');
        $this->addSql('ALTER TABLE PostalAddress2ContactCard DROP FOREIGN KEY FK_2B41686DFD54954B');
        $this->addSql('ALTER TABLE postal_address DROP FOREIGN KEY FK_972EFBF7BDBA6A61');
        $this->addSql('ALTER TABLE activity_region DROP FOREIGN KEY FK_5D1411765D83CC1');
        $this->addSql('ALTER TABLE county DROP FOREIGN KEY FK_58E2FF255D83CC1');
        $this->addSql('ALTER TABLE postal_code DROP FOREIGN KEY FK_EA98E3765D83CC1');
        $this->addSql('DROP TABLE activity_region');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE contact_card');
        $this->addSql('DROP TABLE PostalAddress2ContactCard');
        $this->addSql('DROP TABLE OperationHours2ContactCard');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE county');
        $this->addSql('DROP TABLE operation_hours');
        $this->addSql('DROP TABLE postal_address');
        $this->addSql('DROP TABLE postal_code');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE telephone_number');
    }
}
