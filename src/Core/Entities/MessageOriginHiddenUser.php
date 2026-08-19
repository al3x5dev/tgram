<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * MessageOriginHiddenUser Entity
 * @property string $type
 * @property int $date
 * @property string $sender_user_name
 */
class MessageOriginHiddenUser extends MessageOrigin
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
