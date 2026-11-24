<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * TonNft Entity
 * @property string $address
 * @property string $collection_address
 * @property string $index
 * @property string $name
 * @property string $description
 * @property TonNftAttribute[] $attributes
 * @property UniqueGift $gift
 */
class TonNft extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'attributes' => [TonNftAttribute::class],
            'gift' => UniqueGift::class,
        ];
    }
}
