<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * MessageOriginChat Entity
 * @property string $type
 * @property int $date
 * @property Chat $sender_chat
 * @property string $author_signature
 */
class MessageOriginChat extends MessageOrigin
{
    
    protected function setEntities(): array
    {
        return [
            'sender_chat' => Chat::class,
        ];
    }
}
