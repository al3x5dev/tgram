<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InaccessibleMessage Entity
 * @property Chat $chat
 * @property int $message_id
 * @property int $date
 */
class InaccessibleMessage extends MaybeInaccessibleMessage
{
    
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
