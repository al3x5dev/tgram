<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BotCommandScopeChatMember Entity
 * @property string $type
 * @property int|string $chat_id
 * @property int $user_id
 */
class BotCommandScopeChatMember extends BotCommandScope
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
