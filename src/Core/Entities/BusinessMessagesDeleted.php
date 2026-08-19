<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BusinessMessagesDeleted Entity
 * @property string $business_connection_id
 * @property Chat $chat
 * @property array $message_ids
 */
class BusinessMessagesDeleted extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
