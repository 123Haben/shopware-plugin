<?php declare(strict_types=1);

namespace BasicPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;


class Migration1710778023 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1623366864;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement('
            CREATE TABLE IF NOT EXISTS `my_plugin_firma` (
                `id` BINARY(16) NOT NULL,
                `name` VARCHAR(255) NOT NULL,
                `number` VARCHAR(255) DEFAULT NULL,
                `email` VARCHAR(255) DEFAULT NULL,                
                `city` VARCHAR(255) DEFAULT NULL,
                `country` VARCHAR(255) DEFAULT NULL,
                `active` TINYINT(1) DEFAULT 0,
                `firma_id` BINARY(16) DEFAULT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3),
                PRIMARY KEY (`id`)
            )
        ');
    }

    public function updateDestructive(Connection $connection): void
    {
    }
}
