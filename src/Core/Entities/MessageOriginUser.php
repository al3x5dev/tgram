<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * MessageOriginUser Entity
 * @property string $type
 * @property int $date
 * @property User $sender_user
 */
class MessageOriginUser extends MessageOrigin
{
    
    protected function setEntities(): array
    {
        return [
            'sender_user' => User::class,
        ];
    }
}
