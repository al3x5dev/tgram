<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatMemberMember Entity
 * @property string $status
 * @property string $tag
 * @property User $user
 * @property int $until_date
 */
class ChatMemberMember extends ChatMember
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
