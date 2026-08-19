<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatJoinRequest Entity
 * @property Chat $chat
 * @property User $from
 * @property int $user_chat_id
 * @property int $date
 * @property string $bio
 * @property ChatInviteLink $invite_link
 * @property string $query_id
 */
class ChatJoinRequest extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
            'from' => User::class,
            'invite_link' => ChatInviteLink::class,
        ];
    }
}
