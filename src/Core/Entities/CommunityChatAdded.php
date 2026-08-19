<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * CommunityChatAdded Entity
 * @property Community $community
 */
class CommunityChatAdded extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'community' => Community::class,
        ];
    }
}
