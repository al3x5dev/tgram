<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * MessageOriginChannel Entity
 * @property string $type
 * @property int $date
 * @property Chat $chat
 * @property int $message_id
 * @property string $author_signature
 */
class MessageOriginChannel extends MessageOrigin
{
    
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
