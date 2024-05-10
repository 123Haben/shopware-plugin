<?php declare(strict_types=1);

namespace BasicPlugin\Core\Content\Contact;

use BasicPlugin\Core\Content\Firma\FirmaDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;

class ContactDefinition extends EntityDefinition
{
    public function getEntityName(): string
    {
        return 'my_plugin_contact';
    }

    public function getCollectionClass(): string
    {
        return ContactCollection::class;
    }

    public function getEntityClass(): string
    {
        return ContactEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            (new StringField('name', 'name'))->addFlags(new Required()),
            (new StringField('email', 'email'))->addFlags(new Required()),
            (new StringField('nachname', 'nachname'))->addFlags(new Required()),
            (new StringField('age', 'age'))->addFlags(new Required()),
            (new StringField('telefon', 'telefon'))->addFlags(new Required()),
            (new StringField('street', 'street'))->addFlags(new Required()),
            (new StringField('number', 'number'))->addFlags(new Required()),
            (new StringField('postcode', 'postcode'))->addFlags(new Required()),
            (new StringField('city', 'city'))->addFlags(new Required()),
            (new StringField('country', 'country'))->addFlags(new Required()),
            (new BoolField('active', 'active'))->addFlags(new Required()),
            (new FkField('firma_id', 'firmaId', FirmaDefinition::class))->addFlags(new Required()),
            (new ManyToOneAssociationField('firma', 'firma_id', FirmaDefinition::class, 'id'))->addFlags(new Required()),

            new CreatedAtField(),
        ]);
    }
}
