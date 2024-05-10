<?php declare(strict_types=1);

namespace BasicPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1710767400 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1710767400;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement('
            CREATE TABLE IF NOT EXISTS `ContactEntity` (
                `id` BINARY(16) NOT NULL,
                `name` VARCHAR(255) NOT NULL,
                `nachname` VARCHAR(255) NOT NULL,
                `email` VARCHAR(255) NOT NULL,
                `telefon` VARCHAR(255) NOT NULL,
                `street` VARCHAR(255) NOT NULL,
                `number` INT NOT NULL,  --
                `postcode` VARCHAR(255) NOT NULL,
                `city` VARCHAR(255) NOT NULL,
                `country` VARCHAR(255) NOT NULL,
                `firma_id` int NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                `active` TINYINT(1) NOT NULL,
                PRIMARY KEY (`id`)
            )
        ');
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
