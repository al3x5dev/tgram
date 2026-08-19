<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * UniqueGiftModel Entity
 * @property string $name
 * @property Sticker $sticker
 * @property int $rarity_per_mille
 * @property string $rarity
 */
class UniqueGiftModel extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'sticker' => Sticker::class,
        ];
    }
}
