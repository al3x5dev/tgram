<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * UniqueGiftBackdrop Entity
 * @property string $name
 * @property UniqueGiftBackdropColors $colors
 * @property int $rarity_per_mille
 */
class UniqueGiftBackdrop extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'colors' => UniqueGiftBackdropColors::class,
        ];
    }
}
