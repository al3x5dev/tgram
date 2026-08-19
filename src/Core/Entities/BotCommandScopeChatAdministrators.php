<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BotCommandScopeChatAdministrators Entity
 * @property string $type
 * @property int|string $chat_id
 */
class BotCommandScopeChatAdministrators extends BotCommandScope
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
