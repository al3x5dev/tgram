<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatMemberBanned Entity
 * @property string $status
 * @property User $user
 * @property int $until_date
 */
class ChatMemberBanned extends ChatMember
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
