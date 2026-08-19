<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatBoostSourcePremium Entity
 * @property string $source
 * @property User $user
 */
class ChatBoostSourcePremium extends ChatBoostSource
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
