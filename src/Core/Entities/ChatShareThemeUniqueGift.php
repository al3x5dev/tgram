<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatShareThemeUniqueGift Entity
 * @property string $type
 * @property UniqueGift $gift
 */
class ChatShareThemeUniqueGift extends ChatShareTheme
{
    
    protected function setEntities(): array
    {
        return [
            'gift' => UniqueGift::class,
        ];
    }
}
