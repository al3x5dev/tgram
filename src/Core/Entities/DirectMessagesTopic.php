<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * DirectMessagesTopic Entity
 * @property int $topic_id
 * @property User $user
 */
class DirectMessagesTopic extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
