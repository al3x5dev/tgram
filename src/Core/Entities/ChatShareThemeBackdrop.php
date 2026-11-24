<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatShareThemeBackdrop Entity
 * @property int $id
 * @property string $name
 * @property UniqueGiftBackdropColors $colors
 */
class ChatShareThemeBackdrop extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'colors' => UniqueGiftBackdropColors::class,
        ];
    }
}
