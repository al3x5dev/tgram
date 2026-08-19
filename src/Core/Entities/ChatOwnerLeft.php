<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatOwnerLeft Entity
 * @property User $new_owner
 */
class ChatOwnerLeft extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'new_owner' => User::class,
        ];
    }
}
