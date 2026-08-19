<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ManagedBotCreated Entity
 * @property User $bot
 */
class ManagedBotCreated extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'bot' => User::class,
        ];
    }
}
