<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * MessageReactionCountUpdated Entity
 * @property Chat $chat
 * @property int $message_id
 * @property int $date
 * @property ReactionCount[] $reactions
 */
class MessageReactionCountUpdated extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
            'reactions' => [ReactionCount::class],
        ];
    }
}
