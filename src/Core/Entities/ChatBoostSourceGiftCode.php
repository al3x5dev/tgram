<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatBoostSourceGiftCode Entity
 * @property string $source
 * @property User $user
 */
class ChatBoostSourceGiftCode extends ChatBoostSource
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
