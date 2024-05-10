<?php declare(strict_types=1);

namespace BasicPlugin\Core\Content\Firma;


use BasicPlugin\Core\Content\Contact\ContactDefinition;
use BasicPlugin\Core\Content\Firma\FirmaEntity;
use Doctrine\Common\Annotations\Annotation\Required;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class FirmaDefinition extends EntityDefinition
{


    public function getEntityName(): string
    {
        return 'my_plugin_firma';
    }

    public function getCollectionClass(): string
    {
        return FirmaCollection::class;
    }

    public function getEntityClass(): string
    {
        return FirmaEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([(new StringField('name', 'name'))->addFlags(new \Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required()),
            (new IdField('id', 'id'))->addFlags(new \Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required(), new PrimaryKey()),
            new StringField('number', 'number'), new StringField('email', 'email'),
            new StringField('city', 'city'),
            new StringField('country', 'country'),
            new BoolField('active', 'active')
        ]);
    }
}