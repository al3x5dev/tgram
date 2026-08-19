<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ManagedBotUpdated Entity
 * @property User $user
 * @property User $bot
 */
class ManagedBotUpdated extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
            'bot' => User::class,
        ];
    }
}
