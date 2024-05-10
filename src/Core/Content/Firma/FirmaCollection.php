<?php declare(strict_types=1);

namespace BasicPlugin\Core\Content\Firma;

use BasicPlugin\Core\Content\Firma\FirmaEntity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void              add(FirmaEntity $entity)
 * @method void              set(string $key, FirmaEntity $entity)
 * @method FirmaEntity[]    getIterator()
 * @method FirmaEntity[]    getElements()
 * @method FirmaEntity|null get(string $key)
 * @method FirmaEntity|null first()
 * @method FirmaEntity|null last()
 */
class FirmaCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return FirmaEntity::class;
    }

}
