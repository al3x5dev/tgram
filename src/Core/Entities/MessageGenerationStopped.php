<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * MessageGenerationStopped Entity
 * @property Chat $chat
 * @property int $message_thread_id
 * @property int $draft_id
 */
class MessageGenerationStopped extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
