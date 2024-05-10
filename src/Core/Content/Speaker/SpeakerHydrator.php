<?php declare(strict_types=1);

namespace  BasicPlugin\Content\Speaker;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\Dbal\EntityHydrator;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\Uuid\Uuid;
use DateTimeImmutable;

class SpeakerHydrator extends EntityHydrator
{
protected function assign(EntityDefinition $definition, Entity $entity, string $root, array $row, Context $context): Entity
{
if (isset($row[$root . '.id'])) {
$entity->id = Uuid::fromBytesToHex($row[$root . '.id']);
}

if (isset($row[$root . '.name'])) {
$entity->name = $row[$root . '.name'];
}

if (isset($row[$root . '.nationality'])) {
$entity->nationality = $row[$root . '.nationality'];
}

if (isset($row[$root . '.createdAt'])) {
$entity->createdAt = new DateTimeImmutable($row[$root . '.createdAt']);
}

if (isset($row[$root . '.updatedAt'])) {
$entity->updatedAt = new DateTimeImmutable($row[$root . '.updatedAt']);
}

return $entity;
}
}