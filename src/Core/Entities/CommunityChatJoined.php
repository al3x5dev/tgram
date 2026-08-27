<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * CommunityChatJoined Entity
 * @property Community $community
 */
class CommunityChatJoined extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'community' => Community::class,
        ];
    }
}
