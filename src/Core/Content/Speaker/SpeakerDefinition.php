<?php declare(strict_types=1);

namespace  BasicPlugin\Content\Speaker;


use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class SpeakerDefinition extends EntityDefinition
{
public const ENTITY_NAME = 'matheusgontijo_speaker';

public function getEntityName(): string
{
return self::ENTITY_NAME;
}

public function getCollectionClass(): string
{
return SpeakerCollection::class;
}

public function getEntityClass(): string
{
return SpeakerEntity::class;
}

public function getHydratorClass(): string
{
return SpeakerHydrator::class;
}

protected function defineFields(): FieldCollection
{
return new FieldCollection([
(new IdField('id', 'id'))->addFlags(new ApiAware(), new PrimaryKey(), new Required()),
(new StringField('name', 'name'))->addFlags(new ApiAware(), new Required()),
(new StringField('nationality', 'nationality'))->addFlags(new ApiAware(), new Required()),
]);
}
}