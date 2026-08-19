<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * MessageReactionUpdated Entity
 * @property Chat $chat
 * @property int $message_id
 * @property User $user
 * @property Chat $actor_chat
 * @property int $date
 * @property ReactionType[] $old_reaction
 * @property ReactionType[] $new_reaction
 */
class MessageReactionUpdated extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
            'user' => User::class,
            'actor_chat' => Chat::class,
            'old_reaction' => [ReactionType::class],
            'new_reaction' => [ReactionType::class],
        ];
    }
}
