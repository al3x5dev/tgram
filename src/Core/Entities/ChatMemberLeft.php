<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatMemberLeft Entity
 * @property string $status
 * @property User $user
 */
class ChatMemberLeft extends ChatMember
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
