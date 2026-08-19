<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * Story Entity
 * @property Chat $chat
 * @property int $id
 */
class Story extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
