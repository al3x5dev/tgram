<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatOwnerChanged Entity
 * @property User $new_owner
 */
class ChatOwnerChanged extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'new_owner' => User::class,
        ];
    }
}
