<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatBackground Entity
 * @property BackgroundType $type
 */
class ChatBackground extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'type' => BackgroundType::class,
        ];
    }
}
