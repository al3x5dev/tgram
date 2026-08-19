<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * VideoChatParticipantsInvited Entity
 * @property User[] $users
 */
class VideoChatParticipantsInvited extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'users' => [User::class],
        ];
    }
}
