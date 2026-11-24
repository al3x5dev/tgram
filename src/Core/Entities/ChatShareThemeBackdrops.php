<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatShareThemeBackdrops Entity
 * @property ChatShareThemeBackdrop[] $backdrops
 */
class ChatShareThemeBackdrops extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'backdrops' => [ChatShareThemeBackdrop::class],
        ];
    }
}
