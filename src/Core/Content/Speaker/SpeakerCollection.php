<?php declare(strict_types=1);

namespace  BasicPlugin\Content\Speaker;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void               add(SpeakerEntity $entity)
 * @method void               set(string $key, SpeakerEntity $entity)
 * @method SpeakerEntity[]    getIterator()
 * @method SpeakerEntity[]    getElements()
 * @method SpeakerEntity|null get(string $key)
 * @method SpeakerEntity|null first()
 * @method SpeakerEntity|null last()
 */
class SpeakerCollection extends EntityCollection
{
    public function getApiAlias(): string
    {
        return 'BasicPlugin_collection';
    }

    protected function getExpectedClass(): string
    {
        return SpeakerEntity::class;
    }
}